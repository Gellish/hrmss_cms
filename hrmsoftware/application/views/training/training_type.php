<?php
/* Training Type view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1 animated fadeInRight">
  <div class="col-md-4">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_type');?></h2>
      <form class="m-b-1 add" method="post" action="<?php echo site_url("training_type/add_type") ?>" name="add_type" id="xin-form">
        <div class="form-group">
          <label for="type_name"><?php echo $this->lang->line('left_training_type');?></label>
          <input type="text" class="form-control" name="type_name" placeholder="<?php echo $this->lang->line('left_training_type');?>">
        </div>
        <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong><?php echo $this->lang->line('xin_training_types');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_action');?></th>
              <th><?php echo $this->lang->line('xin_employees_id');?></th>
              <th><?php echo $this->lang->line('xin_type');?></th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- responsive --> 
    </div>
  </div>
</div>
