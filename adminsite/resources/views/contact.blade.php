@extends('layout.app')
@section('content')
<div id="maincontactdev" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">            
            <table id="contactdatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Contact Name</th>
                        <th class="th-sm">Contact Mobile</th>
                        <th class="th-sm">Contact Email</th>
                        <th class="th-sm">Contact Messege</th>                        
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="contact_id">
                    
                    <!-- this is table row is passed in js section to show data  -->
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- loader start -->
<div id="imagecontactload" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img src="{{asset('images/load.svg')}}" alt="image not found">
        </div>
    </div>
</div>
<!-- loader end -->
<!-- wrong text start -->
<div id="contactwrongtext" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something Wend Wrong:-)</h3>
        </div>
    </div>
</div>
<!-- wrong text end -->

<!--contact delete Modal start-->
<div class="modal fade" id="contactdeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-5 text-center">
                <h4 id="contactdeleteid" class="modal-title mx-auto d-none"> </h4>
                <h4 class="modal-title mx-auto text-danger" id="exampleModalLongTitle">Do You Want DELETE!!!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                <button data-id=" " id="contactdeletebtn" type="button" class="btn btn-primary" data-dismiss="modal">YES</button>
            </div>
        </div>
    </div>
</div>
<!--contact delete modal section end -->

@endsection
@section('script')
<script type="text/javascript">
getcontactdata()  //this is for (custom js's) main function which is called here to execute js function

// course js section start
function getcontactdata() { //this function call to service view in js tag

    axios.get('/getcontact')
        .then(function(response) {

            if (response.status == 200) {

                $('#maincontactdev').removeClass('d-none');
                $('#imagecontactload').addClass('d-none');

                $('#contactdatatable').DataTable().destroy();
                $('#contact_id').empty();
                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(

                        "<td class='th-sm'>" + dataJSON[i].contact_name + "</td>" +
                        "<td class='th-sm'>" + dataJSON[i].contact_mob + "</td>" +
                        "<td class='th-sm'>" + dataJSON[i].contact_email + "</td>" +
                        "<td class='th-sm'>" + dataJSON[i].contact_msg + "</td>" +                        
                        "<td><a data-toggle='modal' class='contactdeletebtnid' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"

                    ).appendTo('#contact_id');
                });

                // course table edit icon click

              

                // // delete button modal show click function start

                $('.contactdeletebtnid').click(function() {
                    var id = $(this).data('id');
                    $('#contactdeleteid').html(id);
                    $("#contactdeletemodal").modal("show");

                })            

                $('#contactdatatable').DataTable({order:false});
                $('.dataTables_length').addClass('bs-select');

            } else {

                $('#imagecontactload').addClass('d-none');
                $('#contactwrongtext').removeClass('d-none');

            }

        }).catch(function(error) {

            $('#imagecontactload').addClass('d-none');
            $('#contactwrongtext').removeClass('d-none');

        });

}

// contact table modal delete modal yes btn click

$('#contactdeletebtn').click(function() {
    var id = $('#contactdeleteid').html();
    contactdeleteaction(id); //to execute method from function
});

//contact modal delete yes button function

function contactdeleteaction(deleteid) {

    $('#contactdeletebtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

    axios.post('/deletecontact', {
            id: deleteid
        })
        .then(function(response) {
            $('#contactdeletebtn').html("yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#contactdeletemodal').modal('hide');
                    toastr.success('DATA DELETE SUCCESSFUL');
                    getcontactdata(); //to reload page after (edit/delete) yes/save button 
                } else {
                    $('#contactdeletemodal').modal('hide');
                    toastr.error('FAILED');
                    getcontactdata(); //to reload page after (edit/delete) yes/save button
                }
            } else {
                $('#contactdeletemodal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            }

        }).catch(function(error) {
            $('#contactdeletemodal').modal('hide');
            toastr.error('SomeThing Went Wrong');
        });
}


// insert button modal show click function start

$("#contactinsertbtn").click(function() {

    $("#addcontactModal").modal("show");

})


</script>
@endsection