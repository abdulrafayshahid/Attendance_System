<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Neuton" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    .img-fluid1 {
        height: 50px;
    }

    h1 {
        font-family: "Segoe UI", Arial, sans-serif !important;
        font-style: normal;
        font-weight: 900%;
        height: 24px;
        color: #212529;
        text-align: center;
    }

    .image {
        height: 100%;
        width: 100%;
    }

    .p {
        font-family: "Segoe UI", Arial, sans-serif !important;
        font-style: normal;
        font-weight: bold;
        height: 24px;
        color: #212529;


    }
    </style>


    <title>Attendance System</title>


</head>

<body>
    <img>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <img src="img/esolace logo.png" class="img-fluid" alt="Responsive image">
            </div>
        </div>


        <h1>ATTENDANCE SYSTEM</h1>




        <hr>
        <div class=" container-fluid input-group mb-3">
            <input type="text" class="form-control my-3" id='input' placeholder="Enter your ID"
                aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">

            </div>
        </div>
        <div class="d-flex justify-content-center">
            <table id="table-container" class="table mx-5 text-center"></table>
        </div>






        <!-- Modal  -->
        <div class="modal fade" id="exampleModalCenter" id="model" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" id="model" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="img/esolace logo.png" class="img-fluid1" alt="Responsive image">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <p class="p">Employee Id:<span id='emp_id' class="ml-2"></span></p> </br>
                                    <p class="p">Employee Name:<span id='emp_name' class="ml-2"></span></p></br>
                                    <p class="p">Signin Time:<span id='emp_time' class="ml-2"></span></p></br>
                                    <p class="p">Signout Time:<span id='emp_timeout' class="ml-2"></span></p></br>
                                    <p class="p">Date:<span id='emp_date' class="ml-2"></span></p></br>
                                    <p class="p">Status:<span id='emp_status' class="ml-2"></span></p></br>
                                    <p class="p">Signout Status:<span id='emp_statusout' class="ml-2"></span></p></br>
                                </div>

                                <div class="col-sm">
                                    <img class="image" id="image" src="" alt="">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>




</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="js/functions.js"></script>

<script>
document.getElementById("input").addEventListener("change", function() {
    id = document.getElementById("input").value;
    if (id == "") {
        console.log("empty");
    } else {
        insert(id);
    }
});
</script>