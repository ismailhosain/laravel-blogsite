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
</script>
@endsection