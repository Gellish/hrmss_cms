<?php
/* Training view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_training');?> </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('xin_employee');?></th>
          <th><?php echo $this->lang->line('left_training_type');?></th>
          <th><?php echo $this->lang->line('xin_trainer');?></th>
          <th><?php echo $this->lang->line('xin_training_duration');?></th>
          <th><?php echo $this->lang->line('xin_cost');?></th>
          <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
