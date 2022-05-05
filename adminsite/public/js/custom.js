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
                    $('#editmodal').modal('show');

                })

                // service table modal delete yes btn

                $('#servicedeletebtn').click(function() {
                    var id = $('#servicedeleteid').html();
                    servicedeleteaction(id);


                }); 

                // service table modal edit yes btn

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

//indivisual edit yes button function

function servicedetails(detailid) {


    axios.post('/editservice', {
            id: detailid
        })
        .then(function(response) {

        }).catch(function(error) {

        });


}