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
        <form action="" class="scores_search" >
            @csrf
            <select name="type_scores" id="classes" required>
                <option value="0" selected disabled >hình thức kiểm tra</option>
                <option value="kiểm tra giữa kì" {{request()->type_scores=='kiểm tra giữa kì'?'selected':false}}>kiểm tra giữa kì</option>
                <option value="kiểm tra cuối kì"{{request()->type_scores=='kiểm tra cuối kì'?'selected':false}}>kiểm tra cuối kì</option>
            </select>
            <input type="text" class="search_input" placeholder="Tìm kiếm theo từ khóa" name="key" >
            

            <button type="submit" id="submit"><i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm</button>
        </form>
        <div class_scores_search>

            <table>
                <tr>
                    <td width='50px'>STT</td>
                    <td width='200px'>Họ và tên SV</td>
                    <td width='100px'>Mã sinh viên</td>
                    <td width='100px' >Lớp</td>
                    <td width='200px'>Môn học</td>
                    <td>Hình thức</td>
                    <td width='100px'>Điểm</td>
                    <td width='150px'>Ngày nhập</td>
                    <td width='100px'>Chức năng</td>
                </tr>
                <tbody d="e_table_body">
                    <!-- scores will be show here======= -->
                    @if (!empty($MarkList))
                    @foreach ( $MarkList as $n=>$item)
                    <tr>
                        <td>{{$n +1}}</td>
                        <td>{{$item->s_name}}</td>
                        <td>{{$item->s_id}}</td>
                        <td>{{$item->s_class}}</td>
                        <td>{{$item->sbj_name}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->mark}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <a onclick="return confirm('xác nhận xóa')" href="{{ route('admin.deleteMark',['m_id'=>$item->m_id]) }}"><i class="fa fa-trash" aria-hidden="true" style="color: red"></i></a>
                            <a href="{{ route('admin.updateMark',['m_id'=>$item->m_id]) }}"><i class="fas fa-user-edit" style="color: green"></i></i></a>
                        </td>
                    
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{$MarkList->links()}}
           </div>
        </div>
    </div>
    <!-- chức năng thêm sinh viên -->
    <div id="add_scores" class="scores_tabcontent">
        <form autocomplete="off" id="formData" method="POST" action="{{ route('admin.addMark')}}">
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;"> Nhập Điểm số</h2>
            <div class="first_last_name">
                <span class="f_left">
                    <label for="fname">Khoa</label>
                    <input type="text" id="sc_name" name="department">

                </span>
                <span class="l_right">
                    <label for="lname">Mã sinh viên</label>
                    <input type="text" id="sc_name" name="s_id">
                </span>
            </div>
            <label for="s_address">Lớp</label>
            <input type="text" id="sc_class" name="s_class">

            <label for="subject">Mã môn học</label>
            <input type="text" id="sc_subject" name="sbj_id">

            <label for="sc_scores">Điểm</label>
            <input type="text" id="sc_scores" name="mark">

            <label for="sc_day">Hình thức kiểm tra</label>
            <select name="type" id="type" >
                <option selected disabled value="0">select one</option>
                <option value="kiểm tra giữa kì" {{request()->type=='kiểm tra giữa kì'?'selected':false}}>kiểm tra giữa kì</option>
                <option value="kiểm tra cuối kì"{{request()->type=='kiểm tra cuối kì'?'selected':false}}>kiểm tra cuối kì</option>
              </select>
            <input type="submit" id="sub_scores_btn">
        </form>
    </div>
</div>

@endsection