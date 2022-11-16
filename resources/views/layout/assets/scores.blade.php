@extends('layout.index')
@section('scores')
<div class="scores_section">
    <div class="scores_tab">
        <h1>Điểm số</h1>
        <div class="scores_tab_inner">
            <button class="s_btn_tablinks" onclick="scoresFunc(event,'see_scores')" id="s_defaultOpen"><i class="fas fa-info-circle"></i></button>
            <button class="s_btn_tablinks" onclick="scoresFunc(event,'add_scores')"><i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
    <!-- Chức năng xem thông tin sinh viên -->
    <div id="see_scores" class="scores_tabcontent">
        <form action="" class="scores_search" method="POST">
            <select name="t_scores" id="classes" required>
                <option value="0" id="">Chọn lớp</option>
                <option id="s1">....</option>
                <option id="s2">....</option>
            </select>

            <input type="text" class="search_input" placeholder="Mã sinh viên...">
            <button type="submit" id="submit"><i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm</button>
        </form>
        <div class_scores_search>

            <table>
                <tr>
                    <td width='50px'>STT</td>
                    <td width='200px'>Họ và tên SV</td>
                    <td width='200px'>Mã sinh viên</td>
                    <td width='100px' >Lớp</td>
                    <td>Môn học</td>
                    <td width='100px'>Điểm</td>
                    <td width='150px'>Ngày nhập</td>
                    <td width='100px'>Chức năng</td>
                </tr>
                <tbody d="e_table_body">
                    <!-- scores will be show here======= -->

                </tbody>
            </table>
        </div>
    </div>
    <!-- chức năng thêm sinh viên -->
    <div id="add_scores" class="scores_tabcontent">
        <form autocomplete="off" id="formData" method="POST" action="{{ route('admin.addS')}}">
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;">Điểm số</h2>
            <div class="first_last_name">
                <!-- Họ và tên -->
                <span class="f_left">
                    <label for="fname">Họ và tên sinh viên</label>
                    <input type="text" id="sc_name" name="s_name">

                </span>
                <!-- Năm sinh -->
                <span class="l_right">
                    <label for="lname">Mã sinh viên</label>
                    <input type="text" id="sc_name" name="birthday">
                </span>
            </div>
            <label for="s_address">Lớp</label>
            <input type="text" id="sc_class" name="s_address">

            <label for="subject">Môn học</label>
            <input type="text" id="sc_subject" name="money">

            <label for="sc_scores">Điểm</label>
            <input type="text" id="sc_scores" name="sc_scores">

            <label for="sc_day">Ngày nhập</label>
            <input type="date" id="sc_day" name="sc_day">

            <input type="submit" id="sub_scores_btn">
        </form>
    </div>
</div>

@endsection