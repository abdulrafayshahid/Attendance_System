<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['user_access'] == 'Administrator') {
    include "include/header.php";
    include "include/navbar.php";
    include "include/sidebar.php";
    include "include/db_connection.php";
    ?>


<title>Reports</title>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Attendance Report</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Attendance Report</li>
            </ol>
            <div class="row mb-3 ml-3">
                <select class="custom-select col-5 col-md-2 col-lg-1 m-1" id='month'
                    aria-label="Default select example">
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


                <select class="custom-select col-5 col-md-2 col-lg-1 m-1" id='year' aria-label="Default select example">
                    <option selected value="year">Year</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>
                <input type="text" class="form-control col-5 col-md-2 col-lg-2 m-1" id="s_employee_id"
                    placeholder="Employee ID">
                <button class="btn btn-primary col-5 col-md-2 col-lg-1 m-1" id="search">Search</button>


            </div>
            <div id='T1' class="mx-5">
                <div class="table-responsive">
                    <table class="table table-bordered text-center text-nowrap" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>Employee Id</th>
                                <th>Employee Name</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                </div>
                <tbody id="t2" class="tbody">


                </tbody>
                </table>
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


<div class="modal fade bd-example-modal-lg" id="user_attendance" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content custom container">
            <div class="card">
                <div id="report">
                    <div class="row mt-2">
                        <div class="col-12 col-md-5">
                            <span>Employee Attendance Sheet For: </span><span id="attendance_month"
                                class="mx-2"></span><span>/</span><span id="attendance_year" class="mx-2"></span>
                        </div>
                        <div class="col-12 col-md-5 ml-auto text-right">
                            <span>Shift Time: </span><span id="time_in" class="mx-2"></span><span>to</span><span
                                id="time_out" class="mx-2"></span>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-12 col-md-3 mx-auto" style="width: 200px;">
                            <img src="" id="user_image" alt="Profile Picture" class="ml-4">

                        </div>
                        <div class="ol-12 col-md-6 mt-5">
                            <span class="card-title h6">Employee ID:</span><span class='ml-4'
                                id="employee_id"></span><br>
                            <span class="card-title h6">Employee Name:</span><span class='ml-4'
                                id="employee_name"></span><br>
                            <span class="card-title h6">Employee Designation:</span><span class='ml-4'
                                id="designation"></span><br>
                            <span class="card-title h6">Employee Department:</span><span class='ml-4'
                                id="department"></span>
                        </div>
                        <div class="col-md-2 d-sm-none d-md-block">
                            <img src="img/esolace logo.png" alt="Esolace Tech Logo" width="500px" height="500px"
                                style="margin-top:70px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time In</th>
                                        <th scope="col">Status In</th>
                                        <th scope="col">Time Out</th>
                                        <th scope="col">Status Out</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Hours</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body">

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-md-4 my-2">Official Days in Month:<span
                                        id="official_days"></span>
                                </div>
                                <div class="col-12 col-md-4 my-2">System Present(s):<span id="presents"></span></div>
                                <div class="col-12 col-md-4 my-2">System Absents(s):<span id="absents"></span></div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 my-2">Working Hours:<span id="working_hours"></span></div>
                                <div class="col-12 col-md-4 my-2">Total leaves in credit:<span
                                        id="credit_leaves"></span>
                                </div>
                                <div class="col-12 col-md-4 my-2">Total Availed leaves:<span id="availed_leaves"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 my-2">Total Over Time:<span id="over_time"></span></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="print" class="btn btn-primary">Print</button>
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
let search = document.getElementById("search");
search.addEventListener("click", function() {
    let s_employee_id = document.getElementById("s_employee_id").value;
    let month = document.getElementById("month").value;
    let year = document.getElementById("year").value;
    if (s_employee_id == "" || month == "" || year == "") {
        alert("Please fill all the fields");
    } else {
        let tbody = document.getElementById("t2");
        tbody.innerHTML = "";
        $.ajax({
            url: "include/functions.php",
            method: "POST",
            data: {
                action: "get_employee_data_by_search",
                employee_id: s_employee_id
            },
            success: function(data) {
                console.log(data);
                data = JSON.parse(data);
                if (data[0] != "0 results") {
                    let tr = document.createElement("tr");
                    let td1 = document.createElement("td");
                    let td2 = document.createElement("td");
                    let td3 = document.createElement("td");
                    let td4 = document.createElement("td");
                    let td5 = document.createElement("td");
                    let td6 = document.createElement("td");
                    let view_btn = document.createElement("button");
                    td1.innerHTML = data[0][0];
                    td2.innerHTML = data[0][1];
                    td3.innerHTML = data[0][2];
                    td5.innerHTML = data[0][3];
                    td6.innerHTML = data[0][4];
                    view_btn.innerHTML = "View";
                    view_btn.className = "btn btn-primary";
                    view_btn.setAttribute("data-target", "#user_attendance");
                    view_btn.setAttribute("id", data[0][0]);
                    view_btn.setAttribute("onclick", "view_attendance(this.id)");
                    td4.appendChild(view_btn);
                    tr.appendChild(td1);
                    tr.appendChild(td2);
                    tr.appendChild(td3);
                    tr.appendChild(td5);
                    tr.appendChild(td6);
                    tr.appendChild(td4);
                    tbody.appendChild(tr);
                } else {
                    alert("No Record found");
                }
            }
        })
    }
})

document.getElementById("month").addEventListener("change", function() {
    let month = (this.value);
    let year = document.getElementById("year").value;
    if (year != "year" && month != "month") {
        view_employees();
    }
});


document.getElementById("year").addEventListener("change", function() {
    let year = (this.value);
    let month = document.getElementById("month").value;
    if (year != "year" && month != "month") {
        view_employees();
    }
})


$(document).ready(function() {
    $("#TABLE_ID").DataTable();
    $(".dataTables_empty").empty();
});

$.extend(true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false,
    "info": false,
    "paging": false

});

document.getElementById("print").addEventListener("click", function() {
    let report = document.getElementById("report").innerHTML;
    document.body.innerHTML = report;
    setTimeout(() => {
        window.print();
    }, 300);
})
</script>
<style>
.modal-lg {
    min-width: 55% !important;
}

#user_image {
    width: 200px;
    height: 200px;

}
</style>