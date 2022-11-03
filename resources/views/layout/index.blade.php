<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>School Management System</title>
    <link href="{{ asset('font/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/students.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/dashboard2.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/teacher.css') }}" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <section class="admin-top">
        <div class=row>
            <div class="admin-left" id="slideNav">
                <div class="admin">
                    <img src="{{ asset('font/img/yasua.jpg') }}" alt="profile picture" />
                    <h4 style="text-align:center;">T.D.V.Thiên</h4>
                </div>
                <div class="tab">
                    <div class="tablinks" id="defaultOpen" onclick="openTab(event,'dashboard_top')">
                        <i class="fas fa-tachometer-alt"></i>
                        <h4>Trang chủ</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'teacher_top')">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <h4>Giảng viên</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'student')">
                        <i class="fas fa-user"></i>
                        <h4>Sinh viên</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'subjects')">
                        <i class="fas fa-plus-circle"></i>
                        <h4>Môn học</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'scores')">
                        <i class="fas fa-print"></i>
                        <h4>Điểm số</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'schedule')">
                        <i class="fas fa-clock"></i>
                        <h4>Thời khóa biểu</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'media')">
                        <i class="fas fa-video"></i>
                        <h4>Danh bạ điện thoại</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'expenses')">
                        <i class="fas fa-money-check-alt"></i>
                        <h4>Học phí</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'exams')">
                        <i class="fas fa-graduation-cap"></i>
                        <h4>Exam</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'map')">
                        <i class="fas fa-map-marker-alt"></i>
                        <h4>Vị trí</h4>
                    </div>
                </div>
            </div>

            <!-- right side of dashboard start here ======== -->
            <div class="admin-right" id="admin-right">
                <div class="header">
                    <div class="header-left">
                        <i onclick="menuAnimation()" class="fas fa-bars"></i>
                    </div>
                    <div class="header-right">Admin</div>
                </div>
                <div id="dashboard_top" class="tabcontent">
                    @include('layout.assets.dashboard');
                </div>
                <div id="teacher_top" class="tabcontent">
                    @include('layout.assets.teachers');
                </div>
                <div id="student" class="tabcontent">
                    @include('layout.assets.students');
                </div>
                <div id="subjects" class="tabcontent">
                    <h2>Subjects content</h2>
                </div>
                <div id="scores" class="tabcontent">
                    <h2>Scores content</h2>
                </div>
                <div id="schedule" class="tabcontent">
                    <h2>Schedule content</h2>
                </div>
                <div id="media" class="tabcontent">
                    <h2>Media content</h2>
                </div>
                <div id="expenses" class="tabcontent">
                    <h2>expenses content</h2>
                </div>
                <div id="exams" class="tabcontent">
                    <h2>Exams content</h2>
                </div>
                <div id="map" class="tabcontent">
                    <h2>Map content</h2>
                </div>
            </div>
        </div>
    </section>
<script>
    function menuAnimation(){
        var element = document.getElementById("slideNav");
        var element1 = document.getElementById("admin-right");
        if(element && element1){
            element.classList.toggle("navSlide");
            element1.classList.toggle("navSlide1");
        }
    }
</script>
</body>


<script src="{{ asset('font/js/app.js') }}"></script>
<script src="{{ asset('font/js/teachers.js') }}"></script>
<script src="{{ asset('font/js/students.js') }}"></script>

<script>
    var ctx2 = document.getElementById("mychart2").getContext("2d");
var myChart = new Chart(ctx2, {
  type: "pie",
  data: {
    labels: ["Giáo viên nam", "Giáo viên nữ"],
            datasets: [
                {
                data: [8, 9],
                backgroundColor: ["#FEF9A7", "#FAC213"],
                borderWidth: 1,
            }, 
        ],
        },
        options: {
    responsive: false,
    
    layout: {
      padding: {
        left: 0,
        right: 0,
        top: 0,
        bottom: 0,
      },
    },
    legend: {
      display: false,
      position: "bottom", // top left bottom right
      align: "end", // start end center
      labels: {
        fontColor: "red",
        fontSize: 16,
        boxWidth: 20,
      },
    },
    title: {
      display: true,
      text: "Custom Chart Title",
      position: "bottom",
      fontSize: 25,
      fontFamily: "Comic Sans MS",
      fontColor: "red",
      fontStyle: "bold italic",
      padding: 20,
      lineHeight: 5,
    },
  },
    });

    var ctx3 = document.getElementById("mychart3").getContext("2d");
    var myChart = new Chart(ctx3, {
    type: "doughnut",
    data: {
            labels: ["Male Students", "Female Students"],
            datasets: [
                {
                data: [20, 40],
                backgroundColor: ["#231955", "#1F4690"],
                borderWidth: 1,
            }, 
        ],
        },
        options: {
    responsive: false,
    // scales: {
    //     y: {
    //         beginAtZero: true
    //     }
    // }
    layout: {
      padding: {
        left: 0,
        right: 0,
        top: 0,
        bottom: 0,
      },
    },
    legend: {
      display: false,
      position: "bottom", // top left bottom right
      align: "end", // start end center
      labels: {
        fontColor: "red",
        fontSize: 16,
        boxWidth: 20,
      },
    },
    // title: {
    //   display: true,
    //   text: "Custom Chart Title",
    //   position: "bottom",
    //   fontSize: 25,
    //   fontFamily: "Comic Sans MS",
    //   fontColor: "red",
    //   fontStyle: "bold italic",
    //   padding: 20,
    //   lineHeight: 5,
    // },
  },
});
    // var ctx4 = document.getElementById("mychart4").getContext("2d");
    // var myChart4 = new Chart(ctx4, {
    //     type: "line",
    //     data: {
    //         labels:[
    //             "Tháng 1",
    //             "Tháng 2",
    //             "Tháng 3",
    //             "Tháng 4",
    //             "Tháng 5",
    //             "Tháng 6",
    //             "Tháng 7",
    //             "Tháng 8",
    //             "Tháng 9",
    //             "Tháng 10",
    //             "Tháng 11",
    //             "Tháng 12",

    //         ],
    //     datasets: [
    //         {
    //             data:[1345, 19, 56, 4, 56, 54, 45, 345, 456, 767, 554, 276],
    //             backgroundColor:"rgba(240, 202, 24, 0.7",
    //             borderWidth: 1,
    //         },
    //         ],
    //     },
    //     options: {
    //         responsive: true,
    //         legend: {
    //             display: true,
    //             position:"bottom", // top left bottom right
    //             align:"end",        //start end center
    //             labels: {
    //                 fontColor: "red",
    //                 fontSize: 16,
    //                 boxWidth: 20,
    //             },
    //         },
    //         //Configure ToolTips
    //         tooltips: {
    //         enabled: true, //Enable/Disable ToolTip by Default Its True
    //         backgroundColor:"rgba(247,202,24,1)", //Set ToolTip Background Color
    //         titleFontFamily: "Comic Sans MS", //Set Tooltip Title font Family
    //         titleFontSize: 30, //Set Tooltip font size
    //         titleAlign: "center",
    //         titleSpacing: 3,
    //         titleMarginBottom: 20,
    //         bodyFontSize: 20,
    //         bodyFontColor:"red",
    //         bodyAlign: "center",
    //         bodySpacing: 2,

    //     },
    //     },
    // });
</script>

</html>