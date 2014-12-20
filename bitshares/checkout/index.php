<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login, registration forms">
    <meta name="author" content="Seong Lee">

    <title>Bitshares Checkout</title>

    <!-- Stylesheets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-dialog.min.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
	
		<link href="css/bitsharescheckout.css" rel="stylesheet">
	
		<!-- Font Awesome CDN -->
		<link href="css/font-awesome.min.css" rel="stylesheet">
		
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<section id="signin_main" class="bitshares signin-main">
	<div class="section-content">
	  <div class="wrap">
		  <div class="container">	  
				<div class="form-wrap">
					<div class="row">
					  <div class="title" data-animation="fadeInDown" data-animation-delay=".8s">
						  <div class="bitshareslogo"></div>
						  <h5>Transparent. Secure. Sound.</h5>
					  </div>
						<div id="myForm" data-animation="bounceIn">
							<div class="form-header">
							  <i class="fa fa-robo"></i>
							  <div><a href="bts:opencartdemo"><?php echo $_REQUEST['accountName']; ?></a></div>
						  </div>
						  <form name="btsForm" id="btsForm" action="">
						  <input type="hidden" id="balance" name="balance"  value="0">
						  <div class="form-main">
							  <div class="form-group">
							  	<input type="hidden" id="accountName" name="accountName" value="<?php echo $_REQUEST['accountName']; ?>">
							  	<div class="row">
									<div class="col-xs-12">
										<h5>Order ID</h5>
										<input type="number" id="order_id" name="order_id" class="form-control" title="The merchant Order Identification Number" required="required" value="<?php echo $_REQUEST['order_id']; ?>">
									</div>
								</div>
							  	<div class="row">
									<div class="col-xs-12">
										<h5>Order Hash</h5>
	                                    <input name="memo" id="memo" type="text" title="The transaction memo to distinguish payment for this order" class="form-control" required value="<?php echo $_REQUEST['memo']; ?>">
									</div>
								</div>	  			
							  </div>
						    <button id="lookupStatus" type="submit" class="btn btn-block signin"><i id="lookupStatusIcon" class="fa fa-search"></i>&nbsp;Lookup</button>
						    </div>
						    </form>
							<div class="form-footer">
								<div class="row">
									<div class="col-xs-12">
									    <form action="" method="POST">
										    <i id="returnIcon" class="fa fa-shopping-cart"></i>
										    <a href="#" id="return" name="return">Cancel and return to checkout</a>
									    </form>
									</div>
								</div>
							</div>		
					  </div>
					</div>
				</div>
		  </div>
	  </div>
	</div>
</section>
<footer class="footer">
  <div class="container">
    <p class="text-muted pull-right">Brought to you by delegate: <a href="bts:dev.sidhujag/approve">dev.sidhujag</a></p>
  </div>
</footer>
	  
    <!-- js library -->
		<script type="text/javascript" src="js/vendor/jquery.min.js"></script>
		<script type="text/javascript" src="js/vendor/jquery.localize.min.js"></script>
		<script type="text/javascript" src="js/vendor/jquery.noty.packaged.min.js"></script>
        <script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/vendor/bootstrap-dialog.min.js"></script>
		<script type="text/javascript" src="js/vendor/waypoints.min.js"></script>
		
		<script type="text/javascript" src="js/globals.js"></script>
		<script type="text/javascript" src="js/uistates.js"></script>
		<script type="text/javascript" src="js/ajax.js"></script>
		
		<script type="text/javascript" src="js/bitsharescheckout.js"></script>
		<script type="text/javascript">
			(function($) {
				
				// get full window size
				$(window).on('load resize', function(){
				    var w = $(window).width();
				    var h = $(window).height();

				    $('section').height(h);
				});		
				// set focus on input
				var firstInput = $('section').find('input[type=text], input[type=number], input[type=email]').filter(':visible:first');
        
				if (firstInput != null) {
            firstInput.focus();
        }
				
				$('section').waypoint(function (direction) {
					var target = $(this).find('input[type=text], input[type=number], input[type=email]').filter(':visible:first');
					target.focus();
				}, {
	          offset: 300
	      }).waypoint(function (direction) {
					var target = $(this).find('input[type=text], input[type=number], input[type=email]').filter(':visible:first');
			  	target.focus();
	      }, {
	          offset: -400
	      });
				
				
				// animation handler
				$('[data-animation-delay]').each(function () {
	          var animationDelay = $(this).data("animation-delay");
	          $(this).css({
	              "-webkit-animation-delay": animationDelay,
	              "-moz-animation-delay": animationDelay,
	              "-o-animation-delay": animationDelay,
	              "-ms-animation-delay": animationDelay,
	              "animation-delay": animationDelay
	          });
	      });
				
	      $('[data-animation]').waypoint(function (direction) {
	          if (direction == "down") {
	              $(this).addClass("animated " + $(this).data("animation"));
	          }
	      }, {
	          offset: '90%'
	      }).waypoint(function (direction) {
	          if (direction == "up") {
	              $(this).removeClass("animated " + $(this).data("animation"));
	          }
	      }, {
	          offset: '100%'
	      });
			
			})(jQuery);
		</script>
  </body>
</html>