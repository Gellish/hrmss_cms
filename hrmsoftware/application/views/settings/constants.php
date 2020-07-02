<?php
/* Constants view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1">
  <div class="col-md-3">
    <div class="box bg-white">
      <ul class="nav nav-4">
        <li class="nav-item nav-item-link active-link" id="config_8"> <a class="nav-link nav-tabs-link" href="#contract" data-config="8" data-config-block="contract" data-toggle="tab" aria-expanded="true"> <i class="fa fa-pencil"></i> <?php echo $this->lang->line('xin_e_details_contract_type');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_7"> <a class="nav-link nav-tabs-link" href="#qualification" data-config="7" data-config-block="qualification" data-toggle="tab" aria-expanded="true"> <i class="fa fa-coffee"></i> <?php echo $this->lang->line('xin_e_details_qualification');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_9"> <a class="nav-link nav-tabs-link" href="#document_type" data-config="9" data-config-block="document_type" data-toggle="tab" aria-expanded="true"> <i class="fa fa-file"></i> <?php echo $this->lang->line('xin_e_details_dtype');?></a> </li>
        <li class="nav-item nav-item-link" id="config_10"> <a class="nav-link nav-tabs-link" href="#award_type" data-config="10" data-config-block="award_type" data-toggle="tab" aria-expanded="true"> <i class="fa fa-trophy"></i> <?php echo $this->lang->line('xin_award_type');?></a> </li>
        <li class="nav-item nav-item-link" id="config_11"> <a class="nav-link nav-tabs-link" href="#leave_type" data-config="11" data-config-block="leave_type" data-toggle="tab" aria-expanded="true"> <i class="fa fa-plane"></i> <?php echo $this->lang->line('xin_leave_type');?></a> </li>
        <li class="nav-item nav-item-link" id="config_12"> <a class="nav-link nav-tabs-link" href="#warning_type" data-config="12" data-config-block="warning_type" data-toggle="tab" aria-expanded="true"> <i class="fa fa-exclamation-triangle"></i> <?php echo $this->lang->line('xin_warning_type');?></a> </li>
        <li class="nav-item nav-item-link" id="config_13"> <a class="nav-link nav-tabs-link" href="#termination_type" data-config="13" data-config-block="termination_type" data-toggle="tab" aria-expanded="true"> <i class="fa fa-remove"></i> <?php echo $this->lang->line('xin_termination_type');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_17"> <a class="nav-link nav-tabs-link" href="#expense_type" data-config="17" data-config-block="expense_type" data-toggle="tab" aria-expanded="true"> <i class="fa fa-bar-chart"></i> <?php echo $this->lang->line('xin_expense_type');?></a> </li>
        <li class="nav-item nav-item-link" id="config_14"> <a class="nav-link nav-tabs-link" href="#job_type" data-config="14" data-config-block="job_type" data-toggle="tab" aria-expanded="true"> <i class="fa fa-file-text-o"></i> <?php echo $this->lang->line('xin_job_type');?></a> </li>
        <li class="nav-item nav-item-link" id="config_15"> <a class="nav-link nav-tabs-link" href="#exit_type" data-config="15" data-config-block="exit_type" data-toggle="tab" aria-expanded="true"> <i class="fa fa-sign-out"></i> <?php echo $this->lang->line('xin_employee_exit_type');?></a> </li>
        <li class="nav-item nav-item-link" id="config_18"> <a class="nav-link nav-tabs-link" href="#travel_arr_type" data-config="18" data-config-block="travel_arr_type" data-toggle="tab" aria-expanded="true"> <i class="fa fa-car"></i> <?php echo $this->lang->line('xin_travel_arrangement_type');?></a> </li>
        <li class="nav-item nav-item-link" id="config_16"> <a class="nav-link nav-tabs-link" href="#payment_method" data-config="16" data-config-block="payment_method" data-toggle="tab" aria-expanded="true"> <i class="fa fa-money"></i> <?php echo $this->lang->line('xin_payment_methods');?> </a> </li>
        <li class="nav-item nav-item-link" id="config_19"> <a class="nav-link nav-tabs-link" href="#currency_type" data-config="19" data-config-block="currency_type" data-toggle="tab" aria-expanded="true"> <i class="fa fa-dollar"></i> <?php echo $this->lang->line('xin_currency_type');?> </a> </li>
      </ul>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="contract">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_e_details_contract_type');?></h2>
            <form class="m-b-1 add" id="contract_type_info" action="<?php echo site_url("settings/contract_type_info") ?>" name="contract_type_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_e_details_contract_type');?></label>
                <input type="text" class="form-control" name="contract_type" placeholder="<?php echo $this->lang->line('xin_e_details_contract_type');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_e_details_contract_type');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_contract_type" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_e_details_contract_type');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="document_type" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_e_details_dtype');?></h2>
            <form class="m-b-1 add" id="document_type_info" action="<?php echo site_url("settings/document_type_info") ?>" name="document_type_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_e_details_dtype');?></label>
                <input type="text" class="form-control" name="document_type" placeholder="<?php echo $this->lang->line('xin_e_details_dtype');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_e_details_dtype');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_document_type" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_e_details_dtype');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="qualification" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_e_details_edu_level');?></h2>
            <form class="m-b-1 add" id="edu_level_info" action="<?php echo site_url("settings/edu_level_info") ?>" name="edu_level_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_e_details_edu_level');?></label>
                <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_edu_level');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_e_details_edu_level');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_education_level" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_e_details_edu_level');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_e_details_language');?></h2>
            <form class="m-b-1 add" id="edu_language_info" action="<?php echo site_url("settings/edu_language_info") ?>" name="edu_language_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_e_details_language');?></label>
                <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_language');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_e_details_language');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_qualification_language" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_e_details_language');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_skill');?></h2>
            <form class="m-b-1 add" id="edu_skill_info" action="<?php echo site_url("settings/edu_skill_info") ?>" name="edu_skill_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_skill');?></label>
                <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_skill');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_skill');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_qualification_skill" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_skill');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="payment_method" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_payment_method');?></h2>
            <form class="m-b-1 add" id="payment_method_info" action="<?php echo site_url("settings/payment_method_info") ?>" name="payment_method_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_payment_method');?></label>
                <input type="text" class="form-control" name="payment_method" placeholder="<?php echo $this->lang->line('xin_payment_method');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_payment_method');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_payment_method" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_payment_method');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="award_type" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_award_type');?></h2>
            <form class="m-b-1 add" id="award_type_info" action="<?php echo site_url("settings/award_type_info") ?>" name="award_type_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_award_type');?></label>
                <input type="text" class="form-control" name="award_type" placeholder="<?php echo $this->lang->line('xin_award_type');?>xin_award_type">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_award_type');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_award_type" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_award_type');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="leave_type" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_leave_type');?></h2>
            <form class="m-b-1 add" id="leave_type_info" action="<?php echo site_url("settings/leave_type_info") ?>" name="leave_type_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_leave_type');?></label>
                <input type="text" class="form-control" name="leave_type" placeholder="<?php echo $this->lang->line('xin_leave_type');?>">
              </div>
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_days_per_year');?></label>
                <input type="text" class="form-control" name="days_per_year" placeholder="<?php echo $this->lang->line('xin_days_per_year');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_leave_type');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_leave_type" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_leave_type');?></th>
                    <th><?php echo $this->lang->line('xin_days_per_year');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="warning_type" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_warning_type');?></h2>
            <form class="m-b-1 add" id="warning_type_info" action="<?php echo site_url("settings/warning_type_info") ?>" name="warning_type_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_warning_type');?></label>
                <input type="text" class="form-control" name="warning_type" placeholder="<?php echo $this->lang->line('xin_warning_type');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_warning_type');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_warning_type" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_warning_type');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="termination_type" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_termination_type');?></h2>
            <form class="m-b-1 add" id="termination_type_info" action="<?php echo site_url("settings/termination_type_info") ?>" name="termination_type_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_termination_type');?></label>
                <input type="text" class="form-control" name="termination_type" placeholder="<?php echo $this->lang->line('xin_termination_type');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_termination_type');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_termination_type" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_termination_type');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="expense_type" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_expense_type');?></h2>
            <form class="m-b-1 add" id="expense_type_info" action="<?php echo site_url("settings/expense_type_info") ?>" name="expense_type_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_expense_type');?></label>
                <input type="text" class="form-control" name="expense_type" placeholder="<?php echo $this->lang->line('xin_expense_type');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_expense_type');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_expense_type" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_expense_type');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="job_type" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_job_type');?></h2>
            <form class="m-b-1 add" id="job_type_info" action="<?php echo site_url("settings/job_type_info") ?>" name="job_type_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_job_type');?></label>
                <input type="text" class="form-control" name="job_type" placeholder="<?php echo $this->lang->line('xin_job_type');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_job_type');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_job_type" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_job_type');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="exit_type" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_employee_exit_type');?></h2>
            <form class="m-b-1 add" id="exit_type_info" action="<?php echo site_url("settings/exit_type_info") ?>" name="exit_type_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_employee_exit_type');?></label>
                <input type="text" class="form-control" name="exit_type" placeholder="<?php echo $this->lang->line('xin_employee_exit_type');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_employee_exit_type');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_exit_type" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_employee_exit_type');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="travel_arr_type" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_travel_arrangement_type');?></h2>
            <form class="m-b-1 add" id="travel_arr_type_info" action="<?php echo site_url("settings/travel_arr_type_info") ?>" name="travel_arr_type_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_travel_arrangement_type');?></label>
                <input type="text" class="form-control" name="travel_arr_type" placeholder="<?php echo $this->lang->line('xin_travel_arrangement_type');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_travel_arrangement_type');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_travel_arr_type" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_travel_arrangement_type');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab animated fadeInRight" id="currency_type" style="display:none;">
    <div  class="box box-block bg-white">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_currency_type');?></h2>
            <form class="m-b-1 add" id="currency_type_info" action="<?php echo site_url("settings/currency_type_info") ?>" name="currency_type_info" method="post">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_currency_name');?></label>
                <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_currency_name');?>">
              </div>
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_currency_code');?></label>
                <input type="text" class="form-control" name="code" placeholder="<?php echo $this->lang->line('xin_currency_code');?>">
              </div>
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_currency_symbol');?></label>
                <input type="text" class="form-control" name="symbol" placeholder="<?php echo $this->lang->line('xin_currency_symbol');?>">
              </div>
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_save');?></button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box box-block bg-white">
            <h2><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_currencies');?></h2>
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table_currency_type" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_name');?></th>
                    <th><?php echo $this->lang->line('xin_code');?></th>
                    <th><?php echo $this->lang->line('xin_symbol');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade edit_setting_datail" id="edit_setting_datail" tabindex="-1" role="dialog" aria-labelledby="edit-modal-data" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="ajax_setting_info"></div>
  </div>
</div>
