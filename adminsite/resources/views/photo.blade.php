@extends('layout.app')
@section('title','photos')
@section('content')


<div class="col-md-12 p-5">
	<button id="photoinsertbtn" class="btn btn-sm btn-primary my-3">ADD info</button>
	
</div>

<!-- add modal start  -->
<div class="modal fade" id="addphotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">       
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ADD Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    
                                <input id="imginput" type="file" class="form-control mb-3">
                                <img id="imgpreview" src="{{ asset('image_gallery/no_image.jpg') }}" alt="">
                            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="photosave" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
</div>
<!-- add modal end -->

<div class="container-fluid">
    <div class="row" id="photoid">

    </div>
</div>

<!-- loader start -->
<div id="galleryload" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img src="{{asset('images/load.svg')}}" alt="image not found">
        </div>
    </div>
</div>
<!-- loader end -->


@endsection
@section('script')

<script type="text/javascript">

$('#imginput').change(function(){

	var reader=new FileReader();

	reader.readAsDataURL(this.files[0]);

	reader.onload=function(event){

	var imgpath= event.target.result;

		$('#imgpreview').attr('src',imgpath);

	}
})


$('#photosave').on('click',function() {
    $('#photosave').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

    var photoindex=$('#imginput').prop('files')[0];

    var formdata=new FormData();

    formdata.append('photo',photoindex);

  axios.post('/photoupload',formdata).then(function(response){
            $('#photosave').html("save");
    if(response.status == 200 && response.data == 1){
              $('#addphotoModal').modal('hide');
            toastr.success('PHOTO UPLOADED');
    }else{
        $('#addphotoModal').modal('hide');
            toastr.error('PHOTO UPLOAD FAILED');
    }
 
  }).catch(function(error){
     $('#addphotoModal').modal('hide');
            toastr.error('PHOTO UPLOAD FAILED');
  })
    
})


photoload()
function photoload(){

axios.get('/photoselect').then(function(response){

    $('#galleryload').addClass('d-none');
$.each(response.data, function(i, item) {
                    $("<div class='col-md-4 p-2'>").html(

                      "<img class='photoshow img-thumbnail' src="+item['location']+" >"  

                    ).appendTo('#photoid');
                });



}).catch(function(error){

})

}



$('#photoinsertbtn').click(function() {
	$("#addphotoModal").modal("show");
});
</script>

@endsection