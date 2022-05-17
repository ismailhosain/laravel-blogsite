// Owl Carousel Start..................



$(document).ready(function() {
    var one = $("#one");
    var two = $("#two");

    $('#customNextBtn').click(function() {
        one.trigger('next.owl.carousel');
    })
    $('#customPrevBtn').click(function() {
        one.trigger('prev.owl.carousel');
    })
    one.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });

    two.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

});

// Owl Carousel End..................

// contact send js function


// contact modal insert save button click/press
$('#contactconfirmbtn').click(function() {
    var cname = $('#contactname').val();
    var cmob = $('#contactmob').val();
    var cemail = $('#contactemail').val();
    var cmsg = $('#contactmsg').val();  
    contactinsertsave(cname,cmob,cemail,cmsg);

});

//contact modal add button indivisual insert function

function contactinsertsave(contactname,contactnum,contactemail, contactmsg) {


    if(contactname.length == 0){
        $('#contactconfirmbtn').html('নাম লিখুন');
         setTimeout(function(){ 
            $('#contactconfirmbtn').html('পাঠিয়ে দিন') ; }, 2000);
    }else if(contactnum.length == 0){
         $('#contactconfirmbtn').html('নাম্বার লিখুন');
          setTimeout(function(){ 
            $('#contactconfirmbtn').html('পাঠিয়ে দিন') ; }, 2000);
    }else if(contactemail.length == 0){
         $('#contactconfirmbtn').html('ইমেইল লিখুন');
          setTimeout(function(){ 
            $('#contactconfirmbtn').html('পাঠিয়ে দিন') ; }, 2000);
    }else if(contactmsg.length == 0){
         $('#contactconfirmbtn').html('মেসেজ লিখুন');
          setTimeout(function(){ 
            $('#contactconfirmbtn').html('পাঠিয়ে দিন') ; }, 2000);
    }else{
        axios.post('/homecontact', {
            contact_name: contactname,
            contact_mob: contactnum,
            contact_email: contactemail,
            contact_msg: contactmsg,           
        }).then(function(response) {

            if(response.status == 200){
                if(response.data == 1){
                 $('#contactconfirmbtn').html('অনুরোধ সফল হয়েছে');
                 setTimeout(function(){ 
                 $('#contactconfirmbtn').html('পাঠিয়ে দিন') ; }, 1000);   
                   setTimeout( function() { 
                    window.location = "http://127.0.0.1:8000/" }, 1000 );          

            }else{
                $('#contactconfirmbtn').html('অনুরোধ ব্যর্থ হয়েছে।আবার চেষ্টা করুন।');
                 setTimeout(function(){ 
                 $('#contactconfirmbtn').html('পাঠিয়ে দিন') ; }, 2000);
            }}else{

                $('#contactconfirmbtn').html('অনুরোধ ব্যর্থ হয়েছে।আবার চেষ্টা করুন।');
                 setTimeout(function(){ 
                 $('#contactconfirmbtn').html('পাঠিয়ে দিন') ; }, 2000);
            }
                  

        }).catch(function(error) {
                 $('#contactconfirmbtn').html('আবার চেষ্টা করুন।');
                 setTimeout(function(){ 
                 $('#contactconfirmbtn').html('পাঠিয়ে দিন') ; }, 2000);
        });

    }
       
    }




 


