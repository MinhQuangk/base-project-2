<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>School Management System</title>
    <link href="{{ asset('font/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/admin2.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/students.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/dashboard2.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/teacher.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/exam.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/editS.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/editT.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/schedule.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/noctices.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/subjects.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/class.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/scores.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       {{-- <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> --}}
    
</head>

<body>
   
   <section class="admin-top">
    <div class=row>
        <div class="admin-left" id="slideNav">
            <div class="admin">
                <img src="{{ asset('font/img/yasua.jpg') }}" alt="profile picture" />
                <h4 style="text-align:center;">Vũ Minh Quang</h4>
            </div>
            <div class="tab">
                <div class="tablinks" id="defaultOpen" onclick="openTab(event,'dashboard_top')">
                    <i class="fas fa-tachometer-alt"></i>
                    <a href="{{ route('admin.dashboard') }}"><h4>Trang chủ</h4></a>
                </div>
                <div class="tablinks" onclick="openTab(event,'teacher_top')">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h4><a href="{{ route('admin.teacher') }}">Giảng viên</a></h4>
                </div>
                <div class="tablinks" onclick="openTab(event,'students')">
                    <i class="fas fa-user"></i>
                    <a href="{{ route('admin.showStudent') }}"><h4>Sinh viên</h4></a>
                </div>
                <div class="tablinks" onclick="openTab(event,'subjects')">
                    <i class="fas fa-plus-circle"></i>
                    <a href="{{ route('admin.Subject') }}">
                      <h4>Môn học</h4>
                    </a>
                </div>
                <div class="tablinks" onclick="openTab(event,'scores')">
                    <i class="fas fa-print"></i>
                    <a href="{{ route('admin.Mark') }}">
                      <h4>Điểm số</h4>
                    </a>
                </div>
                <div class="tablinks" onclick="openTab(event,'schedules')">
                    <i class="fas fa-clock"></i>
                    <a href="{{ route('admin.schedule') }}">
                      <h4>Thời khóa biểu</h4>
                    </a>
                </div>
                <div class="tablinks" onclick="openTab(event,'media')">
                  <i class="fas fa-inbox"></i>
                  <a href="{{ route('admin.Class') }}">
                    <h4>Lớp</h4>
                  </a>
                </div>
                <div class="tablinks" onclick="openTab(event,'exams')">
                    <i class="fas fa-graduation-cap"></i>
                    <a href="{{ route('admin.Exam') }}"><h4>Exam</h4></a>
                </div>
                <div class="tablinks" onclick="openTab(event,'notice')">
                    <i class="fas fa-bullhorn" ></i>
                    <a href="{{ route('admin.noctices') }}">
                      <h4>Thông báo và khảo sát</h4>
                    </a>
                </div>
            </div>
        </div>

        <!-- right side of dashboard start here ======== -->
        <div class="admin-right" id="admin-right">
          <div class="header">
            <div class="header-left">
              <i onclick="menuAnimation()" class="fas fa-bars"></i>
            </div>
            <div class="header-right">
              <div class="header-right-inner-right">
                <img src="{{ asset('font/img/yasua.jpg') }}" onclick="admin()" class="adminImg" alt="Profile Image" />
                <div id="admin_details" class="admin_details">
                  <nav>
                    <ul>
                      <li>
                        <a href="">
                          <ion-icon name="help-circle-outline"></ion-icon>
                          Admin
                        </a>  
                      </li>
                      <li>
                        <a href="{{ route('admin.logout') }}">
                          <ion-icon name="log-out-outline"></ion-icon>
                          Đăng xuất
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
            <div id="dashboard_top" class="tabcontent">
                @yield('dashboard')
            </div>
            <div id="teacher_top" class="tabcontent">
                {{-- @include('layout.assets.teachers') --}}
                @yield('teacher')
            </div>
            <div id="students" class="tabcontent" >
                {{-- @include('layout.assets.students')     --}}
                @yield('student')
            </div>
            <div id="subjects" class="tabcontent">
              @yield('subjects')
            </div>
            <div id="scores" class="tabcontent">
              @yield('scores')
            </div>
            <div id="schedule" class="tabcontent">
              @yield('schedule')
            </div>
            <div id="media" class="tabcontent">
              @yield('class')
            </div>
            <div id="exams" class="tabcontent">
               {{-- @include('layout.assets.exam'); --}}
               @yield('exam')
            </div>
            <div id="notice" class="tabcontent">
              @yield('noctices')
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
<script src="{{ asset('font/js/exam.js') }}"></script>
<script src="{{ asset('font/js/subjects.js') }}"></script>
<script src="{{ asset('font/js/expenses.js') }}"></script>
<script src="{{ asset('font/js/class.js') }}"></script>
<script src="{{ asset('font/js/scores.js') }}"></script>


</html> 