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
        <div class="container-fluid">
            <h1 class="mt-4">Alerts</h1>
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Alerts</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary float-right mr-5" data-toggle="modal" data-target="#add_alerts">
                        Add Alerts
                </div>
            </div>
            <div class="card mb-4 mr-5">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center text-nowrap" id="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Created On</th>
                                </tr>
                            </thead>
                            <tbody id="tbody"></tbody>
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

<div class="modal fade" id="add_alerts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-outline-secondary">
                    <div class="card-header d-flex justify-content-center">
                        <img src="img/notification.svg" style="height:250px;">
                    </div>
                    <div class="card-body">
                        <form method="post" id="alert_form">
                            <div class="row my-3">
                                <div class="my-2 col-12 form-floating ">
                                    <label class="ms-2" for="a_title">Title</label>
                                    <input type="text" class="form-control" id="a_title" placeholder="Enter Title">
                                </div>
                                <div class="col-12 form-floating ">
                                    <label class="ms-2" for="a_message">Message</label>
                                    <textarea class="form-control" id="a_message" style="height: 100px"
                                        placeholder="Enter Message"></textarea>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="alert_btn" type="button" class="btn btn-primary">Add</button>
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

$(document).ready(function() {
    get_all_alerts();
});

$.extend(true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false,
    "info": false,
    "paging": false

});

$("#alert_btn").click(function(e) {
    e.preventDefault();
    let a_message = document.querySelector("#a_message").value;
    let a_title = document.querySelector("#a_title").value;
    if (a_message == "" || a_title == "") {
        alert("Please fill all the fields");

    } else {
        insert_alert(a_title, a_message);
    }
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