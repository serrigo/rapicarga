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
     <script src="<?php echo base_url('js/crypto/sha1.js'); ?>"></script>
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
					  <li class="current"><a href="<?php echo base_url(''); ?>">Inicio</a></li>
					  <li><a href="#">Con&oacute;cenos</a></li>
					  <li><a href="#">Servicios</a></li>
					  <li><a href="#">Portafolio</a></li>
					  <li><a href="#">Contactenos</a></li>
					  <li><a href="<?php echo base_url('Pais/'); ?>">Paises</a></li>
					  <li onclick="login();"><a href="#">Login</a></li>
					 						
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
<!-- Ventana Modal Login-->

	<!-- Ventana Modal forulario login -->
<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="ModalLogin">
		  <div class="modal-dialog">
		    <div class="modal-content">
		    
		      <div class="modal-header" style="background-color:#8DCEEE;">
			      	<img src="images/logo.png" class="img-circle" >
			        <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">&times;</span></button>
			        <h3 class="modal-title" style="text-align:right;">Inicio de Sesi&oacute;n</h3>
		      </div>
		      <div class="modal-body">
		       
		        	<div id="contenidoModalLogin">
		        	
		        			<form class="form-horizontal" id="formularioSesion">
							  <div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							    <div class="col-sm-10">
							      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="inputPassword3" class="col-sm-2 control-label">Contrase&ntilde;a</label>
							    <div class="col-sm-10">
							      <input type="password" class="form-control" id="inputPassword3" placeholder="Contrase&ntilde;a">
							    </div>
							  </div>
							  
							  <div class="form-group">
							  
							    <div class="col-sm-offset-2 col-sm-10">
							      <button type="submit" class="btn btn-default" onclick="inicioSesion();">Iniciar Sesi&oacute;n</button>
							    </div>
							  </div>
							</form>
		        	</div>
		       
		        <div id="mensajeLogin"></div>
		      </div>
		      
		    </div>
		  </div>
		</div>	
	
<!-- Fin Ventana Modal Login-->	
</body>
<script>

function inicioSesion()
{
	try {
		var email = $('#inputEmail3').val();
		var pass = $('#inputPassword3').val();
		var pass_crypt = Sha1.hash(pass);

		$.ajaxSetup({async: false});
		$.post('<?php echo base_url("Usuarios/validarUsuario/"); ?>'+email+'/'+pass_crypt,function () {
			})
			  .done(function(retorno) {
				  if(retorno == 0)
  				  {
  				    var msj="";
  				  	msj = "Contrase\u00f1a o nombre de usuario incorrecto";
  				  	
				  		$('#mensajeLogin').html("<div class='alert alert-danger'>");
	                    $('#mensajeLogin > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
	                        .append("</button>");
	                    $('#mensajeLogin > .alert-danger').append("<strong>Lo sentimos, no puede acceder al sistema.</strong>");
	                    $('#mensajeLogin > .alert-danger').append("<br>Motivo: "+msj+'</div>');
  				  }
  			  else
	  			  {
	  			  	if(retorno == 2 || retorno == 3) // si es usuario del sistema
	  				 	window.location.href = "<?php echo base_url("Management/"); ?>";
	  				if(retorno == 1) //   si es cliente
	  				 	window.location.href = "<?php echo base_url("Costumers/"); ?>";
	  			  }
   				 
			  });



		
		
				
	} catch (e) {
		alert(e);
	}
}

 function login()
 {
	 try {
			$('#ModalLogin').modal({
				keyboard : false
			});
			$('#formularioSesion').trigger("reset");
			$('#ModalLogin').modal('show');
		} catch (e) {
			
		}
 }
</script>
</html>
