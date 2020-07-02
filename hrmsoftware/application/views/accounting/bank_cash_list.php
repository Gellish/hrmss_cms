<?php
/*
* Bank/Cash - Accounting View
*/
$session = $this->session->userdata('username');
?>

<div class="row m-b-1 animated fadeInRight">
  <div class="col-md-4">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_acc_account');?></h2>
      <form class="m-b-1" action="<?php echo site_url("accounting/add_bankcash") ?>" method="post" name="add_bankcash" id="xin-form">
        <div class="form-group">
          <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
          <label for="account_name"><?php echo $this->lang->line('xin_acc_account_name');?></label>
          <input type="text" class="form-control" name="account_name" placeholder="<?php echo $this->lang->line('xin_acc_account_name');?>">
        </div>
        <div class="form-group">
          <label for="account_balance"><?php echo $this->lang->line('xin_acc_initial_balance');?></label>
          <input type="number" class="form-control" name="account_balance" placeholder="<?php echo $this->lang->line('xin_acc_initial_balance');?>">
        </div>
        <div class="form-group">
          <label for="account_number"><?php echo $this->lang->line('xin_e_details_acc_number');?></label>
          <input type="text" class="form-control" name="account_number" placeholder="<?php echo $this->lang->line('xin_e_details_acc_number');?>">
        </div>
        <div class="form-group">
          <label for="branch_code"><?php echo $this->lang->line('xin_acc_branch_code');?></label>
          <input type="text" class="form-control" name="branch_code" placeholder="<?php echo $this->lang->line('xin_acc_branch_code');?>">
        </div>
        <div class="form-group">
          <label for="description"><?php echo $this->lang->line('xin_e_details_bank_branch');?></label>
          <textarea class="form-control" name="bank_branch" placeholder="<?php echo $this->lang->line('xin_e_details_bank_branch');?>" rows="5"></textarea>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_acc_accounts');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_action');?></th>
              <th><?php echo $this->lang->line('xin_acc_accounts');?></th>
              <th><?php echo $this->lang->line('xin_acc_account_no');?></th>
              <th><?php echo $this->lang->line('xin_acc_branch_code');?></th>
              <th><?php echo $this->lang->line('xin_acc_balance');?></th>
              <th><?php echo $this->lang->line('xin_e_details_bank_branch');?></th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- responsive --> 
    </div>
  </div>
</div>
