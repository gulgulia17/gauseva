<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Akhand Gau Seva</title>
<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/slick.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/slick-theme.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
</head>
<body data-spy="scroll" data-target=".scrollspy">
@include('layouts.header')

@yield('content')

@include('layouts.footer')

<!-- Modal -->
<div class="modal" id="loginsignup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <i style="cursor: pointer;" class="fa fa-close" data-bs-dismiss="modal" aria-label="Close"></i>
            <div class="form">
                <form class="form-horizontal signin">
                    <div class="form-wrap" style="position: relative; ">
                      <h2>Login</h2>
                      <div class="form-group">
                          <!-- <label for="email">Username:</label> -->
                          <div class="relative">
                              <input class="form-control" id="name" type="email" required="" autofocus="" title="" autocomplete="" placeholder="Enter Email ID">
                              <i class="fa fa-envelope"></i>
                          </div>
                      </div>
                      <div class="form-group">
                          <!-- <label for="email">Password:</label> -->
                          <div class="relative">
                              <input class="form-control" type="password" required="" placeholder="Password">
                              <i class="fa fa-key"></i>
                          </div>
                          <span class="pull-right"><small><a href="#">Forgot Password?</a></small></span>
                      </div>
                      <div class="login-btn">
                          <a href="#"><button class="movebtn movebtnsu" type="Submit">Login <i class="fa fa-fw fa-lock"></i></button></a>
                          <div class="relative"><hr><span class="login-text">or login with</span></div>
                          <div class="clearfix"></div>
                          <div class="social-btn clearfix">
                              <a href="#"><button class="movebtn google" type="Submit">Google <i class="fa fa-fw fa-google"></i></button></a>
                          </div>
                      </div>
                    </div>
                    <div class="sign-up">
                      <a href="#" class="signbtn"><small>Not a member? Sign Up Now </small></a>
                  </div>
                </form>

                <form class="form-horizontal signup">
                    <div class="form-wrap" style="position: relative;">
                      <h2 class="">Sign Up</h2>
                      <div class="form-group">
                        <!-- <label for="email">Username:</label> -->
                        <div class="relative">
                            <input class="form-control" id="name" type="text" required="" autofocus="" title="" autocomplete="" placeholder="Username">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                      <div class="form-group">
                          <!-- <label for="email">Username:</label> -->
                          <div class="relative">
                              <input class="form-control" id="name" type="text" required="" autofocus="" title="" autocomplete="" placeholder="Email Address">
                              <i class="fa fa-envelope"></i>
                          </div>
                      </div>
                      <div class="form-group relative">
                          <!-- <label for="email">Password:</label> -->
                          <div class="relative">
                              <input id="myinput" class="form-control" type="password" required="" placeholder="Password">
                              <i class="fa fa-key"></i>
                          </div>
                          <span class="pull-right"><small><a href="#" id="showhide"><i class="fa fa-eye"></i></a></small></span>
                      </div>
                      <div class="login-btn">
                          <a href="#"><button class="movebtn movebtnsu" type="Submit">Submit <i class="fa fa-fw fa-paper-plane"></i></button></a>
                          <div class="relative"><hr><span class="login-text">or signup with</span></div>
                          <div class="clearfix"></div>
                          <div class="social-btn clearfix">
                              <a href="#"><button class="movebtn google" type="Submit">Google <i class="fa fa-fw fa-google"></i></button></a>
                          </div>
                      </div>
                    </div>
                    <div class="sign-up">
                      <a href="#" class="signbtn"><small>Already member? Login </small></a>
                  </div>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Document <small>(Doc name here)</small></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <img src="images/detail/doc.png" class="w-100 rounded-4" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Exit</button>
          </div>
      </div>
  </div>
</div>

<script src="{{asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-affix@1.0.1/assets/js/affix.min.js"></script>
<script>
$(document).ready(function(){
    $('#testi-slider').slick({
  dots: true,
  arrows: false,
  infinite: false,
  speed: 300,
   animateOut: 'slideOutDown',
    animateIn: 'flipInX',
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
$(".switch1").click(function(){
  $("#show1").show();
  $("#show2").hide();
});

$(".switch2").click(function(){
  $("#show1").hide();
  $("#show2").show();
});

});

</script>

<!-- range slider -->

<script>
    (function( $ ){
$( document ).ready( function() {


	$( '.input-range').each(function(){
		var value = $(this).attr('data-slider-value');
		var separator = value.indexOf(',');
		if( separator !== -1 ){
			value = value.split(',');
			value.forEach(function(item, i, arr) {
				arr[ i ] = parseFloat( item );
			});
		} else {
			value = parseFloat( value );
		}
		$( this ).slider({
			formatter: function(value) {
				//console.log(value);
                $('.min-slider-handle').html( value + '%');
				return '$' + value;
			},
			min: parseFloat( $( this ).attr('data-slider-min') ),
			max: parseFloat( $( this ).attr('data-slider-max') ),
			range: $( this ).attr('data-slider-range'),
			value: value,
			tooltip_split: $( this ).attr('data-slider-tooltip_split'),
			tooltip: $( this ).attr('data-slider-tooltip')
		});
	});

 } );
} )( jQuery );
</script>

<script>
    $(document).ready(function(){
        if ( $('.container').first().innerWidth() > 910)
        {
    $('#myAffix').affix({
  offset: {
    top: 400,
    bottom: 1000
  }
})
    }
    });
</script>

 <!-- Incerement Dec input btn  -->
<script>
function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal)) {
            parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal) && currentVal > 0) {
            parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    $('.input-group').on('click', '.button-plus', function(e) {
        incrementValue(e);
    });

    $('.input-group').on('click', '.button-minus', function(e) {
        decrementValue(e);
    });

</script>

<!-- tooltip -->
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>


<!-- login signup form -->
<script>
$(".signup").css("display", "none");

$(".signbtn").click(function(){
    $("form").animate({ height:"toggle", opacity: "toggle"}, "slow");
});

$("#showhide").click(function(){
var pass = $("#myinput");
if (pass.attr("type") == "password") {
pass.attr("type", "text");
} else {
pass.attr("type", "password");
}
})
</script>
</body>
</html>
