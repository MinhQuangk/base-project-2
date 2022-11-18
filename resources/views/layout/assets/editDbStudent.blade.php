@extends('layout.index')

@section('student')
    {{-- cập nhật sinh viên --}}
    <div class="student_section">
        <div class="student_tab">
            <h1>Thông tin sinh viên</h1>
            <div class="student_tab_inner">
               <a href="{{ route('admin.showStudent') }}">Quay lại</a>
            </div>
        </div>
        <!-- Chức năng xem thông tin sinh viên -->
        <!-- chức năng thêm giảng viên -->
        <div id="add_student" class="student_tabcontent_1">
            <form autocomplete="off" id="formData" method="POST" action="{{ route('admin.addUpdateS')}}" >
                @csrf
                <h2 style="font-family: Arial, Helvetica, sans-serif;">Cập nhật</h2>
                <div class="first_last_name">
                    <!-- Họ và tên -->
                   
                    <span class="f_left">
                        <label for="fname">Họ và tên</label>
                        <input type="text" id="fname" name="s_name" value="{{old('s_name') ??$detail->s_name }}" >
                       
                    </span>
                    <!-- Năm sinh -->
                    <span class="l_right">
                        <label for="lname">Ngày sinh</label>
                        <input type="datetime" id="lname" name="birthday" value="{{old('birthday') ??$detail->birthday}}" >
                    </span>
                </div>
                <label for="s_address">Quê quán</label>
                <input type="text" id="s_address" name="s_address" value="{{old('s_address')  ??$detail->s_address}}" >
    
                <label for="department">Khoa</label>
                <input type="text" id="s_qualification" name="department" value="{{old('department') ??$detail->department}}" >
                
                <label for="s_class">lớp</label>
                <input type="text" id="s_class" name="s_class" value="{{old('s_class') ??$detail->s_class}}">
    
                <label for="s_phone">Số điện thoại</label>
                <input type="text" id="s_phone" name="s_phone" value="{{old('s_phone') ??$detail->s_phone}}">
    
                <label for="S_email">Email</label>
                <input type="text" id="s_email" name="S_email" value="{{old('S_email')  ??$detail->S_email}}">
                <input type="submit" id="sub_student_btn">
            </form>
        </div>
    </div>
@endsection



