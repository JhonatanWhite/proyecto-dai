<html>
   <head>
      <title>Empresa MS</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 
	</head>
	
	<?php 
	include 'menu1.php';
	?>
 
    <?php
	include 'menu2.php';
	?>
	
<body>
	<br >
	<br >
	<br >
	<div class="row">
          <div class="col-sm-4 ">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					   <ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>

							  <!-- Wrapper for slides -->
							  <div class="carousel-inner">
									<div class="item active">
									  <img src="Imagenes/beats1.jpg" alt="Lado 1">
									</div>

									<div class="item">
									  <img src="Imagenes/beats2.jpg" alt="Lado 2">
									</div>

									<div class="item">
									  <img src="Imagenes/beats3.jpg" alt="Lado 3">
									</div>
							  </div>

									  <!-- Left and right controls -->
									  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left"></span>
										<span class="sr-only">Anterior</span>
									  </a>
									  <a class="right carousel-control" href="#myCarousel" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right"></span>
										<span class="sr-only">Siguiente</span>
									  </a>
									  
									 
				</div>
				
				<br >
				<br >
				 <button type="button" class="btn btn-success" onClick="window.location.href='WebFormularioContacto.php'">Lo Quiero!</button>
		   </div>

				<div class="col-sm-8 ">
				<h1>Beats Studio Wireless</h1>
				<h1>Beats Acoustic Engine utiliza el software DSP de la marca Beats para crear la experiencia emocional que buscan transmitir todos los grandes de la música.
				La batería recargable te proporciona hasta 12 horas de reproducción inalámbrica y el indicador LED de consumo te permite saber cuánta batería queda en cada momento. </h1>
				<br >
				<br >
				<br >
				<h1>Características clave</h1>
				<p> • Ahora, los nuevos Beats Studio son inalámbricos </p>
				<p> • Beats Acoustic Engine usa sonido de precisión para que escuches la música original</p>
				<p> • La batería recargable dura hasta 12 horas cuando los auriculares están conectados a través de Bluetooth® y hasta 20 horas cuando están conectados por cable al dispositivo iOS</p>
				<p> • La cancelación de ruido adaptativa te ofrece dos modos para aislarte del mundo</p>
				<p> • El indicador de consumo de la batería indica cuánta batería queda</p>
				</div>
	    </div>
</body>
	   
</html>