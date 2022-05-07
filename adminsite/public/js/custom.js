$(document).ready(function() {
    $('#VisitorDt').DataTable();
    $('.dataTables_length').addClass('bs-select');
});




function getservicedata() {

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
                        "<td><a class='serviceeditid' data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
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

                $('.serviceeditid').click(function() {

                    var id = $(this).data('id');
                    $('#serviceeditid').html(id);
                    servicedetails(id);
                    $('#editmodal').modal('show');

                })

                // service table modal delete yes btn click

                $('#servicedeletebtn').click(function() {
                    var id = $('#servicedeleteid').html();
                    servicedeleteaction(id); //to execute method from function


                });

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




// delete yes button function

function servicedeleteaction(deleteid) {


    axios.post('/deleteservice', {
            id: deleteid
        })
        .then(function(response) {

            if (response.data == 1) {
                $('#deletemodal').modal('hide');
                toastr.success('DATA DELTE SUCCESSFUL');
                getservicedata();
            } else {
                $('#deletemodal').modal('hide');
                toastr.error('FAILED');
                getservicedata();
            }

        }).catch(function(error) {

        });


}

//Catch indivisual edit yes button function

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