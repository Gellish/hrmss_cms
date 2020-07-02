<?php
/* Accounting > Income Report view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1">
  <div class="col-md-12">
    <div class="box box-block bg-white col-md-12">
      <div class="row">
        <div class="col-md-12">
          <h2><strong><?php echo $this->lang->line('xin_acc_income_reports');?></strong></h2>
          <div class="row">
            <div class="col-md-12">
            <form class="add form-hrm report-params" method="post" name="report_accounting" id="hrm-form" action="report_accounting">
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $session['user_id'];?>">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <select name="type_id" id="type_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_acc_select_income_type');?>">
                      <option value="0"><?php echo $this->lang->line('xin_acc_all_types');?></option>
                      <?php foreach($all_income_categories_list as $income_category) {?>
                      <option value="<?php echo $income_category->category_id;?>"> <?php echo $income_category->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_e_details_frm_date');?>" readonly id="from_date" name="from_date" type="text" value="<?php echo date('Y-m-d')?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_e_details_to_date');?>" readonly id="to_date" name="to_date" type="text" value="<?php echo date('Y-m-d')?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_get');?></button>
                  </div>
                </div>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row m-b-1">
        <div class="col-md-12">
          <div class="table-responsive" data-pattern="priority-columns">
            <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
              <thead>
                <tr>
                  <th><?php echo $this->lang->line('xin_e_details_date');?></th>
                  <th><?php echo $this->lang->line('xin_acc_account');?></th>
                  <th><?php echo $this->lang->line('xin_acc_category');?></th>
                  <th><?php echo $this->lang->line('xin_acc_payer');?></th>
                  <th><?php echo $this->lang->line('xin_acc_ref_no');?></th>
                  <th><?php echo $this->lang->line('xin_amount');?></th>
                </tr>
              </thead>
              <tfoot id="get_footer">
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
