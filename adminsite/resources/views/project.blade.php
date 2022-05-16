@extends('layout.app')
@section('content')
<div id="mainprojectdev" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="projectinsertbtn" class="btn btn-sm btn-primary my-3">ADD info</button>
            <table id="projectdatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Project.Name</th>
                        <th class="th-sm">Project Desc.</th>
                        <th class="th-sm">Project Link</th>
                        <th class="th-sm">Project Img</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="project_id">
                    
                    <!-- this is table row is passed in js section to show data  -->
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- loader start -->
<div id="imageprojectload" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img src="{{asset('images/load.svg')}}" alt="image not found">
        </div>
    </div>
</div>
<!-- loader end -->
<!-- wrong text start -->
<div id="projectwrongtext" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something Wend Wrong:-)</h3>
        </div>
    </div>
</div>
<!-- wrong text end -->

<!-- add modal start  -->
<div class="modal fade" id="addprojectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form id="projectformid">       
        
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
                                <input id="projectNameId" type="text" id="" class="form-control mb-3" placeholder="project Name">
                                <input id="projectDesId" type="text" id="" class="form-control mb-3" placeholder="project Description">                              
                            </div>
                            <div class="col-md-6">
                                 <input id="projectlinkId" type="text" id="" class="form-control mb-3" placeholder="project Link">
                                <input id="projectimgid" type="text" id="" class="form-control mb-3" placeholder="Project Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="projectAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- add modal end -->

<!--project delete Modal start-->
<div class="modal fade" id="projectdeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-5 text-center">
                <h4 id="projectdeleteid" class="modal-title mx-auto d-none"> </h4>
                <h4 class="modal-title mx-auto text-danger" id="exampleModalLongTitle">Do You Want DELETE!!!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                <button data-id=" " id="projectdeletebtn" type="button" class="btn btn-primary" data-dismiss="modal">YES</button>
            </div>
        </div>
    </div>
</div>
<!--project delete modal section end -->

<!--project update Modal start-->
<div class="modal fade" id="updateprojectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">      
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="projecteditinput" class="modal-body  text-center d-none">
                    <h4 id="projecteditid" class="modal-title mx-auto d-none"></h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="projectupdateNameId" type="text" id="" class="form-control mb-3" placeholder="Project Name">
                                <input id="projectupdateDesId" type="text" id="" class="form-control mb-3" placeholder="Project Description">                              
                            </div>
                            <div class="col-md-6">
                               <input id="projectupdatelink" type="text" id="" class="form-control mb-3" placeholder="Project Link">
                                <input id="projectupdateimg" type="text" id="" class="form-control mb-3" placeholder="Project Image">
                            </div>
                        </div>
                    </div>
                </div>
                <img id="projecteditload" src="{{asset('images/load.svg')}}" alt="image not found"  style="height: 150px;width: auto">
                <h3 id="projectedittext" class="mx-auto d-none p-4 text-danger">Something Wend Wrong:-)</h3>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="projectupdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
</div>
<!--project update Modal end-->
@endsection
@section('script')
<script type="text/javascript">
getprojectdata()  //this is for (custom js's) main function which is called here to execute js function

// course js section start
function getprojectdata() { //this function call to service view in js tag

    axios.get('/getproject')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainprojectdev').removeClass('d-none');
                $('#imageprojectload').addClass('d-none');

                $('#projectdatatable').DataTable().destroy();
                $('#project_id').empty();
                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(

                        "<td class='th-sm'>" + dataJSON[i].project_name + "</td>" +
                        "<td class='th-sm'>" + dataJSON[i].project_des + "</td>" +
                        "<td class='th-sm'>" + dataJSON[i].project_link + "</td>" +
                        "<td class='th-sm'>" + dataJSON[i].project_img + "</td>" +
                        "<td><a class='projecteditsave' data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a data-toggle='modal' class='projectdeletebtnid' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"

                    ).appendTo('#project_id');
                });

                // course table edit icon click

                $('.projecteditsave').click(function() {

                    var id = $(this).data('id');
                    $('#projecteditid').html(id);
                    projectdetails(id);
                     $('#updateprojectModal').modal('show');

                })

                // // delete button modal show click function start

                $('.projectdeletebtnid').click(function() {
                    var id = $(this).data('id');
                    $('#projectdeleteid').html(id);
                    $("#projectdeletemodal").modal("show");

                })


                // // project table modal edit yes btn click

                // $('#projectupdateConfirmBtn').click(function() {
                //     var id = $('#projecteditid').html();
                //     serviceeditsection(id);

                // });

                $('#projectdatatable').DataTable({order:false});
                $('.dataTables_length').addClass('bs-select');

            } else {

                $('#imageprojectload').addClass('d-none');
                $('#projectwrongtext').removeClass('d-none');

            }

        }).catch(function(error) {

            $('#imageprojectload').addClass('d-none');
            $('#projectwrongtext').removeClass('d-none');

        });

}

// project table modal delete modal yes btn click

$('#projectdeletebtn').click(function() {
    var id = $('#projectdeleteid').html();
    projectdeleteaction(id); //to execute method from function
});

//project modal delete yes button function

function projectdeleteaction(deleteid) {

    $('#projectdeletebtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

    axios.post('/deleteproject', {
            id: deleteid
        })
        .then(function(response) {
            $('#projectdeletebtn').html("yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#projectdeletemodal').modal('hide');
                    toastr.success('DATA DELETE SUCCESSFUL');
                    getprojectdata(); //to reload page after (edit/delete) yes/save button 
                } else {
                    $('#projectdeletemodal').modal('hide');
                    toastr.error('FAILED');
                    getprojectdata(); //to reload page after (edit/delete) yes/save button
                }
            } else {
                $('#projectdeletemodal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            }

        }).catch(function(error) {
            $('#projectdeletemodal').modal('hide');
            toastr.error('SomeThing Went Wrong');
        });
}



//Catch indivisual edit icon button function

function projectdetails(detailid) {
    axios.post('/editproject', {
            id: detailid
        })
        .then(function(response) {

            if (response.status == 200) {

                var dataJSON = response.data;

                $('#projecteditinput').removeClass('d-none');
                $('#projecteditload').addClass('d-none');

                $('#projectupdateNameId').val(dataJSON[0].project_name);
                $('#projectupdateDesId').val(dataJSON[0].project_des);
                $('#projectupdatelink').val(dataJSON[0].project_link);
                $('#projectupdateimg').val(dataJSON[0].project_img);                

            } else {
                $('#projecteditload').addClass('d-none');
                $('#projectedittext').removeClass('d-none');

            }

        }).catch(function(error) {
            $('#projecteditload').addClass('d-none');
            $('#projectedittext').removeClass('d-none');
        });

}


// project modal update save button click/press

$('#projectupdateConfirmBtn').click(function() {
    var id = $('#projecteditid').html();
    var p_name = $('#projectupdateNameId').val();
    var p_desc = $('#projectupdateDesId').val();
    var p_link = $('#projectupdatelink').val();
    var p_img = $('#projectupdateimg').val();    
    projectupdatesave(id, p_name, p_desc, p_link, p_img);

});

//course modal save button indivisual edit function

function projectupdatesave(id, projectname, projectdes, projectlink, projectimg) {

    if (projectname == 0) {
        toastr.error('Projectname Is Empty');

    } else if (projectdes == 0) {

        toastr.error('Description Is Empty');

    } else if (projectlink == 0) {

        toastr.error('ProjectLink Is Empty');

    } else if (projectimg == 0) {

        toastr.error('ProjectImage Is Empty');

    }else {
        $('#projectupdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
        axios.post('/editprojectsave', {
                id: id,
                pname: projectname,
                pdesc: projectdes,
                plink: projectlink,
                pimg: projectimg,                
            })
            .then(function(response) {
                $('#projectupdateConfirmBtn').html("save");
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#updateprojectModal').modal('hide');
                        toastr.success('DATA UPDATE SUCCESSFUL');
                        getprojectdata(); //to reload page after (edit/delete) yes/save button
                    } else {
                        $('#updateprojectModal').modal('hide');
                        toastr.error('DATA UPDATE FAILED');
                        getprojectdata(); //to reload page after (edit/delete) yes/save button
                    }

                } else {
                    $('#updateprojectModal').modal('hide');
                    toastr.error('SomeThing Went Wrong');
                }

            }).catch(function(error) {
                $('#updateprojectModal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            });
    }

}

//                             <=====insert section start=====>

// project add info sertion to reload form

$('#projectinsertbtn').click(function() {

    $('#projectformid').trigger('reset');
    $('#addprojectModal').modal('show');

});

// project modal insert save button click/press
$('#projectAddConfirmBtn').click(function() {
    var pname = $('#projectNameId').val();
    var pdes = $('#projectDesId').val();
    var plink = $('#projectlinkId').val();
    var pimg = $('#projectimgid').val();  
    projectinsertsave(pname,pdes,plink,pimg);

});

//project modal add button indivisual insert function

function projectinsertsave(projectname,projectdes,projectlink, projectimg) {

    if (projectname == 0) {
        toastr.error('Projectname Is Empty');
    } else if (projectdes == 0) {
        toastr.error('ProjectDescription Is Empty');
    } else if (projectlink == 0) {
        toastr.error('ProjectLink Is Empty');
    } else if (projectimg == 0) {
        toastr.error('ProjectImage Is Empty');
    }  else {
        $('#projectAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
        axios.post('/insertprojectsave', {
            pname: projectname,
            pdesc: projectdes,
            plink: projectlink,
            pimg: projectimg,           
        }).then(function(response) {
            $('#projectAddConfirmBtn').html("save");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#addprojectModal').modal('hide');
                    toastr.success('DATA INSERT SUCCESSFUL');
                    getprojectdata(); //to reload page after (edit/delete) yes/save button

                } else {
                    $('#addprojectModal').modal('hide');
                    toastr.error('DATA INSERT FAILED');
                    getprojectdata(); //to reload page after (edit/delete) yes/save button
                }

            } else {
                $('#addprojectModal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            }

        }).catch(function(error) {
            $('#addprojectModal').modal('hide');
            toastr.error('SomeThing Went Wrong');
        });
    }

}


// insert button modal show click function start

$("#projectinsertbtn").click(function() {

    $("#addprojectModal").modal("show");

})


</script>
@endsection