// course js section start
function getcoursesdata() { //this function call to service view in js tag

    axios.get('/getcourse')
        .then(function(response) {

            if (response.status == 200) {

                $('#maincoursedev').removeClass('d-none');
                $('#imagecourseload').addClass('d-none');

                $('#coursedatatable').DataTable().destroy();
                $('#course_id').empty();

                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(

                        "<td class='th-sm'>" + dataJSON[i].course_name + "</td>" +
                        "<td class='th-sm'>" + dataJSON[i].course_fee + "</td>" +
                        "<td class='th-sm'>" + dataJSON[i].course_totalenroll + "</td>" +
                        "<td class='th-sm'>" + dataJSON[i].course_totalclass + "</td>" +
                        "<td><a class='courseeditsave' data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a data-toggle='modal' class='coursedeletebtnid' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"

                    ).appendTo('#course_id');
                });

                // course table edit icon click

                $('.courseeditsave').click(function() {

                    var id = $(this).data('id');
                    $('#courseeditid').html(id);
                    coursedetails(id);
                    $('#updateCourseModal').modal('show');

                })

                // delete button modal show click function start

                $('.coursedeletebtnid').click(function() {
                    var id = $(this).data('id');
                    $('#coursedeleteid').html(id);
                    $("#coursedeletemodal").modal("show");

                })


                // course table modal edit yes btn click

                $('#serviceeditbtn').click(function() {
                    var id = $('#serviceeditid').html();
                    serviceeditsection(id);

                });

                $('#coursedatatable').DataTable({order:false});
                $('.dataTables_length').addClass('bs-select');

            } else {

                $('#imagecourseload').addClass('d-none');
                $('#coursewrongtext').removeClass('d-none');

            }

        }).catch(function(error) {

            $('#imagecourseload').addClass('d-none');
            $('#coursewrongtext').removeClass('d-none');

        });

}

// course table modal delete modal yes btn click

$('#coursedeletebtn').click(function() {
    var id = $('#coursedeleteid').html();
    coursedeleteaction(id); //to execute method from function
});

//course modal delete yes button function

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



//Catch indivisual edit icon button function

function coursedetails(detailid) {
    axios.post('/editcourse', {
            id: detailid
        })
        .then(function(response) {

            if (response.status == 200) {

                var dataJSON = response.data;

                $('#courseeditinput').removeClass('d-none');
                $('#courseeditload').addClass('d-none');

                $('#CourseupdateNameId').val(dataJSON[0].course_name);
                $('#CourseupdateDesId').val(dataJSON[0].course_des);
                $('#CourseupdateFeeId').val(dataJSON[0].course_fee);
                $('#CourseupdateEnrollId').val(dataJSON[0].course_totalenroll);
                $('#CourseupdateClassId').val(dataJSON[0].course_totalclass);
                $('#CourseupdateLinkId').val(dataJSON[0].course_link);
                $('#CourseupdateImgId').val(dataJSON[0].course_img);

            } else {
                $('#courseeditload').addClass('d-none');
                $('#courseedittext').removeClass('d-none');

            }

        }).catch(function(error) {
            $('#courseeditload').addClass('d-none');
            $('#courseedittext').removeClass('d-none');
        });

}


// course modal update save button click/press

$('#CourseupdateConfirmBtn').click(function() {
    var id = $('#courseeditid').html();
    var c_name = $('#CourseupdateNameId').val();
    var c_desc = $('#CourseupdateDesId').val();
    var c_fees = $('#CourseupdateFeeId').val();
    var c_enroll = $('#CourseupdateEnrollId').val();
    var c_class = $('#CourseupdateClassId').val();
    var c_link = $('#CourseupdateLinkId').val();
    var c_img = $('#CourseupdateImgId').val();
    courseupdatesave(id, c_name, c_desc, c_fees, c_enroll, c_class, c_link, c_img);

});

//course modal save button indivisual edit function

function courseupdatesave(id, coursename, coursedes, coursefee, coursetotalenroll, coursetotalclass, courselink, courseimg) {

    if (coursename == 0) {
        toastr.error('Coursename Is Empty');

    } else if (coursedes == 0) {

        toastr.error('Description Is Empty');

    } else if (coursefee == 0) {

        toastr.error('CourseFee Is Empty');

    } else if (coursetotalenroll == 0) {

        toastr.error('CourseEnroll Is Empty');

    } else if (coursetotalclass == 0) {

        toastr.error('CourseClass Is Empty');

    } else if (courselink == 0) {

        toastr.error('CourseLink Is Empty');

    } else if (courseimg == 0) {

        toastr.error('CourseImg Is Empty');

    } else {
        $('#CourseupdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
        axios.post('/editcoursesave', {
                id: id,
                cname: coursename,
                cdesc: coursedes,
                cfees: coursefee,
                cenroll: coursetotalenroll,
                ctotalclass: coursetotalclass,
                clink: courselink,
                cimg: courseimg,
            })
            .then(function(response) {
                $('#CourseupdateConfirmBtn').html("save");
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#updateCourseModal').modal('hide');
                        toastr.success('DATA UPDATE SUCCESSFUL');
                        getcoursesdata(); //to reload page after (edit/delete) yes/save button
                    } else {
                        $('#updateCourseModal').modal('hide');
                        toastr.error('DATA UPDATE FAILED');
                        getcoursesdata(); //to reload page after (edit/delete) yes/save button
                    }

                } else {
                    $('#updateCourseModal').modal('hide');
                    toastr.error('SomeThing Went Wrong');
                }

            }).catch(function(error) {
                $('#updateCourseModal').modal('hide');
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
    courseinsertsave(cname, cdes, cfee, croll, cclass, clink, cimg);

});

//course modal add button indivisual insert function

function courseinsertsave(coursename, coursedes, coursefee, courseenroll, courseclass, courselink, courseimg) {

    if (coursename == 0) {
        toastr.error('Coursename Is Empty');
    } else if (coursedes == 0) {
        toastr.error('CourseDescription Is Empty');
    } else if (coursefee == 0) {
        toastr.error('Coursefee Is Empty');
    } else if (courseenroll == 0) {
        toastr.error('Courseenroll Is Empty');
    } else if (courseclass == 0) {
        toastr.error('CourseClass Is Empty');
    } else if (courselink == 0) {
        toastr.error('CourseLink Is Empty');
    } else if (courseimg == 0) {
        toastr.error('CourseImage Is Empty');
    } else {
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

$("#courseinsertbtn").click(function() {

    $("#addCourseModal").modal("show");

})