@extends('layout.app')
@section('title','photos')
@section('content')


<div class="col-md-12 pt-3">
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
    <div class="row" id="photoloadid">

    </div>
    <button class="btn btn-primary" id="loadmore">Load More</button>
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

$('#imginput').change(function() {

    var reader = new FileReader();

    reader.readAsDataURL(this.files[0]);

    reader.onload = function(event) {

        var imgpath = event.target.result;

        $('#imgpreview').attr('src', imgpath);

    }
})

$('#photosave').on('click', function() {
    $('#photosave').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

    var photoindex = $('#imginput').prop('files')[0];

    var formdata = new FormData();

    formdata.append('photo', photoindex);

    axios.post('/photoupload', formdata).then(function(response) {
        $('#photosave').html("save");
        if (response.status == 200 && response.data == 1) {
            $('#addphotoModal').modal('hide');
            toastr.success('PHOTO UPLOADED');
        } else {
            $('#addphotoModal').modal('hide');
            toastr.error('PHOTO UPLOAD FAILED');
        }

    }).catch(function(error) {
        $('#addphotoModal').modal('hide');
        toastr.error('PHOTO UPLOAD FAILED');
    })

})

photoload()

function photoload() {

    axios.get('/photoselect').then(function(response) {

        $('#galleryload').addClass('d-none');
        $.each(response.data, function(i, item) {
            $("<div class='col-md-3 p-1'>").html(

                "<img data-id=" + item['id'] + " class='photoshow img-thumbnail' src=" + item['location'] + " >"+
                "<input type='text' value=" + item['location'] + ">"+
                
                "<button data-id=" + item['id'] +" data-photo=" + item['location'] +" class='btn photodelete btn-sm btn-danger'>DELETE</button>"

            ).appendTo('#photoloadid');
        })

         $('.photodelete').on('click',function(event){

                let id=$(this).data('id');
                let photo=$(this).data('photo');

                photodelete(photo,id);

            event.preventDefault();
        })


    }).catch(function(error) {

    })

}

  var imageload=0;      //this should be same value 

 function imageloadmore(photoid,loadspin){

    imageload=imageload+8;    //this should be same value 

  let imageloadmore=photoid+imageload;

  let URL="/photoload/"+imageloadmore;
$('#loadmore').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
    axios.get(URL).then(function(response) {

            $('#loadmore').html("LOAD MORE");
        $('#galleryload').addClass('d-none');
        $.each(response.data, function(i, item) {
            $("<div class='col-md-3 p-1'>").html(

                "<img data-id=" + item['id'] + " class='photoshow img-thumbnail' src=" + item['location'] + " >"+
                "<input type='text' value=" + item['location'] + ">"+
                "<button data-id=" + item['id'] +" data-photo=" + item['location'] +" class='btn btn-sm btn-danger'>DELETE</button>"
            ).appendTo('#photoloadid');
        })

    })

 }


$('#loadmore').on('click',function(){

    let loadspin=$(this);

    let photoid=$(this).closest('div').find('img').data('id');

imageloadmore(photoid,loadspin);

})

function photodelete(oldphotourl,id){

    let URL="/photodelete";

    let MyFormData=new FormData();

    MyFormData.append('oldphotourl',oldphotourl);
    MyFormData.append('id',id);

    axios.post(URL,MyFormData).then(function(response){

        if(response.status==200 && response.data==1){
            toastr.success("Successfully DELETED");
            window.location.href="/photo";
        }else{
            toastr.error("DELETE failed");
        }

    }).catch(function(error){
 toastr.error("Not DELETED");
    })


}

$('#photoinsertbtn').click(function() {
    $("#addphotoModal").modal("show");
});
</script>

@endsection