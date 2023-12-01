function get_data(employee_name) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "get_data",
      employee_name: employee_name,
    },
    success: function (data) {
      data = JSON.parse(data);
      let total_time = document.getElementById("total_time");
      total_time.value = data[4];
      let from = document.getElementById("report_from");

      let to = document.getElementById("report_to");

      let reason = document.getElementById("reason");
      reason.value = data[2];
      let leave_type = data[3];
      if (leave_type == "Short") {
        let img = document.getElementById("short_img");
        img.src = "img/checked-box.png";
        from.value = new Date("1970-01-01T" + data[0] + "Z").toLocaleTimeString(
          "en-US",
          { timeZone: "UTC", hour12: true, hour: "numeric", minute: "numeric" }
        );
        to.value = new Date("1970-01-01T" + data[1] + "Z").toLocaleTimeString(
          "en-US",
          { timeZone: "UTC", hour12: true, hour: "numeric", minute: "numeric" }
        );
      } else if (leave_type == "Half Day") {
        let img = document.getElementById("half_day_img");
        img.src = "img/checked-box.png";
        from.value = new Date("1970-01-01T" + data[0] + "Z").toLocaleTimeString(
          "en-US",
          { timeZone: "UTC", hour12: true, hour: "numeric", minute: "numeric" }
        );
        to.value = new Date("1970-01-01T" + data[1] + "Z").toLocaleTimeString(
          "en-US",
          { timeZone: "UTC", hour12: true, hour: "numeric", minute: "numeric" }
        );
      } else if (leave_type == "Full Day") {
        let img = document.getElementById("full_day_img");
        img.src = "img/checked-box.png";
        from.value = data[0];
        to.value = data[1];
      }
    },
  });
}

function get_leaves() {
  start_date = document.getElementById("from").value;
  end_date = document.getElementById("to").value;
  let leaves = document.getElementById("leaves");

  var s_date = new Date(start_date);
  var e_date = new Date(end_date);
  var Difference_In_Time = e_date.getTime() - s_date.getTime();
  var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

  if (Difference_In_Days > 0) {
    leaves.value = Difference_In_Days;
  } else if (Difference_In_Days < 0) {
    alert("Start date cannot be greater than end date");
    start_date.value = null;
    end_date.value = null;
  } else {
    leaves.value = 0;
  }
}

function leave_type() {
  let full_day = document.getElementById("full_day");
  let half_day = document.getElementById("half_day");
  let short = document.getElementById("short");
  if (selector.value == "3") {
    full_day.style.display = "block";
    half_day.style.display = "none";
    short.style.display = "none";
  } else if (selector.value == "2") {
    full_day.style.display = "none";
    half_day.style.display = "block";
    short.style.display = "none";
  } else if (selector.value == "1") {
    full_day.style.display = "none";
    half_day.style.display = "none";
    short.style.display = "block";
  }
}

function leave(form, time, minutes = 0, employee_name, employee_id) {
  let from = form.children[0].children[0].children[1].value;
  let to = form.children[0].children[1].children[1].value;
  let reason = form.children[1].children[0].children[0].value;
  let form_type = form.id;
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "leave",
      employee_name: employee_name,
      user_id: employee_id,
      time: time,
      minutes: minutes,
      form_type: form_type,
      from: from,
      to: to,
      reason: reason,
    },
    success: function (data) {
      if (data == "Leave Applied Successfully") {
        alert("Leave Applied Successfully");
        $("#apply_for_leave").modal("hide");
        $("#report").modal("show");
        get_data(employee_name);
      } else {
        alert("Leave Not Applied");
      }
    },
  });
}

function approve(leave_id) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "approve",
      leave_id: leave_id,
    },
    success: function (data) {
      if (data == "Approved") {
        alert("Leave Approved");
        let approve_btn = document.getElementById(leave_id);
        approve_btn.parentElement.parentElement.children[7].innerHTML =
          "Approved";
      }
    },
  });
}

function reject(leave_id) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "reject",
      leave_id: leave_id,
    },
    success: function (data) {
      if (data == "Rejected") {
        alert("Leave Rejected");
        let reject_btn = document.getElementById(leave_id);
        reject_btn.parentElement.parentElement.children[7].innerHTML =
          "Rejected";
      }
    },
  });
}

function get_designation(department) {
  if (department == "Sales") {
    let option = document.createElement("option");
    option.text = "Sales Executive";
    document.getElementById("designation").appendChild(option);
    let option1 = document.createElement("option");
    option1.text = "Sales Manager";
    document.getElementById("designation").appendChild(option1);
    let option2 = document.createElement("option");
    option2.text = "Sales Head";
    document.getElementById("designation").appendChild(option2);
  } else if (department == "Development") {
    let option = document.createElement("option");
    option.text = "Junior Developer";
    document.getElementById("designation").appendChild(option);
    let option1 = document.createElement("option");
    option1.text = "Senior Developer";
    document.getElementById("designation").appendChild(option1);
    let option2 = document.createElement("option");
    option2.text = "Full Stack Developer";
    document.getElementById("designation").appendChild(option2);
  } else if (department == "Graphics") {
    let option = document.createElement("option");
    option.text = "Junior Graphic Designer";
    document.getElementById("designation").appendChild(option);
    let option1 = document.createElement("option");
    option1.text = "Senior Graphic Designer";
    document.getElementById("designation").appendChild(option1);
  } else if (department == "HR") {
    let option = document.createElement("option");
    option.text = "HR Executive";
    document.getElementById("designation").appendChild(option);
  } else if (department == "Accounts") {
    let option = document.createElement("option");
    option.text = "Accounts Manager";
    document.getElementById("designation").appendChild(option);
    let option1 = document.createElement("option");
    option1.text = "Accounts Assistant Manager";
    document.getElementById("designation").appendChild(option1);
  }
}

function get_leave_data(date) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "all_leave_data",
      date: date,
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data.length > 1) {
        for (i = 0; i < data.length; i++) {
          let tr = document.createElement("tr");
          let td = document.createElement("td");
          td.innerHTML = data[i].leave_id;
          tr.appendChild(td);
          let td6 = document.createElement("td");
          td6.innerHTML = data[i].employee_name;
          tr.appendChild(td6);
          let td1 = document.createElement("td");
          td1.innerHTML = data[i].leave_type;
          tr.appendChild(td1);
          if (data[i].leave_type != "Full Day") {
            let td2 = document.createElement("td");
            td2.innerHTML =
              data[i].duration.slice(0, 1) +
              " Hours, " +
              data[i].duration.slice(2, 4) +
              " Minutes";
            tr.appendChild(td2);
            let new_start_time = data[i].start_time;
            let timeString12hr = new Date(
              "1970-01-01T" + new_start_time + "Z"
            ).toLocaleTimeString("en-US", {
              timeZone: "UTC",
              hour12: true,
              hour: "numeric",
              minute: "numeric",
            });
            let new_end_time = data[i].end_time;

            let timeString12hr1 = new Date(
              "1970-01-01T" + new_end_time + "Z"
            ).toLocaleTimeString("en-US", {
              timeZone: "UTC",
              hour12: true,
              hour: "numeric",
              minute: "numeric",
            });
            let td3 = document.createElement("td");
            td3.innerHTML = timeString12hr + " to " + timeString12hr1;
            tr.appendChild(td3);
          } else {
            let td2 = document.createElement("td");
            td2.innerHTML = data[i].duration;
            tr.appendChild(td2);
            let td3 = document.createElement("td");
            td3.innerHTML = data[i].start_time + " to " + data[i].end_time;
            tr.appendChild(td3);
          }
          let td4 = document.createElement("td");
          if (data[i].reason.length < 12) {
            td4.innerHTML = data[i].reason;
          } else {
            td4.innerHTML = data[i].reason.slice(0, 12) + "...";
          }
          td4.setAttribute("data-toggle", "tooltip");
          td4.setAttribute("title", data[i].reason);
          td4.setAttribute("data-placement", "top");
          td4.setAttribute("data-container", "body");
          tr.appendChild(td4);
          let td9 = document.createElement("td");
          td9.innerHTML = data[i].date;
          tr.appendChild(td9);
          let td5 = document.createElement("td");
          td5.innerHTML = data[i].status;
          tr.appendChild(td5);
          let td7 = document.createElement("td");
          let btn = document.createElement("button");
          btn.innerHTML = "Approve";
          btn.setAttribute("class", "btn btn-success");
          btn.setAttribute("id", data[i].leave_id);
          btn.setAttribute("onclick", "approve(this.id)");
          td7.appendChild(btn);
          tr.appendChild(td7);
          let td8 = document.createElement("td");
          let btn1 = document.createElement("button");
          btn1.innerHTML = "Reject";
          btn1.setAttribute("class", "btn btn-danger");
          btn1.setAttribute("id", data[i].leave_id);
          btn1.setAttribute("onclick", "reject(this.id)");
          td8.appendChild(btn1);
          tr.appendChild(td8);
          document.querySelector("tbody").appendChild(tr);
        }
      } else {
        alert("No Leave Request");
      }
    },
  });
}

// $("#user_info").on("shown.bs.modal", function (e) {
//   view_user($(this).data('employee_id'));
// });

function view_user(employee_id) {

    let image = document.getElementById("image");
    let employee_name = document.getElementById("employee_name");
    let gender = document.getElementById("gender");
    let designation = document.getElementById("designation");
    let department = document.getElementById("v_department");
    let email = document.getElementById("email");
    let off_email = document.getElementById("off_email");
    let joining_date = document.getElementById("joining_date");
    let qualification = document.getElementById("qualification");
    let contact_number = document.getElementById("contact_number");
    let cnic = document.getElementById("cnic");
    let current_address = document.getElementById("current_address");
    let date_of_birth = document.getElementById("date_of_birth");
    let martial_status = document.getElementById("martial_status");
    let n_name = document.getElementById("n_name");
    let relation = document.getElementById("relation");
    let n_number = document.getElementById("n_number");
    let user_access = document.getElementById("user_access");
    let user_status = document.getElementById("user_status");
    let user_shift = document.getElementById("user_shift");
    let time_in = document.getElementById("time_in");
    let time_out = document.getElementById("time_out");
    $.ajax({
      url: "include/functions.php",
      type: "POST",
      data: {
        action: "display_employee_data",
        employee_id: employee_id,
      },
      success: function (result) {
        let data = JSON.parse(result);
        image.src = "Attendance System/" + data[0].user_image;
        user_id = data[0].user_id;
        employee_name.value = data[0].employee_name;
        gender.value = data[0].gender;
        designation.value = data[0].designation;
        department.value = data[0].department;
        email.value = data[0].email;
        off_email.value = data[0].off_email;
        joining_date.value = data[0].joining_date;
        qualification.value = data[0].qualification;
        contact_number.value = data[0].contact_number;
        cnic.value = data[0].cnic;
        current_address.value = data[0].current_address;
        date_of_birth.value = data[0].date_of_birth;
        martial_status.value = data[0].martial_status;
        n_name.value = data[0].n_name;
        relation.value = data[0].relation;
        n_number.value = data[0].n_number;
        user_access.value = data[0].user_access;
        user_status.value = data[0].user_status;
        user_shift.value = data[0].user_shift;
        time_in.value = data[0].time_in;
        time_out.value = data[0].time_out;
      },
    });
}

function PrintSetter(employee_id) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "PrintSetter",
      employee_id: employee_id,
    },
    success: function (data) {
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
    },
  });
}

function view_attendance(id) {
  let month = document.getElementById("month").value;
  let year = document.getElementById("year").value;

  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "display_employee_data",
      employee_id: id,
    },
    success: function (result) {
      $("#user_attendance").modal("toggle");
      let user_image = document.getElementById("user_image");
      let employee_id = document.getElementById("employee_id");
      let employee_name = document.getElementById("employee_name");
      let designation = document.getElementById("designation");
      let department = document.getElementById("department");
      let time_in = document.getElementById("time_in");
      let time_out = document.getElementById("time_out");
      let attendance_year = document.getElementById("attendance_year");
      let attendance_month = document.getElementById("attendance_month");
      attendance_year.innerHTML = year;
      attendance_month.innerHTML = month;
      let data = JSON.parse(result);
      user_image.src = "Attendance System/" + data[0].user_image;
      employee_id.innerHTML = data[0].user_id;
      employee_name.innerHTML = data[0].employee_name;
      designation.innerHTML = data[0].designation;
      department.innerHTML = data[0].department;
      time_in.innerHTML =
        data[0].time_in.slice(0, 5) + " " + data[0].time_in.slice(8);
      time_out.innerHTML =
        data[0].time_out.slice(0, 5) + " " + data[0].time_out.slice(8);
      $.ajax({
        type: "Post",
        url: "include/functions.php",
        data: {
          action: "get_display6",
          employee_id: id,
          month: month,
          year: year,
        },

        success: function (data) {

          $("#table_body").html(data);
        },
      });
      $.ajax({
        type: "Post",
        url: "include/functions.php",
        data: {
          action: "get_monthly_data",
          employee_id: id,
          month: month,
          year: year,
        },
        success: function (monthly_record) {
          monthly_record = JSON.parse(monthly_record);
          let official_days = document.getElementById("official_days");
          let presents = document.getElementById("presents");
          let absents = document.getElementById("absents");
          let working_hours = document.getElementById("working_hours");
          let credit_leaves = document.getElementById("credit_leaves");
          let availed_leaves = document.getElementById("availed_leaves");
          let over_time = document.getElementById("over_time");
          official_days.innerHTML = monthly_record[0];
          presents.innerHTML = monthly_record[1];
          absents.innerHTML = monthly_record[2];
          working_hours.innerHTML = monthly_record[3];
          credit_leaves.innerHTML = monthly_record[5];
          availed_leaves.innerHTML = monthly_record[4];
          over_time.innerHTML = monthly_record[6];
        },
      });
    },
  });
}

function view_employees() {
  let tbody = document.getElementById("t2");
  tbody.innerHTML = "";
  $.ajax({
    url: "include/functions.php",
    method: "POST",
    data: {
      action: "get_employee_data",
    },
    success: function (data) {
      data = JSON.parse(data);
      for (let i = 0; i < data.length; i++) {
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        let td4 = document.createElement("td");
        let td5 = document.createElement("td");
        let td6 = document.createElement("td");
        let view_btn = document.createElement("button");
        td1.innerHTML = data[i][0];
        td2.innerHTML = data[i][1];
        td3.innerHTML = data[i][2];
        td5.innerHTML = data[i][3];
        td6.innerHTML = data[i][4];
        view_btn.innerHTML = "View";
        view_btn.className = "btn btn-primary";
        view_btn.setAttribute("data-target", "#user_attendance");
        view_btn.setAttribute("id", data[i][0]);
        view_btn.setAttribute("onclick", "view_attendance(this.id)");
        td4.appendChild(view_btn);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td5);
        tr.appendChild(td6);
        tr.appendChild(td4);
        tbody.appendChild(tr);
      }
    },
  });
}

function get_adjustment_data(date) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "all_adjustment_data",
      date: date,
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data.length >= 1) {
        for (i = 0; i < data.length; i++) {
          let tr = document.createElement("tr");
          let td = document.createElement("td");
          td.innerHTML = data[i].adjustment_id;
          tr.appendChild(td);
          let td6 = document.createElement("td");
          td6.innerHTML = data[i].employee_name;
          tr.appendChild(td6);
          let td1 = document.createElement("td");
          td1.innerHTML = data[i].adjustment_type;
          tr.appendChild(td1);
          let td2 = document.createElement("td");
          td2.innerHTML = data[i].adjustment_date;
          tr.appendChild(td2);
          let td4 = document.createElement("td");
          if (data[i].adjustment_reason.length < 12) {
            td4.innerHTML = data[i].adjustment_reason;
          } else {
            td4.innerHTML = data[i].adjustment_reason.slice(0, 12) + "...";
          }
          td4.setAttribute("data-toggle", "tooltip");
          td4.setAttribute("title", data[i].adjustment_reason);
          td4.setAttribute("data-placement", "top");
          td4.setAttribute("data-container", "body");
          tr.appendChild(td4);
          let td3 = document.createElement("td");
          td3.innerHTML = data[i].requested_on;
          tr.appendChild(td3);
          let td5 = document.createElement("td");
          td5.innerHTML = data[i].status;
          tr.appendChild(td5);
          let td7 = document.createElement("td");
          let btn = document.createElement("button");
          btn.innerHTML = "Approve";
          btn.setAttribute("class", "btn btn-success");
          btn.setAttribute("id", data[i].adjustment_id);
          btn.setAttribute("onclick", "approve_adjustment(this.id)");
          td7.appendChild(btn);
          tr.appendChild(td7);
          let td8 = document.createElement("td");
          let btn1 = document.createElement("button");
          btn1.innerHTML = "Reject";
          btn1.setAttribute("class", "btn btn-danger");
          btn1.setAttribute("id", data[i].adjustment_id);
          btn1.setAttribute("onclick", "reject_adjustment(this.id)");
          td8.appendChild(btn1);
          tr.appendChild(td8);
          document.querySelector("tbody").appendChild(tr);
        }
      } else {
        alert("No Adjustment Request Found");
      }
    },
  });
}

function approve_adjustment(adjustment_id) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "approve_adjustment",
      adjustment_id: adjustment_id,
    },
    success: function (data) {
      if (data == "Approved") {
        alert("Adjustment Approved");
        let approve_btn = document.getElementById(adjustment_id);
        approve_btn.parentElement.parentElement.children[5].innerHTML =
          "Approved";
      }
    },
  });
}

function reject_adjustment(adjustment_id) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "reject_adjustment",
      adjustment_id: adjustment_id,
    },
    success: function (data) {
      if (data == "Rejected") {
        alert("Adjustment Rejected");
        let reject_btn = document.getElementById(adjustment_id);
        reject_btn.parentElement.parentElement.children[5].innerHTML =
          "Rejected";
      }
    },
  });
}

function show_leaves() {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "show_leaves",
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data.length >= 1) {
        for (i = 0; i < data.length; i++) {
          let tr = document.createElement("tr");
          let td = document.createElement("td");
          td.innerHTML = data[i].leave_id;
          tr.appendChild(td);
          let td6 = document.createElement("td");
          td6.innerHTML = data[i].employee_name;
          tr.appendChild(td6);
          let td1 = document.createElement("td");
          td1.innerHTML = data[i].leave_type;
          tr.appendChild(td1);
          if (data[i].leave_type != "Full Day") {
            let td2 = document.createElement("td");
            td2.innerHTML =
              data[i].duration.slice(0, 1) +
              " Hours, " +
              data[i].duration.slice(2, 4) +
              " Minutes";
            tr.appendChild(td2);
            let new_start_time = data[i].start_time;
            let timeString12hr = new Date(
              "1970-01-01T" + new_start_time + "Z"
            ).toLocaleTimeString("en-US", {
              timeZone: "UTC",
              hour12: true,
              hour: "numeric",
              minute: "numeric",
            });
            let new_end_time = data[i].end_time;
            let timeString12hr1 = new Date(
              "1970-01-01T" + new_end_time + "Z"
            ).toLocaleTimeString("en-US", {
              timeZone: "UTC",
              hour12: true,
              hour: "numeric",
              minute: "numeric",
            });
            let td3 = document.createElement("td");
            td3.innerHTML = timeString12hr + " to " + timeString12hr1;
            tr.appendChild(td3);
          } else {
            let td2 = document.createElement("td");
            td2.innerHTML = data[i].duration;
            tr.appendChild(td2);
            let td3 = document.createElement("td");
            td3.innerHTML = data[i].start_time + " to " + data[i].end_time;
            tr.appendChild(td3);
          }
          let td4 = document.createElement("td");
          if (data[i].reason.length < 12) {
            td4.innerHTML = data[i].reason;
          } else {
            td4.innerHTML = data[i].reason.slice(0, 12) + "...";
          }
          td4.setAttribute("data-toggle", "tooltip");
          td4.setAttribute("title", data[i].reason);
          td4.setAttribute("data-placement", "top");
          td4.setAttribute("data-container", "body");
          tr.appendChild(td4);
          let td9 = document.createElement("td");
          td9.innerHTML = data[i].date;
          tr.appendChild(td9);
          let td5 = document.createElement("td");
          td5.innerHTML = data[i].status;
          tr.appendChild(td5);
          let td7 = document.createElement("td");
          let btn = document.createElement("button");
          btn.innerHTML = "Approve";
          btn.setAttribute("class", "btn btn-success");
          btn.setAttribute("id", data[i].leave_id);
          btn.setAttribute("onclick", "approve(this.id)");
          td7.appendChild(btn);
          tr.appendChild(td7);
          let td8 = document.createElement("td");
          let btn1 = document.createElement("button");
          btn1.innerHTML = "Reject";
          btn1.setAttribute("class", "btn btn-danger");
          btn1.setAttribute("id", data[i].leave_id);
          btn1.setAttribute("onclick", "reject(this.id)");
          td8.appendChild(btn1);
          tr.appendChild(td8);
          document.querySelector("tbody").appendChild(tr);
        }
      } else {
        alert("No Leave Request");
      }
    },
  });
}

function show_adjustments() {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "show_adjustments",
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data.length >= 1) {
        for (i = 0; i < data.length; i++) {
          let tr = document.createElement("tr");
          let td = document.createElement("td");
          td.innerHTML = data[i].adjustment_id;
          tr.appendChild(td);
          let td6 = document.createElement("td");
          td6.innerHTML = data[i].employee_name;
          tr.appendChild(td6);
          let td1 = document.createElement("td");
          td1.innerHTML = data[i].adjustment_type;
          tr.appendChild(td1);
          let td2 = document.createElement("td");
          td2.innerHTML = data[i].adjustment_date;
          tr.appendChild(td2);
          let td4 = document.createElement("td");
          if (data[i].adjustment_reason.length < 12) {
            td4.innerHTML = data[i].adjustment_reason;
          } else {
            td4.innerHTML = data[i].adjustment_reason.slice(0, 12) + "...";
          }
          td4.setAttribute("data-toggle", "tooltip");
          td4.setAttribute("title", data[i].adjustment_reason);
          td4.setAttribute("data-placement", "top");
          td4.setAttribute("data-container", "body");
          tr.appendChild(td4);
          let td3 = document.createElement("td");
          td3.innerHTML = data[i].requested_on;
          tr.appendChild(td3);
          let td5 = document.createElement("td");
          td5.innerHTML = data[i].status;
          tr.appendChild(td5);
          let td7 = document.createElement("td");
          let btn = document.createElement("button");
          btn.innerHTML = "Approve";
          btn.setAttribute("class", "btn btn-success");
          btn.setAttribute("id", data[i].adjustment_id);
          btn.setAttribute("onclick", "approve_adjustment(this.id)");
          td7.appendChild(btn);
          tr.appendChild(td7);
          let td8 = document.createElement("td");
          let btn1 = document.createElement("button");
          btn1.innerHTML = "Reject";
          btn1.setAttribute("class", "btn btn-danger");
          btn1.setAttribute("id", data[i].adjustment_id);
          btn1.setAttribute("onclick", "reject_adjustment(this.id)");
          td8.appendChild(btn1);
          tr.appendChild(td8);
          document.querySelector("tbody").appendChild(tr);
        }
      } else {
        alert("No Adjustment Request Found");
      }
    },
  });
}

function add_user(form) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    contentType: false,
    processData: false,
    data: form,
    success: function (data) {
      alert(data);
      if (data == "Employee Added Successfully") {
        window.location.href = "all_users.php";
      }
    },
  });
}

function load_adjustment_page() {
  $("body").tooltip({
    selector: "[data-toggle=tooltip]",
  });
  show_adjustments();
  $("#TABLE_ID").DataTable();
  $(".dataTables_empty").empty();

  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "adjustment_data",
    },
    success: function (data) {
      var data = JSON.parse(data);
      $("#total_adjustments").html(data[0]);
      $("#pending_adjustments").html(data[2]);
      $("#approved_adjustments").html(data[1]);
      $("#rejected_adjustments").html(data[3]);
    },
  });
}

function load_all_users_page() {
  $("#TABLE_ID").DataTable();
  $(".dataTables_empty").empty();

  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "get_employees",
    },
    success: function (data) {
      var data = JSON.parse(data);
      $("#total_employees").html(data[0]);
      $("#active_employees").html(data[1]);
      $("#inactive_employees").html(data[0] - data[1]);
    },
  });

  $.ajax({
    url: "include/functions.php",
    method: "POST",
    data: {
      action: "get_department",
    },
    success: function (data) {
      data = JSON.parse(data);
      let department = document.getElementById("department");
      for (let i = 0; i < data.length; i++) {
        let option = document.createElement("option");
        option.value = data[i];
        option.innerHTML = data[i];
        department.appendChild(option);
      }
    },
  });
}

function get_employees_by_department(department) {
  $.ajax({
    url: "include/functions.php",
    method: "POST",
    data: {
      action: "get_employees_by_department",
      department: department,
    },
    success: function (data) {
      data = JSON.parse(data);
      let tbody = document.getElementById("tbody");
      tbody.innerHTML = "";
      for (let i = 0; i < data.length; i++) {
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        let td4 = document.createElement("td");
        let td5 = document.createElement("td");
        let td6 = document.createElement("td");

        let view_btn = document.createElement("button");
        let barcode = document.createElement("button");
        td1.innerHTML = data[i].user_id;
        td2.innerHTML = data[i].employee_name;
        td3.innerHTML = data[i].department;
        td5.innerHTML = data[i].user_status;
        view_btn.innerHTML = "View";
        view_btn.className = "btn btn-primary";
        view_btn.setAttribute("data-toggle", "modal");
        view_btn.setAttribute("data-target", "#user_info");
        view_btn.setAttribute("id", data[i].user_id);
        view_btn.setAttribute("onclick", "view_user(this.id)");
        td4.appendChild(view_btn);
        barcode.innerHTML = "Generate Barcode";
        barcode.className = "btn btn-success";
        barcode.setAttribute("id", data[i].user_id);
        barcode.setAttribute("onclick", "PrintSetter(this.id)");
        td6.appendChild(barcode);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td5);
        tr.appendChild(td4);
        tr.appendChild(td6);
        tbody.appendChild(tr);
      }
    },
  });
}

function get_all_employees() {
  $.ajax({
    url: "include/functions.php",
    method: "POST",
    data: {
      action: "get_all_employees",
    },
    success: function (data) {
      data = JSON.parse(data);
      let tbody = document.getElementById("tbody");
      tbody.innerHTML = "";
      for (let i = 0; i < data.length; i++) {
        let tr = document.createElement("tr");
    
        // Creating table cells
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        let td4 = document.createElement("td");
        let td5 = document.createElement("td");
        let td6 = document.createElement("td");
    
        // Creating buttons
        let view_btn = document.createElement("button");
        let barcode = document.createElement("button");
    
        // Setting innerHTML for cells
        td1.innerHTML = data[i].user_id;
        td2.innerHTML = data[i].employee_name;
        td3.innerHTML = data[i].department;
        td5.innerHTML = data[i].user_status;
    
        // Setting properties for View button
        view_btn.innerHTML = "View";
        view_btn.className = "dropdown-item"; // Changed to dropdown item
        view_btn.setAttribute("data-toggle", "modal");
        view_btn.setAttribute("data-target", "#user_info");
        view_btn.setAttribute("id", data[i].user_id);
        view_btn.setAttribute("onclick", "view_user(this.id)");

        // let edit_btn = document.createElement("button");
        // edit_btn.innerHTML = "Edit Employee";
        // edit_btn.className = "dropdown-item"; // Consistent styling with other dropdown items
        // edit_btn.setAttribute("id", data[i].user_id);
        // edit_btn.setAttribute("onclick", "location.href='edit_user.php?id=" + data[i].user_id + "'");
    
        // Setting properties for Generate Barcode button
        barcode.innerHTML = "Generate Barcode";
        barcode.className = "dropdown-item"; // Changed to dropdown item
        barcode.setAttribute("id", data[i].user_id);
        barcode.setAttribute("onclick", "PrintSetter(this.id)");
    
        // Creating the dropdown container
        let dropdown = document.createElement("div");
        dropdown.className = "dropdown";
    
        // Creating the dropdown toggle button
        let dropbtn = document.createElement("button");
        dropbtn.className = "btn btn-primary dropdown-toggle";
        dropbtn.setAttribute("type", "button");
        dropbtn.setAttribute("id", "actionDropdown" + i);
        dropbtn.setAttribute("data-toggle", "dropdown");
        dropbtn.setAttribute("aria-haspopup", "true");
        dropbtn.setAttribute("aria-expanded", "false");
        dropbtn.innerHTML = "Action";
    
        // Creating the dropdown menu
        let dropdownMenu = document.createElement("div");
        dropdownMenu.className = "dropdown-menu";
        dropdownMenu.setAttribute("aria-labelledby", "actionDropdown" + i);
    
        // Appending buttons to the dropdown menu
        dropdownMenu.appendChild(view_btn);
        dropdownMenu.appendChild(barcode);
    
        // Appending the toggle and menu to the dropdown
        dropdown.appendChild(dropbtn);
        dropdown.appendChild(dropdownMenu);
    
        // Appending the dropdown to the table cell
        td6.appendChild(dropdown);
    
        // Appending cells to the row
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td5);
        tr.appendChild(td4);
        tr.appendChild(td6);
    
        // Appending the row to the tbody
        tbody.appendChild(tr);
    }
    
    },
  });
}

function load_edit_user_page() {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "get_employee_data",
    },
    success: function (data) {
      let employee_name = JSON.parse(data);
      for (let i = 0; i < employee_name.length; i++) {
        let option = document.createElement("option");
        option.value = employee_name[i][0];
        option.innerHTML = employee_name[i][1];
        document.getElementById("drop_down").appendChild(option);
      }
    },
  });
}

function edit_user(form) {
  console.log("form", form);
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    contentType: false,
    processData: false,
    data: form,
    success: function (data) {
      alert(data);
      if (data == "Employee details updated successfully") {
        window.location.href = "all_users.php";
      }
    },
  });
}

function edit_user_details(drop_down) {
  let employee_name = document.getElementById("employee_name");
  let user_id = document.getElementById("user_id");
  let gender = document.getElementById("gender");
  let designation = document.getElementById("designation");
  let department = document.getElementById("department");
  let email = document.getElementById("email");
  let off_email = document.getElementById("off_email");
  let joining_date = document.getElementById("joining_date");
  let qualification = document.getElementById("qualification");
  let contact_number = document.getElementById("contact_number");
  let cnic = document.getElementById("cnic");
  let current_address = document.getElementById("current_address");
  let date_of_birth = document.getElementById("date_of_birth");
  let martial_status = document.getElementById("martial_status");
  let n_name = document.getElementById("n_name");
  let relation = document.getElementById("relation");
  let n_number = document.getElementById("n_number");
  let user_access = document.getElementById("user_access");
  let user_status = document.getElementById("user_status");
  let user_shift = document.getElementById("user_shift");
  let time_in = document.getElementById("time_in");
  let time_out = document.getElementById("time_out");

  // let barcode = document.getElementById("barcode");

  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "display_employee_data",
      employee_id: drop_down.value,
    },
    success: function (result) {
      let data = JSON.parse(result);
      employee_name.value = data[0].employee_name;
      user_id.value = data[0].user_id;
      gender.value = data[0].gender;
      department.value = data[0].department;
      get_designation(department.value);
      designation.value = data[0].designation;
      email.value = data[0].email;
      off_email.value = data[0].off_email;
      joining_date.value = data[0].joining_date;
      qualification.value = data[0].qualification;
      contact_number.value = data[0].contact_number;
      cnic.value = data[0].cnic;
      current_address.value = data[0].current_address;
      date_of_birth.value = data[0].date_of_birth;
      martial_status.value = data[0].martial_status;
      n_name.value = data[0].n_name;
      relation.value = data[0].relation;
      n_number.value = data[0].n_number;
      user_access.value = data[0].user_access;
      user_status.value = data[0].user_status;
      user_shift.value = data[0].user_shift;
      time_in.value = data[0].time_in;
      time_out.value = data[0].time_out;

      // barcode.value = data[0].barcode;
      let form = document.getElementById("form");
      form.classList.remove("invisible");
      // get_designation(department.value);
    },
  });
}

function load_leave_page() {
  show_leaves();
  $("#TABLE_ID").DataTable();
  $(".dataTables_empty").empty();
  $("body").tooltip({
    selector: "[data-toggle=tooltip]",
  });
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "leave_data",
    },
    success: function (data) {
      var data = JSON.parse(data);
      $("#total_leaves").html(data[0]);
      $("#pending_leaves").html(data[2]);
      $("#approved_leaves").html(data[1]);
      $("#rejected_leaves").html(data[3]);
    },
  });
}

function check_leave_date() {
  day = document.getElementById("day").value;
  month = document.getElementById("month").value;
  year = document.getElementById("year").value;
  if (day != "day" && month != "month" && year != "year") {
    let date = day + "/" + month + "/" + year;
    $("#tbody").empty();
    get_leave_data(date);
  }
}

function login(user_id, password) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "login",
      user_id: user_id,
      password: password,
    },
    success: function (data) {
      data = JSON.parse(data);

      if (data[0] == "Login Successful") {
        if (data[1] == "Administrator") {
          window.location.href = "index.php";
        } else if (data[1] == "Employee") {
          window.location.href = "dashboard.php";
        }
      } else {
        alert("Invalid Credentials");
      }
    },
  });
}

function calendar(user_id, month1, year1) {
  get_calendar_data(user_id, month1, year1);
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "get_display8",
      month1: month1,
      year1: year1,
      user_id: user_id,
    },
    success: function (data) {
      data = JSON.parse(data);
      let td = document.getElementsByTagName("td");
      let count = 0;
      for (i = 0; i < td.length; i++) {
        if (count < data.length) {
          if (td[i].innerHTML == data[count][0]) {
            if (data[count][1] == "Present") {
              td[i].classList.add("table-dark");
              count++;
            } else if (data[count][1] == "Absent") {
              td[i].classList.add("table-danger");
              count++;
            }
          }
        }
      }

      get_attendance_data(user_id, month1, year1);
    },
  });
}

function load_my_profile_page(emp) {
  let employee_name = document.getElementById("employee_name");
  let user_id = document.getElementById("user_id");
  let gender = document.getElementById("gender");
  let designation = document.getElementById("designation");
  let department = document.getElementById("department");
  let email = document.getElementById("email");
  let joining_date = document.getElementById("joining_date");
  let qualification = document.getElementById("qualification");
  let contact_number = document.getElementById("contact_number");
  let cnic = document.getElementById("cnic");
  let current_address = document.getElementById("current_address");
  let date_of_birth = document.getElementById("date_of_birth");
  let martial_status = document.getElementById("martial_status");
  let off_email = document.getElementById("off_email");
  let n_name = document.getElementById("n_name");
  let relation = document.getElementById("relation");
  let n_number = document.getElementById("n_number");
  // let password = document.getElementById("password");
  // let user_access = document.getElementById("user_access");
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "display_employee_data",
      employee_id: emp,
    },
    success: function (data) {
      data = JSON.parse(data);
      function replaceNull(value) {
        return value !== null ? value : "-";
      }

      // Set the field values, replacing null with "-"
      employee_name.value = replaceNull(data[0].employee_name);
      user_id.value = replaceNull(data[0].user_id);
      gender.value = replaceNull(data[0].gender);
      designation.value = replaceNull(data[0].designation);
      department.value = replaceNull(data[0].department);
      email.value = replaceNull(data[0].email);
      off_email.value = replaceNull(data[0].off_email);
      joining_date.value = replaceNull(data[0].joining_date);
      qualification.value = replaceNull(data[0].qualification);
      contact_number.value = replaceNull(data[0].contact_number);
      cnic.value = replaceNull(data[0].cnic);
      current_address.value = replaceNull(data[0].current_address);
      date_of_birth.value = replaceNull(data[0].date_of_birth);
      martial_status.value = replaceNull(data[0].martial_status);
      n_name.value = replaceNull(data[0].n_name);
      relation.value = replaceNull(data[0].relation);
      n_number.value = replaceNull(data[0].n_number);
    },
  });
}

function load_user_adjustment_page(employee_id) {
  $("body").tooltip({
    selector: "[data-toggle=tooltip]",
  });
  $("#TABLE_ID").DataTable();
  $(".dataTables_empty").empty();

  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "employee_adjustment_data",
      employee_id: employee_id,
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data[0] != "No adjustments applied") {
        for (i = 0; i < data.length; i++) {
          let tr = document.createElement("tr");
          let td = document.createElement("td");
          td.innerHTML = data[i].adjustment_id;
          tr.appendChild(td);
          let td1 = document.createElement("td");
          td1.innerHTML = data[i].adjustment_type;
          tr.appendChild(td1);
          let td2 = document.createElement("td");
          td2.innerHTML = data[i].adjustment_date;
          tr.appendChild(td2);
          let td4 = document.createElement("td");
          if (data[i].adjustment_reason.length < 12) {
            td4.innerHTML = data[i].adjustment_reason;
          } else {
            td4.innerHTML = data[i].adjustment_reason.slice(0, 12) + "...";
          }
          td4.setAttribute("data-toggle", "tooltip");
          td4.setAttribute("title", data[i].adjustment_reason);
          td4.setAttribute("data-placement", "top");
          td4.setAttribute("data-container", "body");
          tr.appendChild(td4);
          let td5 = document.createElement("td");
          let btn = document.createElement("button");
          if (data[i].status == "Pending") {
            btn.classList.add("btn", "btn-warning", "disabled");
            btn.innerHTML = "Pending";
          } else if (data[i].status == "Approved") {
            btn.classList.add("btn", "btn-success", "disabled");
            btn.innerHTML = "Approved";
          } else if (data[i].status == "Rejected") {
            btn.classList.add("btn", "btn-danger", "disabled");
            btn.innerHTML = "Rejected";
          }
          td5.appendChild(btn);
          tr.appendChild(td5);
          document.querySelector("tbody").appendChild(tr);
        }
      } else {
        let tr = document.createElement("tr");
        let td = document.createElement("td");
        td.innerHTML = "No Adjustment Applied";
        td.colSpan = "6";
        tr.appendChild(td);
        document.querySelector("tbody").appendChild(tr);
      }
    },
  });
}

function apply_for_adjustment(selector, adjustment_date, adjustment_reason) {
  if (adjustment_reason == "") {
    alert("Please enter a reason");
  } else {
    $.ajax({
      url: "include/functions.php",
      type: "POST",
      data: {
        action: "adjustment_form",
        employee_id: employee_id,
        employee_name: employee_name,
        adjustment_type: selector,
        adjustment_date: adjustment_date,
        adjustment_reason: adjustment_reason,
      },
      success: function (data) {
        data = JSON.parse(data);
        if (data[0] == "success") {
          alert("Adjustment Applied");
        } else {
          alert("Something went wrong");
        }
      },
    });
  }
}

function load_user_attendance_page() {
  $("#TABLE_ID").DataTable();
  $(".dataTables_empty").empty();
}

function user_attendance(
  user_id,
  user_name,
  department,
  designation,
  user_status
) {
  let tbody = document.getElementById("t2");
  tbody.innerHTML = "";
  let tr = document.createElement("tr");
  let td1 = document.createElement("td");
  let td2 = document.createElement("td");
  let td3 = document.createElement("td");
  let td4 = document.createElement("td");
  let td5 = document.createElement("td");
  let td6 = document.createElement("td");
  let view_btn = document.createElement("button");
  td1.innerHTML = user_id;
  td2.innerHTML = user_name;
  td3.innerHTML = department;
  td5.innerHTML = designation;
  td6.innerHTML = user_status;
  view_btn.innerHTML = "View";
  view_btn.className = "btn btn-primary";
  view_btn.setAttribute("data-toggle", "modal");
  view_btn.setAttribute("data-target", "#user_attendance");
  view_btn.setAttribute("id", user_id);
  view_btn.setAttribute("onclick", "view_attendance(this.id)");
  td4.appendChild(view_btn);
  tr.appendChild(td1);
  tr.appendChild(td2);
  tr.appendChild(td3);
  tr.appendChild(td5);
  tr.appendChild(td6);
  tr.appendChild(td4);
  tbody.appendChild(tr);
}

function load_my_leaves_page(emp) {
  $("body").tooltip({
    selector: "[data-toggle=tooltip]",
  });
  $(".dataTables_empty").empty();

  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "employee_leave_data",
      employee_name: emp,
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data[0] != "No leaves applied") {
        for (let i = 0; i < data.length; i++) {
          let tr = document.createElement("tr");
          let td = document.createElement("td");
          td.innerHTML = data[i].leave_id;
          tr.appendChild(td);
          let td1 = document.createElement("td");
          td1.innerHTML = data[i].leave_type;
          tr.appendChild(td1);
          if (data[i].leave_type != "Full Day") {
            let td2 = document.createElement("td");
            td2.innerHTML =
              data[i].duration.slice(0, 1) +
              " Hours, " +
              data[i].duration.slice(2, 4) +
              " Minutes";
            tr.appendChild(td2);
            let new_start_time = data[i].start_time;
            let timeString12hr = new Date(
              "1970-01-01T" + new_start_time + "Z"
            ).toLocaleTimeString("en-US", {
              timeZone: "UTC",
              hour12: true,
              hour: "numeric",
              minute: "numeric",
            });
            let new_end_time = data[i].end_time;
            let timeString12hr1 = new Date(
              "1970-01-01T" + new_end_time + "Z"
            ).toLocaleTimeString("en-US", {
              timeZone: "UTC",
              hour12: true,
              hour: "numeric",
              minute: "numeric",
            });
            let td3 = document.createElement("td");
            td3.innerHTML = timeString12hr + " to " + timeString12hr1;
            tr.appendChild(td3);
          } else {
            let td2 = document.createElement("td");
            td2.innerHTML = data[i].duration;
            tr.appendChild(td2);
            let td3 = document.createElement("td");
            td3.innerHTML = data[i].start_time + " to " + data[i].end_time;
            tr.appendChild(td3);
          }
          let td4 = document.createElement("td");
          if (data[i].reason.length < 12) {
            td4.innerHTML = data[i].reason;
          } else {
            td4.innerHTML = data[i].reason.slice(0, 12) + "...";
          }
          td4.setAttribute("data-toggle", "tooltip");
          td4.setAttribute("title", data[i].reason);
          td4.setAttribute("data-placement", "top");
          td4.setAttribute("data-container", "body");
          tr.appendChild(td4);
          let td5 = document.createElement("td");
          let btn = document.createElement("button");
          if (data[i].status == "Pending") {
            btn.classList.add("btn", "btn-warning", "disabled");
            btn.innerHTML = "Pending";
          } else if (data[i].status == "Approved") {
            btn.classList.add("btn", "btn-success", "disabled");
            btn.innerHTML = "Approved";
          } else if (data[i].status == "Rejected") {
            btn.classList.add("btn", "btn-danger", "disabled");
            btn.innerHTML = "Rejected";
          }
          td5.appendChild(btn);
          tr.appendChild(td5);
          document.querySelector("tbody").appendChild(tr);
        }
      } else {
        let tr = document.createElement("tr");
        let td = document.createElement("td");
        td.innerHTML = "No leaves applied";
        td.colSpan = "6";
        tr.appendChild(td);
        document.querySelector("tbody").appendChild(tr);
      }
    },
  });
}

function short_leave() {
  let start = document.getElementById("from_time").value;
  let end = document.getElementById("to_time").value;
  let reason = document.getElementById("short_reason").value;
  if (reason == "") {
    alert("Please enter a reason");
  } else {
    var timeStart = new Date("01/01/2007 " + start);
    var timeEnd = new Date("01/01/2007 " + end);

    var diff = (timeEnd - timeStart) / 60000; //dividing by seconds and milliseconds

    var minutes = diff % 60;
    var hours = (diff - minutes) / 60;

    if (hours > 1 && minutes >= 0) {
      alert("You can only take 1 hour 30 minutes leave");
    } else {
      let form = document.getElementById("short");
      leave(form, hours, minutes, employee_name, employee_id);
    }
  }
}

function half_day_leave() {
  let start = document.getElementById("from_time2").value;
  let end = document.getElementById("to_time2").value;
  let reason = document.getElementById("half_day_reason").value;
  if (reason == "") {
    alert("Please enter a reason");
  } else {
    var timeStart = new Date("01/01/2007 " + start);
    var timeEnd = new Date("01/01/2007 " + end);

    var diff = (timeEnd - timeStart) / 60000; //dividing by seconds and milliseconds

    var minutes = diff % 60;
    var hours = (diff - minutes) / 60;
    if (hours > 3 && minutes > 0) {
      alert("You can only take 3 hours leave");
    } else {
      let form = document.getElementById("half_day");
      leave(form, hours, minutes, employee_name, employee_id);
    }
  }
}

function full_day_leave() {
  start_date = document.getElementById("from").value;
  end_date = document.getElementById("to").value;
  let reason = document.getElementById("full_day_reason").value;
  if (reason == "") {
    alert("Please enter a reason");
  } else {
    var s_date = new Date(start_date);
    var e_date = new Date(end_date);
    var Difference_In_Time = e_date.getTime() - s_date.getTime();
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
    if (Difference_In_Days < 3) {
      let form = document.getElementById("full_day");
      leave(form, Difference_In_Days, 0, employee_name, employee_id);
    } else {
      alert("You can only take 2 days leave");
    }
  }
}

function get_calendar_data(user_id, month1, year1) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "calendar",
      user_id: user_id,
      month: month1,
      year: year1,
    },
    success: function (data) {
      $(".tbody").empty();
      let calendar = document.getElementById("calendar");
      calendar.classList.remove("invisible");
      let h3 = document.getElementById("h3");
      h3.innerHTML = month1 + " / " + year1;
      data = JSON.parse(data);
      for (i = 0; i < data.length; i++) {
        $(".tbody").append(data[i]);
      }
      var my_date = (year1 + "-" + month1 + "-1").split("-");
      var year = parseInt(my_date[0]);
      var month = parseInt(my_date[1]) - 1;
      var sundays = [];
      for (var i = 1; i <= new Date(year, month, 0).getDate() + 2; i++) {
        var date = new Date(year, month, i);

        if (date.getDay() == 1) {
          let ohho = date.getUTCDate();
          if (sundays[sundays.length - 1] > ohho && sundays.length != 1) {
            break;
          } else {
            sundays.push(ohho.toString());
          }
        }
      }
      if (Number(sundays[0]) > Number(sundays[sundays.length - 1])) {
        sundays.shift();
      }
      let td = document.getElementsByTagName("td");
      let flag = "false";
      for (let i = 0; i < td.length; i++) {
        if (td[i].innerHTML == "1") {
          flag = true;

          if (sundays.includes(td[i].innerHTML)) {
            td[i].classList.add("table-secondary");
          }
        } else if (td[i].innerHTML == "") {
          flag = "false";
        }
        if (flag == true) {
          if (sundays.includes(td[i].innerHTML)) {
            td[i].classList.add("table-secondary");
          }
        }
      }
    },
  });
}

function get_attendance_data(user_id, month1, year1) {
  $.ajax({
    type: "Post",
    url: "include/functions.php",
    data: {
      action: "get_presents",
      month1: month1,
      year1: year1,
      user_id: user_id,
    },
    success: function (data) {
      data = JSON.parse(data);
      let array = [];
      let all_td = document.getElementsByTagName("td");
      for (i = 0; i < all_td.length; i++) {
        if (all_td[i].classList.contains("table-dark")) {
          array.push(i);
        }
      }
      let count = 0;
      for (let i = 0; i < all_td.length; i++) {
        let td = array[count];
        if (count < array.length) {
          if (
            data[count].Status == "On Time" &&
            data[count].Signout_Status == "Half day"
          ) {
            all_td[td].classList.add("table-primary");
            all_td[td].classList.remove("table-dark");
            count++;
          } else if (
            data[count].Status == "On Time" &&
            data[count].Signout_Status == "Over Time"
          ) {
            all_td[td].classList.add("table-warning");
            all_td[td].classList.remove("table-dark");
            count++;
          } else {
            all_td[td].classList.add("table-success");
            all_td[td].classList.remove("table-dark");
            count++;
          }
        }
      }
    },
  });
}

function get_alert(user_id) {
  $.ajax({
    type: "Post",
    url: "include/functions.php",
    data: {
      action: "get_alerts",
      user_id: user_id,
    },
    success: function (data) {
      data = JSON.parse(data);
      console.log("Alert Data", data);
      let notification_count = document.getElementById("notification_count");
      let notification = document.getElementById("notification");
      notification_count.innerHTML = data[0];
      if (data[1] != "No data found") {
        for (i = 1; i < data.length; i++) {
          let a = document.createElement("a");
          a.classList.add(
            "dropdown-item",
            "d-flex",
            "align-items-center",
            "m-0",
            "p-0"
          );
          a.href = "#";
          a.id = data[i].a_id;
          a.setAttribute(
            "onclick",
            "alert_modal(this.id); change_status(this.id);"
          );
          let div1 = document.createElement("div");
          div1.classList.add("mr-3", "col-2");
          let div2 = document.createElement("div");
          if (data[i].read_status == "unread") {
            div2.classList.add("icon-circle", "bg-danger");
          } else {
            div2.classList.add("icon-circle", "bg-info");
          }
          let i1 = document.createElement("i");
          i1.classList.add("fas", "fa-envelope", "text-white");
          div2.appendChild(i1);
          div1.appendChild(div2);
          a.appendChild(div1);
          let div3 = document.createElement("div");
          div3.classList.add("col-10", "row", "mt-3");
          let div4 = document.createElement("div");
          div4.classList.add("small", "text-gray-500", "col-12", "text-right");
          div4.innerHTML = data[i].a_date;
          let p = document.createElement("p");
          if (data[i].read_status == "unread") {
            p.classList.add("font-weight-bold");
          }
          p.innerHTML = data[i].a_title;
          p.classList.add("col-12", "m-0");
          div3.appendChild(p);
          div3.appendChild(div4);
          a.appendChild(div3);
          notification.appendChild(a);
        }
      } else {
        let a = document.createElement("a");
        a.classList.add("dropdown-item", "text-center");
        a.href = "#";
        a.innerHTML = "No New Alerts";

        notification.appendChild(a);
      }
    },
  });
}

function alert_modal(id) {
  $.ajax({
    type: "Post",
    url: "include/functions.php",
    data: {
      action: "alert_modal",
      id: id,
    },
    success: function (data) {
      data = JSON.parse(data);
      let modal = document.getElementById("alert");
      let alert_title = document.getElementById("alert_title");
      let alert_message = document.getElementById("alert_message");
      $("#alert").modal("show");
      alert_title.innerHTML = data[0].a_title;
      alert_message.innerHTML = data[0].a_message;
    },
  });
}

function change_status(id) {
  $.ajax({
    type: "Post",
    url: "include/functions.php",
    data: {
      action: "change_status",
      id: id,
    },
    success: function (data) {},
  });
}

function get_all_alerts() {
  $("body").tooltip({
    selector: "[data-toggle=tooltip]",
  });
  $(".dataTables_empty").empty();
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "get_all_alerts",
    },
    success: function (data) {
      let alerts = JSON.parse(data);
      if (alerts.length == 0) {
        let tr = document.createElement("tr");
        let td = document.createElement("td");
        td.innerHTML = "No alerts found";
        td.setAttribute("colspan", "4");
        tr.appendChild(td);
        tbody.appendChild(tr);
      } else {
        let tbody = document.getElementById("tbody");
        for (let i = 0; i < alerts.length; i++) {
          let tr = document.createElement("tr");
          let td1 = document.createElement("td");
          let td2 = document.createElement("td");
          let td3 = document.createElement("td");
          let td4 = document.createElement("td");
          td1.innerHTML = i + 1;
          td2.innerHTML = alerts[i].a_title;
          if (alerts[i].a_message.length < 12) {
            td3.innerHTML = alerts[i].a_message;
          } else {
            td3.innerHTML = alerts[i].a_message.slice(0, 12) + "...";
          }
          td3.setAttribute("data-toggle", "tooltip");
          td3.setAttribute("title", alerts[i].a_message);
          td3.setAttribute("data-placement", "top");
          td3.setAttribute("data-container", "body");

          td4.innerHTML = alerts[i].a_date;
          tr.appendChild(td1);
          tr.appendChild(td2);
          tr.appendChild(td3);
          tr.appendChild(td4);
          tbody.appendChild(tr);
        }
      }
    },
  });
}

function insert_alert(a_title, a_message) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "add_alert",
      a_title: a_title,
      a_message: a_message,
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data[0] == "success") {
        alert("Alert added successfully");
        location.reload();
      } else {
        alert("Something went wrong, please try again later");
        location.reload();
      }
    },
  });
}

function logout() {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "logout",
    },
    success: function (res) {
      if (res == "logout") {
        window.location.href = "login.php";
      }
    },
  });
}

function change_password(inputPasswordOld, inputPasswordNew, user_id) {
  $.ajax({
    url: "include/functions.php",
    type: "POST",
    data: {
      action: "change_password",
      old_password: inputPasswordOld,
      new_password: inputPasswordNew,
      user_id: user_id,
    },
    success: function (res) {
      if (res == "Password Changed Successfully") {
        $.ajax({
          url: "include/functions.php",
          type: "POST",
          data: {
            action: "logout",
          },
          success: function (res) {
            if (res == "logout") {
              alert("Password Changed Successfully");
              window.location.href = "login.php";
            }
          },
        });
      } else {
        alert("Current Password is Wrong");
      }
    },
  });
}

function display(a) {
  $.ajax({
    type: "Post",
    url: "include/functions.php",
    data: {
      action: "result",
      a: a,
    },
    success: function (data) {
      $("#table-container").html(data);
    },
  });
}

function modal(id) {
  $("#exampleModalCenter").modal("show");
  $.ajax({
    type: "Post",
    url: "include/functions.php",
    data: {
      action: "modal",
      id: id,
    },
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
      emp_id.innerHTML = data[0];
      emp_name.innerHTML = data[1];
      emp_time.innerHTML = data[2];
      emp_timeout.innerHTML = data[3];
      emp_date.innerHTML = data[4];
      emp_status.innerHTML = data[5];
      emp_statusout.innerHTML = data[6];
      image.src = "Attendance System/" + data[7][0];
    },
  });
}

function insert(id) {
  $.ajax({
    type: "Post",
    url: "include/functions.php",
    data: {
      action: "insert",
      id: id,
    },

    success: function (data) {

      data = jQuery.parseJSON(data);
      details = data;
      display(id);
      modal(id);
    },
  });
}
