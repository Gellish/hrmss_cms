<?php
/* Hourly Wage/Rate view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1">
  <div class="col-md-4">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_payroll_hourly_rate');?></h2>
      <form class="m-b-1 add" method="post" action="<?php echo site_url("payroll/add_hourly_rate") ?>" name="add_hourly_rate" id="xin-form">
        <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="hourly_grade"><?php echo $this->lang->line('xin_payroll_hourly_wage_title_single');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_payroll_hourly_wage_title');?>" name="hourly_grade" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="hourly_rate"><?php echo $this->lang->line('xin_payroll_hourly_rate');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_payroll_hourly_rate');?>" name="hourly_rate" type="text">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_payroll_hourly_wages');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_action');?></th>
              <th><?php echo $this->lang->line('xin_payroll_hourly_wage_title');?></th>
              <th><?php echo $this->lang->line('xin_payroll_hourly_rate');?></th>
              <th><?php echo $this->lang->line('xin_created_by');?></th>
              <th><?php echo $this->lang->line('xin_created_date');?></th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- responsive --> 
    </div>
  </div>
</div>
