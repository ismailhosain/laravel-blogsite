$(document).ready(function () {
$('#VisitorDt').DataTable();
$('.dataTables_length').addClass('bs-select');
});




function getservicedata(){

axios.get('/getservice')
  .then(function (response) {


if(response.status==200){

$('#maindev').removeClass('d-none');
$('#imageload').addClass('d-none');


 var dataJSON=response.data;
    $.each(dataJSON, function(i, item) {
    $('<tr>').html(

      "<td>+<img class='table-img' src="+dataJSON[i].service_img+"></td>"+
      "<td>"+dataJSON[i].service_name+"</td>"+
      "<td>"+dataJSON[i].service_des+"</td>"+
      "<td><a href=''><i class='fas fa-edit'></i></a></td>"+
      "<td><a data-toggle='modal' data-target='#deletemodal'><i class='fas fa-trash-alt'></i></a></td>"
   
      ).appendTo('#service_id');
   });


}else{

$('#imageload').addClass('d-none');
$('#wrongtext').removeClass('d-none');

}


   
}).catch(function (error) {

$('#imageload').addClass('d-none');
$('#wrongtext').removeClass('d-none');

});


}