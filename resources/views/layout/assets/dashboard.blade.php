@extends('layout.index')
@section('dashboard')
<section class="dashboard">
    <div class="welcome_admin" style="display: flex; align-items: center;justify-content: space-between;">
        <h1 style="padding: 1% 4%; font-size:34px; color:#000; width:20%">Dashboard</h1>
        <div class="welcome_admin_message" style="width: 80%;display:flex; align-items: center;background-color: rgb(20, 126, 164);color: #fff;padding: 20px;margin: 15px 0px">
            <h1 style="margin: 0px 15px;">
                @php
                $time = date("H");
                if($time < "12"){
                    echo"Good Morning";
                }else if($time >="12" && $time < "17"){
                    echo "Good Afternoon";
                }else if($time >="17" && $time < "19"){
                    echo "Good Evening";
                }else if($time >= "19"){
                    echo "Good Night";
                }
                @endphp
            </h1>
            <h1 style="color: yellow;font-size: 35px">Văn Thiên</h1>
            <h1 style="font-size: 35px;margin-left: 200px;"><?php echo date('M d,Y'); ?></h1>
        </div>
    </div>
    <div class="cover-img"> 
    <img src="{{ asset('font/img/schooling.jpg') }}" alt="cover image">
    <span class="text">
        <h1>Student management system</h1>
        <p>Education is our passport to the futute, for tomorow belongs to the<br>
            people who prepare for it today</p>
    </span>
    </div>
</section>
<section class="all-info">
    <div class="row">
        <div class="col">
            <div id="teacher" class="card">
                <div class="teacher-inner">
                    <div class="column column-left">
                        <div class="column-left-inner">
                            <h1 id="teacherCount">01</h1>
                            <p>Giảng viên</p>
                        </div>
                    </div>
                    <div class="column column-right">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>
                <div class="teacher-footer">
                    <a href="#">More info <i class="fas fa-angle-double-alt"></i></a>
                </div>
            </div>
            <div id="attendance" class="card">
                <div class="attendance-inner">
                    <div class="column column-left">
                        <div class="column-left-inner">
                            <h1 id="examCount">01</h1>
                            <p>Lớp</p>
                        </div>
                    </div>
                    <div class="column column-right">
                        <i class="fas fa-inbox"></i>
                    </div>
                </div>
                <div class="teacher-footer">
                    <a href="#">More info <i class="fas fa-angle-double-alt"></i></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div id="student" class="card">
                <div class="student-inner">
                    <div class="column column-left">
                        <div class="column-left-inner">
                            <h1 id="studentCount">01</h1>
                            <p>Sinh viên</p>
                        </div>
                    </div>
                    <div class="column column-right">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="student-footer">
                    <a href="#">More info <i class="fas fa-angle-double-alt"></i></a>
                </div>
            </div>
            <div id="media" class="card">
                <div class="media-inner">
                    <div class="column column-left">
                        <div class="column-left-inner">
                            <h1 id="mediaCount">01</h1>
                            <p>Danh bạ</p>
                        </div>
                    </div>
                    <div class="column column-right">
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
                <div class="media-footer">
                    <a href="#">More info <i class="fas fa-angle-double-alt"></i></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div id="subjects" class="card">
                <div class="subjects-inner">
                    <div class="column column-left">
                        <div class="column-left-inner">
                            <h1 id="subjectsCount">01</h1>
                            <p>Môn học</p>
                        </div>
                    </div>
                    <div class="column column-right">
                        <i class="fa fa-book"></i>
                    </div>
                </div>
                <div class="subjects-footer">
                    <a href="#">More info <i class="fas fa-angle-double-alt"></i></a>
                </div>
            </div>
            <div id="scores" class="card">
                <div class="scores-inner">
                    <div class="column column-left">
                        <div class="column-left-inner">
                            <h1 id="scoresCount">01</h1>
                            <p>Điểm học phần</p>
                        </div>
                    </div>
                    <div class="column column-right">
                        <i class="fas fa-print"></i>
                    </div>
                </div>
                <div class="scores-footer">
                    <a href="#">More info <i class="fas fa-angle-double-alt"></i></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div id="schedule" class="card">
                <div class="schedule-inner">
                    <div class="column column-left">
                        <div class="column-left-inner">
                            <h1 id="scheduleCount">01</h1>
                            <p>Lịch học</p>
                        </div>
                    </div>
                    <div class="column column-right">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="schedule-footer">
                    <a href="#">More info <i class="fas fa-angle-double-alt"></i></a>
                </div>
            </div>
            <div id="expenses" class="card">
                <div class="expenses-inner">
                    <div class="column column-left">
                        <div class="column-left-inner">
                            <h1 id="expensesCount">01</h1>
                            <p>Học phí</p>
                        </div>
                    </div>
                    <div class="column column-right">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                </div>
                <div class="expenses-footer">
                    <a href="#">More info <i class="fas fa-angle-double-alt"></i></a>
                </div>
            </div>
        </div>  
    </div>
</section>
<section class="chart">
    <div class="row_1">
        <div class="chart_left_row_1">
            <h1>Thống kê số lượng giáo viên</h1>
            <button onclick="window.location.reload()">Refresh</button>
            <canvas id="mychart2" width="400" height="400"></canvas>
            <div class="chart_footer">
              <div class="row_1">
                <div class="chart_footer_left">
                    <hr>
                    <span style="color: black">Số giáo viên nam :</span>
                    <h1 id="fetchFemale_teacher_count">00</h1>
                </div>
                <div class="chart_footer_right">
                    <hr>
                    <span style="color: black">Số giáo viên nữ :</span>
                    <h1 id="fetchMale_teacher_count">00</h1>
                </div>
              </div>  
            </div>
        </div>
        <div class="chart_right_row_1">
            <div class="top_male_female_count">
                <h1>Thống kê số lượng sinh viên</h1>
                <button onclick="window.location.reload()">Refresh</button>
            </div>
            <canvas id="mychart3" width="400" height="400"></canvas>
            <div class="chart_footer">
                <div class="row_1">
                    <div class="chart_footer_left">
                        <hr>
                        <h1 id="fetchChartData"></h1>
                        <span style="color: black">số sinh viên nam :</span>
                        <h1 id="fetchFemale_count">00</h1>
                    </div>
                    <div class="chart_footer_right">
                        <hr>
                        <span style="color: black">số sinh nữ :</span>
                        <h1 id="fetchMale_count">00</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row_2">
       
        <div class="chart_left_row_2">
            <h1>Thống kê điểm GPA sinh viên</h1>        
            <canvas id="mychart4" width="400" height="400"></canvas>
        </div>
    </div>
     <div class="chart-bottom" >
        <div class="chart-statistical">
            <h1 style="color: black">Thống kê dữ liệu học kỳ 1</h1>
            <canvas id="mychart5"></canvas>
        </div>
    </div>  
</section>    
@endsection