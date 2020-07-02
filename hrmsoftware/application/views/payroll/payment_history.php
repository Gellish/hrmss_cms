<?php
/* Payment History view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_payment_history');?></h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('dashboard_employee_id');?></th>
          <th><?php echo $this->lang->line('xin_employee_name');?></th>
          <th><?php echo $this->lang->line('xin_paid_amount');?></th>
          <th><?php echo $this->lang->line('xin_payment_month');?></th>
          <th><?php echo $this->lang->line('xin_payment_date');?></th>
          <th><?php echo $this->lang->line('xin_payment_type');?></th>
          <th><?php echo $this->lang->line('xin_payslip');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
