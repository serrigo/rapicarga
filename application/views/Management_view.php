<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Rapicarga WEB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href="<?php echo base_url("css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
 	<link href="<?php echo base_url("css/style.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/jquery-ui.css'); ?>" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url('js/jquery.js'); ?>"></script>
 	<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery-ui.js'); ?>"></script>
</head>
<body>
 
<div id="container">
	<div class="wrapper">
    
		 <div class="header">
	       <div class="container header_top">
				<div class="logo">
				  <a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('images/logo.png'); ?>" alt=""></a>
				</div>
		  		<div class="menu">
					<ul class="nav" id="nav">
					<?php
							/*
							 * Menú dinámico según los permisos e cada modulo
							 */
							foreach ($USUARIOS as $item)
							{
								$create = $item['C'];
								$read = $item['R'];
								$update = $item['U'];
								$delete = $item['D'];
								$print = $item['I'];
							}
							if($create + $read + $update + $delete + $print >= 1) //si tiene al menos un permiso se muestra el acceso al módulo
							{
								echo("<li><a href=".base_url('Usuarios/').">Usuarios</a></li>");
							}
							$create=0;
							$read=0;
						    $update=0;
						    $delete=0;
						    $print=0;
							foreach ($CLIENTES as $item)
							{
								$create = $item['C'];
								$read = $item['R'];
								$update = $item['U'];
								$delete = $item['D'];
								$print = $item['I'];
							}
							if($create + $read + $update + $delete + $print >= 1) //si tiene al menos un permiso se muestra el acceso al módulo
							{
								echo("<li><a href=".base_url('Costumers/').">Clientes</a></li>");
							}
							$create=0;
							$read=0;
							$update=0;
							$delete=0;
							$print=0;
							foreach ($COTIZACIONES as $item)
							{
								$create = $item['C'];
								$read = $item['R'];
								$update = $item['U'];
								$delete = $item['D'];
								$print = $item['I'];
							}
							if($create + $read + $update + $delete + $print >= 1) //si tiene al menos un permiso se muestra el acceso al módulo
							{
								echo("<li><a href=".base_url('Quotes/').">Cotizaciones</a></li>");
							}
							$create=0;
							$read=0;
							$update=0;
							$delete=0;
							$print=0;
							foreach ($FACTURAS as $item)
							{
								$create = $item['C'];
								$read = $item['R'];
								$update = $item['U'];
								$delete = $item['D'];
								$print = $item['I'];
							}
							if($create + $read + $update + $delete + $print >= 1) //si tiene al menos un permiso se muestra el acceso al módulo
							{
								echo("<li><a href=".base_url('Facturas/').">Facturas</a></li>");
							}
							$create=0;
							$read=0;
							$update=0;
							$delete=0;
							$print=0;
							foreach ($RUTAS as $item)
							{
								$create = $item['C'];
								$read = $item['R'];
								$update = $item['U'];
								$delete = $item['D'];
								$print = $item['I'];
							}
							if($create + $read + $update + $delete + $print >= 1) //si tiene al menos un permiso se muestra el acceso al módulo
							{
								echo("<li><a href=".base_url('Rutas/').">Rutas</a></li>");
							}
							$create=0;
							$read=0;
							$update=0;
							$delete=0;
							$print=0;
							foreach ($PROVEEDORES as $item)
							{
								$create = $item['C'];
								$read = $item['R'];
								$update = $item['U'];
								$delete = $item['D'];
								$print = $item['I'];
							}
							if($create + $read + $update + $delete + $print >= 1) //si tiene al menos un permiso se muestra el acceso al módulo
							{
								echo("<li><a href=".base_url('Proveedores/').">Proveedores</a></li>");
							}
					?>
					  	
					  <li><a href="<?php echo base_url('Logout/'); ?>">Salir</a></li> 
					</ul>
				</div>								
	  			
			 </div>
		</div>
	

     <div class="container banner">
	 	<div class="row">
	 			<div class='col-md-4 banner_left'>
	 				<span></span>
	 			</div>
	 			<div class='col-md-6 banner_right'>
	 				<h2>Traspasando fronteras</h2>
	 				<h2>Servicio Mundial Aduanero</h2>
<p>empresa reconocida a nivel global, nuestros clientes nos prefieren por la calidad de servicio que ofrecemos.es una empresa especializada en desarrollo de logística, coordinando desde la recolección de su mercancía con el proveedor vía aérea, marítima o terrestre. Despachando, a través de nuestras oficinas aduanales en la República, entregando donde el cliente lo requiere.

Integramos toda la cadena logística con el objetivo de reducirle costos y darle una sola cara para todo el proceso de importaci&oacute;n de su mercancía.</p>
	 				<!-- <a class="banner_btn" href="">Mas Info</a> -->
	 				
	 			</div>
	 		
	 	 </div>
	 	 
	 </div>
	 
     <div class="container footer">
       <div class="footer_top">
     	<div class="row">
     		<div class="col-md-2 footer_grid">
     			<h3 class="m_4">Promociones</h3>
     			<ul class="list">
     				<li><a href="#"> Mensuales</a></li>
     				<li><a href="#"> Por Peso</a></li>
     				<li><a href="#"> por cantidad de Viajes</a></li>
     		    </ul>
     		</div>
     		<div class="col-md-2 footer_grid">
     			<h3 class="m_4">Proveedores</h3>
     			<ul class="list">
     				<li><a href="#"> Terrestres</a></li>
     				<li><a href="#"> Marítimos</a></li>
     				<li><a href="#"> Ferroviarios</a></li>
     		    </ul>
     		</div>
     		<div class="col-md-2 footer_grid">
     			<h3 class="m_4">Adicionales</h3>
     			<ul class="list">
     				<li><a href="#"> Almacenaje</a></li>
     				<li><a href="#"> Embalaje</a></li>
     				<li><a href="#"> Cargas Especiales</a></li>
     		    </ul>
     		</div>
     		<div class="col-md-2 footer_grid">
     			<h3 class="m_4">Puertos</h3>
     			<ul class="list">
     				<li><a href="#">  Internos </a></li>
     				<li><a href="#"> Nacionales</a></li>
     				<li><a href="#"> Internacionales</a></li>
     		    </ul>
     		</div>
     		<div class="col-md-2 footer_grid">
     			<h3 class="m_4">Ag. Aduanales</h3>
     			<ul class="list">
     				<li><a href="#"> Internas</a></li>
     				<li><a href="#"> Nacionales</a></li>
     				<li><a href="#"> Internacionales</a></li>
     		    </ul>
     		</div>
     		<div class="col-md-2">
     			<h3 class="m_4">Empleo</h3>
     			<ul class="list">
     				<li><a href="#"> Ofertas generales</a></li>
     				<li><a href="#"> Especialistas</a></li>
     				<li><a href="#"> Maquinarias</a></li>
     		    </ul>
     		</div>
     	</div>
     	</div>
     	<div class="footer_bottom">
     	  <div class="copy">
		    <p>&copy;2015 RapiCarga S.A.</p>
		  </div>
		  <ul class="social">
			<li><a href=""> <i class="fb"> </i> </a></li>
			<li><a href=""><i class="tw"> </i> </a></li>
		  </ul>
		  <div class="clearfix"> </div>
     	</div>
     </div>
 </div>	
</div>
 
</body>

<script src="../js/jquery.js"></script>
</html>		