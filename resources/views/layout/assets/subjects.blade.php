@extends('layout.index')
@section('subjects')
<div class="subjects_section">
    @if (session('msg'))
                <h3>{{session('msg')}}</h3>
    @endif
    <div class="subjects_tab">
        <h1>Thông tin môn học</h1>
        <div class="subjects_tab_inner">
            <button class="s_btn_tablinks" onclick="subjectsFunc(event,'see_subjects')" id="s_defaultOpen"><i class="fas fa-info-circle"></i></button>
            <button class="s_btn_tablinks" onclick="subjectsFunc(event,'add_subjects')"><i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
    <!-- Chức năng xem thông tin sinh viên -->
    <div id="see_subjects" class="subjects_tabcontent">
        <form action="" class="subjects_search">
            @csrf
            <input type="text" class="search_input" placeholder="Tên môn học" name="key">
            <input type="text" class="search_input" placeholder="Mã môn học" name="key2" >

            <button type="submit" id="submit"><i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm</button>
        </form>
        <div class_subjects_search>
            <table>
                <tr>
                    
                    <td width='150px'>Mã môn học</td>
                    <td>Tên môn học</td>
                    <td width='100px'>Số tín chỉ</td>
                    <td width='100px'>Khoa</td>
                    <td width='200px'>Chức năng</td>
                </tr>
                <tbody d="e_table_body">
                    <!-- subjects will be show here======= -->
                    @if (!empty($subjectList))
                    @foreach ( $subjectList as $key =>$item)
                    <tr>
                       
                        <td>{{$item->sbj_id}}</td>
                        <td>{{$item->sbj_name}}</td>
                        <td>{{$item->credit_quantity}}</td>
                        <td>{{$item->department}}</td>
                        <td>
                            <a onclick="return confirm('xác nhận xóa')" href="{{ route('admin.deleteSubject',['sbj_id'=>$item->sbj_id]) }}"><i class="fa fa-trash" aria-hidden="true" style="color: red"></i></a>
                        </td>
                    @endforeach
                 @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- chức năng thêm sinh viên -->
    <div id="add_subjects" class="subjects_tabcontent">
        <form autocomplete="off" id="formData" method="POST" action="{{route('admin.addSubject')}}">
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;">Thêm môn học</h2>
            <label for="s_subjectId">Mã môn học</label>
            <input type="text" id="s_subjectId" name="sbj_id">

            <label for="nameSubjects">Tên môn học</label>
            <input type="text" id="nameSubjects" name="sbj_name">

            <label for="nameSubjects">Số tín chỉ</label>
            <input type="text" id="nameSubjects" name="credit_quantity">

            <label for="nameSubjects">Khoa</label>
            <input type="text" id="nameSubjects" name="department">

            <input type="submit" id="sub_subjects_btn">
        </form>
    </div>
</div>
@endsection