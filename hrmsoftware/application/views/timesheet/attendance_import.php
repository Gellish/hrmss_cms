<?php
/* Attendance Import view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1">
  <div class="col-md-12">
    <div class="box box-block bg-white product-view mb-8">
      <h5><?php echo $this->lang->line('xin_attendance_import_csv_file');?></h5>
      <p class="font-100 text-muted mb-1"><?php echo $this->lang->line('xin_attendance_description_line1');?></p>
      <p class="font-100 text-muted mb-1"><?php echo $this->lang->line('xin_attendance_description_line2');?></p>
      <h6><a href="<?php echo base_url();?>uploads/csv/sample-csv-attendance.csv" class="btn btn-info"> <i class="fa fa-download"></i> <?php echo $this->lang->line('xin_attendance_download_sample');?> </a></h6>
      <div class="pv-form mt-2">
        <h6 class="mt-0"><?php echo $this->lang->line('xin_attendance_upload_file');?></h6>
        <form name="import_attendance" method="post" action="<?php echo site_url("timesheet/import_attendance"); ?>" id="xin-form" enctype="multipart/form-data">
          <span class="btn btn-primary btn-file"> <?php echo $this->lang->line('xin_browse');?>
          <input type="file" name="file" id="file">
          </span> <br>
          <small><?php echo $this->lang->line('xin_attendance_allowed_size');?></small>
          <div class="mt-1">
            <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_attendance_import');?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
