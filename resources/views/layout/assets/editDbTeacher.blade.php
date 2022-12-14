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
            <h2>Sửa thông tin giảng viên</h2>
            @csrf
            <div class="first_last_name">
              <span class="f_left">
                <label for="t_fname">Họ và tên đệm</label>
                <input type="text" id="t_fname" name="f_name"  value="{{old('f_name') ??$detail->f_name }}"/>
                <br />
              </span>
              <span class="l_right">
                <label for="t_lname">Tên</label>
                <input type="text" id="t_lname" name="l_name" value="{{old('l_name') ??$detail->l_name }}"  />
                <br />
              </span>
            </div>
            <label for="t_enroll_year" >Năm sinh</label>
            <input
              type="text"
              id="t_enroll_year"
              name="yearOfBirth"
              required
              value="{{old('yearOfBirth') ??$detail->yearOfBirth }}"
            />
            <br />
            <div class="t_class">
              <span class="t_class_left">
                <label for="t_dob">Chức danh</label>
                <input type="text" id="t_dob" name="academic" value="{{old('academic') ??$detail->academic }} "/>
                <br />
              </span>
              <span class="t_class_right">
                <label for="t_class">Khoa</label>
                <input type="text" id="t_class" name="department" value="{{old('department') ??$detail->department }}" />
                <br />
              </span>
           </div>
            <label for="t_gender">Giới tính</label>
            <select name="gender" id="t_gender" >
              <option selected disabled value="0">select one</option>
              <option value="male" {{request()->gender=='male'?'selected':false}}>Nam</option>
              <option value="female"{{request()->gender=='female'?'selected':false}}>Nữ</option>
            </select>
            <br />
            <label for="t_phone">Số điện thoại</label >
            <input
              type="text"
              id="t_phone"
              name="t_phone"
              value="{{old('t_phone') ??$detail->t_phone }}"
            />
            <br />
            <label for="t_email">Email</label>
            <input
              type="text"
              id="t_email"
              name="t_email"
              value="{{old('t_email') ??$detail->t_email }}"
            />
            <br />
    
            <input type="submit" name="t_submit" id="t_teacher_btn"></input>
        </form>
        </div>
      </div>
      <!-- teacher tabcontent button start =================== -->
    </div>
@endsection



