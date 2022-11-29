@extends('layout.index')
@section('department')
<div class="subjects_section">
    @if (session('msg'))
                <h3>{{session('msg')}}</h3>
    @endif
    <div class="subjects_tab">
        <h1>Thông tin Khoa</h1>
        <div class="subjects_tab_inner">
            <button class="s_btn_tablinks" onclick="subjectsFunc(event,'see_subjects')" id="s_defaultOpen"><i class="fas fa-info-circle"></i></button>
            <button class="s_btn_tablinks" onclick="subjectsFunc(event,'add_subjects')"><i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
    <!-- Chức năng xem thông tin sinh viên -->
    <div id="see_subjects" class="subjects_tabcontent">
        <form action="" class="subjects_search">
            @csrf
            <input type="text" class="search_input" placeholder="Tìm theo từ khóa" name="key" >
           
            <button type="submit" id="submit"><i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm</button>
        </form>
        <div class_subjects_search>
            <table>
                <tr>
                    
                    <td width='150px'>Mã khoa</td>
                    <td>Tên khoa </td>
                    <td width='100px'>Trưởng Khoa</td>
                    <td width='200px'>Chức năng</td>
                </tr>
                <tbody d="e_table_body">
                    @if (!empty($DepartmentList))
                    @foreach ( $DepartmentList as $key =>$item)
                    <tr>
                       
                        <td>{{$item->department_id }}</td>
                        <td>{{$item->department_name}}</td>
                        <td>{{$item->Dean}}</td>
                        <td>
                            <a onclick="return confirm('xác nhận xóa')" href="{{ route('admin.deleteDepartment',['department_id'=>$item->department_id]) }}"><i class="fa fa-trash" aria-hidden="true" style="color: red"></i></a>
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
        <form autocomplete="off" id="formData" method="POST" action="{{route('admin.addDepartment')}}">
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;">Thêm Khoa</h2>
            <label for="s_subjectId">Mã Khoa</label>
            <input type="text" id="s_subjectId" name="department_id" required>

            <label for="nameSubjects">Tên Khoa</label>
            <input type="text" id="nameSubjects" name="department_name" required>

            <label for="nameSubjects">Trưởng khoa(Mã)</label>
            <input type="text" id="nameSubjects" name="Dean" required>
            <input type="submit" id="sub_subjects_btn">
        </form>
    </div>
</div>
@endsection