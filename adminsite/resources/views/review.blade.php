@extends('layout.app')
@section('content')
<div id="mainreviewdev" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="reviewinsertbtn" class="btn btn-sm btn-primary my-3">ADD info</button>
            <table id="reviewdatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>                        
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="review_id">
                    
                    <!-- this is table row is passed in js section to show data  -->
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- loader start -->
<div id="imagereviewload" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img src="{{asset('images/load.svg')}}" alt="image not found">
        </div>
    </div>
</div>
<!-- loader end -->
<!-- wrong text start -->
<div id="reviewwrongtext" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something Wend Wrong:-)</h3>
        </div>
    </div>
</div>
<!-- wrong text end -->

<!-- add modal start  -->
<div class="modal fade" id="addreviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form id="reviewformid">       
        
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="reviewNameId" type="text" id="" class="form-control mb-3" placeholder="review Name">
                                <textarea id="reviewDesId" class="form-control" rows="7" placeholder="review Description"></textarea>                                                         
                            </div>
                            <div class="col-md-6">
                                 
                                <input id="reviewimgid" type="text" id="" class="form-control mb-3" placeholder="review Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="reviewAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- add modal end -->

<!--review delete Modal start-->
<div class="modal fade" id="reviewdeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-5 text-center">
                <h4 id="reviewdeleteid" class="modal-title mx-auto d-none"> </h4>
                <h4 class="modal-title mx-auto text-danger" id="exampleModalLongTitle">Do You Want DELETE!!!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                <button data-id=" " id="reviewdeletebtn" type="button" class="btn btn-primary" data-dismiss="modal">YES</button>
            </div>
        </div>
    </div>
</div>
<!--review delete modal section end -->

<!--review update Modal start-->
<div class="modal fade" id="updatereviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">      
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="revieweditinput" class="modal-body  text-center d-none">
                    <h4 id="revieweditid" class="modal-title mx-auto d-none"></h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="reviewupdateNameId" type="text" id="" class="form-control mb-3" placeholder="review Name">
                                <textarea id="reviewupdateDesId" class="form-control" rows="7"></textarea>
                                                             
                            </div>
                            <div class="col-md-6">
                               
                                <input id="reviewupdateimg" type="text" id="" class="form-control mb-3" placeholder="review Image">
                            </div>
                        </div>
                    </div>
                </div>
                <img id="revieweditload" src="{{asset('images/load.svg')}}" alt="image not found"  style="height: 150px;width: auto">
                <h3 id="reviewedittext" class="mx-auto d-none p-4 text-danger">Something Wend Wrong:-)</h3>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="reviewupdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
</div>
<!--review update Modal end-->
@endsection
@section('script')
<script type="text/javascript">
getreviewdata()  //this is for (custom js's) main function which is called here to execute js function

</script>
@endsection