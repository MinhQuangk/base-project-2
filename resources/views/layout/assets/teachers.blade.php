<div class="teacher_section">
    <div class="teacher_tab">
        <h1>Thông tin giảng viên</h1>
        <div class="teacher_tab_inner">
            <button class="t_btn_tablinks" onclick="teacherFunc(event,'see_teacher')" id="t_defaultOpen"><i class="fas fa-info-circle"></i></button>
            <button class="t_btn_tablinks" onclick="teacherFunc(event,'add_teacher')"><i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
    <!-- Chức năng xem thông tin giảng viên -->
    <div id="see_teacher" class="teacher_tabcontent">
        <div class_teacher_search>
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
                <tbody d="t_table_body">
                    <!-- teacher will be show here======= -->
                </tbody>
            </table>
        </div>
    </div>
    <!-- chức năng thêm giảng viên -->
    <div id="add_teacher" class="teacher_tabcontent">
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
            <label for="t_address">Quê quán</label>
            <input type="text" id="t_address" name="address" required>

            <label for="t_qualification">Khoa</label>
            <input type="text" id="t_qualification" name="t_qualification" required>
            
            <label for="t_zipcode">Mã tỉnh thành</label>
            <input type="text" id="t_zipcode" name="t_zipcode" required>
            
            <label for="t_gender">Giới tính</label>
            <select name="gender" id="t_gender">
                <option value="">Select One</option>
                <option value="female">Nữ</option>
                <option value="male">Nam</option>
                <option value="other">Khác...</option>

            <label for="t_phone">Số điện thoại</label>
            <input type="text" id="t_phone" name="t_phone" required>

            <label for="t_email">Email</label>
            <input type="text" id="t_email" name="t_email" required>
            <input type="submit" id="sub_teacher_btn">
        </form>
    </div>
</div>