@extends('layout.index')
@section('expenses')
<div class="expenses_section">
    <div class="expenses_tab">
        <h1>Học phí</h1>
        <div class="expenses_tab_inner">
            <button class="s_btn_tablinks" onclick="expensesFunc(event,'see_expenses')" id="s_defaultOpen"><i class="fas fa-info-circle"></i></button>
            <button class="s_btn_tablinks" onclick="expensesFunc(event,'add_expenses')"><i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
    <!-- Chức năng xem thông tin sinh viên -->
    <div id="see_expenses" class="expenses_tabcontent">
        <form action="" class="expenses_search" method="POST">
            <input type="text" class="search_input" placeholder="Mã sinh viên...">
            <button type="submit" id="submit"><i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm</button>
        </form>
        <div class_expenses_search>
            
            <table>
                <tr>
                    <td width='50px'>STT</td>
                    <td width='150px'>Họ và tên SV</td>
                    <td width='100px'>Mã sinh viên</td>
                    <td>Lớp</td>
                    <td>Số tiền</td>
                    <td>Tên loại phí</td>
                    <td width='100px'>Ngày thu</td>
                    <td width='200px'>Người thu</td>
                    <td width='100px'>Chức năng</td>
                </tr>
                <tbody d="e_table_body">
                    <!-- expenses will be show here======= -->
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- chức năng thêm sinh viên -->
    <div id="add_expenses" class="expenses_tabcontent">
        <form autocomplete="off" id="formData" method="POST" action="{{ route('admin.addS')}}" >
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;">Học phí</h2>
            <div class="first_last_name">
                <!-- Họ và tên -->
                <span class="f_left">
                    <label for="fname">Họ và tên sinh viên</label>
                    <input type="text" id="fname" name="s_name" >
                   
                </span>
                <!-- Năm sinh -->
                <span class="l_right">
                    <label for="lname">Mã sinh viên</label>
                    <input type="text" id="lname" name="birthday" >
                </span>
            </div>
            <label for="s_address">Lớp</label>
            <input type="text" id="s_class" name="s_address" >

            <label for="money">Số tiền</label>
            <input type="text" id="s_money" name="money" >

            <label for="feeName">Tên loại phí</label>
            <input type="text" id="s_feeName" name="feeName" >
            
            <label for="s_day">Ngày thu</label>
            <input type="date" id="s_day" name="s_day" >           

            <label for="s_collector">Người thu</label>
            <input type="text" id="s_collector" name="s_collector" >

            <input type="submit" id="sub_expenses_btn">
        </form>
    </div>
</div>
@endsection