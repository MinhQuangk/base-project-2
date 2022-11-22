@extends('layout.index')
@section('student')
<div class="body">
    <div class="title">
      <h1>Thông tin sinh viên</h1>
    </div>
    <div class="container">
      <div class="info">
        <div class="imgInfo">
          @if ($detail->s_gender=='Nam')
          <img src="{{ asset('font/img/male-icon.png') }}">
          @else
          <img src="{{ asset('font/img/female-icon.png') }}">
          @endif
        </div>
        <div class="main_info">
          <h2 style=" padding-top: 10px; font-size: 25px;">Thông tin cá nhân</h2>
          <div class="leftInfo">
            <label>Mã sinh viên: </label>
            <h3>{{$detail->s_id }}</h3>
            <label>Họ và tên: </label>
            <h3>{{$detail->s_name }}</h3>
            <label>Ngày sinh: </label>
            <h3>{{$detail->birthday }}</h3>
            <label>Quê quán: </label>
            <h3>{{$detail->s_address }}</h3>
          </div>
          <div class="rightInfo">
            <label>Lớp: </label>
            <h3>{{$detail->s_class }}</h3>
            <label>Khoa: </label>
            <h3>{{$detail->department }}</h3>
            <label>Giới tính: </label>
            <h3>{{$detail->s_gender }}</h3>
            <label>Số điện thoại: </label>
            <h3>{{$detail->s_phone }}</h3>
            <label>Email: </label>
            <h3>{{$detail->S_email }}</h3>
          </div>
        </div>
      </div>
      <div class="score">
        <h2 style="text-align: center; padding-top: 10px; font-size: 25px">Điểm số</h2>
        <label>Tổng số tính chỉ đã đăng ký: </label>
        <h3>{{$detail->credits }}/168</h3>
        <progress min="0" max="50" value="{{$detail->credits }}"></progress>
        <label>Điểm trung bình: </label>
        <h3>{{$detail->average }}</h3>
        <label>Điểm rèn luyện: </label>
        <h3>{{$detail->point_training }}</h3>
        <label>Điểm GPA: </label>
        <h3>{{$detail->GPA }}</h3>
        <label>Thành tích: </label>
        <h3>{{$detail->achievements }}</h3>
        <label>Trạng thái: </label>
        <h3>{{$detail->status }}</h3>
      </div>
    </div>
  </div>
@endsection