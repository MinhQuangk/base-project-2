<section class="dashboard">
    <div class="welcome_admin" style="display: flex;align-items: center;justify-content:space-between ">
        <h1 style="padding: 1% 4%;font-size: 34px;color: #000;width: 20%;">Dashboard</h1>
        <div class="welcome_admin_message" style="width:80%;display: flex;align-self: center;background-color: darkgrey;color: #000;padding: 20px;margin: 15px 0px">
            <h1 style="margin: 0px 15px">
                @php
                    $time = date("H");
                    if($time<"12"){
                        echo "Good Morning";
                    }elseif ($time>"12" && $time<"17") {
                        echo "Good Afternoon";
                    }elseif($time >"17" && $time < "18") {
                        echo "Good Evening";
                    }else {
                        echo "Good Night" ;
                    }

                @endphp
            </h1>
            <h1 style="color:yellow;font-size: 35px"> Quang</h1>
            <h1 style="font-size: 35px;margin-left: 200px"
            
            >@php
            echo date("F j, Y, g:i a")
        @endphp</h1>
        </div>
    </div>
    <div class="cover-img">
        <img src="{{asset('font/img/cartoon-urban-cityscape-with-college-academy-students-university-architecture-background_212168-968.jpg')}}" alt="cover-img">
        <span class="text">
            <h1>Student management system</h1>
            <p>Hệ thống quản lý và đào tạo sinh viên</p>
        </span>
    </div>
</section>