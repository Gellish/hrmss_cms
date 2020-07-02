<?php
/* Announcement view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('left_job_candidates');?></h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('xin_e_details_jtitle');?></th>
          <th><?php echo $this->lang->line('xin_candidate_name');?></th>
          <th><?php echo $this->lang->line('dashboard_email');?></th>
          <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
          <th><?php echo $this->lang->line('xin_apply_date');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
