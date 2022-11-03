<div class="student_section">
  <div class="student_tab">
      <h1>Thông tin giảng viên</h1>
      <div class="student_tab_inner">
          <button class="s_btn_tablinks" onclick="studentFunc(event,'see_student')" id="s_defaultOpen"><i class="fas fa-info-circle"></i></button>
          <button class="s_btn_tablinks" onclick="studentFunc(event,'add_student')"><i class="fas fa-plus-circle"></i></button>
      </div>
  </div>
  <!-- Chức năng xem thông tin giảng viên -->
  <div id="see_student" class="student_tabcontent">
      <div class_student_search>
          <input type="text" class="search_input" placeholder="Tìm kiếm giảng viên...."/>
          <table>
              <tr>
                  <td width='50px'>Id</td>
                  <td width='150px'>Họ và tên</td>
                  <td width='100px'>Chức danh</td>
                  <td>Quê quán</td>
                  <td>Khoa</td>
                  <td width='100px'>Giới tính</td>
                  <td>Số điện thoại</td>
                  <td width='100px'></td>
              </tr>
              <tbody d="s_table_body">
                  <!-- student will be show here======= -->
              </tbody>
          </table>
      </div>
  </div>
  <!-- chức năng thêm giảng viên -->
  <div id="add_student" class="student_tabcontent">
      <form autocomplete="off" id="formData" >
          <h2>Bảng thêm giảng viên</h2>
          <div class="first_last_name">
              <!-- Họ và tên -->
              <span class="f_left">
                  <label for="fname">Họ và tên</label>
                  <input type="text" id="fname" name="f_name" required>
              </span>
              <!-- Chức danh -->
              <span class="l_right">
                  <label for="lname">Chức danh</label>
                  <input type="text" id="lname" name="l_name" required>
              </span>
          </div>
          <label for="s_address">Quê quán</label>
          <input type="text" id="s_address" name="address" required>

          <label for="s_qualification">Khoa</label>
          <input type="text" id="s_qualification" name="s_qualification" required>
          
          <label for="s_zipcode">Mã tỉnh thành</label>
          <input type="text" id="s_zipcode" name="s_zipcode" required>
          
          <label for="s_gender">Giới tính</label>
          <select name="gender" id="s_gender">
              <option value="">Select One</option>
              <option value="female">Nữ</option>
              <option value="male">Nam</option>
              <option value="other">Khác...</option>

          <label for="s_phone">Số điện thoại</label>
          <input type="text" id="s_phone" name="s_phone" required>

          <label for="s_email">Email</label>
          <input type="text" id="s_email" name="s_email" required>
          <input type="submit" id="sub_student_btn">
      </form>
  </div>
</div>