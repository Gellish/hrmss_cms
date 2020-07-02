<?php
/* Announcement view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_announcements');?> </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('xin_title');?></th>
          <th><?php echo $this->lang->line('xin_summary');?></th>
          <th><?php echo $this->lang->line('xin_published_for');?></th>
          <th><?php echo $this->lang->line('xin_start_date');?></th>
          <th><?php echo $this->lang->line('xin_end_date');?></th>
          <th><?php echo $this->lang->line('xin_published_by');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
