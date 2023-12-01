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
            <h1 class="mt-4">My Adjustment</h1>
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">My Adjustment</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary float-right mr-5" data-toggle="modal"
                        data-target="#request_adjustment">
                        Request Adjustment
                </div>
            </div>
            <div class="card mb-4 mr-5">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center text-nowrap" id="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Adjustment Id</th>
                                    <th>Adjustment Type</th>
                                    <th>Adjustment Date</th>
                                    <th>Requested on</th>
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

<div class="modal fade" id="request_adjustment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply For Adjustment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-outline-secondary">
                    <div class="card-header d-flex justify-content-center">
                        <img src="img/adjustment.svg" style="height:250px;">
                    </div>
                    <div class="card-body">
                        <form method="post" id="adjustment">
                            <label>Adjustment Type:</label>
                            <div class="col-6 col-md-4 form-group">
                                <select id="selector" class="custom-select">
                                    <option selected> --Select Type--</option>
                                    <option>Forgot Card</option>
                                    <option>Forgot to Signin</option>
                                    <option>Forgot to Signout</option>
                                </select>
                            </div>
                            <div class="row my-3">

                                <div class="col-12">
                                    <label for="adjustment_date" class="form-label">Adjustment Date:</label>
                                    <input type="date" class="form-control" id="adjustment_date">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12 form-floating ">
                                    <textarea class="form-control" id="adjustment_reason"
                                        style="height: 100px"></textarea>
                                    <label class="ms-2" for="adjustment_reason">Type a reason for adjustment</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="adjustment_btn" type="button" class="btn btn-primary">Apply</button>
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
let employee_id = "<?php echo $_SESSION['user_id']; ?>";
let employee_name = "<?php echo $_SESSION['user_name']; ?>";

$(document).ready(function() {
    load_user_adjustment_page(employee_id);

});

$.extend(true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false,
    "info": false,
    "paging": false

});

$("#adjustment_btn").click(function(e) {
    e.preventDefault();
    let selector = document.querySelector("#selector").value;
    let adjustment_date = document.querySelector("#adjustment_date").value;
    let adjustment_reason = document.getElementById("adjustment_reason").value;
    apply_for_adjustment(selector, adjustment_date, adjustment_reason);
});
</script>

<style>
.tooltip-inner {
    max-width: 750px;
    font-size: 15px;
    background-color: #FAF9F6 !important;
    color: #000000 !important;
    border: 0.5px solid #000000 !important;
}
</style>