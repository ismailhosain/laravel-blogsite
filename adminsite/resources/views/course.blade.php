@extends('layout.app')
@section('title','Courses')
@section('content')
<div id="maincoursedev" class="container d-none">
  <div class="row">
    <div class="col-md-12 p-5">
      <button id="courseinsertbtn" class="btn btn-sm btn-primary my-3">ADD info</button>
      <table id="coursedatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">C.Name</th>
            <th class="th-sm">C.FEES</th>           
            <th class="th-sm">C.Enroll</th>           
            <th class="th-sm">Total Class</th>
            <th class="th-sm">Edit</th>
            <th class="th-sm">Delete</th>
          </tr>
        </thead>
        <tbody id="course_id">
          
          <!-- this is table row is passed in js section to show data  -->
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- loader start -->
<div id="imagecourseload" class="container">
  <div class="row">
    <div class="col-md-12 p-5 text-center">
      <img src="{{asset('images/load.svg')}}" alt="image not found">
    </div>
  </div>
</div>
<!-- loader end -->
<!-- wrong text start -->
<div id="coursewrongtext" class="container d-none">
  <div class="row">
    <div class="col-md-12 p-5 text-center">
      <h3>Something Wend Wrong:-)</h3>
    </div>
  </div>
</div>
<!-- wrong text end -->

<!-- add modal start  -->
<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<form id="courseformid">
  
  
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
              <input id="CourseNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
              <input id="CourseDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
          <input id="CourseFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
          <input id="CourseEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
          </div>
          <div class="col-md-6">
          <input id="CourseClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
          <input id="CourseLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
          <input id="CourseImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
          </div>
        </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</form>
</div>
<!-- add modal end -->

<!--course delete Modal start-->
<div class="modal fade" id="coursedeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
        <h4 id="coursedeleteid" class="modal-title mx-auto d-none"> </h4>
        <h4 class="modal-title mx-auto text-danger" id="exampleModalLongTitle">Do You Want DELETE!!!</h4>
      </div>
      <div class="modal-footer">
        <button data-id=" " id="coursedeletebtn" type="button" class="btn btn-primary" data-dismiss="modal">YES</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
      </div>
    </div>
  </div>
</div>
<!--course delete modal section end -->


<!--course update Modal start-->

<div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<form id="courseformid">
    
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="courseeditinput" class="modal-body  text-center d-none">
            <h4 id="courseeditid" class="modal-title mx-auto d-none"></h4>
       <div class="container">
        <div class="row">
          <div class="col-md-6">
              <input id="CourseupdateNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
              <input id="CourseupdateDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
          <input id="CourseupdateFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
          <input id="CourseupdateEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
          </div>
          <div class="col-md-6">
          <input id="CourseupdateClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
          <input id="CourseupdateLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
          <input id="CourseupdateImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
          </div>
        </div>
       </div>
      </div>
         <img id="courseeditload" src="{{asset('images/load.svg')}}" alt="image not found"  style="height: 150px;width: auto">
          <h3 id="courseedittext" class="mx-auto d-none p-4 text-danger">Something Wend Wrong:-)</h3>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="CourseupdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</form>
</div>



<!--course update Modal end-->

@endsection
@section('script')

<script type="text/javascript">

getcoursesdata()  //this is for (custom js's) main function which is called here to execute js function

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

</script>

@endsection