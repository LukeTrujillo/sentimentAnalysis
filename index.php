
<html><head>
    <meta charset="utf-8">
    <title>Careless Whisper - Whisper In My Ear</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Carlos Alvarez - Alvarez.is">

    <!-- Le styles -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-style.css" rel="stylesheet">
    <link href="assets/css/flexslider.css" rel="stylesheet">
				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

<script type="text/javascript">
$(document).ready(function () {

    $("#btn-blog-next").click(function () {
      $('#blogCarousel').carousel('next')
    });
     $("#btn-blog-prev").click(function () {
      $('#blogCarousel').carousel('prev')
    });

     $("#btn-client-next").click(function () {
      $('#clientCarousel').carousel('next')
    });
     $("#btn-client-prev").click(function () {
      $('#clientCarousel').carousel('prev')
    });

});

 $(window).load(function(){

    $('.flexslider').flexslider({
        animation: "slide",
        slideshow: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
    });
});

</script>



  </head>
  <body>

  	<!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><img src="assets/img/logo30.png" alt=""> Careless Whisper</a>
        </div>

        </div>
    </div>

    <div class="container">

	  <!-- FIRST ROW OF BLOCKS -->
      <div class="row">

      <!-- USER PROFILE BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
	      		<dtitle>Search Info</dtitle>
	      		<hr>
				<div class="thumbnail">
						<h1>Your searched:</h1>
				<h2> '<?php echo $_POST['f']; ?>'  </h2>
				<br>
					</div>
				</div>
        </div>
        <div class="col-sm-6 col-lg-6">
      		<div class="dash-unit">
		  		<dtitle>Positive Responses vs. Negative Responses</dtitle>
		  		<hr>



			<img src="graph.png"></img>
	<div id="donutchart" style="position: parent; width: 100%; height: auto;"></div>
	        	<h2>Graphical Analysis</h2>
			</div>
        </div>

        <div class="col-sm-3 col-lg-3">

      <!-- LOCAL TIME BLOCK -->
      		<div class="half-unit">
	      		<dtitle>Local Time</dtitle>
	      		<hr>
		      		<div class="clockcenter">
			      		<digiclock>12:45:25</digiclock>
		      		</div>
			</div>

      <!-- SERVER UPTIME -->
			<div class="half-unit">
	      		<dtitle>Server Uptime</dtitle>
	      		<hr>
	      		<div class="cont">
					<p><img src="assets/img/up.png" alt=""> <bold>Up</bold> | 356ms.</p>
				</div>
			</div>

        </div>
      </div><!-- /row -->


	  <!-- SECOND ROW OF BLOCKS -->
      <div class="row">
        <div class="col-sm-3 col-lg-3">
       <!-- MAIL BLOCK -->
      		<div class="dash-unit">
      		<dtitle>About Us</dtitle>
      		<hr>
      		<p>As four high school students grew weary of the upcoming Boston AngelHack 2016. Upon the day, George Michael's hit song "Careless Whisper" was played to soothe the nerves. They decided to take his "careless" searching and apply to the growing data heavy world. </p>
		</div><!-- /dash-unit -->
    </div><!-- /span3 -->

	  <!-- GRAPH CHART - lineandbars.js file -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
      		<dtitle>Other Information</dtitle>
      		<hr>
			    <p> Your Search was filtered and found throughout the internet. The responses were then sorted using the HPE HavenOnDemand API to find their sentiment regarding your search.
			</div>
        </div>

	  <!-- LAST MONTH REVENUE -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
	      		<dtitle>Meet the Team</dtitle>
	      		<hr>
				<h1>Developers</h1>
				<p>Taha A.</p>
				<p>Nicholas "The Snoring" Luong </p>
				<p>Luke T.</p>
				<h1>Designer</h1>
				<p>Duy "8 Hours of Sleep" Nguyen </p>
			</div>
        </div>

	  <!-- 30 DAYS STATS - CAROUSEL FLEXSLIDER -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
	      		<dtitle>APIS</dtitle>
	      		<hr>
	      		<br>
	      		<br>
	            <div class="flexslider">
					<ul class="slides">
						<li><img src="assets/img/slide01.png" alt="slider"></li>
						<li><img src="assets/img/slide02.png" alt="slider"></li>
					</ul>
            </div>
				<div class="cont">
					<p>Powered By HPE HavenOnDemand</p>
				</div>
			</div>
        </div>
      </div><!-- /row -->




	</div> <!-- /container -->
	<div id="footerwrap">
      	<footer class="clearfix"></footer>
      	<div class="container">
      		<div class="row">
      			<div class="col-sm-12 col-lg-12">
      			<p>"Guilty data have got no search engine."</p>
      			</div>

      		</div><!-- /row -->
      	</div><!-- /container -->
	</div><!-- /footerwrap -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/lineandbars.js"></script>

	<script type="text/javascript" src="assets/js/dash-charts.js"></script>
	<script type="text/javascript" src="assets/js/gauge.js"></script>

	<!-- NOTY JAVASCRIPT -->
	<script type="text/javascript" src="assets/js/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/top.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topLeft.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topRight.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topCenter.js"></script>

	<!-- You can add more layouts if you want -->
	<script type="text/javascript" src="assets/js/noty/themes/default.js"></script>
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<script src="assets/js/jquery.flexslider.js" type="text/javascript"></script>

    <script type="text/javascript" src="assets/js/admin.js"></script>

</body></html>
