<?php
/* Travel view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_travels');?> </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('dashboard_single_employee');?></th>
          <th><?php echo $this->lang->line('xin_visit_purpose');?></th>
          <th><?php echo $this->lang->line('xin_visit_place');?></th>
          <th><?php echo $this->lang->line('xin_start_date');?></th>
          <th><?php echo $this->lang->line('xin_end_date');?></th>
          <th><?php echo $this->lang->line('xin_approval_status');?></th>
          <th><?php echo $this->lang->line('xin_added_by');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
