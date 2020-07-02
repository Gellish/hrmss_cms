<?php
/* Projects view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_projects');?> </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('xin_project_summary');?></th>
          <th><?php echo $this->lang->line('xin_p_priority');?></th>
          <th><?php echo $this->lang->line('xin_p_enddate');?></th>
          <th><?php echo $this->lang->line('dashboard_xin_progress');?></th>
          <th><?php echo $this->lang->line('xin_project_users');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
