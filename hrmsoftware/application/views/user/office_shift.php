<?php
/* Office Shift view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('My Office Shift');?></strong> </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('left_office_shift');?></th>
          <th><?php echo $this->lang->line('xin_e_details_duration');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
