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

            <div class="container-fluid mb-5">
                <h1 class="mt-4">My Attendance</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">My Attendance</li>
                </ol>

                <div class="mb-5">
                    <button type="button" class="btn bg-success text-white m-1">On Time</button>
                    <button type="button" class="btn bg-primary text-white m-1">Half Day</button>
                    <button type="button" class="btn bg-warning text-white m-1">Overtime</button>
                    <button type="button" class="btn bg-secondary text-white m-1">Off Day</button>
                    <button type="button" class="btn bg-danger text-white m-1" id='absent'>Absent</button>
                </div>
                <div class="row">
                    <div class="col-5 col-md-2 col-lg-2">
                        <select class="custom-select ml-3" id='month' aria-label="Default select example">
                            <option selected value="month">Month</option>
                            <option value="01">Janurary</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-5 col-md-2 col-lg-2">
                        <select class="custom-select  mb-5" id='year' aria-label="Default select example">
                            <option selected value="year">Year</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>

                        </select>
                    </div>
                </div>



                </select>
                <div id="calendar" class="container invisible">
                    <h3 id="h3"></h3>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center text-nowrap">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sunday</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wedneday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">


                            </tbody>
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
    </div>

<?php
    include "include/footer.php";
} else {
    header("location:login.php");
    exit();
}
?>


<script>
    document.getElementById("month").addEventListener("change", function() {
        let user_id = '<?php echo $_SESSION['user_id']; ?>';
        let month1 = this.value;
        let year1 = document.getElementById("year").value;
        if (year1 != "year" && month1 != "month") {
            calendar(user_id, month1, year1);
        }
    });

    document.getElementById("year").addEventListener("change", function() {
        let user_id = '<?php echo $_SESSION['user_id']; ?>';
        let month1 = document.getElementById("month").value;
        let year1 = this.value;
        if (month1 != "month" && year1 != "year") {
            calendar(user_id, month1, year1);
        }

    });
</script>