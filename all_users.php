<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['user_access'] == 'Administrator') {
    include "include/header.php";
    include "include/navbar.php";
    include "include/sidebar.php";
    include "include/db_connection.php";
    
    ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid mb-5">
            <div class="row mr-4">
                <div class="col-8 col-md-4">
                    <h1 class="mt-4">All Employees</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Employees</li>
                    </ol>
                </div>
                <div class="col-12 col-md-5 col-lg-3 my-3 border border-secondary rounded ml-auto">
                    <div class="row mx-2 mt-4">
                        <span class="font-weight-bold">Total Employees: </span><span id="total_employees"
                            class="mx-2"></span>
                    </div>
                    <div class="row mx-2">
                        <span class="font-weight-bold">Active Employees: </span><span id="active_employees"
                            class="mx-2"></span>
                    </div>
                    <div class="row mx-2 mb-2 mb-md-0">
                        <span class="font-weight-bold">Inactive Employees: </span><span id="inactive_employees"
                            class="mx-2"></span>
                    </div>

                </div>
            </div>
            <div class="row d-flex justify-content-end mr-5">
                <div class="form-group col-6 col-md-3 col-lg-2">
                    <label>Department</label>
                    <div>
                        <select id="department" name="department" class="custom-select">
                            <option value="department">Department</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="row mx-1 mx-md-5">
                <div class="table-responsive ">
                    <table class="table text-center text-nowrap" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>Employee Id</th>
                                <th>Employee Name</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 mt-auto" style="opacity: 90%;
  background-color:#20205a ;">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;
                                <a href="http://esolacetech.com/" target="_blank" style="color: #cd71f5;"><b>Esolace Tech</b>.</a>.</a>
                            </div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
</div>
<div class="modal fade bd-example-modal-lg" id="user_info" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content custom">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4 order-list">
                        <div class="gold-members p-4">
                            <a href="#">
                            </a>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mx-auto mt-0 mt-md-5" style="width: 200px;">
                                        <img name="image" id="image" src="" style="width: 200px; height: 300px;">
                                    </div>
                                </div>
                                <div class="col-md-8 add_top_30">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Employee Name *</label>
                                                <input id="employee_name" name="employee_name" type="text"
                                                    class="form-control" placeholder="First Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender *</label>
                                                <div>
                                                    <input id="gender" class="form-control" name="gender" type="text"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Department *</label>
                                                <div>
                                                    <input id="v_department" class="form-control" name="department"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation *</label>
                                                <div>
                                                    <input id="designation" class="form-control" name="designation"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row-->
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Shift *</label>
                                                <div>
                                                    <input id="user_shift" class="form-control" name="user_shift"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Joining Date</label>
                                                <input id="joining_date" class="form-control" name="joining_date"
                                                    type="text" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row-->
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="time_in" class="form-label">Time In:</label>
                                            <input id="time_in" name="time_in" class="form-control" type="time"
                                                readonly />
                                        </div>
                                        <div class="col-6">
                                            <label for="time_out" class="form-label">Time Out:</label>
                                            <input id="time_out" name="time_out" class="form-control" type="time"
                                                readonly />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /row-->
                            <div class="row mt-3">
                                <h1>Personal Details</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Officical Email</label>
                                        <input id=off_email class="form-control" name="off_email" type="email" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id=email class="form-control" name=email type="email" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input id="contact_number" class="form-control" name="contact_number"
                                            type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- /row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <input id="qualification" class="form-control" name="qualification" type="text"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CNIC</label>
                                        <input id="cnic" class="form-control" name="cnic" type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input id="date_of_birth" class="form-control" name="date_of_birth" type="text"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Current Address</label>
                                        <input id="current_address" class="form-control" name="current_address"
                                            type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Martial Status</label>
                                        <div>
                                            <input id="martial_status" class="form-control" name="martial_status"
                                                type="text" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                             <div class="row mt-3">
                                <h1>Next Of Kin</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id=n_name class="form-control" name=n_name type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Relation</label>
                                        <input id="relation" class="form-control" name="relation"
                                            type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number</label>
                                        <input id="n_number" class="form-control" name="n_number" type="text"
                                            readonly>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-5">
                                <h1>User Access</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>User Role</label>
                                        <div>
                                            <input id="user_access" class="form-control" name="user_access" type="text"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>User Status</label>
                                        <div>
                                            <input id="user_status" class="form-control" name="user_status" type="text"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /row-->


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
include "include/footer.php";

} else {
    header("location:login.php");
    exit();
}
?>

<script>
$(document).ready(function() {
    load_all_users_page();
});

$.extend(true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false,
    "info": false,
    "paging": false

});

$(document).ready(function() {
    get_all_employees();
});

$("#department").change(function() {
    let department = $("#department").val();
    get_employees_by_department(department);
});


</script>

<style>
.modal-lg {
    min-width: 70% !important;
}

#image {
    width: 200px;
    height: 200px;
}
</style>