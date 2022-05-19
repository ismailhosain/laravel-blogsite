
@extends('layout.app')
@section('title','Contact')

@section('content')


@include('components.contactbanner')


<div class="container">
<div class="row">
<div class="col-md-6">
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233478.81458243378!2d90.1289481162589!3d23.885842690783345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755e9cdc8bac3b5%3A0xc155530f1e9923d6!2sSavar%20Upazila!5e0!3m2!1sen!2sbd!4v1652877259668!5m2!1sen!2sbd" width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="col-md-6">
  <div class="contact-form">
                <h5 class="service-card-title">যোগাযোগ করুন </h5>
                <div class="form-group ">
                    <input id="contactname" type="text" class="form-control w-100" placeholder="আপনার নাম" >
                </div>
                <div class="form-group">
                    <input id="contactmob" type="number" class="form-control  w-100" placeholder="মোবাইল নং " >
                </div>
                <div class="form-group">
                    <input id="contactemail" type="text" class="form-control  w-100" placeholder="ইমেইল " >
                </div>
                <div class="form-group">
                    <input id="contactmsg" type="text" class="form-control  w-100" placeholder="মেসেজ " >
                </div>
                <button id="contactconfirmbtn" class="btn btn-block normal-btn w-100">পাঠিয়ে দিন </button>
        </div>
</div>


</div>

</div>




@endsection



