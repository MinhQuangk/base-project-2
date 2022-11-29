@extends('layout.index')

@section('exam')
<section class="exam">

        <!-- exam add section start============================================== -->
        <div class="add_new_exam">
                <h1>THÊM LỊCH THI</h1>
                <form id="exam_schedule_form" method="POST" action="{{route('admin.addExam')}}">
                        @csrf
                        <div class="row1">
                                <div class="row1_inner1">
                                        <label for="e_name">Mã môn thi*</label><br>
                                        <input type="text" id="e_name" name="sbj_id"><br>
                                </div>
                                <div class="row1_inner2">
                                        <label for="s_type">Hình thức thi*</label><br>
                                        <select name="type" id="type">
                                                <option value="" disabled selected hidden>Please Select</option>
                                                <option value="Thi giữa kì" {{request()->type=='Thi giữa kì'?'selected':false}}>Thi giữa kì</option>
                                                <option value="Thi cuối kì" {{request()->type=='Thi cuối kì'?'selected':false}}>Thi cuối kì</option>
                                                
                                        </select>
                                </div>
                        </div>
                        <div class="row2">
                                <div class="row2_inner1">
                                        <label for="s_class">Nhập tên môn thi</label><br>
                                        <input type="text" id="s_class" name="">
                                </div>
                                <div class="row2_inner2">
                                        <label for="s_section">Thời gian học</label><br>
                                        <select name="years" id="s_section">
                                                <option value="" disabled selected hidden>Please Select</option>
                                                <option value="1" {{request()->years=='1'?'selected':false}}>Năm 1</option>
                                                <option value="2"{{request()->years=='2'?'selected':false}}>Năm 2</option>
                                                <option value="3"{{request()->years=='3'?'selected':false}}>Năm 3</option>
                                                <option value="4"{{request()->years=='4'?'selected':false}}>Năm 4</option>
                                                <option value="Last"{{request()->years=='Last'?'selected':false}}>Năm cuối</option>
                                        </select>
                                </div>
                        </div>
                        <div class="row3">
                                <div class="row3_inner1">
                                        <label for="s_time">Tên lớp</label><br>
                                        <input type="text" id="s_time" name="s_class" required>
                                </div>
                                <div class="row3_inner2">
                                        <label for="s_date">Nhập ngày thi </label><br>
                                        <input type="date" id="s_date" name="exam_date" required>
                                </div>
                        </div>
                        <div class="row4">
                                <div class="row4_inner1">
                                        <label for="s_time">Giờ bắt đầu thi</label><br>
                                        <input type="time" id="s_time" name="exam_time" required>
                                </div>
                                <div class="row4_inner2">
                                        <label for="s_date">Thời gian thi </label><br>
                                        <input type="text"  name="times" required>
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
                </div>
                <div id="see_exam" class="exam_tabcontent">
                        <div class="exam_search">
                                
                               <form >
                                @csrf
                                <input type="text" class="search_input" placeholder="Tìm kiếm kỳ thi..." name="key">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true" style=" padding: 1px 10px;margin: 10px 0px;"></i></button>
                               </form>
                        </div>
                        <table>
                                <tr>
                                        <td width='150px'>Tên môn thi </td>
                                        <td width='200px'>Hình thức thi </td>
                                        <td width='100px'>Lớp</td>
                                        <td width='200px'>Giờ </td>
                                        <td width='200px'>Ngày</td>
                                        <td width='200px'>Thời gian</td>                                      <td></td>
                                </tr>
                                <tbody id="e_table_body">
                                        @if (!empty($examList))
                                @foreach ( $examList as $key =>$item)
                                <tr>
                           
                            <td>{{$item->sbj_name}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->s_class}}</td>
                            <td>{{$item->exam_time}}</td>
                            <td>{{$item->exam_date}}</td>
                            
                            <td>{{$item->times}}</td>
                            <td width='50px' >
                                <a style="margin: 0px auto;" onclick="return confirm('xác nhận xóa')" href="{{ route('admin.deleteExam',['exam_id'=>$item->exam_id]) }}"><i class="fa fa-trash" aria-hidden="true" style="color: red"></i></a>
                            </td>    
                          @endforeach
                                
                            @endif
                                </tbody>
                        </table>
                       
                </div>
        </div>
        <!-- exam table schedule end============================================== -->
</section>
@endsection