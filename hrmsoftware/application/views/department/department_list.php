<?php
/* Departments view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1 animated fadeInRight">
  <div class="col-md-4">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_department');?></h2>
      <form class="m-b-1 add" method="post" action="<?php echo site_url("department/add_department") ?>" name="add_department" id="xin-form">
        <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
        <div class="form-group">
          <label for="name"><?php echo $this->lang->line('xin_name');?></label>
          <input type="text" class="form-control" name="department_name" placeholder="<?php echo $this->lang->line('xin_name');?>">
        </div>
        <div class="form-group">
          <label for="first_name"><?php echo $this->lang->line('left_company');?></label>
            <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company');?>">
              <option value=""></option>
              <?php foreach($get_all_companies as $company) {?>
              <option value="<?php echo $company->company_id?>"><?php echo $company->name?></option>
              <?php } ?>
            </select>
        </div>
        <div class="form-group" id="location_ajax">
          <label for="name"><?php echo $this->lang->line('xin_location');?></label>
          <select name="location_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_location');?>">
            <option value=""></option>
          </select>
        </div>
        <div class="form-group">
          <label for="name"><?php echo $this->lang->line('xin_department_head');?></label>
          <select name="employee_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_department_head');?>">
            <option value=""></option>
            <?php foreach($all_employees as $employee) {?>
            <?php
                /* get user_role */
				$user_role = $this->Xin_model->read_user_role_info($employee->user_role_id);
				?>
            <option value="<?php echo $employee->user_id;?>"> <?php echo $employee->first_name.' '.$employee->last_name;?> (<?php echo $user_role[0]->role_name;?>)</option>
            <?php } ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-block bg-white">
      <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_departments');?></h2>
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-striped table-bordered dataTable" id="xin_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_action');?></th>
              <th><?php echo $this->lang->line('xin_department_name');?></th>
              <th><?php echo $this->lang->line('xin_department_head');?></th>
              <th><?php echo $this->lang->line('left_company');?></th>
              <th><?php echo $this->lang->line('xin_location');?></th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- responsive --> 
    </div>
  </div>
</div>
