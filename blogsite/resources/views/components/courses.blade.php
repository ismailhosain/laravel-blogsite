
<div class="container section-marginTop text-center">
    <h1 class="section-title">কোর্স সমূহ </h1>
    <h1 class="section-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
    <div class="row">

        @foreach ($coursesdata as $coursesdata)
        <div class="col-md-4 thumbnail-container">
                <img src="{{$coursesdata->course_img}}" alt="Avatar" class="thumbnail-image ">
                <div class="thumbnail-middle">
                    <h1 class="thumbnail-title"> {{$coursesdata->course_name}} </h1>
                    <h1 class="thumbnail-subtitle">{{$coursesdata->course_des}}</h1>
                    <h1 class="thumbnail-subtitle">{{$coursesdata->course_totalenroll}}</h1>
                    <button><a target="_blank" href="{{$coursesdata->course_link}}" style="text-decoration:none">শুরু করুন</a></button>
                </div>
        </div>   
        
        @endforeach
    </div>
</div>
