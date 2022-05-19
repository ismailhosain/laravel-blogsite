<div class="container mt-5">
    <div class="row">


        @foreach($coursedata as $data)
        <div class="col-md-4 p-1 text-center">
            <div class="card">
                <div class="text-center">
                    <img class="w-100" src="{{$data->course_img}}" alt="Card image cap">
                    <h5 class="service-card-title mt-4">{{$data->course_name}}</h5>
                    <h6 class="service-card-subTitle p-0 ">{{$data->course_des}}</h6>
                    <h6 class="service-card-subTitle p-0 ">রেজিঃ {{$data->course_fee}} মোট ক্লাসঃ {{$data->course_totalclass}}</h6>
                    <button class="normal-btn-outline mt-2 mb-4 btn"><a href="{{$data->course_link}}"> শুরু করুন </a></button>
                </div>
            </div>
        </div>
        @endforeach
        

    </div>
</div>
