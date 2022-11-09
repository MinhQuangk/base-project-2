@extends('layout.index')
@section('student')
<div class="student_section">
    <div class="student_tab">
        <h1>Thông tin sinh viên</h1>
        <div class="student_tab_inner">
            <button class="s_btn_tablinks" onclick="studentFunc(event,'see_student')" id="s_defaultOpen"><i class="fas fa-info-circle"></i></button>
            <button class="s_btn_tablinks" onclick="studentFunc(event,'add_student')"><i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
    <!-- Chức năng xem thông tin sinh viên -->
    <div id="see_student" class="student_tabcontent">
        <form action="" class="search" method="POST">
            <label for="id">id</label>
            <input type="text" name="id"/>
            <label for="">Tên</label>
            <input type="text" name="name"/>
            <label for="">Email</label>
            <input type="text" name="email">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <div class_student_search>
            
            <table>
                <tr>
                    <td width='50px'>Id</td>
                    <td width='150px'>Họ và tên</td>
                    <td width='100px'>Ngày sinh</td>
                    <td>Quê quán</td>
                    <td>Khoa</td>
                    <td width='100px'>Giới tính</td>
                    <td>Số điện thoại</td>
                    <td >Email</td>
                    <td width='100px'>Lớp</td>
                </tr>
                <tbody d="s_table_body">
                    <!-- student will be show here======= -->
                    @if (!empty($studentList))
                        @foreach ( $studentList as $item)
                        <tr>
                            <td>{{$item->s_id}}</td>
                            <td>{{$item->s_name}}</td>
                            <td>{{$item->birthday}}</td>
                            <td>{{$item->s_address}}</td>
                            <td>{{$item->department}}</td>
                            <td>{{$item->s_gender}}</td>
                            <td>{{$item->s_phone}}</td>
                            <td>{{$item->S_email}}</td>
                            <td>{{$item->s_class}}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- chức năng thêm giảng viên -->
    <div id="add_student" class="student_tabcontent">
        <form autocomplete="off" id="formData" method="POST" action="{{ route('admin.addS')}}" >
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;">thêm sinh viên</h2>
            <div class="first_last_name">
                <!-- Họ và tên -->
                <span class="f_left">
                    <label for="fname">Họ và tên</label>
                    <input type="text" id="fname" name="s_name" >
                   
                </span>
                <!-- Năm sinh -->
                <span class="l_right">
                    <label for="lname">Ngày sinh</label>
                    <input type="date" id="lname" name="birthday" >
                </span>
            </div>
            <label for="s_address">Quê quán</label>
            <input type="text" id="s_address" name="s_address" >

            <label for="department">Khoa</label>
            <input type="text" id="s_qualification" name="department" >
            
            <label for="s_class">lớp</label>
            <input type="text" id="s_class" name="s_class" >
            
            
            <div class="radio_option" >
                <label for="s_gender">Giới tính</label>
                <input type="radio" id="male" name="s_gender" value="Nam">
                <label for="rd1">Nam</label>
                <input type="radio" id="female" name="s_gender" value="Nữ">
                <label for="rd2">Nữ</label>
              </div>

            <label for="s_phone">Số điện thoại</label>
            <input type="text" id="s_phone" name="s_phone" >

            <label for="S_email">Email</label>
            <input type="text" id="s_email" name="S_email" >
            <input type="submit" id="sub_student_btn">
        </form>
    </div>
</div>
@endsection