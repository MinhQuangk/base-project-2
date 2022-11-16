@extends('layout.index')
@section('class')
<div class="class_section">
    <div class="class_tab">
        <h1>Thông tin Lớp</h1>
        <div class="class_tab_inner">
            <button class="s_btn_tablinks" onclick="classFunc(event,'see_class')" id="s_defaultOpen"><i class="fas fa-info-circle"></i></button>
            <button class="s_btn_tablinks" onclick="classFunc(event,'add_class')"><i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
    <!-- Chức năng xem thông tin sinh viên -->
    <div id="see_class" class="class_tabcontent">
        <form action="" class="class_search" method="POST">
            <input type="text" class="search_input" placeholder="Tìm kiếm mã lớp...">
            <button type="submit" id="submit"><i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm</button>
        </form>
        <div class_class_search>
            <table>
                <tr>
                    <td width='100px'>Id</td>
                    <td>Mã lớp</td>
                    <td>Tên lớp</td>
                    <td width='200px'>Chức năng</td>
                </tr>
                <tbody d="e_table_body">
                    <!-- class will be show here======= -->
                </tbody>
            </table>
        </div>
    </div>
    <!-- chức năng thêm sinh viên -->
    <div id="add_class" class="class_tabcontent">
        <form autocomplete="off" id="formData" method="POST" action="">
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;">Thêm Lớp</h2>
            <label for="s_subjectId">Mã Lớp</label>
            <input type="text" id="s_subjectId" name="s_address">

            <label for="nameclass">Tên Lớp</label>
            <input type="text" id="nameclass" name="department">

            <input type="submit" id="sub_class_btn">
        </form>
    </div>
</div>
@endsection