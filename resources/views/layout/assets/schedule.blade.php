@extends('layout.index')
@section('schedule')
    <div class="container">
        <h3>Lịch học</h3>
    </div>
    <div class="name">
        <p>Học Kỳ:Năm 2 (2022-2023)</p>
    </div>
    <div class="section">
        <p>Lớp: AAA01</p>
    </div>
    <table>
        <thead>
            <th></th>
            <th>Thứ hai</th>
            <th>Thứ ba</th>
            <th>Thứ tư</th>
            <th>Thứ năm</th>
            <th>Thứ sáu</th>
            <th>Thứ bảy</th>
            <th>Chủ nhật</th>
        </thead>
        <tbody>
            <tr>
                <th>Tiết 1</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th rowspan="2" style="background-color: #335237; color: white;">Vật lý (11)<p>K.A112</p></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tiết 2</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tiết 3</th>
                <th class="t3" rowspan="2" style="background-color: #494E31; color: white;">Tiếng anh nâng <br> cao 1(6)<p>K.A112</p></th>
                <th class="t2" rowspan="2" style="background-color: #523333; color: white;">Tiếng anh 3(4)<p>K.A113</p></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tiết 4</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tiết 5</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tiết 6</th>
                <th rowspan="2" style="background-color: #324451; color: white;">Công nghệ và lập <br> trình web (11)<p>K.A103</p></th>
                <th rowspan="2" style="background-color: #335237; color: white;">Giải tích 2(11)<p>K.A113</p></th>
                <th rowspan="3" style="background-color: #334B52; color: white;">Phân tích và thiết kế <br>hệ thống (11)</p>K.B208</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tiết 7</th>
                <th></th>
                <th rowspan="2" style="background-color: #4D4430; color: white;" >GDTC 3 (Cầu lông) (9) <p>K.T3TTSV.CL1</p></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tiết 8</th>
                <th></th>
                <th></th>
                <th rowspan="2" style="background-color: #52334D; color: white;">Công nghê và lập trình <br> web(11)_Nhóm 2 <p>K.B208</p></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tiết 9</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tiết 10</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tbody>
    </table>
    <div class="poster">

    </div>

@endsection