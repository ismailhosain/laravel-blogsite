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