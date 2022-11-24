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
            <h1 style="color: yellow;font-size: 35px">Quản trị viên</h1>
            <h1 style="font-size: 35px;margin-left: 200px;"><?php echo date('M d,Y | H:i'); ?></h1>
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
                            @foreach ($teachernumber as $key => $item)
                            <h1 id="teacherCount">
                            @if ($item->teacher<10)
                                {{0}}{{$item->teacher}}   
                            @else
                            {{$item->teacher}}   
                            @endif
                            </h1>
                            @endforeach
                            
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
                            @foreach ($classlist as $key => $item)
                            <h1 id="examCount">
                            @if ($item->class<10)
                                {{0}}{{$item->class}}   
                            @else
                            {{$item->class}}  
                            @endif
                            </h1>
                            @endforeach
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
                            @foreach ($studentnumber as $key => $item)
                            <h1 id="studentCount">
                            @if ($item->student<10)
                                {{0}}{{$item->student}}   
                            @else
                            {{$item->student}}  
                            @endif
                            </h1>
                            @endforeach
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
                            @foreach ($notice as $key => $item)
                            <h1 id="mediaCount">
                            @if ($item->notice<10)
                                {{0}}{{$item->notice}}   
                            @else
                            {{$item->notice}}  
                            @endif
                            </h1>
                            @endforeach
                            <p>Thông báo</p>
                        </div>
                    </div>
                    <div class="column column-right">
                        <i class="fa fa-bell"></i>
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
                            @foreach ($subject as $key => $item)
                            <h1 id="subjectsCount">
                            @if ($item->subject<10)
                                {{0}}{{$item->subject}}   
                            @else
                            {{$item->subject}}  
                            @endif
                            </h1>
                            @endforeach
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
                            @foreach ($mark as $key => $item)
                            <h1 id="scoresCount">
                            @if ($item->mark<10)
                                {{0}}{{$item->mark}}   
                            @else
                            {{$item->mark}}  
                            @endif
                            </h1>
                            @endforeach
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
                            @foreach ($exam as $key => $item)
                            <h1 id="scheduleCount">
                            @if ($item->exam<10)
                                {{0}}{{$item->exam}}   
                            @else
                            {{$item->exam}}  
                            @endif
                            </h1>
                            @endforeach
                            <p>Lịch kiểm tra</p>
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
                    @foreach ($teacherListMale as $key => $item)
                    <h1 id="fetchFemale_teacher_count">
                    @if ($item->Male<10)
                        {{0}}{{$item->Male}}   
                    @else
                    {{$item->Male}}  
                    @endif
                    </h1>
                    @endforeach
                </div>
                <div class="chart_footer_right">
                    <hr>
                    <span style="color: black">Số giáo viên nữ :</span>
                    @foreach ($teacherListFemale as $key => $item)
                    <h1 id="fetchMale_teacher_count">
                    @if ($item->Female<10)
                        {{0}}{{$item->Female}}   
                    @else
                    {{$item->Female}}  
                    @endif
                    </h1>
                    @endforeach
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
                        @foreach ($studentListMale as $key => $item)
                            <h1 id="fetchMale_count">
                            @if ($item->Male<10)
                                {{0}}{{$item->Male}}   
                            @else
                            {{$item->Male}}  
                            @endif
                            </h1>
                            @endforeach
                    </div>
                    <div class="chart_footer_right">
                        <hr>
                        <span style="color: black">số sinh nữ :</span>
                        @foreach ($studentListFemale as $key => $item)
                        <h1 id="fetchFemale_count">
                        @if ($item->Female<10)
                            {{0}}{{$item->Female}}   
                        @else
                        {{$item->Female}}  
                        @endif
                        </h1>
                        @endforeach
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
<script>
    var ctx2 = document.getElementById("mychart2").getContext("2d");
var myChart = new Chart(ctx2, {
  type: "pie",
  data: {
    labels: ["Giáo viên nam", "Giáo viên nữ"],
            datasets: [
                
                {
                data: <?php echo json_encode($data2) ?>,
                backgroundColor: ["#E97777", "#FAC213"],
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
            labels: ["Sinh viên nam", "sinh viên nữ"],
            datasets: [
                {
                data: <?php echo json_encode($data1) ?>,
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
    
  },
});
var ctx4 = document.getElementById("mychart4").getContext("2d");
    var myChart = new Chart(ctx4, {
    type: "doughnut",
    data: {
            labels: ["dưới 2.00", "2.00 – 2.49","2.50 – 3.19","3.20 – 3.59","3.60 – 4.00"],
            datasets: [
                {   
                data:  <?php echo json_encode($GPA) ?>,
                backgroundColor: ['#7D6E83', 'Orange', 'Yellow', 'Green', 'Blue'],
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
      position: "bottom", 
      align: "end", 
      labels: {
        fontColor: "red",
        fontSize: 16,
        boxWidth: 20,
      },
    },
    
  },
});
var ctx5 = document.getElementById("mychart5").getContext("2d");
    var myChart = new Chart(ctx5, {
    type: 'bar',
    
    data: {
            labels: ["nguy cơ nghỉ học","cảnh báo học vụ","thiếu tín chỉ","thiếu học phí","khen thưởng","rèn luyện tốt"],
            datasets: [
                {
                label:'Population',
                data: <?php echo json_encode($status) ?>,
                backgroundColor: ["red", "orange", "blue", "#B20600", "#46244C", "#557B83"],
                borderWidth: 1,
                borderColor:'#777',
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
        display:true,
          position:'right',
          labels:{
            fontColor:'white'
      },
    },
    
  },
});
</script>   
@endsection