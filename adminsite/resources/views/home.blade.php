@extends('layout.app')
@section('title','Home')

@section('content')

<!-- total visitor -->

<div class="container ">
  
  <div class="row text-center">
     <div class="col-md-3 card p-2 m-4" style="width:280px">
    <img class="card-img-top" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{$visitorcount}}</h4>
      <p class="card-text">Total Visitors</p>
    </div>
  </div>

<!-- total service -->
  <div class="col-md-3 card p-2 m-4" style="width:280px">
    <img class="card-img-top" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{$servicecount}}</h4>
      <p class="card-text">Total Services</p>
    </div>
  </div>

  <!-- total course -->
  <div class="col-md-3 card p-2 m-4" style="width:280px">
    <img class="card-img-top" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{$coursecount}}</h4>
      <p class="card-text">Total Courses</p>
    </div>
  </div>
  </div>

  <div class="row text-center">
      <!-- total Project -->
  <div class="col-md-3 card p-2 m-4" style="width:280px">
    <img class="card-img-top" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{$projectcount}}</h4>
      <p class="card-text">Total Projects</p>
    </div>
  </div>


  <!-- total Contacts -->
  <div class="col-md-3 card p-2 m-4" style="width:280px">
    <img class="card-img-top" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{$contactcount}}</h4>
      <p class="card-text">Total Contacts</p>
    </div>
  </div>

  <!-- total reviews -->
  <div class="col-md-3 card p-2 m-4" style="width:280px">
    <img class="card-img-top" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{$reviewcount}}</h4>
      <p class="card-text">Total Reviews</p>
    </div>
  </div>
  </div>


</div>
@endsection