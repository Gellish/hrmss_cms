<?php
/* Performance Appraisals view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_performance_apps');?> </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('dashboard_single_employee');?></th>
          <th><?php echo $this->lang->line('left_department');?></th>
          <th><?php echo $this->lang->line('dashboard_designation');?></th>
          <th><?php echo $this->lang->line('xin_performance_app_date');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
