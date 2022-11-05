<div class="teacher_section">
    <!-- teacher tab button start =================== -->
     <div class="teacher_tab">
        <h1>Thông tin sinh viên</h1>
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

    <!-- teacher tabcontent button start =================== -->
    <div class="teacher_tabcontent_data">
      <div id="see_teacher" class="teacher_tabcontent">
           <div class="teacher_search">
             <form action="#" id="teacher_data_search">
               <input type="text" class="search_input" placeholder="Search teacher...">
             </form>
           </div>
           <div class="row" id="teacher_row">
                <!-- show teacher data here ================ --> 
            </div>
            <!-- teacher modal start ======================= -->
            <div class="teacher_details_modal" id="view_teacher_detail_modal">
              <div class="teacher_details_modal_body">
                  <div id="hide_teacher_details_modal">X</div>
                  <div class="teacher_details_modal_body_inner">
                    <!-- details data show here ============ -->
                  </div>
              </div>
            </div>
            <!-- teacher modal end ======================= -->
      </div>
      
      <div id="add_teacher" class="teacher_tabcontent">
      <form enctype="multipart/form-data" id="teacher_formData" >
          <h2>Form Đăng ký giảng viên</h2>
          <div class="first_last_name">
            <span class="f_left">
              <label for="t_fname">Họ tên đệm</label>
              <input type="text" id="t_fname" name="f_name" required />
              <br />
            </span>
            <span class="l_right">
              <label for="t_lname">Tên</label>
              <input type="text" id="t_lname" name="l_name" required />
              <br />
            </span>
          </div>
          <label for="t_enroll_year">Năm sinh</label>
          <input
            type="text"
            id="t_enroll_year"
            name="t_enroll_year"
            required
          />
          <br />
          <div class="t_class">
            <span class="t_class_left">
              <label for="t_dob">Chức danh</label>
              <input type="text" id="t_dob" name="t_dob" required />
              <br />
            </span>
            <span class="t_class_right">
              <label for="t_class">Khoa</label>
              <input type="text" id="t_class" name="t_class" required />
              <br />
            </span>
         </div>
          <label for="t_gender">Giới tính</label>
          <select name="t_gender" id="t_gender" required>
            <option value="">select one</option>
            <option value="female">Nam</option>
            <option value="male">Nữ</option>
            <option value="other">Khác...</option>
          </select>
          <br />
          <label for="t_phone">Số điện thoại</label>
          <input
            type="text"
            id="t_phone"
            name="t_phone"
            required
          />
          <br />
          <label for="t_email">Email</label>
          <input
            type="text"
            id="t_email"
            name="t_email"
            required
          />
          <br />
          <label for="t_image">Hình ảnh</label>
          <input
            type="file"
            id="t_image"
            name="file"
            required
          />
          <br>
          <input type="submit" name="t_submit" id="t_teacher_btn"></input>
      </form>
      </div>
    </div>
    <!-- teacher tabcontent button start =================== -->
  </div>