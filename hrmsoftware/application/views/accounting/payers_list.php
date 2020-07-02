<?php
/*
* Payers - Accounting View
*/
$session = $this->session->userdata('username');
?>

<div class="row m-b-1 animated fadeInRight">
  <div class="col-md-4">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_acc_payer');?></h2>
      <form class="m-b-1" action="<?php echo site_url("accounting/add_payer") ?>" method="post" name="add_payer" id="xin-form">
        <div class="form-group">
          <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
          <label for="account_name"><?php echo $this->lang->line('xin_acc_payer');?></label>
          <input type="text" class="form-control" name="payer_name" placeholder="<?php echo $this->lang->line('xin_acc_payer_name');?>">
        </div>
        <div class="form-group">
          <label for="account_balance"><?php echo $this->lang->line('xin_contact_number');?></label>
          <input type="text" class="form-control" name="contact_number" placeholder="<?php echo $this->lang->line('xin_contact_number');?>">
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?> <i class="icon-circle-right2 position-right"></i> <i class="icon-spinner3 spinner position-left"></i></button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_acc_payers');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_action');?></th>
              <th><?php echo $this->lang->line('xin_acc_payer');?></th>
              <th><?php echo $this->lang->line('xin_contact_number');?></th>
              <th><?php echo $this->lang->line('xin_acc_created_at');?></th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- responsive --> 
    </div>
  </div>
</div>
