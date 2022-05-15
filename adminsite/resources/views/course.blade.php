@extends('layout.app')
@section('content')
<div id="maincoursedev" class="container d-none">
  <div class="row">
    <div class="col-md-12 p-5">
      <button id="courseinsertbtn" class="btn btn-sm btn-primary my-3">ADD info</button>
      <table id="coursedatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">C.Name</th>
            <th class="th-sm">C.FEES</th>           
            <th class="th-sm">C.Enroll</th>           
            <th class="th-sm">Total Class</th>
            <th class="th-sm">Edit</th>
            <th class="th-sm">Delete</th>
          </tr>
        </thead>
        <tbody id="course_id">
          
          <!-- this is table row is passed in js section to show data  -->
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- loader start -->
<div id="imagecourseload" class="container">
  <div class="row">
    <div class="col-md-12 p-5 text-center">
      <img src="{{asset('images/load.svg')}}" alt="image not found">
    </div>
  </div>
</div>
<!-- loader end -->
<!-- wrong text start -->
<div id="coursewrongtext" class="container d-none">
  <div class="row">
    <div class="col-md-12 p-5 text-center">
      <h3>Something Wend Wrong:-)</h3>
    </div>
  </div>
</div>
<!-- wrong text end -->

<!-- add modal start  -->
<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<form id="courseformid">
  
  
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
        <div class="row">
          <div class="col-md-6">
              <input id="CourseNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
              <input id="CourseDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
          <input id="CourseFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
          <input id="CourseEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
          </div>
          <div class="col-md-6">
          <input id="CourseClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
          <input id="CourseLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
          <input id="CourseImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
          </div>
        </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</form>
</div>
<!-- add modal end -->

<!--course delete Modal start-->
<div class="modal fade" id="coursedeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
        <h4 id="coursedeleteid" class="modal-title mx-auto d-none"> </h4>
        <h4 class="modal-title mx-auto text-danger" id="exampleModalLongTitle">Do You Want DELETE!!!</h4>
      </div>
      <div class="modal-footer">
        <button data-id=" " id="coursedeletebtn" type="button" class="btn btn-primary" data-dismiss="modal">YES</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
      </div>
    </div>
  </div>
</div>
<!--course delete modal section end -->


<!--course update Modal start-->

<div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<form id="courseformid">
    
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="courseeditinput" class="modal-body  text-center d-none">
            <h4 id="courseeditid" class="modal-title mx-auto d-none"></h4>
       <div class="container">
        <div class="row">
          <div class="col-md-6">
              <input id="CourseupdateNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
              <input id="CourseupdateDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
          <input id="CourseupdateFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
          <input id="CourseupdateEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
          </div>
          <div class="col-md-6">
          <input id="CourseupdateClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
          <input id="CourseupdateLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
          <input id="CourseupdateImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
          </div>
        </div>
       </div>
      </div>
         <img id="courseeditload" src="{{asset('images/load.svg')}}" alt="image not found"  style="height: 150px;width: auto">
          <h3 id="courseedittext" class="mx-auto d-none p-4 text-danger">Something Wend Wrong:-)</h3>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="CourseupdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</form>
</div>



<!--course update Modal end-->

@endsection
@section('script')

<script type="text/javascript">

getcoursesdata()  //this is for (custom js's) main function which is called here to execute js function

</script>

@endsection