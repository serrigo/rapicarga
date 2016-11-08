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
					<?php
							/*
							 * Menú dinámico según los permisos de usuario
							 */
							foreach ($CLIENTES as $item)
							{
								$create = $item['C'];
								$read = $item['R'];
								$update = $item['U'];
								$delete = $item['D'];
								$print = $item['I'];
							}
								if($create == 1) //si tiene  permiso para crear se muestra el acceso
								{
									echo("<li  onclick='crearCliente();'><a href='#'>Crear Cliente</a></li>");
								}
								if($read  == 1) //si tiene  permiso para buscar se muestra el acceso
								{
									echo("<li  onclick='buscarCliente();'><a href='#'>Buscar Cliente</a></li>");
								}
							
					?>
					  <li><a href="<?php echo base_url('Management/'); ?>">Regresar</a></li>	
					  <li><a href="<?php echo base_url('Logout/'); ?>">Salir</a></li> 
					</ul>
				</div>								
	  			
			 </div>
		</div>
	

     <div class="container banner">
	 	<div class="row">
	 	<h3><span class="label label-info">M&oacute;dulo Cliente</span></h3>
	 	<h3><span style="color: red;" id="info"></span></h3>	
	 		<div id="formularioCostumer" style="display: none;"></div>
	 	 </div>
	 	 
	 </div>
	 
     <div class="container footer">
       
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
 <!-- Elementos Modales -->
 
 
		
<!--  Modal formulario Update Usuarios-->  
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalUpdateUsuario" >
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Actualizar Informaci&oacute;n del usuario</h4>
		      </div>
		      <div class="modal-body" id="modalBodyUpdateUsuario">
		     		
		    </div>
		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal update-->

 
 <!-- FIN Elementos Modales -->
 <!-- Elementos Modales  -->
 <!--  Modal Prguntar guardar-->
        
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalPreguntar">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Registro de Cliente</h4>
		      </div>
		      <div class="modal-body">
		     		        
			        <form role="form" id = "form_preguntarf">
			        	  	        	  
						  <div><h3>Datos listos para guardar.<small><br> Qu&eacute; desea hacer ?</small></h3></div>
						  <button type="button" class="btn btn-info" onclick="guardarCliente();" data-toggle='tooltip' >Guardar datos</button>
						  <button type="button" class="btn btn-warning"  data-dismiss="modal" aria-hidden="true">Cancelar</button>
					</form>
		               
		    </div>
		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal preguntar-->
 <!--  Modal Prguntar guardar-->
        
		<div class="modal fade bs-example-modal-sm" data-backdrop="static" tabindex="-1" role="dialog" id="modalAviso">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Aviso</h4>
		      </div>
		      <div class="modal-body" id="aviso">
		      </div>
		      <div class="modal-footer">
		       <button type="button" class="btn btn-info" onclick="aceptarAviso();" data-dismiss="modal" aria-hidden="true">Aceptar</button>
						  
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal preguntar-->
	
	
<!--  Modal Prguntar eliminar-->
        
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalPreguntarEliminarUsuario">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Eliminaci&oacute;n de Usuario</h4>
		      </div>
		      <div class="modal-body">
		     		        
			        <form role="form">
			        	  <div id='mensaje3'></div>
			        	  
						  <div><h3>Confirme por favor.<small><br> Qu&eacute; desea hacer ?</small></h3></div>
						  <button type="button" class="btn btn-warning" onclick="eliminar();" data-toggle='tooltip' >Eliminar</button>
						  <button type="button" class="btn btn-info"  data-dismiss="modal" aria-hidden="true">Cancelar</button>
					</form>
		               
		    </div>
		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal preguntar-->
 <!--  Modal Prguntar guardar-->
</body>

<script type="text/javascript">

var cedula;
var email;
var nombres;
var apellidos;
var pass;
var passConfirm;
var tr_color = 1;
var id_aEliminar;
var nomEmpresa;
var idEmpresa = 0;
var fecha ;
var tel ;
var cel;
var appostal;
var pais ;


//Despliega el formulario para crear usuario
function crearCliente(){
	$("#formularioCostumer").load("<?php echo base_url('Costumers/loadView/newCostumer'); ?>", function() {
	    $(this).show(700);
	});

}

//validación de los datos del usuario antes de guardarlos
$("#formularioCostumer").submit(function(event) {
		
	event.preventDefault();
	
	
	cedula = $('#cedula').val();
	email = $('#inputEmail').val();
	nombres = $('#name').val();
	apellidos = $('#lastname').val();
	pass = $('#inputPassword').val();
	passConfirm = $('#inputPasswordConfirm').val();
	fecha = $('#datepicker').val();
	tel = $('#telefono').val();
	cel = $('#celular').val();
	appostal = $('#appostal').val();
	pais = $('#pais').val();
	var captcha = $('#captcha').val();

	if(idEmpresa == 0)
	{
		alert('Falta seleccionar empresa');
		return;
	}
	if(cedula === '') {
		alert('Falta Cedula del cliente');
		return;
	}
	if(email === '') {
		alert('Falta email de Cliente');
		return;
	}
	if(nombres === '') {
		alert('Falta nombre de Cliente');
		return;
	}
	if(apellidos === '') {
		alert('Falta apellido de Cliente');
		return;
	}
	if(appostal === '') {
		appostal = "null";
	}
	if(cel === '') {
		cel = "null";
	}
	if(tel === '') {
		tel = "null";
	}
	if(fecha === '') {
		fecha = "null";
	}


	
	if(pass.length < 6 )
	{
		$( "span" ).text("Contrase\u00f1a muy corta, Intente otra vez!" ).show().fadeOut( 3000 );
		return;
	}
	// valida captcha
	var captchaValid = 0;
	$.ajaxSetup({async: false});
	$.post('<?php echo base_url("Usuarios/validarCaptcha/"); ?>'+captcha,function () {
		})
		.done(function(exito) {
			captchaValid = $.trim(exito);
		  });
	
	if(captchaValid != '1') // captcha no válido
	  {
		  $('#errorCaptcha_').html("<h3>Error de Captcha!!</h3>" ).show().fadeOut( 5000 );
		  return;
	  }	
  if ( pass == passConfirm ) {
	   
	    $('#modalPreguntar').modal({
			keyboard : false
		});
		$('#modalPreguntar').modal('show');
		return;
	  }
  else
			$( "span" ).text("Contrase\u00f1as no coinciden, Intente otra vez!" ).show().fadeOut( 3000 );
	 
	});

//guarda los datos del nuevo cliente
function guardarCliente() {
	var pass_crypt = Sha1.hash(pass);
	var success = 0;
	$.ajaxSetup({async: false});
	$.post('<?php echo base_url("Costumers/createCostumer/"); ?>'+cedula+'/'+pass_crypt+'/'+email+'/'+nombres+'/'+apellidos+'/'+fecha+'/'+tel+'/'+cel+'/'+pais+'/'+appostal+'/'+idEmpresa,function () {
		})
		  .done(function(retorno) {
			  success = retorno;	 
		  });
	  
    $('#modalPreguntar').modal('hide');
    
		if(success == 1) // exito al insertar
		{
			salir();
		}
		if(success == 0) //falló al intentar guardar
		{
			$( "span" ).html("<h3>No se pudo guardar, revise los datos!,<br> Posible llave duplicada.</h3>" ).show().fadeOut( 10000 );
		}
	
}

//despúes de crear al usuario sale del formulario
function salir()
{
	location.reload();
}





//Despliega el formulario para buscar usuario
function buscarCliente(){
	$("#formularioCostumer").load("<?php echo base_url('Costumers/loadView/findCostumer'); ?>", function() {
	    $(this).show(700);
	});
}




//búsqueda del usuario según el criterio
//carga una tabla dinámica con los datos encontrados
function buscarClienteCriterio(criterio)
{
	if(criterio == 1) //según el texto de búsqueda (cedula,nombre o apellido)
	{
		var data = $("#busqueda").val(); //texto de búsqueda
		if(data===''){
			$('#info').html("<h2>Texto de b&uacute;squeda vac&iacute;o.</h2>" ).show().fadeOut( 3000 ); 
			return;}
		$("#tablaResultadosCostumer").load("<?php echo base_url('Costumers/findCostumer/1/'); ?>"+data, function() {
		    $(this).show(700);
		});
	}
	if(criterio == 2) // los últimos 10 registrados
	{
		$("#tablaResultadosCostumer").load("<?php echo base_url('Costumers/findCostumer/2/0'); ?>", function() {
		    $(this).show(700);
		});
	}
}


//Despliega el formulario modal  'update' de usuario
function editarUsuario(idUsuario)
{
	$('#modalUpdateUsuario').modal({
		keyboard : false
	});
	$('#modalUpdateUsuario').modal('show');
	$("#modalBodyUpdateUsuario").load("<?php echo base_url('Costumers/findCostumer/id/'); ?>"+idUsuario, function() {
	    $(this).show(700);
	});
}



// Despliega ventana de confirmación para eliminar usuario
function eliminarUsuario(idUsuario)
{
	id_aEliminar = idUsuario;
	$('#modalPreguntarEliminarUsuario').modal({
		keyboard : false
	});
	$('#modalPreguntarEliminarUsuario').modal('show');
}

// Elimina al usuario seleccionado
function eliminar()
{
	$.ajaxSetup({async: false});
	
	$.post('<?php echo base_url("Usuarios/deleteUser/"); ?>'+id_aEliminar,function () {
		})
		  .done(function(retorno) {
			  if($.trim(retorno) == '1') // exito al eliminar
				{
				  $('table#tablaDatos tr#'+id_aEliminar).remove(); //quitamos de la tabla de usuarios
				  $('#mensaje3').html("<h2>Dato eliminado correctamente!</h2>")
			        .hide()
			        .fadeIn(1000, function() {
			        	$('#modalPreguntarEliminarUsuario').modal('hide'); 					
			        }); 
					
				}
			  if($.trim(retorno) == '0') //falló al intentar eliminar
				{
				// aviso al usuario
				 	$('#aviso').html("<h2>No hubo Cambios.</h2>" ).show().fadeOut( 5000 );
				 	$('#modalAviso').modal('show');
				}
		  });
	 		
}
//cerrar modal aviso
function aceptarAviso()
{
	$('#modalAviso').modal('hide');
}



</script>
</html>		
