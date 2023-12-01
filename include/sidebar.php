<style>
    /* Add some margin between headings */
    .sb-sidenav-menu-heading-margin {
        font-size: 18px;
        margin-top: 14px;
        /* Adjust the margin as needed */

    }

    #sidenavAccordion {
        width: 270px;

    }

    /* .sb-sidenav-menu {
        background-image: url('img/loginside.gif') !important; 
       

    } */

</style>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading mt-4"></div>
                    <?php if ($_SESSION['user_access'] == "Administrator") { ?>
                        <div class="nav-item">
                            <a class="nav-link sb-sidenav-menu-heading-margin mt-4" href="index.php">
                                <div class="sb-nav-link-icon"><i class="feather-home"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed sb-sidenav-menu-heading-margin" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                                Employees
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="all_users.php">All Employees</a>
                                    <a class="nav-link" href="add_user.php">Add Employee</a>
                                    <a class="nav-link" href="edit_user.php">Edit Employee</a>
                                </nav>
                            </div>
                            <a class="nav-link sb-sidenav-menu-heading-margin" href="leave.php">
                                <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                                Leaves
                            </a>
                            <a class="nav-link sb-sidenav-menu-heading-margin" href="adjustment.php">
                                <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                                Adjustments
                            </a>
                            <a class="nav-link sb-sidenav-menu-heading-margin" href="attendance_report.php">
                                <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                                Attendance Report
                            </a>
                            <a class="nav-link sb-sidenav-menu-heading-margin" href="alert.php">
                                <div class="sb-nav-link-icon"><i class="feather-bell"></i></div>
                                Alerts
                            </a>
                        </div>
                    <?php }
                    if ($_SESSION['user_access'] == "Employee") { ?>
                        <div class="nav-item">
                            <a class="nav-link sb-sidenav-menu-heading-margin mt-4" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="feather-home"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link sb-sidenav-menu-heading-margin" href="my_profile.php">
                                <div class="sb-nav-link-icon"><i class="feather-user"></i></div>
                                My Profile
                            </a>
                            <a class="nav-link sb-sidenav-menu-heading-margin" href="my_leaves.php">
                                <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                                My Leaves
                            </a>
                            <a class="nav-link sb-sidenav-menu-heading-margin" href="my_attendance.php">
                                <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                                My Attendance
                            </a>
                            <a class="nav-link sb-sidenav-menu-heading-margin" href="user_adjustment.php">
                                <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                                My Adjustments
                            </a>
                            <a class="nav-link sb-sidenav-menu-heading-margin" href="user_attendance_report.php">
                                <div class="sb-nav-link-icon"><i class="feather-calendar"></i></div>
                                Attendance Report
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </div>