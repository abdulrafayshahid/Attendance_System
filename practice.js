function calendar(user_id, month1, year1) {

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

        },
    });
    var my_date = (year1 + "-" + month1 + "-1").split("-");
    var year = parseInt(my_date[0]);
    var month = parseInt(my_date[1]) - 1;

    var sundays = [];

    for (var i = 1; i <= new Date(year, month, 0).getDate(); i++) {
        var date = new Date(year, month, i);

        if (date.getDay() == 1) {
            let ohho = date.getUTCDate();
            sundays.push(ohho);

        }
    }
    var my_date = (year1 + "-" + month1 + "-1").split("-");
    var year = parseInt(my_date[0]);
    var month = parseInt(my_date[1]) - 1;

    var sundays = [];

    for (var i = 1; i <= new Date(year, month, 0).getDate() + 2; i++) {
        var date = new Date(year, month, i);

        if (date.getDay() == 1) {
            let ohho = date.getUTCDate();
            if ((sundays[sundays.length - 1]) > ohho && sundays.length != 1) {
                break
            } else {
                sundays.push(ohho.toString());
            }


        }

    }

    if (Number(sundays[0]) > Number(sundays[sundays.length - 1])) {
        sundays.shift();
    }
    $.ajax({
        type: "Post",
        url: "include/functions.php",
        data: {
            action: "get_display8",
            month1: month1,
            year1: year1,
            user_id: user_id
        },

        success: function (su) {

            su = JSON.parse(su);
            console.log(su);



            console.log(su[0][0]);
            let td = document.getElementsByTagName("td");
            var count1 = 0;
            for (var i = 0; i < td.length; i++) {
                console.log(su[count1][0]);
                var new1 = su[count1][0];

                if (td[i].innerHTML == new1) {
                    console.log(td[i]);
                    if (a[count1].attendance == "Present") {
                        td[i].classList.add("table-dark");
                    } else if (a[count1].attendance == "Absent") {
                        td[i].classList.add("table-danger");
                    }
                }

                count1++;
            }
            // let flag = "false";
            // let count = 0;
            // for (let i = 0; i < td.length; i++) {
            //     if (td[i].innerHTML == "1") {
            //         flag = true;

            //         if (sundays.includes(td[i].innerHTML)) {
            //             td[i].classList.add("table-secondary");
            //         }
            //     } else if (td[i].innerHTML == "") {
            //         flag = "false";
            //     }
            //     if (flag == true) {
            //         if (sundays.includes(td[i].innerHTML)) {
            //             td[i].classList.add("table-secondary");
            //         }
            //         if (a[count] == "Late" && sundays.includes(td[i].innerHTML) == false) {
            //             td[i].classList.add("table-primary");
            //             count++;
            //         } else if (a[count] == "On Time" && sundays.includes(td[i].innerHTML) == false) {
            //             td[i].classList.add("table-success");
            //             count++;
            //         } else if (a[count] == "Absent" && sundays.includes(td[i].innerHTML) == false) {
            //             td[i].classList.add("table-danger");
            //             count++;
            //         } else if (a[count] == "Present" && sundays.includes(td[i].innerHTML) == false) {
            //             td[i].classList.add("table-warning");
            //             count++;
            //         }
            //     }
            // }
            let array = [];
            let all_td = document.getElementsByTagName("td");
            for (let i = 0; i < td.length; i++) {
                if (td[i].classList.contains("table-warning")) {
                    array.push(i);
                }
            }
            $.ajax({
                type: "Post",
                url: "include/functions.php",
                data: {
                    action: "get_presents",
                    month1: month1,
                    year1: year1,
                    user_id: user_id
                },
                success: function (data) {
                    data = JSON.parse(data);
                    let count = 0;
                    for (let i = 0; i < data.length; i++) {
                        let td = array[count];
                        if (data[i].Status == "Late" || data[i].Signout_Status == "Early Going") {
                            all_td[td].classList.add("table-primary");
                            all_td[td].classList.remove("table-dark");
                            count++;
                        } else {
                            all_td[td].classList.add("table-success");
                            all_td[td].classList.remove("table-dark");
                            count++;
                        }
                    }
                },
            });
        }
    });
}