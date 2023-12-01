<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['user_access'] == "Employee") {
    include "include/header.php";
    include "include/navbar.php";
    include "include/sidebar.php";
    include "include/db_connection.php";
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">My Profile</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4 order-list">
                            <div class="gold-members p-4">
                                <a href="#">
                                </a>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group ml-4">

                                                <img id="profile_pic" src="" class="img-thumbnail" style="margin-left:20px; width: 200px; height:300px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 add_top_30">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Employee Name</label>
                                                    <input id="employee_name" type="text" class="form-control" placeholder="First Name" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>ID</label>
                                                    <input id="user_id" type="text" class="form-control" placeholder="First Name" readonly>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <input id="designation" type="text" class="form-control" placeholder="Designation" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Department</label>
                                                    <input id="department" type="text" class="form-control" placeholder="department" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /row-->
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Official Email</label>
                                                    <input id=off_email type="email" class="form-control" placeholder="Email" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Joining Date</label>
                                                    <input id="joining_date" type="text" class="form-control" placeholder="Joining Date" readonly>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /row-->
                                <div class="row mt-5">
                                    <h1>Personal Details</h1>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Qualification</label>
                                            <input id="qualification" type="text" class="form-control" placeholder="Qualification" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input id="contact_number" type="text" class="form-control" placeholder="Contact Number" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CNIC</label>
                                            <input id="cnic" type="text" class="form-control" placeholder="CNIC" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row-->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input id=email type="email" class="form-control" placeholder="Email" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Current Address</label>
                                            <input id="current_address" type="text" class="form-control" placeholder="Current Address" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input id="date_of_birth" type="text" class="form-control" placeholder="Date of Birth" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <input id="gender" type="text" class="form-control" placeholder="Gender" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Martial Status</label>
                                            <input id="martial_status" type="text" class="form-control" placeholder="Martial Status" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row-->
                                <div class="row mt-5">
                                    <h1>Next Of Kin</h1>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input id="n_name" type="text" class="form-control" placeholder="Name" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Relation</label>
                                            <input id="relation" type="text" class="form-control" placeholder="Relation" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Number</label>
                                            <input id="n_number" type="text" class="form-control" placeholder="Number" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
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

<?php
    include "include/footer.php";
} else {
    header("location:login.php");
    exit();
}
?>

<script>
    let profile_pic = document.getElementById("profile_pic");
    profile_pic.src = "include/" + '<?php echo $_SESSION['user_image'] ?>';
    $(document).ready(function() {
        let emp = '<?php echo $_SESSION['user_id']; ?>';
        load_my_profile_page(emp)
    });
</script>