@extends('layout.index')

@section('student')
    {{-- cập nhật sinh viên --}}
    <div class="teacher_section">
      <!-- teacher tab button start =================== -->
       <div class="teacher_tab">
          <h1>Thông tin giảng viên</h1>
          
      </div>
      <!-- teacher tab button start =================== -->
      @if (session('msg'))
      <h3 style="color: black">{{session('msg')}}</h3>
    @endif
      <!-- teacher tabcontent button start =================== -->
      <div class="teacher_tabcontent_data">
        <div id="see_teacher" class="teacher_tabcontent"> 
             <div class="row" id="teacher_row">
                  <!-- show teacher data here ================ -->          
              </div>
                  <div class="teacher_details_modal" id="view_teacher_detail_modal">
                    <div class="teacher_details_modal_body">
                        <div class="teacher_details_modal_body_inner">
                          <!-- details data show here ============ -->
                        </div>
                    </div>
                  </div>
              <!-- teacher modal end ======================= -->
        </div>
        <div id="add_teacher" class="teacher_tabcontent">
          <form enctype="multipart/form-data" id="teacher_formData" method="POST" action="{{ route('admin.addUpdateT') }}" enctype="multipart/form-data">
            <h2>Chi tiết giảng viên</h2>
            @csrf
            <hr width="100%">
            <div class="img">
            <img src="{{asset('uploads')}}/{{$detail->avatar}}" alt="">
            </div>
            <div class="first_last_name">
              <span class="f_left">
                <label for="t_fname">Họ và tên đệm</label>
                <input type="text" id="t_fname" name="f_name" value="{{old('f_name') ??$detail->f_name }} " disabled style="background-color: aquamarine" />
                <br />
              </span>
              <span class="l_right">
                <label for="t_lname">Tên</label>
                <input type="text" id="t_lname" name="l_name" value="{{old('l_name') ??$detail->l_name }} " disabled style="background-color: aquamarine" />
                <br />
              </span>
            </div>
            <label for="t_enroll_year">Năm sinh</label>
            <input type="text" id="t_enroll_year" name="yearOfBirth" required value="{{old('yearOfBirth') ??$detail->yearOfBirth }}" disabled style="background-color: aquamarine" />
            <br />
            <div class="t_class">
              <span class="t_class_left">
                <label for="t_dob">Chức danh</label>
                <input type="text" id="t_dob" name="academic" value="{{old('academic') ??$detail->academic }} " disabled style="background-color: aquamarine" />
                <br />
              </span>
              <span class="t_class_right">
                <label for="t_class">Khoa</label>
                <input type="text" id="t_class" name="department" value="{{old('department') ??$detail->department }}" disabled style="background-color: aquamarine" />
                <br />
              </span>
            </div>
            <label for="t_gender">Giới tính</label>
            <input type="text" name="gender" id="t_gender" value="{{old('gender') ??$detail->gender }}" disabled style="background-color: aquamarine" />
            <br />
            <label for="t_phone">Số điện thoại</label>
            <input type="text" id="t_phone" name="t_phone" value="{{old('t_phone') ??$detail->t_phone }}" disabled style="background-color: aquamarine" />
            <br />
            <label for="t_email">Email</label>
            <input type="text" id="t_email" name="t_email" value="{{old('t_email') ??$detail->t_email }}" style="background-color: aquamarine" disabled />
            <br />
    
            <a href="{{route('admin.teacher')}}" id="t_teacher_btn" style="text-decoration: none ; background-color: crimson">Quay lại</a>
          </form>
        </div>
      </div>
      <!-- teacher tabcontent button start =================== -->
    </div>
@endsection



