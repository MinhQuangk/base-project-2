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
        <form action="" class="class_search" >
            @csrf
            <input type="text" class="search_input" placeholder="Tìm kiếm theo từ khóa" name="key">
            <button type="submit" id="submit"><i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm</button>
        </form>
        <div class_class_search>
            <table>
                <tr>
                    <td width='100px'>STT</td>
                    <td>Mã lớp</td>
                    <td>Tên lớp</td>
                    <td width='150px'>số Lượng sinh viên</td>
                    <td width='150px'>Mã GVCN</td>
                    <td width='150px'>Mã Lớp trưởng</td>
                    <td width='200px'>Chức năng</td>
                </tr>
                <tbody d="e_table_body">
                    <!-- class will be show here======= -->
                    @if (!empty($classList))
                    @foreach ( $classList as $key =>$item)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$item->class_id}}</td>
                        <td>{{$item->class_name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->form_teacher}}</td>
                        <td>{{$item->monitor}}</td>
                        <td>
                            <a onclick="return confirm('xác nhận xóa')" href="{{ route('admin.deleteClass',['class_id'=>$item->class_id]) }}"><i class="fa fa-trash" aria-hidden="true" style="color: red"></i></a>
                            <a href="{{ route('admin.updateClass', ['class_id'=>$item->class_id]) }}"><i class="fas fa-user-edit" style="color: green"></i></i></a>
                        </td>
                    
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{$classList->links()}}
           </div>
        </div>
    </div>
    <!-- chức năng thêm sinh viên -->
    <div id="add_class" class="class_tabcontent">
        <form autocomplete="off" id="formData" method="POST" action="">
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;">Thêm Lớp</h2>
            <label for="s_subjectId">Mã Lớp</label>
            <input type="text" id="s_subjectId" name="class_id">

            <label for="nameclass">Tên Lớp</label>
            <input type="text" id="nameclass" name="class_name">
            
            <label for="nameclass">số lượng sinh viên</label>
            <input type="text" id="nameclass" name="quantity">

            <label for="nameclass">Giáo viên chủ nhiệm(mã)</label>
            <input type="text" id="nameclass" name="form_teacher">

            <label for="nameclass">lớp trưởng(mã)</label>
            <input type="text" id="nameclass" name="monitor">

            <input type="submit" id="sub_class_btn">
        </form>
    </div>
</div>
@endsection