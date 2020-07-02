<?php
/* Awards view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_awards');?></h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('dashboard_employee_id');?></th>
          <th><?php echo $this->lang->line('xin_employee_name');?></th>
          <th><?php echo $this->lang->line('xin_award_name');?></th>
          <th><?php echo $this->lang->line('xin_gift');?></th>
          <th><?php echo $this->lang->line('xin_cash_price');?></th>
          <th><?php echo $this->lang->line('xin_award_month_year');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
