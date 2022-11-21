@extends('layout.index')
@section('scores')
<div class="scores_section">
    <div class="scores_tab">
        <h1>thông tin điểm số</h1>
    </div>
   
    <!-- chức năng thêm sinh viên -->
    <div id="add_scores" class="scores_tabcontent" style="display: block">
        <form autocomplete="off" id="formData" method="POST" action="{{ route('admin.addUpdateMark')}}">
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;"> Chỉnh sửa Điểm số</h2>
            <div class="first_last_name">
                <span class="f_left">
                    <label for="fname">Khoa</label>
                    <input type="text" id="sc_name" name="department" value="{{old('department') ??$detail->department }}" disabled style="background-color: rgb(154, 212, 214)">

                </span>
                <span class="l_right">
                    <label for="lname">Mã sinh viên</label>
                    <input type="text" id="sc_name" name="s_id" value="{{old('s_id') ??$detail->s_id }}" disabled style="background-color: rgb(154, 212, 214)">
                </span>
            </div>
            <label for="s_address">Lớp</label>
            <input type="text" id="sc_class" name="s_class" value="{{old('s_class') ??$detail->s_class }}" disabled style="background-color: rgb(154, 212, 214)">

            <label for="subject">Mã môn học</label>
            <input type="text" id="sc_subject" name="sbj_id" value="{{old('sbj_id') ??$detail->sbj_id }}" disabled style="background-color: rgb(154, 212, 214)">

            <label for="sc_scores">Điểm</label>
            <input type="text" id="sc_scores" name="mark" value="{{old('mark') ??$detail->mark }}">

            <label for="sc_day">Hình thức kiểm tra</label>
            <input type="text" id='type' name="type" value="{{old('type') ??$detail->type }}" disabled style="background-color: rgb(154, 212, 214)">
            <input type="submit" id="sub_scores_btn">
        </form>
    </div>
</div>

@endsection