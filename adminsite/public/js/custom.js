$(document).ready(function() {
    $('#VisitorDt').DataTable();
    $('.dataTables_length').addClass('bs-select');
});

function getservicedata() {   //this function call to service view in js tag

    axios.get('/getservice')
        .then(function(response) {

            if (response.status == 200) {

                $('#maindev').removeClass('d-none');
                $('#imageload').addClass('d-none');
                $('#service_id').empty();

                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(

                        "<td>+<img class='table-img' src=" + dataJSON[i].service_img + "></td>" +
                        "<td>" + dataJSON[i].service_name + "</td>" +
                        "<td>" + dataJSON[i].service_des + "</td>" +
                        "<td><a class='serviceeditsave' data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a data-toggle='modal' class='servicedeleteid' data-id=" + dataJSON[i].id + " data-target='#deletemodal'><i class='fas fa-trash-alt'></i></a></td>"

                    ).appendTo('#service_id');
                });

                // service table delete icon click

                $('.servicedeleteid').click(function() {

                    var id = $(this).data('id');
                    $('#servicedeleteid').html(id);
                    $('#deletemodal').modal('show');

                })

                // service table edit icon click

                $('.serviceeditsave').click(function() {

                    var id = $(this).data('id');
                    $('#serviceeditid').html(id);
                    servicedetails(id);
                    $('#editmodal').modal('show');

                })

                // service table modal edit yes btn click

                $('#serviceeditbtn').click(function() {
                    var id = $('#serviceeditid').html();
                    serviceeditsection(id);

                });

            } else {

                $('#imageload').addClass('d-none');
                $('#wrongtext').removeClass('d-none');

            }

        }).catch(function(error) {

            $('#imageload').addClass('d-none');
            $('#wrongtext').removeClass('d-none');

        });

}

// service table modal delete modal yes btn click

$('#servicedeletebtn').click(function() {
    var id = $('#servicedeleteid').html();
    servicedeleteaction(id); //to execute method from function
});

//service modal delete yes button function

function servicedeleteaction(deleteid) {

  $('#servicedeletebtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

    axios.post('/deleteservice', {
            id: deleteid
        })
        .then(function(response) {
  $('#servicedeletebtn').html("yes");
            if(response.status == 200){
              if (response.data == 1) {
                $('#deletemodal').modal('hide');
                toastr.success('DATA DELETE SUCCESSFUL');
                getservicedata();   //to reload page after (edit/delete) yes/save button 
            } else {
                $('#deletemodal').modal('hide');
                toastr.error('FAILED');
                getservicedata();   //to reload page after (edit/delete) yes/save button
            }
            }else{
                $('#deletemodal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            }          

        }).catch(function(error) {
            $('#deletemodal').modal('hide');
            toastr.error('SomeThing Went Wrong');
        });
}

// service modal update save button click/press
$('#serviceupdatebtn').click(function() {
    var id = $('#serviceeditid').html();
    var name = $('#titledetails').val();
    var desc = $('#descriptiondetails').val();
    var img = $('#imagedetails').val();
    serviceupdatesave(id, name, desc, img);

});

//Catch indivisual edit icon button function

function servicedetails(detailid) {
    axios.post('/editservice', {
            id: detailid
        })
        .then(function(response) {
          
            if (response.status == 200) {

                var dataJSON = response.data;

                $('#serviceeditinput').removeClass('d-none');
                $('#serviceeditload').addClass('d-none');

                $('#titledetails').val(dataJSON[0].service_name);
                $('#descriptiondetails').val(dataJSON[0].service_des);
                $('#imagedetails').val(dataJSON[0].service_img);

            } else {
                $('#serviceeditload').addClass('d-none');
                $('#serviceedittext').removeClass('d-none');

            }

        }).catch(function(error) {
            $('#serviceeditload').addClass('d-none');
            $('#serviceedittext').removeClass('d-none');
        });

}

//service modal save button indivisual edit function

function serviceupdatesave(id, servicename, servicedesc, serviceimg) {

    if (servicename == 0) {
        toastr.error('Servicename Is Empty');

    } else if (servicedesc == 0) {

        toastr.error('Description Is Empty');

    } else if (serviceimg == 0) {

        toastr.error('Image Is Empty');

    } else {
  $('#serviceupdatebtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
        axios.post('/editservicesave', {
                id: id,
                name: servicename,
                desc: servicedesc,
                img: serviceimg,
            })
            .then(function(response) {
     $('#serviceupdatebtn').html("save");
                if(response.status == 200){
                  if (response.data == 1) {
                    $('#editmodal').modal('hide');
                    toastr.success('DATA UPDATE SUCCESSFUL');
                    getservicedata();   //to reload page after (edit/delete) yes/save button
                } else {
                    $('#editmodal').modal('hide');
                    toastr.error('DATA UPDATE FAILED');
                    getservicedata();   //to reload page after (edit/delete) yes/save button
                }

                }else{
                    $('#editmodal').modal('hide');
                    toastr.error('SomeThing Went Wrong');
                }

            }).catch(function(error) {
                $('#editmodal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            });
    }

}

//                             <=====insert section start=====>

// service add info sertion

$('#serviceinsertbtn').click(function(){

$('#formid').trigger('reset');
$('#addmodal').modal('show');

});

// service modal insert save button click/press
$('#serviceaddbtn').click(function() {
    var id = $('#serviceinsertinput').html();
    var name = $('#inserttitle').val();
    var desc = $('#insertdescription').val();
    var img = $('#insertimage').val();
    serviceinsertsave(name, desc, img);

});

//service modal add button indivisual insert function

function serviceinsertsave(servicename, servicedesc, serviceimg) {

    if (servicename == 0) {
        toastr.error('Servicename Is Empty');

    } else if (servicedesc == 0) {

        toastr.error('Description Is Empty');

    } else if (serviceimg == 0) {

        toastr.error('Image Is Empty');

    } else {
  $('#serviceaddbtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
        axios.post('/insertservicesave', {
                name: servicename,
                desc: servicedesc,
                img: serviceimg,
            })
            .then(function(response) {
     $('#serviceaddbtn').html("save");
                if(response.status == 200){
                  if (response.data == 1) {
                    $('#addmodal').modal('hide');
                    toastr.success('DATA UPDATE SUCCESSFUL');
                    getservicedata();   //to reload page after (edit/delete) yes/save button

                } else {
                    $('#addmodal').modal('hide');
                    toastr.error('DATA UPDATE FAILED');
                    getservicedata();   //to reload page after (edit/delete) yes/save button
                }

                }else{
                    $('#addmodal').modal('hide');
                    toastr.error('SomeThing Went Wrong');
                }

            }).catch(function(error) {
                $('#addmodal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            });
    }

}