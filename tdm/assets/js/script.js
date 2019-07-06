// // instruction modal
// $(function() {

//     $('[data-toggle="modal"]').hover(function() {
//       var basicExampleModal = $(this).data('target');
//       $(basicExampleModal).modal('show');
  
//     });
  
//   });

/* question count samll popup on mouse hover on i icon */
// group
$(document).ready(function(){
    $(".group-info").hover(function(){
          $('.section-info-box').css({'display':'block'});
        },function(){
         $('.section-info-box').css({'display':'none'});
    });
});
// section
$(document).ready(function(){
    $(".section-info").hover(function(){
          $('.section-info-box').css({'display':'block'});
        },function(){
         $('.section-info-box').css({'display':'none'});
    });
});
/*end question count samll popup on mouse hover on i icon */