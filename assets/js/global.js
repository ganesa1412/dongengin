$(document).ready(function(){

	$('#range').on('change', function(){
		if ($(this).val() == 4 ) {
			$('#event-page input[type=date]').css({'display':'inline'});
		}else{
			$('#event-page input[type=date]').css({'display':'none'})
		}
	});

  $('#summernote').summernote({
  	placeholder: 'Isi dongeng...',
  	height: 160
  });


	getScrollPosition();
	getDeviceWidth();

	$(window).scroll(function(){
		getScrollPosition();
		getDeviceWidth();
	});

	var swiper = new Swiper('.swiper-container', {
      spaceBetween: 20,
      centeredSlides: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    var swiper2 = new Swiper('.swiper-container2', {
      spaceBetween: 20,
      centeredSlides: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      }
    });
    


	var view = false;

	$('#nav-trigger').click(function(){
		if (!view) {
			$('.navbar-right').addClass('active');
			$('#nav-trigger i').addClass('fa-remove');
			$('#nav-trigger i').removeClass('fa-align-justify');
			view = true;
		}else{
			$('.navbar-right').removeClass('active');
			$('#nav-trigger i').removeClass('fa-remove');
			$('#nav-trigger i').addClass('fa-align-justify');
			view = false;
		}
	});
	$('.nav-modal-trigger').click(function(){
		if (view) {
			$('.navbar-right').removeClass('active');
			$('#nav-trigger i').removeClass('fa-remove');
			$('#nav-trigger i').addClass('fa-align-justify');
			view = false;
		}
	});
	

	var view2 = false;
	$('#ds-trigger').click(function(){
		if (!view2) {
			$('#db-sidebar ul').addClass('active');
			$('#ds-trigger i').addClass('fa-remove');
			$('#ds-trigger i').removeClass('fa-chevron-down');
			view2 = true;
		}else{
			$('#db-sidebar ul').removeClass('active');
			$('#ds-trigger i').removeClass('fa-remove');
			$('#ds-trigger i').addClass('fa-chevron-down');
			view2 = false;
		}
	});	

	$("#share").jsSocials({
		showLabel: false,
		showCount: "inside",
		shares: ["facebook", "twitter", "linkedin", "whatsapp",  "line"]
	});

	AOS.init({
		duration: 1000
	});

});

function getScrollPosition(){
	var w = $(window).width();
	if (w > 480) {
		var s = $(window).scrollTop();
		// alert(s);
	    if (s > $('.head').height()/3) {
	    	$('#backtotop').removeClass('btt-hide');
	        // $('#navbar').removeClass('navbar-transparent');
	        // alert('harusnya sih putih');
	    }else{
	    	$('#backtotop').addClass('btt-hide');
	        // $('#navbar').addClass('navbar-transparent');
	        // alert('harusnya sih transparan');
	    };
	}
}

$('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 500);
	        return false;
	      }
	    }
	  });

function getDeviceWidth(){
	var w = $(window).width();
	if (w <= 480) {
		$('#navbar').removeClass('navbar-transparent');
	}else{
		getScrollPosition();
	}
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#foto-prev').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}
$('#foto-prev').hide();
$("#foto-input").change(function() {
  readURL(this);
  $('#foto-prev').fadeIn();
});