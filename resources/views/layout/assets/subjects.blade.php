@extends('layout.index')
@section('subjects')
<div class="subjects_section">
    <div class="subjects_tab">
        <h1>Thông tin Môn học</h1>
        <div class="subjects_tab_inner">
            <button class="s_btn_tablinks" onclick="subjectsFunc(event,'see_subjects')" id="s_defaultOpen"><i class="fas fa-info-circle"></i></button>
            <button class="s_btn_tablinks" onclick="subjectsFunc(event,'add_subjects')"><i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
    <!-- Chức năng xem thông tin sinh viên -->
    <div id="see_subjects" class="subjects_tabcontent">
        <form action="" class="subjects_search" method="POST">
            <input type="text" class="search_input" placeholder="Tìm kiếm môn học...">
            <button type="submit" id="submit"><i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm</button>
        </form>
        <div class_subjects_search>
            <table>
                <tr>
                    <td width='100px'>Id</td>
                    <td>Mã môn học</td>
                    <td>Tên môn học</td>
                    <td width='200px'>Chức năng</td>
                </tr>
                <tbody d="e_table_body">
                    <!-- subjects will be show here======= -->
                </tbody>
            </table>
        </div>
    </div>
    <!-- chức năng thêm sinh viên -->
    <div id="add_subjects" class="subjects_tabcontent">
        <form autocomplete="off" id="formData" method="POST" action="">
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;">Thêm môn học</h2>
            <label for="s_subjectId">Mã môn học</label>
            <input type="text" id="s_subjectId" name="s_address">

            <label for="nameSubjects">Tên môn học</label>
            <input type="text" id="nameSubjects" name="department">

            <input type="submit" id="sub_subjects_btn">
        </form>
    </div>
</div>
@endsection