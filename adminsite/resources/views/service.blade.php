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

<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title mx-auto" id="exampleModalLongTitle">Do You Want DELETE!!!</h4>       
        <h4 class="modal-title mx-auto" id="servicedeleteid"></h4>       
      </div>      
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">YES</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
      </div>
    </div>
  </div>
</div>




<!-- modal section end -->


@endsection

@section('script')

<script type="text/javascript">
	
getservicedata()


</script>

@endsection