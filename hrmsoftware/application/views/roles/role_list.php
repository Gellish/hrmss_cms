<?php
/* User Roles view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="add-form" style="display:none;">
  <div class="box box-block bg-white">
    <h2><strong><?php echo $this->lang->line('xin_role_set');?></strong> <?php echo $this->lang->line('xin_employee_role');?>
      <div class="add-record-btn">
        <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-minus icon"></i> <?php echo $this->lang->line('xin_hide');?></button>
      </div>
    </h2>
    <div class="row m-b-1">
      <div class="col-md-12">
        <form action="<?php echo site_url("roles/add_role") ?>" method="post" name="add_role" id="xin-form">
          <input type="hidden" name="_user" value="<?php echo $session['user_id'];?>">
          <div class="bg-white">
            <div class="box-block">
              <div class="row">
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="role_name"><?php echo $this->lang->line('xin_role_name');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_role_name');?>" name="role_name" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <input type="checkbox" name="role_resources[]" value="0" checked style="display:none;"/>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="role_access"><?php echo $this->lang->line('xin_role_access');?></label>
                        <select class="form-control custom-select" id="role_access" data-plugin="select_hrm" name="role_access"  data-placeholder="<?php echo $this->lang->line('xin_role_access');?>">
                          <option value="">&nbsp;</option>
                          <option value="1"><?php echo $this->lang->line('xin_role_all_menu');?></option>
                          <option value="2"><?php echo $this->lang->line('xin_role_cmenu');?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="resources"><?php echo $this->lang->line('xin_role_resource');?></label>
                        <div id="all_resources">
                          <div class="demo-section k-content">
                            <div>
                              <div id="treeview_r1"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div id="all_resources">
                          <div class="demo-section k-content">
                            <div>
                              <div id="treeview_r2"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="box box-block bg-white">
  <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_roles');?>
    <div class="add-record-btn">
      <button class="btn btn-sm btn-primary add-new-form"><i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_role_set');?> <?php echo $this->lang->line('xin_employee_role');?></button>
    </div>
  </h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('xin_role_rid');?></th>
          <th><?php echo $this->lang->line('xin_role_name');?></th>
          <th><?php echo $this->lang->line('xin_role_menu_per');?></th>
          <th><?php echo $this->lang->line('xin_role_added_date');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<style type="text/css">
.k-in { display:none !important; }
</style>