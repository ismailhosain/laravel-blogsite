@extends('layout.app')
@section('content')
<div id="maindev" class="container d-none">
  <div class="row">
    <div class="col-md-12 p-5">
      <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">Image</th>
            <th class="th-sm">Name</th>
            <th class="th-sm">Description</th>
            <th class="th-sm">Edit</th>
            <th class="th-sm">Delete</th>
          </tr>
        </thead>
        <tbody id="service_id">
          
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- loader start -->
<div id="imageload" class="container">
  <div class="row">
    <div class="col-md-12 p-5 text-center">
      <img src="{{asset('images/load.svg')}}" alt="image not found">
    </div>
  </div>
</div>
<!-- loader end -->
<!-- wrong text start -->
<div id="wrongtext" class="container d-none">
  <div class="row">
    <div class="col-md-12 p-5 text-center">
      <h3>Something Wend Wrong:-)</h3>
    </div>
  </div>
</div>
<!-- wrong text end -->
<!-- modal sectin start -->
<!-- Button trigger modal -->
<!--delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
        <h4 id="servicedeleteid" class="modal-title mx-auto"></h4>
        <h4 class="modal-title mx-auto" id="exampleModalLongTitle">Do You Want DELETE!!!</h4>
      </div>
      <div class="modal-footer">
        <button data-id=" " id="servicedeletebtn" type="button" class="btn btn-primary" data-dismiss="modal">YES</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
      </div>
    </div>
  </div>
</div>
<!-- modal section end -->


<!-- edit modal start -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
        
        <h4 id="serviceeditid" class="modal-title mx-auto"></h4>
  
      <input type="password" id="typePassword" class="form-control mb-3" placeholder="name" />
      <input type="password" id="typePassword" class="form-control mb-3" placeholder="Description" />
      <input type="password" id="typePassword" class="form-control" placeholder="image link" />

  





      </div>
      <div class="modal-footer">
        <button data-id=" " id="serviceeditbtn" type="button" class="btn btn-primary" data-dismiss="modal">save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- modal section end -->



<!-- edit modal end -->
@endsection
@section('script')
<script type="text/javascript">
  
getservicedata()
</script>
@endsection