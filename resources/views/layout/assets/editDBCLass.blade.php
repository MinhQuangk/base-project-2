@extends('layout.index')
@section('class')
<div class="class_section">
    <div class="class_tab">
        <h1>Thông tin Lớp</h1>
       
    </div>
    <!-- Chức năng xem thông tin sinh viên -->
    
    <!-- chức năng thêm sinh viên -->
    <div id="add_class" class="class_tabcontent" style="display: block">
        <form autocomplete="off" id="formData" method="POST" action="{{route('admin.addUpdateClass')}}">
            @csrf
            <h2 style="font-family: Arial, Helvetica, sans-serif;">Chỉnh sửa thông tin lớp {{$detail->class_id}}</h2>
            
            <label for="nameclass">số lượng sinh viên</label>
            <input type="text" id="nameclass" name="quantity" value="{{old('quantity') ??$detail->quantity }}">

            <label for="nameclass">Giáo viên chủ nhiệm(mã)</label>
            <input type="text" id="nameclass" name="form_teacher" value="{{old('form_teacher') ??$detail->form_teacher }}">

            <label for="nameclass">lớp trưởng(mã)</label>
            <input type="text" id="nameclass" name="monitor" value="{{old('monitor') ??$detail->monitor }}">

            <input type="submit" id="sub_class_btn">
        </form>
    </div>
</div>
@endsection