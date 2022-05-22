@extends('layout.loginapp')
@section('title','adminlogin')
@section('logincontent')
<div class="container my-5 bg-light">
    <h2 class="text-danger text-center py-2">Please Login First..</h2>
    <div class="row">
        <div class="col-lg p-5 my-auto">
            <form action="" class="logininfo">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input required name="uname" value="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input required name="upassword" value="" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-lg p-5">
            
            <img src=" {{ asset('loginimages/login.svg') }}" alt="">
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$('.logininfo').on('submit',function(event) {

event.preventDefault();
let logindata=$(this).serializeArray();
let username=logindata[0]['value'];
let userpassword=logindata[1]['value'];
let url='/onlogin';
axios.post(url,{
name:username,
password:userpassword
})
.then(function(response){
if(response.status == 200 && response.data==1){
window.location.href='/';
}else{
toastr.error("please enter correct details");
}
}).catch(function(error){
toastr.error("something went wrong");

})
})
</script>
@endsection