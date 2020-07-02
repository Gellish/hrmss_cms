<?php
/*
* Account Balances - Finance View
*/
$session = $this->session->userdata('username');
$currency = $this->Xin_model->currency_sign(0);
?>
<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php $bankcash = $this->Finance_model->get_bankcash();?>
<?php
$account_balance = 0;;
foreach($bankcash->result() as $r) {
	// account balance
	$account_balance += $r->account_balance;
}
?>

<div class="row m-b-1 animated fadeInRight">
  <div class="col-md-12">
    <div class="box box-block bg-white">
      <input type="hidden" id="current_currency" value="<?php $curr = explode('0',$currency); echo $curr[0];?>" />
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_acc_account_balances');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_acc_account');?></th>
              <th><?php echo $this->lang->line('xin_acc_balance');?></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th colspan="1" style="text-align:right"><?php echo $this->lang->line('xin_acc_total');?>:</th>
              <th><?php echo $this->Xin_model->currency_sign($account_balance);?></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- responsive --> 
    </div>
  </div>
</div>
