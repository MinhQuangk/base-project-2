@extends('layout.index')
@section('student')
<div class="student_section">
    
    @if (session('msg'))
                <h3>{{session('msg')}}</h3>
    @endif  
    <div class="student_tab">
        <h1>Thông tin sinh viên</h1>
        <div class="student_tab_inner">
            <button class="s_btn_tablinks" onclick="studentFunc(event,'see_student')" id="s_defaultOpen"><i class="fas fa-info-circle"></i></button>
            <button class="s_btn_tablinks" onclick="studentFunc(event,'add_student')"><i class="fas fa-plus-circle"></i></button>
            <button class="s_btn_tablinks" onclick="studentFunc(event,'update_student')"><i class="fas fa-user-edit"></i></i></button>
        </div>
    </div>
    <!-- Chức năng xem thông tin sinh viên -->
    <div id="see_student" class="tab {{ !session('student_tabcontent') ? 'active', null }} ">
        <form class="search">
            <input type="text" name="key"/>
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <div class_student_search>
            
            <table>
                <tr>
                    <td width='50px'>STT</td>
                    <td width='150px'>Họ và tên</td>
                    <td width='50px'>Mã sv</td>
                    <td width='100px'>Ngày sinh</td>
                    <td>Quê quán</td>
                    <td>Khoa</td>
                    <td width='100px'>Giới tính</td>
                    <td>Số điện thoại</td>
                    <td >Email</td>
                    <td width='100px'>Lớp</td>
                    <td>Action</td>
    
                </tr>
                <tbody d="s_table_body">
                    <!-- student will be show here======= -->
                    @if (!empty($studentList))
                        @foreach ( $studentList as $key =>$item)
                        <tr>
                            <td>{{$key +1}}</td>
                            <td>{{$item->s_name}}</td>
                            <td>{{$item->s_id}}</td>
                            <td>{{$item->birthday}}</td>
                            <td>{{$item->s_address}}</td>
                            <td>{{$item->department}}</td>
                            <td>{{$item->s_gender}}</td>
                            <td>{{$item->s_phone}}</td>
                            <td>{{$item->S_email}}</td>
                            <td>{{$item->s_class}}</td>
                            <td>
                                <a onclick="return confirm('xác nhận xóa')" href="{{ route('admin.deleteS',['s_id'=>$item->s_id]) }}"><i class="fa fa-trash" aria-hidden="true" style="color: red"></i></a>
                                <a href="{{ route('admin.updateS',['s_id'=>$item->s_id]) }}"><i class="fas fa-user-edit" style="color: green"></i></i></a>
                                <a href="{{ route('admin.detailS',['s_id'=>$item->s_id]) }}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                            </td>
                        
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
           <div class="d-flex justify-content-end">
            {{$studentList->links()}}
           </div>
        </div>
    </div>
    <!-- chức năng thêm giảng viên -->
    <div id="add_student" class="tab{{ !session('student_tabcontent') ? 'active', null }}">
        <form autocomplete="off" id="formData" method="POST" action="{{ route('admin.addS')}}" >
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;">thêm sinh viên</h2>
            <div class="first_last_name">
                <!-- Họ và tên -->
                <span class="f_left">
                    <label for="fname">Họ và tên</label>
                    <input type="text" id="fname" name="s_name" >
                    @if ($errors->has('s_name'))
                    <strong class="text-danger" style="color: red ;">{{$errors->first('password')}}</strong> <br>
                    @endif
                </span>
                <!-- Năm sinh -->
                <span class="l_right">
                    <label for="lname">Ngày sinh</label>
                    <input type="date" id="lname" name="birthday" >
                    @if ($errors->has('birthday'))
                    <strong class="text-danger" style="color: red ;">{{$errors->first('password')}}</strong> <br>
                    @endif
                </span>
            </div>
            <label for="s_address">Quê quán</label>
            <input type="text" id="s_address" name="s_address" >
                    @if ($errors->has('s_address'))
                    <strong class="text-danger" style="color: red ;">{{$errors->first('password')}}</strong> <br>
                    @endif
            <label for="department">Khoa</label>
            <input type="text" id="s_qualification" name="department" >
                    @if ($errors->has('department'))
                    <strong class="text-danger" style="color: red ;">{{$errors->first('password')}}</strong> <br>
                    @endif
            <label for="s_class">lớp</label>
            <input type="text" id="s_class" name="s_class" >
                    @if ($errors->has('s_class'))
                    <strong class="text-danger" style="color: red ;">{{$errors->first('password')}}</strong> <br>
                    @endif
            
            <div class="radio_option" >
                <label for="s_gender">Giới tính</label>
                <input type="radio" id="male" name="s_gender" value="Nam">
                <label for="rd1">Nam</label>
                <input type="radio" id="female" name="s_gender" value="Nữ">
                <label for="rd2">Nữ</label>
              </div>
              @if ($errors->has('s_gender'))
              <strong class="text-danger" style="color: red ;">{{$errors->first('password')}}</strong> <br>
              @endif
            <label for="s_phone">Số điện thoại</label>
            <input type="text" id="s_phone" name="s_phone" >
            @if ($errors->has('s_phone'))
            <strong class="text-danger" style="color: red ;">{{$errors->first('password')}}</strong> <br>
            @endif
            <label for="S_email">Email</label>
            <input type="text" id="s_email" name="S_email" >
            @if ($errors->has('S_email'))
                    <strong class="text-danger" style="color: red ;">{{$errors->first('password')}}</strong> <br>
                    @endif
            <input type="submit" id="sub_student_btn">
        </form>
    </div>
    {{-- chức năng cập nhật tình trạng sinh viên --}}
    <div id="update_student" class="student_tabcontent">
        <form autocomplete="off" id="formData" method="POST" action="{{ route('admin.updateStatusStudent')}}" >
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;">Cập nhật tình trạng sinh viên</h2>
            <label for="s_phone">mã sinh viên</label>
            <input type="text" id="s_phone" name="s_id" >

            <label for="s_phone">số tín chỉ đã đăng kí</label>
            <input type="text" id="s_phone" name="credits" >
            <label for="department">điểm rèn luyện</label>
            <input type="text" id="s_qualification" name="point_training" >
            
            <label for="s_class">điểm trung bình</label>
            <input type="text" id="s_class" name="average" >
            
            <label for="s_phone">điểm GPA</label>
            <input type="text" id="GPA" name="GPA" >

            <label for="s_address">Thành tính học tập</label>
            <select name="achievements" id="t_gender" >
                <option selected disabled value="0">select one</option>
                <option value="Xuất sắc" {{request()->achievements=='Xuất sắc'?'selected':false}}>Xuất sắc</option>
                <option value="Giỏi"{{request()->achievements=='Giỏi'?'selected':false}}>Giỏi</option>
                <option value="Khá" {{request()->achievements=='Khá'?'selected':false}}>Khá</option>
                <option value="Trung bình"{{request()->achievements=='Trung bình'?'selected':false}}>Trung bình</option>
            </select>
            <label for="S_email">Trạng thái hiện tại</label>
            <select name="status" id="t_gender" >
                <option selected disabled value="0">select one</option>
                <option value="Nguy cơ nghỉ học" {{request()->status=='Nguy cơ nghỉ học'?'selected':false}}>Nguy cơ nghỉ học</option>
                <option value="cảnh báo học vụ"{{request()->status=='cảnh báo học vụ'?'selected':false}}>cảnh báo học vụ</option>
                <option value="thiếu tín chỉ" {{request()->status=='thiếu tín chỉ'?'selected':false}}>thiếu tín chỉ</option>
                <option value="thiếu học phí"{{request()->status=='thiếu học phí'?'selected':false}}>thiếu học phí</option>
                <option value="khen thưởng" {{request()->status=='khen thưởng'?'selected':false}}>khen thưởng </option>
                <option value="rèn luyện học tập tốt"{{request()->status=='rèn luyện học tập tốt'?'selected':false}}>rèn luyện học tập tốt</option>

              </select>
            <input type="submit" id="sub_student_btn">
        </form>
    </div>
</div>

<Script>
    $(document).ready(function () {
  $('#nav-tab a[href="#{{ old('tab') }}"]').tab('show')
});
</Script>

@endsection