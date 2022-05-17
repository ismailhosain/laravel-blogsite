@extends('layout.app')
@section('content')
<div id="mainreviewdev" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="reviewinsertbtn" class="btn btn-sm btn-primary my-3">ADD info</button>
            <table id="reviewdatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>                        
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="review_id">
                    
                    <!-- this is table row is passed in js section to show data  -->
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- loader start -->
<div id="imagereviewload" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img src="{{asset('images/load.svg')}}" alt="image not found">
        </div>
    </div>
</div>
<!-- loader end -->
<!-- wrong text start -->
<div id="reviewwrongtext" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something Wend Wrong:-)</h3>
        </div>
    </div>
</div>
<!-- wrong text end -->

<!-- add modal start  -->
<div class="modal fade" id="addreviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form id="reviewformid">       
        
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="reviewNameId" type="text" id="" class="form-control mb-3" placeholder="review Name">
                                <textarea id="reviewDesId" class="form-control" rows="7" placeholder="review Description"></textarea>                                                         
                            </div>
                            <div class="col-md-6">
                                 
                                <input id="reviewimgid" type="text" id="" class="form-control mb-3" placeholder="review Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="reviewAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- add modal end -->

<!--review delete Modal start-->
<div class="modal fade" id="reviewdeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-5 text-center">
                <h4 id="reviewdeleteid" class="modal-title mx-auto d-none"> </h4>
                <h4 class="modal-title mx-auto text-danger" id="exampleModalLongTitle">Do You Want DELETE!!!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                <button data-id=" " id="reviewdeletebtn" type="button" class="btn btn-primary" data-dismiss="modal">YES</button>
            </div>
        </div>
    </div>
</div>
<!--review delete modal section end -->

<!--review update Modal start-->
<div class="modal fade" id="updatereviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">      
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="revieweditinput" class="modal-body  text-center d-none">
                    <h4 id="revieweditid" class="modal-title mx-auto d-none"></h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="reviewupdateNameId" type="text" id="" class="form-control mb-3" placeholder="review Name">
                                <textarea id="reviewupdateDesId" class="form-control" rows="7"></textarea>
                                                             
                            </div>
                            <div class="col-md-6">
                               
                                <input id="reviewupdateimg" type="text" id="" class="form-control mb-3" placeholder="review Image">
                            </div>
                        </div>
                    </div>
                </div>
                <img id="revieweditload" src="{{asset('images/load.svg')}}" alt="image not found"  style="height: 150px;width: auto">
                <h3 id="reviewedittext" class="mx-auto d-none p-4 text-danger">Something Wend Wrong:-)</h3>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="reviewupdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
</div>
<!--review update Modal end-->
@endsection
@section('script')
<script type="text/javascript">
getreviewdata()  //this is for (custom js's) main function which is called here to execute js function



// course js section start
function getreviewdata() { //this function call to service view in js tag

    axios.get('/getreview')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainreviewdev').removeClass('d-none');
                $('#imagereviewload').addClass('d-none');
                $('#reviewdatatable').DataTable().destroy();
                $('#review_id').empty();
                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(

                        "<td class='th-sm'>" + dataJSON[i].name + "</td>" +
                        "<td class='th-sm'>" + dataJSON[i].description + "</td>" +
                        "<td class='th-sm'>" + dataJSON[i].image + "</td>" +                        
                        "<td><a class='revieweditsave' data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a data-toggle='modal' class='reviewdeletebtnid' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"

                    ).appendTo('#review_id');
                });

                // course table edit icon click

                $('.revieweditsave').click(function() {

                    var id = $(this).data('id');
                    $('#revieweditid').html(id);
                    reviewdetails(id);
                     $('#updatereviewModal').modal('show');

                })

                // // delete button modal show click function start

                $('.reviewdeletebtnid').click(function() {
                    var id = $(this).data('id');
                    $('#reviewdeleteid').html(id);
                    $("#reviewdeletemodal").modal("show");

                })


                // // review table modal edit yes btn click

                // $('#reviewupdateConfirmBtn').click(function() {
                //     var id = $('#revieweditid').html();
                //     serviceeditsection(id);

                // });

                $('#reviewdatatable').DataTable({order:false});
                $('.dataTables_length').addClass('bs-select');

            } else {

                $('#imagereviewload').addClass('d-none');
                $('#reviewwrongtext').removeClass('d-none');

            }

        }).catch(function(error) {

            $('#imagereviewload').addClass('d-none');
            $('#reviewwrongtext').removeClass('d-none');

        });

}

// review table modal delete modal yes btn click

$('#reviewdeletebtn').click(function() {
    var id = $('#reviewdeleteid').html();
    reviewdeleteaction(id); //to execute method from function
});

//review modal delete yes button function

function reviewdeleteaction(deleteid) {

    $('#reviewdeletebtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

    axios.post('/deletereview', {
            id: deleteid
        })
        .then(function(response) {
            $('#reviewdeletebtn').html("yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#reviewdeletemodal').modal('hide');
                    toastr.success('DATA DELETE SUCCESSFUL');
                    getreviewdata(); //to reload page after (edit/delete) yes/save button 
                } else {
                    $('#reviewdeletemodal').modal('hide');
                    toastr.error('FAILED');
                    getreviewdata(); //to reload page after (edit/delete) yes/save button
                }
            } else {
                $('#reviewdeletemodal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            }

        }).catch(function(error) {
            $('#reviewdeletemodal').modal('hide');
            toastr.error('SomeThing Went Wrong');
        });
}



//Catch indivisual edit icon button function

function reviewdetails(detailid) {
    axios.post('/editreview', {
            id: detailid
        })
        .then(function(response) {

            if (response.status == 200) {

                var dataJSON = response.data;

                $('#revieweditinput').removeClass('d-none');
                $('#revieweditload').addClass('d-none');

                $('#reviewupdateNameId').val(dataJSON[0].name);
                $('#reviewupdateDesId').val(dataJSON[0].description);
                $('#reviewupdateimg').val(dataJSON[0].image);         

            } else {
                $('#revieweditload').addClass('d-none');
                $('#reviewedittext').removeClass('d-none');

            }

        }).catch(function(error) {
            $('#revieweditload').addClass('d-none');
            $('#reviewedittext').removeClass('d-none');
        });

}


// review modal update save button click/press

$('#reviewupdateConfirmBtn').click(function() {
    var id = $('#revieweditid').html();
    var r_name = $('#reviewupdateNameId').val();
    var r_desc = $('#reviewupdateDesId').val();
    var r_image = $('#reviewupdateimg').val();   
    reviewupdatesave(id, r_name, r_desc, r_image);

});

//course modal save button indivisual edit function

function reviewupdatesave(id, rname, rdescription,rimage) {

    if (rname == 0) {
        toastr.error('Name Is Empty');

    } else if (rdescription == 0) {

        toastr.error('Description Is Empty');

    } else if (rimage == 0) {

        toastr.error('Image Is Empty');

    }else {
        $('#reviewupdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
        axios.post('/editreviewsave', {
                id: id,
                name: rname,
                description: rdescription,
                image: rimage,                               
            })
            .then(function(response) {
                $('#reviewupdateConfirmBtn').html("save");
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#updatereviewModal').modal('hide');
                        toastr.success('DATA UPDATE SUCCESSFUL');
                        getreviewdata(); //to reload page after (edit/delete) yes/save button
                    } else {
                        $('#updatereviewModal').modal('hide');
                        toastr.error('DATA UPDATE FAILED');
                        getreviewdata(); //to reload page after (edit/delete) yes/save button
                    }

                } else {
                    $('#updatereviewModal').modal('hide');
                    toastr.error('SomeThing Went Wrong');
                }

            }).catch(function(error) {
                $('#updatereviewModal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            });
    }

}

//                             <=====insert section start=====>

// review add info sertion to reload form

$('#reviewinsertbtn').click(function() {

    $('#reviewformid').trigger('reset');
    $('#addreviewModal').modal('show');

});

// review modal insert save button click/press
$('#reviewAddConfirmBtn').click(function() {
    var rname = $('#reviewNameId').val();
    var rdes = $('#reviewDesId').val();
    var rimage = $('#reviewimgid').val();    
    reviewinsertsave(rname,rdes,rimage);

});

//review modal add button indivisual insert function

function reviewinsertsave(rname,rdescription,rimage) {

    if (rname == 0) {
        toastr.error('Name Is Empty');
    } else if (rdescription == 0) {
        toastr.error('Description Is Empty');
    } else if (rimage == 0) {
        toastr.error('Image Is Empty');
    } else {
        $('#reviewAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
        axios.post('/insertreviewsave', {
            name: rname,
            description: rdescription,
            image: rimage,                      
        }).then(function(response) {
            $('#reviewAddConfirmBtn').html("save");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#addreviewModal').modal('hide');
                    toastr.success('DATA INSERT SUCCESSFUL');
                    getreviewdata(); //to reload page after (edit/delete) yes/save button

                } else {
                    $('#addreviewModal').modal('hide');
                    toastr.error('DATA INSERT FAILED');
                    getreviewdata(); //to reload page after (edit/delete) yes/save button
                }

            } else {
                $('#addreviewModal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            }

        }).catch(function(error) {
            $('#addreviewModal').modal('hide');
            toastr.error('SomeThing Went Wrong');
        });
     }

}



// insert button modal show click function start

$("#reviewinsertbtn").click(function() {

    $("#addreviewModal").modal("show");

});



</script>
@endsection