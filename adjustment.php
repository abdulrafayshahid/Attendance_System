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
            <div class="row mr-5">
                <div class="col-12 col-md-4">
                    <h1 class="mt-4">Adjustments</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Adjustments</li>
                    </ol>
                </div>
                <div class="col-12 col-md-3 my-3 border border-secondary rounded ml-auto">
                    <div class="row mx-2 mt-2">
                        <span class="font-weight-bold">Adjustments Applied: </span><span id="total_adjustments"
                            class="mx-2"></span>
                    </div>
                    <div class="row mx-2">
                        <span class="font-weight-bold">Pending Adjustments: </span><span id="pending_adjustments"
                            class="mx-2"></span>
                    </div>
                    <div class="row mx-2">
                        <span class="font-weight-bold">Accepted Adjustments: </span><span id="approved_adjustments"
                            class="mx-2"></span>
                    </div>
                    <div class="row mx-2">
                        <span class="font-weight-bold mb-2 mb-md-0">Rejected Adjustments: </span><span
                            id="rejected_adjustments" class="mx-2"></span>
                    </div>

                </div>
            </div>
            <div class="card mb-4 mr-5">

                <div class="card-body row d-flex justify-content-end">
                    <div class="form-group col-5 col-md-2 col-lg-2">
                        <label>Day</label>
                        <div>
                            <select id="day" name="day" class="custom-select">
                                <option value="day">Day</option>
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-4 col-md-2 col-lg-2">
                        <label>Month</label>
                        <div>
                            <select id="month" name="month" class="custom-select">
                                <option value="month">Month</option>
                                <option value="01">Janauary</option>
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
                    </div>
                    <div class="form-group col-4 col-md-2 col-lg-2">
                        <label>Year</label>
                        <div>
                            <select id="year" name="year" class="custom-select">
                                <option value="year">Year</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center text-nowrap" id="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Adjustment Id</th>
                                    <th>Employee Name</th>
                                    <th>Adjustment Type</th>
                                    <th>Adjustment Date</th>
                                    <th>Adjustment Reason</th>
                                    <th>Requested On</th>
                                    <th>Status</th>
                                    <th></th>
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


<?php
include "include/footer.php";

} else {
    header("location:login.php");
    exit();
}
?>

<script>
$(document).ready(function() {
    load_adjustment_page();
});

$.extend(true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false,
    "info": false,
    "paging": false

});

let day = document.getElementById("day");
let month = document.getElementById("month");
let year = document.getElementById("year");
day.addEventListener("change", function() {
    day = document.getElementById("day").value;
    month = document.getElementById("month").value;
    year = document.getElementById("year").value;
    if (day != "day" && month != "month" && year != "year") {
        let date = day + "/" + month + "/" + year;
        $("#tbody").empty();
        get_adjustment_data(date);

    }
})
month.addEventListener("change", function() {
    day = document.getElementById("day").value;
    month = document.getElementById("month").value;
    year = document.getElementById("year").value;
    if (day != "day" && month != "month" && year != "year") {
        let date = day + "/" + month + "/" + year;
        $("#tbody").empty();
        get_adjustment_data(date);

    }
})
year.addEventListener("change", function() {
    day = document.getElementById("day").value;
    month = document.getElementById("month").value;
    year = document.getElementById("year").value;
    if (day != "day" && month != "month" && year != "year") {
        let date = day + "/" + month + "/" + year;
        $("#tbody").empty();
        get_adjustment_data(date);

    }
})
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