<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>School Management System</title>
    <link href="{{ asset('font/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/dashboard.css') }}" rel="stylesheet">
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
                        <span class="tooltip">Trang chủ</span>
                        <h4>Trang chủ</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'teacher_top')">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span class="tooltip">Giảng viên</span>
                        <h4>Giảng viên</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'student')">
                        <i class="fas fa-user"></i>
                        <span class="tooltip">Sinh viên</span>
                        <h4>Sinh viên</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'subjects')">
                        <i class="fas fa-plus-circle"></i>
                        <span class="tooltip">Môn học</span>
                        <h4>Môn học</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'scores')">
                        <i class="fas fa-print"></i>
                        <span class="tooltip">Điểm số</span>
                        <h4>Điểm số</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'schedule')">
                        <i class="fas fa-clock"></i>
                        <span class="tooltip">Thời khóa biểu</span>
                        <h4>Thời khóa biểu</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'media')">
                        <i class="fas fa-video"></i>
                        <span class="tooltip">Danh bạ</span>
                        <h4>Danh bạ điện thoại</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'expenses')">
                        <i class="fas fa-money-check-alt"></i>
                        <span class="tooltip">Học phí</span>
                        <h4>Học phí</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'exams')">
                        <i class="fas fa-graduation-cap"></i>
                        <span class="tooltip">Exam</span>
                        <h4>Exam</h4>
                    </div>
                    <div class="tablinks" onclick="openTab(event,'map')">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="tooltip">Vị trí</span>
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
                    <div class="header-right">haha</div>
                </div>
                <div id="dashboard_top" class="tabcontent">
                    @include('layout.assets.dashboard');
                </div>
                <div id="teacher_top" class="tabcontent">
                    <h2>teacher content</h2>
                </div>
                <div id="student" class="tabcontent">
                    <h2>Student content</h2>
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
</html>