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