$(document).ready(function () {
  // Focus on the input field when the page loads
  $("#input").focus();

  var inputTimer; // Define a timer

  $("#input").on("input", function () {
    clearTimeout(inputTimer); // Clear any previous timer

    // Set a timer to wait for 500 milliseconds after the last input
    inputTimer = setTimeout(function () {
      var id = $("#input").val();
      if (id === "") {
        console.log("empty");
      } else {
        $.ajax({
          type: "POST",
          url: "../include/functions.php",
          data: {
            action: "insert",
            id: id,
          },

          success: function (data) {
            display(id);
            modal(id);
            absent(id);
            
            
           
            // Clear the input field after displaying the results
            $("#input").val(""); // Clear the input field
          },
        });
      }
    }, 50); // Wait for 500 milliseconds after the last input
  });

  function display(a) {
    $.ajax({
      type: "POST",
      url: "../include/functions.php",
      data: {
        action: "add_hours",
        a: a,
      },
      success: function (data) {
        $.ajax({
          type: "Post",
          url: "result.php",
          data: { a: a },
          success: function (data) {
            $("#table-container").html(data);
          },
        });
      }
    });
  }

  function absent(a) {
    $.ajax({
      type: "POST",
      url: "../include/functions.php",
      data: {
        action: "absent",
        
      },
      success: function (data) {
        $.ajax({
          type: "Post",
          url: "result.php",
          data: { a: a },
          success: function (data) {
            $("#table-container").html(data);
          },
        });
      }
    });
  }
  

  function modal(id) {
    $('#exampleModalCenter').modal('show');
    $.ajax({
      type: "Post",
      url: "modal.php",
      data: { function: "modal", id: id },
      success: function (data) {
        data = jQuery.parseJSON(data);
        let emp_id = document.getElementById("emp_id");
        let emp_name = document.getElementById("emp_name");
        let emp_time = document.getElementById("emp_time");
        let emp_timeout = document.getElementById("emp_timeout");
        let emp_date = document.getElementById("emp_date");
        let emp_status = document.getElementById("emp_status");
        let emp_statusout = document.getElementById("emp_statusout");
        let image = document.getElementById("image");
        console.log(image);
        if (id == data[0]) {
          emp_id.innerHTML = data[0];
          emp_name.innerHTML = data[1];
          emp_time.innerHTML = data[2];
          emp_timeout.innerHTML = data[3];
          emp_date.innerHTML = data[4];
          emp_status.innerHTML = data[5];
          emp_statusout.innerHTML = data[6];
          image.src = data[7][0];
        } else {
          alert("Please Enter a Correct ID");
        }
        
      },
    });

    window.setTimeout(function () {
      $('#exampleModalCenter').modal('hide');
      $("#input").val("");
    }, 2000);

    // Use the modal's hidden.bs.modal event to focus on the input field after the modal is hidden
    $('#exampleModalCenter').on('hidden.bs.modal', function () {
      $("#input").focus();
    });

    
  }
});


// $(document).ready(function () {
//   // Focus on the input field when the page loads
//   $("#input").focus();

//   var inputTimer; // Define a timer

//   $("#input").on("input", function () {
//     clearTimeout(inputTimer); // Clear any previous timer

//     // Set a timer to wait for 500 milliseconds after the last input
//     inputTimer = setTimeout(function () {
//       var id = $("#input").val();
//       if (id === "") {
//         console.log("empty");
//       } else {
//         $.ajax({
//           type: "POST",
//           url: "../include/functions.php",
//           data: {
//             action: "insert",
//             id: id,
//           },
//           success: function (data) {
//             display(id);
//             modal(id);
//             // Clear the input field after displaying the results
//             $("#input").val(""); // Clear the input field
//           },
//         });
//       }
//     }, 500); // Wait for 500 milliseconds after the last input
//   });

//   // Rest of your code...
// });
