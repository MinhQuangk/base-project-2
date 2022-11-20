@extends('layout.index')
@section('teacher')
<div class="teacher_section">
  <!-- teacher tab button start =================== -->
   <div class="teacher_tab">
      <h1>Thông tin giảng viên</h1>
      <div class="teacher_tab_inner">
        <button
          class="t_btn_tablinks"
          onclick="teacherFunc(event, 'see_teacher')"
          id="t_defaultOpen"
        >
          <i class="fas fa-info-circle"></i>
        </button>
        <button class="t_btn_tablinks" onclick="teacherFunc(event, 'add_teacher')">
          <i class="fas fa-plus-circle"></i>
        </button>
      </div>
  </div>
  <!-- teacher tab button start =================== -->
  @if (session('msg'))
  <h3 style="color: black">{{session('msg')}}</h3>
@endif
  <!-- teacher tabcontent button start =================== -->
  <div class="teacher_tabcontent_data">
    <div id="see_teacher" class="teacher_tabcontent">
         <div class="teacher_search">
           <form action="#" id="teacher_data_search">
             <input type="text" class="search_input" placeholder="Search teacher..." name="key">
             <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

           </form>
         </div>
          
         <div class="row" id="teacher_row">
              <!-- show teacher data here ================ --> 
              @if (!empty($teacherlist))
         @foreach ($teacherlist as $key =>$item)
             <div class="card">
              <img src="{{asset('uploads')}}/{{$item->avatar}}" alt="">
              <div class="s_card_footer">
                <h2 style="color: black">{{$item->f_name}} {{$item->l_name}}</h2>
                <div class="teacher_profile_action">
                  <a class="s_btn_view" href="{{ route('admin.detailT',['t_id'=>$item->t_id]) }}">Profile</a>
                  <a onclick="return confirm('xác nhận xóa')" href="{{ route('admin.deleteT', ['t_id'=>$item->t_id])}}" class="s_btn_del" ><i class="fa fa-trash" aria-hidden="true" style="color: red"></i></a>
                  <a href="{{ route('admin.updateT',['t_id'=>$item->t_id]) }}" class="s_btn_del"><i class="fas fa-user-edit" style="color: green"></i></a>
                </div>
              </div>
             </div>
             @endforeach
             @endif
          </div>
        

          <!-- teacher modal start ======================= -->
          
         
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
      <form enctype="multipart/form-data" id="teacher_formData" method="POST" action="{{ route('admin.addT') }}" enctype="multipart/form-data">
        <h2>Form Đăng ký giảng viên</h2>
        @csrf
        <div class="first_last_name">
          <span class="f_left">
            <label for="t_fname">Họ và tên đệm</label>
            <input type="text" id="t_fname" name="f_name"  />
            <br />
          </span>
          <span class="l_right">
            <label for="t_lname">Tên</label>
            <input type="text" id="t_lname" name="l_name"  />
            <br />
          </span>
        </div>
        <label for="t_enroll_year">Năm sinh</label>
        <input
          type="text"
          id="t_enroll_year"
          name="yearOfBirth"
          required
        />
        <br />
        <div class="t_class">
          <span class="t_class_left">
            <label for="t_dob">Chức danh</label>
            <input type="text" id="t_dob" name="academic"  />
            <br />
          </span>
          <span class="t_class_right">
            <label for="t_class">Khoa</label>
            <input type="text" id="t_class" name="department"  />
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
        <label for="t_phone">Số điện thoại</label>
        <input
          type="text"
          id="t_phone"
          name="t_phone"
         
        />
        <br />
        <label for="t_email">Email</label>
        <input
          type="text"
          id="t_email"
          name="t_email"
          
        />
        <br />
        <label for="t_image">Hình ảnh</label>
        <input
          type="file"
          id="t_image"
          name="img"
          
        />
        <br>
        <input type="submit" name="t_submit" id="t_teacher_btn"></input>
    </form>
    </div>
  </div>
  <!-- teacher tabcontent button start =================== -->
</div>
@endsection  