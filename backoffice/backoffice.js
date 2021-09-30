var today = new Date();
var months = [
              "January", "February", "March", "April", "May",
              "June", "July","August","September", "October",
              "November", "December"
            ];

var days = [
            "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
            "Friday", "Saturday"
];

var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var year = today.getFullYear();
var month = today.getMonth();
var dayNumber = today.getDate();
var day = today.getDay();
var dayName = days[day];
var monthName = months[month];

var day_cell = document.getElementById("day").innerHTML = dayName;
var date_cell = document.getElementById("date").innerHTML = dayNumber+" "+monthName+" "+year;

function DisplayTime() {
    var date = new Date();
    var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
    var am_pm = date.getHours() >= 12 ? "PM" : "AM";
    hours = hours < 10 ? "0" + hours : hours;
    var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
    var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
    var time_container = document.createElement("span");
    time_container.setAttribute("id","time_container");
    time_container.innerHTML = hours + ":" + minutes + ":" + seconds;
    var am_pm_container = document.createElement("span");
    am_pm_container.innerHTML = am_pm;
    am_pm_container.setAttribute("id","am_pm");
    time = hours + ":" + minutes + ":" + seconds + " " + am_pm;
    document.getElementById("time").innerHTML="";
    document.getElementById("time").appendChild(time_container);
    document.getElementById("time").appendChild(am_pm_container);
};

DisplayTime();

window.setInterval(function(){
    var date = new Date();
    var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
    var am_pm = date.getHours() >= 12 ? "PM" : "AM";
    hours = hours < 10 ? "0" + hours : hours;
    var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
    var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
    var time_container = document.createElement("span");
    time_container.setAttribute("id","time_container");
    time_container.innerHTML = hours + ":" + minutes + ":" + seconds;
    var am_pm_container = document.createElement("span");
    am_pm_container.innerHTML = am_pm;
    am_pm_container.setAttribute("id","am_pm");
    time = hours + ":" + minutes + ":" + seconds + " " + am_pm;
    document.getElementById("time").innerHTML="";
    document.getElementById("time").appendChild(time_container);
    document.getElementById("time").appendChild(am_pm_container);

}, 1000);

