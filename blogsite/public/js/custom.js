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
        axios.post('/homecontact', {
            contact_name: contactname,
            contact_mob: contactnum,
            contact_email: contactemail,
            contact_msg: contactmsg,           
        }).then(function(response) {
            
            alert("inserted")

        }).catch(function(error) {
          
        });
    }




 


