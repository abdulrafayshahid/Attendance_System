<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link href="https://fonts.googleapis.com/css?family=Oswald:700|Neuton" rel="stylesheet" type="text/css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
  <link rel="icon" type="image/png" href="Esolace logo-01.png">
  
  <style>
    .img-fluid1 {
      height: 50px;
    }
    
  
    /*body {*/
    /*    background-image: url('login10.jpg');*/
    /*    background-size: cover;*/
    /*    background-repeat: no-repeat;*/
    /*    background-attachment: fixed;*/
            
    /*}*/
  
    
    h1 {
      font-family: Georgia, serif !important;
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
      font-family: "Fredoka One", cursive !important;
      font-style: normal;
      font-weight: 500;
      height: 24px;
      color: #212529;



    }

    #darkButton {
      background-color: #fff;


      padding: 10px 20px;
      border: none;
      border-radius: 4px;

    }

    #darkButton:hover {

      cursor: pointer;
    }

    .dark-mode {
      background-color: #1a1a1a;
      color: #fff;
      padding: 16px 24px;
      border: none;
      border-radius: 4px;

      font-size: 1rem;
    }


    .dark-mode #h1 {
      color: #fff
        /* Change the color to red, for example */
    }

    .dark-mode #table-container {
      color: white;
    }

    /* #darkButton{
    display: flex;
    justify-content: center;
    align-items: flex-end;
    
    
  }
   */
    .clicked {
      background-color: white;
    }

    #darkButton img {
      height: 24px;
      width: 24px;
    }
  </style>


  <title>Attendance System</title>


</head>

<body>
  <img>
  <div class="container-fluid">
    <div class="row">
      <div class="col-9">
        <img src="ecolace.png" class="img-fluid" id="img-fluid" alt="Responsive image">
      </div>
      <div class='col-3 d-flex justify-content-end'>

        <button id="darkButton"><img id='btnicon' src="moon (1).png" alt=""></button>
      </div>
    </div>

    <div class="container-fluid row">
      <div class="col-sm-3 col-md-6 col-lg-12">


        <h1 id='h1'>ATTENDANCE SYSTEM</h1>

      </div>
    </div>

    <br></br>


    <div class=" container-fluid input-group mb-3">
      <input type="text" class="form-control my-3" id='input' placeholder="Enter your ID" aria-label="Recipient's username" aria-describedby="basic-addon2">
      <div class="input-group-append">

      </div>
    </div>
    <div class="col-sm-3 col-md-6 col-lg-12">
      <div class="d-flex justify-content-center table-responsive">
        <table id="table-container" class="table mx-5 text-center"></table>
      </div>
    </div>






    <!-- Modal  -->
    <div class="col-sm-3 col-md-6 col-lg-12">
      <div class="modal fade" id="exampleModalCenter" id="model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" id="model" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <img src="ecolace.png" class="img-fluid1" alt="Responsive image">
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
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="functions.js"></script>

    <script>
      // Add event listener to the button
      let imageIndex = 1;
      document.getElementById("darkButton").addEventListener("click", function() {

        // Toggle dark mode on/off
        document.body.classList.toggle("dark-mode");
        // Change the logo
        const myImage = document.getElementById("img-fluid");
        const myButton = document.getElementById("darkButton");
        const myButtonIcon = document.getElementById("btnicon");
        // change button color



        if (imageIndex === 1) {
          myImage.src = 'logo-2.png';
          myImage.alt = 'Image 2';
          myButton.style.backgroundColor = '#fff';
          myButton.style.color = '#000';
          myButtonIcon.src = 'sun.png';



          console.log(myButtonIcon);






          imageIndex = 2;
        } else {
          myImage.src = 'ecolace.png';
          myImage.alt = 'Image 1';


          myButton.style.color = '#fff';
          console.log(myButtonIcon)
          myButtonIcon.src = 'moon (1).png';


          imageIndex = 1;
        }






      });
    </script>
    <style>
  
</style>

</body>

</html>