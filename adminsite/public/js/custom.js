// course js section start
function getcoursesdata() { //this function call to service view in js tag

    axios.get('/getcourse')
        .then(function(response) {

            if (response.status == 200) {

                $('#maincoursedev').removeClass('d-none');
                $('#imagecourseload').addClass('d-none');
                $('#course_id').empty();

                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(

        "<td class='th-sm'>" + dataJSON[i].course_name + "</td>" +
        "<td class='th-sm'>" + dataJSON[i].course_des + "</td>" +
        "<td class='th-sm'>" + dataJSON[i].course_fee + "</td>" +        
        "<td><a class='coursedetailsbtn' data-id=" + dataJSON[i].id + "><i class='fa-solid fa-eye'></i></a></td>" +
        "<td><a class='serviceeditsave' data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
        "<td><a data-toggle='modal' class='coursedeletebtnid' data-id=" + dataJSON[i].id +"><i class='fas fa-trash-alt'></i></a></td>"

                    ).appendTo('#course_id');
                });

                // service table edit icon click

                $('.serviceeditsave').click(function() {

                    var id = $(this).data('id');
                    $('#serviceeditid').html(id);
                    servicedetails(id);
                    $('#editmodal').modal('show');

                })

                // delete button modal show click function start

                $('.coursedeletebtnid').click(function(){
                var id = $(this).data('id');
                $('#coursedeleteid').html(id);
                $("#coursedeletemodal").modal("show");

})


                // service table modal edit yes btn click

                $('#serviceeditbtn').click(function() {
                    var id = $('#serviceeditid').html();
                    serviceeditsection(id);

                });

            } else {

                $('#imagecourseload').addClass('d-none');
                $('#coursewrongtext').removeClass('d-none');

            }

        }).catch(function(error) {

            $('#imagecourseload').addClass('d-none');
            $('#coursewrongtext').removeClass('d-none');

        });

}

// service table modal delete modal yes btn click

$('#coursedeletebtn').click(function() {
    var id = $('#coursedeleteid').html();
    coursedeleteaction(id); //to execute method from function
});

//service modal delete yes button function

function coursedeleteaction(deleteid) {

    $('#coursedeletebtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

    axios.post('/deletecourse', {
            id: deleteid
        })
        .then(function(response) {
            $('#coursedeletebtn').html("yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#coursedeletemodal').modal('hide');
                    toastr.success('DATA DELETE SUCCESSFUL');
                    getcoursesdata(); //to reload page after (edit/delete) yes/save button 
                } else {
                    $('#coursedeletemodal').modal('hide');
                    toastr.error('FAILED');
                    getcoursesdata(); //to reload page after (edit/delete) yes/save button
                }
            } else {
                $('#coursedeletemodal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            }

        }).catch(function(error) {
            $('#coursedeletemodal').modal('hide');
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
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#editmodal').modal('hide');
                        toastr.success('DATA UPDATE SUCCESSFUL');
                        getservicedata(); //to reload page after (edit/delete) yes/save button
                    } else {
                        $('#editmodal').modal('hide');
                        toastr.error('DATA UPDATE FAILED');
                        getservicedata(); //to reload page after (edit/delete) yes/save button
                    }

                } else {
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

// Course add info sertion to reload form

$('#courseinsertbtn').click(function() {

    $('#courseformid').trigger('reset');
    $('#addCourseModal').modal('show');

});

// Course modal insert save button click/press
$('#CourseAddConfirmBtn').click(function() {
    var cname = $('#CourseNameId').val();
    var cdes = $('#CourseDesId').val();
    var cfee = $('#CourseFeeId').val();
    var croll = $('#CourseEnrollId').val();
    var cclass = $('#CourseClassId').val();
    var clink = $('#CourseLinkId').val();
    var cimg = $('#CourseImgId').val();
    courseinsertsave(cname,cdes,cfee,croll,cclass,clink,cimg);

});

//course modal add button indivisual insert function

function courseinsertsave(coursename,coursedes,coursefee,courseenroll,courseclass,courselink,courseimg) {

    if (coursename == 0) {
        toastr.error('Coursename Is Empty');
    }else if (coursedes == 0) {
        toastr.error('CourseDescription Is Empty');
    }else if (coursefee == 0) {
        toastr.error('Coursefee Is Empty');
    }else if (courseenroll == 0) {
        toastr.error('Courseenroll Is Empty');
    }else if (courseclass == 0) {
        toastr.error('CourseClass Is Empty');
    }else if (courselink == 0) {
        toastr.error('CourseLink Is Empty');
    }else if (courseimg == 0) {
        toastr.error('CourseImage Is Empty');
    }else {
        $('#CourseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
        axios.post('/insertcoursesave', {
                cname: coursename,
                cdesc: coursedes,
                cfees: coursefee,
                cenroll: courseenroll,
                ctotalclass: courseclass,
                clink: courselink,
                cimg: courseimg,
            }).then(function(response) {
                $('#CourseAddConfirmBtn').html("save");
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#addCourseModal').modal('hide');
                        toastr.success('DATA INSERT SUCCESSFUL');
                        getcoursesdata(); //to reload page after (edit/delete) yes/save button

                    } else {
                        $('#addCourseModal').modal('hide');
                        toastr.error('DATA INSERT FAILED');
                        getcoursesdata(); //to reload page after (edit/delete) yes/save button
                    }

                } else {
                    $('#addCourseModal').modal('hide');
                    toastr.error('SomeThing Went Wrong');
                }

            }).catch(function(error) {
                $('#addCourseModal').modal('hide');
                toastr.error('SomeThing Went Wrong');
            });
    }

}


// insert button modal show click function start

$("#courseinsertbtn").click(function(){

$("#addCourseModal").modal("show");

})



