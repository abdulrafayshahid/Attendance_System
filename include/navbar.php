<!-- <style>
    .bg-custom-color {
        background-image: url('img/loginside.gif') !important; 
    }
</style> -->
<nav class="sb-topnav navbar navbar-expand navbar-light bg-white bg-custom-color shadow-sm" style="height: 65px" ;>
    <a class="navbar-brand" href="https://esolacetech.com" target="_blank"><img alt="logo" src="img/esolace logo.png"></a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav  d-flex justify-content-end w-100  ">
        <?php if ($_SESSION['user_access'] == "Employee") { ?>
            <li class="nav-item dropdown no-arrow mx-1 osahan-list-dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather-bell"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter" id="notification_count"></span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm" id="notification">
                    <h6 class="dropdown-header">
                        Alerts Center
                    </h6>

                </div>
            </li>
        <?php } ?>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow ml-1 osahan-profile-dropdown ">
            <a class="nav-link dropdown-toggle pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle user_image" src="img/user/1.png">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow-sm">
                <div class="p-3 d-flex align-items-center">
                    <div class="dropdown-list-image mr-3">
                        <img class="user_image rounded-circle" src="img/user/1.png" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate"><?php echo $_SESSION['user_name'] ?></div>
                        <div class="small text-gray-500"><?php echo $_SESSION['user_id'] ?></div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <button class="btn dropdown-item" id="change_password" type="button" data-toggle="modal" data-target="#exampleModal"><i class="feather-lock mr-1"></i>Change
                    Password</button>
                <button class="dropdown-item" id="logout"><i class="feather-log-out mr-1"></i> Logout</button>
            </div>
        </li>
    </ul>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-outline-secondary">
                    <div class="card-header d-flex justify-content-center">
                        <img src="img/Forgot password.svg" style="height:250px;">
                    </div>
                    <div class=" card-body">
                        <form class="form" role="form" autocomplete="off">
                            <div class="form-group row">
                                <label class="col-3 text-right" for="inputPasswordOld">Current Password</label>
                                <input type="password" class="col-6 form-control" id="inputPasswordOld" required="">
                            </div>
                            <div class="form-group row">
                                <label class="col-3 text-right" for="inputPasswordNew">New Password</label>
                                <input type="password" class="col-6 form-control" id="inputPasswordNew" required="">
                                <span class="form-text small text-muted col-12 text-center">
                                    The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                </span>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 text-right" for="inputPasswordNewVerify">Confirm Password</label>
                                <input type="password" class="col-6 form-control" id="inputPasswordNewVerify" required="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="save_btn" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alert_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="alert_message"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    let user_id = '<?php echo $_SESSION['user_id'] ?>';
    $(document).ready(function() {
        $('#alert').on('hidden.bs.modal', function() {
            // refresh current page
            location.reload();
        })
    })
    let user_images = document.getElementsByClassName("user_image");

    for (let i = 0; i < user_images.length; i++) {
        <?php if ($_SESSION['user_access'] == "Employee") { ?>
            user_images[i].src = "include/<?php echo $_SESSION['user_image']; ?>";
        <?php } else { ?>
            user_images[i].src = "img/user123.png";
        <?php } ?>
    }

    document.addEventListener('DOMContentLoaded', function() {
        const logout = document.getElementById('logout');

        logout.addEventListener('click', function() {
            logout1();
        });

        function logout1() {
            $.ajax({
                url: 'include/functions.php',
                type: 'POST',
                data: {
                    action: "logout"
                },
                success: function(res) {
                    if (res == "logout") {
                        window.location.href = "login.php";
                    }
                }
            });
        }

    });

    let save_btn = document.getElementById('save_btn');
    save_btn.addEventListener('click', function() {
        let inputPasswordOld = document.getElementById('inputPasswordOld').value;
        let inputPasswordNew = document.getElementById('inputPasswordNew').value;
        let inputPasswordNewVerify = document.getElementById('inputPasswordNewVerify').value;
        if (inputPasswordNew == inputPasswordNewVerify) {
            change_password(inputPasswordOld, inputPasswordNew, user_id);

        } else {
            alert("New Password and Verify Password is not same");
        }
    });
    <?php
    if ($_SESSION['user_access'] == "Employee") { ?> $(document).ready(function() {
            let user_id = "<?php echo $_SESSION['user_id'] ?>";
            get_alert(user_id);
        });
    <?php } ?>
</script>