<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['user_access'] == 'Employee') {
    include "include/header.php";
    include "include/navbar.php";
    include "include/sidebar.php";
    include "include/db_connection.php";
    ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">My Leave</h1>
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">My Leave</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary float-right mr-5" data-toggle="modal"
                        data-target="#apply_for_leave">
                        Apply for Leave
                </div>
            </div>
            <div class="card mb-4 mr-5">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center text-nowrap" id="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Leave Id</th>
                                    <th>Leave Type</th>
                                    <th>Duration</th>
                                    <th>Total Days/Hours & Minutes</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
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

<div class="modal fade" id="apply_for_leave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply For Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mx-4" style="min-height: 50vh; overflow: hidden;">
                    <div class="card-header d-flex justify-content-center">
                        <img src="img/apply for leave.svg" style="height:250px;">
                    </div>
                    <div class="row ml-2">
                        <div class="col-6 col-md-4 form-group">
                            <label>Leave Type:</label>
                            <div>
                                <select id="selector" class="custom-select">
                                    <option selected> --Select Type--</option>
                                    <option value="1">Short Leave</option>
                                    <option value="2">Half Day Leave</option>
                                    <option value="3">Full Day Leave</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" id="full_day" style="display: none">
                            <div class="row my-3">

                                <div class="col-6 col-md-4">
                                    <label for="from" class="form-label">From Date:</label>
                                    <input type="date" class="form-control" id="from">
                                </div>
                                <div class="col-6 col-md-4">
                                    <label for="to" class="form-label">To Date:</label>
                                    <input type="date" class="form-control" id="to">
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="mb-3">
                                        <label for="leaves" class="form-label">Number of leave(s):</label>
                                        <input type="text" id="leaves" class="form-control" placeholder="0" disabled>
                                    </div>
                                </div>

                            </div>
                            <div class="row my-3">
                                <div class="col-12 form-floating ">
                                    <textarea class="form-control" placeholder="" id="full_day_reason"
                                        style="height: 100px"></textarea>
                                    <label class="ms-2" for="full_day_reason">Type reason for leave</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" id="full_day_btn" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <form method="post" id="half_day" style="display: none">
                            <div class="row my-3">
                                <div class="col-6">
                                    <label for="from_time2" class="form-label">From Time:</label>
                                    <input id="from_time2" class="form-control" step="900" type="time"
                                        ng-model="endTime" pattern="[0-9]*" value="--:--" />
                                </div>
                                <div class="col-6">
                                    <label for="to_time2" class="form-label">To Time:</label>
                                    <input id="to_time2" class="form-control" step="900" type="time" ng-model="endTime"
                                        pattern="[0-9]*" value="--:--" />
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12 form-floating">
                                    <textarea class="form-control" placeholder="" id="half_day_reason"
                                        style="height: 100px"></textarea>
                                    <label class="ms-2" for="half_day_reason">Type reason for leave</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" id="half_day_btn" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <form method="post" id="short" style="display: none">
                            <div class="row my-3">
                                <div class="col-6">
                                    <label for="from_time" class="form-label">From Time:</label>
                                    <input id="from_time" class="form-control" step="900" type="time" ng-model="endTime"
                                        pattern="[0-9]*" value="--:--" />
                                </div>
                                <div class="col-6">
                                    <label for="to_time" class="form-label">To Time:</label>
                                    <input class="form-control" id=to_time step="900" type="time" ng-model="endTime"
                                        pattern="[0-9]*" value="--:--" />
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12 form-floating">
                                    <textarea class="form-control" placeholder="" id="short_reason"
                                        style="height: 100px"></textarea>
                                    <label class="ms-2" for="short_reason">Type reason for leave</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" id="short_btn" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="report" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg leave_form_modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leave Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="leave_form" class="modal-body">
                <div class="bg-light  mx-3 mt-2">
                    <div class="row mb-5">
                        <div class="col-3 ml-4">
                            <img id="profile_pic" src="<?php echo "Attendance System/" . $_SESSION['user_image']; ?>">
                        </div>
                        <div class="col-7">
                            <div class="row mt-3">
                                <div class="row ">
                                    <div class="col-1 d-flex justify-content-end ml-2">
                                        <label for="short" class="col-form-label "><img id="short_img"
                                                src="img/unchecked-box.png"
                                                style="width:20px; margin-left:3px;"></label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" readonly class="form-control-plaintext" id="short"
                                            value="Short">
                                    </div>
                                    <div class="col-1 d-flex justify-content-end">
                                        <label for="half_day" class="col-form-label"><img id="half_day_img"
                                                src="img/unchecked-box.png" style="width:20px"></label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" readonly class="form-control-plaintext" id="half_day"
                                            value="Half Day">
                                    </div>
                                    <div class="col-1 d-flex justify-content-end">
                                        <label for="full_day" class="col-form-label"><img id="full_day_img"
                                                src="img/unchecked-box.png" style="width:20px"></label>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" readonly class="form-control-plaintext" id="full_day"
                                            value="Full Day">
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <div class="col-1 d-flex justify-content-center">
                                        <label for="before_leave" class="col-form-label"><img src="img/checked-box.png"
                                                style="width:20px"></label>
                                    </div>
                                    <div class="col-10 d-flex justify-content-start">
                                        <input type="text" readonly class="form-control-plaintext" id="before-leave"
                                            value="Form filled before applying for leave">
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <div class="col-1 d-flex justify-content-center">
                                        <label for="after_leave" class="col-form-label"><img src="img/unchecked-box.png"
                                                style="width:20px"></label>
                                    </div>
                                    <div class="col-10 d-flex justify-content-start">
                                        <input type="text" readonly class="form-control-plaintext" id="after_leave"
                                            value="Form filled after applying for leave">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2>Employee's Detail</h2>
                    <hr>
                    <div class="row mb-4 justify-content-between">
                        <div class="col-5 ms-5">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label fw-bold">Name: </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="name"
                                        value="<?php echo $_SESSION['user_name']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="job_title" class="col-sm-2 col-form-label fw-bold">Title: </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="job_title"
                                        value="<?php echo $_SESSION['designation']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <label for="department" class="col-sm-4 col-form-label fw-bold">Department:</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="department"
                                        value="<?php echo $_SESSION['department']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label for="date" class="col-sm-4 col-form-label fw-bold">Joining Date:</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="date"
                                        value="<?php echo $_SESSION['joining_date']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2>Reason for Leave</h2>
                    <hr>
                    <div class="row mb-4">

                        <div class="ml-3">
                            <div class="row">
                                <label for="reason" class="col-sm-1 col-form-label fw-bold text-right">Reason:</label>
                                <div class="col-sm-9">
                                    <textarea type="text" readonly class="form-control-plaintext" id="reason" value=""
                                        cols="100" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <h2>Leave Requested</h2>
                    <hr>
                    <div class='row'>
                        <div class="col-3">
                            <div class="row">
                                <label for="report_from"
                                    class="col-sm-4 col-form-label fw-bold text-right">From:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="report_from"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <label for="report_to" class="col-sm-4 col-form-label fw-bold text-right">To:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="report_to" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="row">
                                <label for="total_time" class="col-sm-6 col-form-label fw-bold text-right">Total
                                    Day(s)/Duration:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="total_time" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="print_leave" type="button" class="btn btn-primary">Print</button>
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
$.extend(true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false,
    "info": false,
    "paging": false

});
$(document).ready(function() {
    let emp = "<?php echo $_SESSION['user_name']; ?>";
    load_my_leaves_page(emp)
});






let start_date = document.getElementById("from");
let end_date = document.getElementById("to");
start_date.addEventListener("change", get_leaves);
end_date.addEventListener("change", get_leaves);

let selector = document.getElementById("selector");
selector.addEventListener("change", leave_type);


let short_btn = document.getElementById("short_btn");
let half_btn = document.getElementById("half_day_btn");
let full_btn = document.getElementById("full_day_btn");

let employee_name = "<?php echo $_SESSION['user_name']; ?>";
let employee_id = "<?php echo $_SESSION['user_id']; ?>";

$("#short").submit(function(e) {
    e.preventDefault();
    short_leave();
});

$("#half_day").submit(function(e) {
    e.preventDefault();
    half_day_leave();
});

$("#full_day").submit(function(e) {
    e.preventDefault();
    full_day_leave();
});

let print_leave = document.getElementById("print_leave");
print_leave.addEventListener("click", function() {
    let report = document.getElementById("leave_form").innerHTML;
    document.body.innerHTML = report;
    let body = document.getElementsByTagName("body")[0];
    body.style.margin = "50px";
    setTimeout(() => {
        window.print();
    }, 300);
});
</script>

<style>
.leave_form_modal {
    min-width: 50% !important;
}

#profile_pic {
    width: 180px;
    height: 200px;
}

.tooltip-inner {
    max-width: 750px;
    font-size: 15px;
    background-color: #FAF9F6 !important;
    color: #000000 !important;
    border: 0.5px solid #000000 !important;
}
</style>