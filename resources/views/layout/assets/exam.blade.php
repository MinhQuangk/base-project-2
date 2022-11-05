<section class="exam">

    <!-- exam add section start============================================== -->
    <div class="add_new_exam">
            <h1>THÊM LỊCH THI</h1>
      <form id="exam_schedule_form" method="POST">
         <div class="row1">
            <div class="row1_inner1">
               <label for="e_name">Tên môn thi</label><br>
               <input type="text" id="e_name" name="e_name"><br>
            </div>
            <div class="row1_inner2">
                    <label for="s_type">Môn thi*</label><br>
                    <select name="s_type" id="s_type">
                            <option value="" disabled selected hidden>Please Select</option>
                            <option value="mathematic">Giải tích</option>
                            <option value="english">Tiếng anh</option>
                            <option value="physics">Vật lý</option>
                            <option value="chemistry">Hóa học</option>
                            <option value="specialized">Chuyên ngành</option>
                    </select>
            </div>
            </div>
            <div class="row2">
                <div class="row2_inner1">
                   <label for="s_class">Nhập lớp</label><br>
                   <input type="text" id="s_class" name="s_class">
                </div>
                 <div class="row2_inner2">
                    <label for="s_section">Thời gian học</label><br>
                    <select name="s_section" id="s_section">
                            <option value="" disabled selected hidden>Please Select</option>
                            <option value="A">Năm 1</option>
                            <option value="B">Năm 2</option>
                            <option value="C">Năm 3</option>
                            <option value="D">Năm 4</option>
                            <option value="E">Năm cuối</option>
                    </select>
                 </div>
         </div>
         <div class="row3">
         <div class="row3_inner1">
                   <label for="s_time">Thời gian kiểm tra</label><br>
                   <input type="text" id="s_time" name="s_time">
            </div>
            <div class="row3_inner2">
                    <label for="s_date">Nhập ngày</label><br>
                    <input type="date" id="s_date" name="s_date">
            </div>
         </div>
         <button class="e_save_btn" id="e_save_btn">Lưu</button>
       </form>
    </div>
    <!-- exam add section end============================================== -->
    <!-- exam table schedule start============================================== -->
    <div class="all_exam_schedule">
            <div class="header_exam_schedule_table">
                   <h1>Tất cả lịch thi</h1>  
                    <button id="delete_all_exam_schedule">Delete All</button>
            </div>
       <div id="showExamData" class="exam_tabcontent">
        <div class_student_search>
            <input type="text" class="search_input" placeholder="Tìm kiếm giảng viên...."/>
            <table>
                <tr>
                    <td width='50px'>Tên môn thi thi</td>
                    <td width='150px'>Môn thi</td>
                    <td width='100px'>Lớp</td>
                    <td>Thời gian học</td>
                    <td>Thời gian kiểm tra</td>
                    <td width='100px'>Ngày kiểm tra</td>
                </tr>
                <tbody d="e_table_body">
                <!-- exam will be show here======= -->
                </tbody>
         </table>
        </div>
       </div>
    </div>
    <!-- exam table schedule end============================================== -->
</section>