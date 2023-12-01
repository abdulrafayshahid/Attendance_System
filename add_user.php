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
            <form id="form" method="post" enctype="multipart/form-data">
                <div class="container-fluid">
                    <h1 class="mt-4">Add Employee</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Employee</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-4 order-list">
                                <div class="gold-members p-4">
                                    <a href="#">
                                    </a>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Profile Picture</label>
                                            <div class="form-group mx-auto mt-0 mt-md-5 " style="width: 200px;">


                                                <input class="invisible" type="file" name="image" id="image" accept=".jpg, .png, .gif"><label id="label" for="image">+</label>
                                                <p id=num_images class="text-center mx-auto mt-2"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-8 add_top_30">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Employee Name *</label>
                                                        <input id="employee_name" name="employee_name" type="text" class="form-control" placeholder="Full Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Gender *</label>
                                                        <div>
                                                            <select id="gender" name="gender" class="custom-select">
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
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
                                                            <select id="department" name="department" class="custom-select">
                                                                <option>Sales</option>
                                                                <option>Development</option>
                                                                <option>Graphics</option>
                                                                <option>HR</option>
                                                                <option>Accounts</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Designation *</label>
                                                        <div>
                                                            <select id="designation" name="designation" class="custom-select">
                                                            </select>
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
                                                            <select id="user_shift" name="user_shift" class="custom-select">
                                                                <option>Full Time</option>
                                                                <option>Part Time</option>
                                                                <option>Remote</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Joining Date *</label>
                                                        <input id="joining_date" name="joining_date" type="text" class="form-control" placeholder="Joining Date" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /row-->
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="time_in" class="form-label">Time In: *</label>
                                                    <input id="time_in" name="time_in" class="form-control" step="900" type="time" ng-model="endTime" pattern="[0-9]*" value="--:--" required />
                                                </div>
                                                <div class="col-6">
                                                    <label for="time_out" class="form-label">Time Out: *</label>
                                                    <input class="form-control" name="time_out" id=time_out step="900" type="time" ng-model="endTime" pattern="[0-9]*" value="--:--" required />
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
                                                <label>Official Email *</label>
                                                <input id=off_email name="off_email" type="email" class="form-control" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input id=email name=email type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input id="contact_number" name="contact_number" type="text" class="form-control" placeholder="Contact Number">
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <!-- /row-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Qualification</label>
                                                <input id="qualification" name="qualification" type="text" class="form-control" placeholder="Qualification">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CNIC</label>
                                                <input id="cnic" name="cnic" type="text" class="form-control" placeholder="CNIC">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input id="date_of_birth" name="date_of_birth" type="text" class="form-control" placeholder="Date of Birth">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Current Address</label>
                                                <input id="current_address" name="current_address" type="text" class="form-control" placeholder="Current Address">
                                            </div>
                                        </div>
                                    
                                   
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Martial Status</label>
                                                <div>
                                                    <select id="martial_status" name="martial_status" class="custom-select">
                                                        <option>Single</option>
                                                        <option>Married</option>
                                                    </select>
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
                                                <input id=n_name name="n_name" type="text" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Relation</label>
                                                <input id=relation name="relation" type="text" class="form-control" placeholder="Relation">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Number</label>
                                                <input id="n_number" name="n_number" type="text" class="form-control" placeholder="Contact Number">
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
                                                    <select id="user_access" name="user_access" class="custom-select">
                                                        <option>Administrator</option>
                                                        <option>Employee</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input id="password" name="password" type="text" class="form-control" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>User Status</label>
                                                <div>
                                                    <select id="user_status" name="user_status" class="custom-select">
                                                        <option>Active</option>
                                                        <option>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Barcode</label>
                                                <input id="barcode" name="barcode" type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Action</label>
                                                <div>
                                                    <button class="btn btn-outline-secondary" type="button" id="button-addon1" onclick="GenerateBarcode(this)">B/C</button>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Generate Barcode</label>
                                                <div>
                                                    <button class="btn btn-outline-secondary" type="button" id="button-addon1" onclick="PrintSetter($('#user_id').val())">Print</button>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <!-- /row-->


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mb-4">
                        <button id="submit" type="submit" class="btn btn-success">
                            <i class="feather-send"></i> SAVE
                        </button>
                    </div>
                </div>
            </form>
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
    let department = document.getElementById('department');
    $(document).ready(function() {
        get_designation(department.value);
    });

    department.addEventListener('change', function() {
        $("#designation").empty();
        get_designation(department.value);
    });

    let image = document.getElementById("image");
    image.addEventListener("change", function() {
        var num_of_images = $("#image")[0].files.length;
        let num_images = document.getElementById("num_images");
        num_images.innerHTML = num_of_images + " Image Selected";
    })




    $("#form").on('submit', (function(e) {
        e.preventDefault();
        let form = new FormData(this);
        form.append("action", "add_employee");
        add_user(form);
    }));

    // function GenerateBarcode(btn) {
    //     // You can use the user_id to generate the barcode.
    //     let barcodeValue = new Date().getTime();

    //     // Use getElementById to select the input field by its ID
    //     let barcodeInput = document.getElementById("barcode");

    //     if (barcodeInput.value == "") {
    //         barcodeInput.value = barcodeValue;
    //     } else {
    //         barcodeInput.value = "";
    //     }
    // }

    function PrintSetter(user_id) {


        $.ajax({
            url: "include/functions.php",
            type: "POST",
            data: {
                action: "PrintSetter",
                user_id: user_id

            },
            success: function(data) {
                console.log(data);
                data = JSON.parse(data);
                let printWindow = window.open("", "_blank");
                // Generate slip content
                let slipContent = `
   <!DOCTYPE html>
   <html>
   <head>
   <style>
       @media print {
           @page {
               size: 80mm 200mm;
               margin: 0;
           }

           body {
               font-family: Arial, sans-serif;
               font-size: 12px;
               padding: 10px;
           }

           h1 {
               font-size: 16px;
               text-align: center;
               margin: 10px 0;
               color: #333;
           }

           p {
               margin-bottom: 5px;
           }

           .label {
               font-weight: bold;
           }
       }
   </style>
   </head>
   <body>
   <p><span class="label" style="margin-right:6px;">Barcode:</span><span>${data[0].user_id}</span></p>
   <p><span class="label" style="margin-right:6px;">Name:</span><span>${data[0].employee_name}</span></p>
   <svg id="barcode"></svg>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.js" integrity="sha512-wkHtSbhQMx77jh9oKL0AlLBd15fOMoJUowEpAzmSG5q5Pg9oF+XoMLCitFmi7AOhIVhR6T6BsaHJr6ChuXaM/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"><\/script>
   <script>
// Function to render barcode
function renderBarcode() {
   const barcodeElement = document.getElementById("barcode");
   if (barcodeElement) {
       JsBarcode(barcodeElement, "${data[0].user_id}", {
           format: "CODE128",
           width: 2,
           height: 50,
       });
       window.print();
   } else {
       // Barcode element not found, retry after a short delay
       setTimeout(renderBarcode, 100);
   }
}

// Start rendering barcode
renderBarcode();
<\/script>
</body>
</html>
`;

                // Write slip content to the new tab
                printWindow.document.open();
                printWindow.document.write(slipContent);
                // printWindow.print();
                printWindow.document.close();


            }
        });
    }
</script>

<style>
    #label {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 150%;
        cursor: pointer;
        width: 100px;
        height: 100px;
        border: solid 1px black;
        border-radius: 5px;
        object-fit: cover;
        margin: 0 auto;
    }
</style>