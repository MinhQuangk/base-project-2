@extends('layout.index')
@section('noctices')

<section class="notices">
    <h1>Bảng thông báo</h1>
    <span class="notice_location">
        
        

    </span>
    <!-- exam add section start============================================== -->
    <div class="add_new_notice">
        <h1>Tạo thông báo mới </h1>
        <form id="notice_schedule_form" method="POST" action="{{route('admin.addNotices')}}">
            @csrf
            <div class="row1">
                <div class="row1_inner1">
                    <label for="n_title">Tiêu đề </label>
                    <input type="text" id="n_title" name="title">
                </div>
                <div class="row1_inner2">
                    <label for="n_posted_by">Người đăng</label>
                    <input type="text" id="n_posted_by" name="post_by">
                </div>
            </div>
            <div class="row3">
                <label for="n_details">Nội dung</label>
                <br>
                <textarea name="detail_notice" id="n_details" placeholder="Nhập nội dung thông báo ở đây"></textarea>
                <br>
            </div>
            <button class="n_save_btn" id="n_save_btn">Post</button>
            <input type="reset" class="n_reset_btn" id="n_reset_btn"></input>
        </form>
    </div>

    <!-- notice data will show here================================================================= -->
    <div class="show_notice_data">
        <h1>Thông báo</h1>
       @foreach ($NoticeList as $n => $item)
       <div class="posted_notice" id="posted_notice">
        <!-- Total Post will be showing Here =============== -->
        <h1>{{$item->title}}</h1>
        <p>Post by : <span style="color: crimson">{{$item->post_by}}</span></p>
        <p>{{$item->detail_notice}}.</p>
        <p>Đăng ngày: <span style="color: crimson">{{$item->created_at}}</span></p>
        </div>
        
        
       @endforeach
       
    </div>
    <!-- notice data will show here================================================================= -->
</section>
@endsection