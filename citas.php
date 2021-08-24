<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="libro diario, bootstrap,html,portjournal">
        <meta name="description" content="PortJournal, la herramienta ideal de contabilidad">
        <title>Zona Bigotes Admin</title>
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    
    </head>
    <body>
        <section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url(images/fondo2.jpeg);">
        	<form name="form1" action=""  class="appointment">
<div class="col-md-6">
									<div class="form-group">
			    					<div class="input-wrap">
			            		<div class="icon"><span class="fa fa-calendar"></span></div>
			            		<input id="fecha" name="Fecha" type="tex/javascript" class="form-control appointment_date" placeholder="Fecha">
			            		<input type="button" class="btn btn-warning" value="Ver reservaciones" onclick="cambia();">
		            		</div>
			    				</div>
								</div>
								</form>

<div class="embed-responsive embed-responsive-16by9">
  <iframe id='frame' class="embed-responsive-item" src="https://clientedigital.com.mx/zonabigotes/images/citas.png" padding="0"></iframe>
</div>

<script src='https://code.jquery.com/jquery-1.12.4.min.js'></script>

<script type="text/javascript">
     function cambia(){
         var w1=document.getElementById("fecha").value;
var url="https://clientedigital.com.mx/zonabigotes/ver.php" + "?w1=" + w1;
    document.getElementById("frame").src=url;
}
</script>

<script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="./js/main.js"></script>

    </body>
</html>