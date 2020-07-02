<?php
/* Employees Last Login view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="box box-block bg-white">
  <h2><strong>Employees</strong> Last Login</h2>
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-striped table-bordered dataTable" id="xin_table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Username</th>
          <th>Last Login Date </th>
          <th>Last Login Time</th>
          <th>Role</th>
          <th>Status</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
</div>
