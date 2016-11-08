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
							foreach ($USUARIOS as $item)
							{
								$create = $item['C'];
								$read = $item['R'];
								$update = $item['U'];
								$delete = $item['D'];
								$print = $item['I'];
							}
								if($create == 1) //si tiene  permiso para crear se muestra el acceso
								{
									echo("<li  onclick='crearUsuario();'><a href='#'>Crear Usuario</a></li>");
								}
								if($read  == 1) //si tiene  permiso para buscar se muestra el acceso
								{
									echo("<li  onclick='buscarUsuario();'><a href='#'>Buscar Usuario</a></li>");
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
	 	<h3><span class="label label-info">M&oacute;dulo Usuarios</span></h3>
	 	<h3><span style="color: red;" id="info"></span></h3>
	 		<div id="formulario" style="display: none;"></div>
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
 
 <!--  Modal formulario Permisos-->  
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalPermisos">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Permisos de  Usuario</h4>
		      </div>
		      <div class="modal-body" id="modalBodyPermiso">
		     		
		    </div>
		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal permisisos-->
		
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
		        <h4 class="modal-title">Registro de Usuario</h4>
		      </div>
		      <div class="modal-body">
		     		        
			        <form role="form" id = "form_preguntarf">
			        	  	        	  
						  <div><h3>Datos listos para guardar.<small><br> Qu&eacute; desea hacer ?</small></h3></div>
						  <button type="button" class="btn btn-info" onclick="guardarUsuario();" data-toggle='tooltip' >Guardar datos</button>
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
	
	<!--  Modal Preguntar seguir-->
        
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalPreguntarSeguir">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Registro de Usuario</h4>
		      </div>
		      <div class="modal-body">
		     		        
			        <form role="form" id = "form_preguntarf2">
			        	  			        	  
						  <div><h3>Datos Guardados Satisfactoriamente.</h3></div>
						  <button type="button" class="btn btn-info" onclick="salir();" data-dismiss="modal" aria-hidden="true">Aceptar</button>
						  </form>
		               
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

<script>

var cedula;
var email;
var nombres;
var apellidos;
var pass;
var passConfirm;
var tr_color = 1;
var id_aEliminar;

//Despliega el formulario para crear usuario
function crearUsuario(){
	$("#formulario").load("<?php echo base_url('Usuarios/loadView/newUser'); ?>", function() {
	    $(this).show(700);
	});

}

//validación de los datos del usuario antes de guardarlos
$("#formulario").submit(function(event) {
	
	event.preventDefault();
	
	cedula = $('#cedula').val();
	email = $('#inputEmail').val();
	nombres = $('#name').val();
	apellidos = $('#lastname').val();
	pass = $('#inputPassword').val();
	passConfirm = $('#inputPasswordConfirm').val();
	var captcha = $('#captcha').val();
	
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
		  $('#errorCaptcha_').text("Error de Captcha!!" ).show().fadeOut( 5000 );
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

//guarda los datos del nuevo usuario
function guardarUsuario() {
	var pass_crypt = Sha1.hash(pass);
	var success = 0;
	$.ajaxSetup({async: false});
	$.post('<?php echo base_url("Usuarios/createUser/"); ?>'+cedula+'/'+pass_crypt+'/'+email+'/'+nombres+'/'+apellidos,function () {
		})
		  .done(function(retorno) {
			  success = retorno;	 
		  });
	  
    $('#modalPreguntar').modal('hide');
    
		if(success == 1) // exito al insertar
		{
			$('#modalPreguntarSeguir').modal({
				keyboard : false
			});
			$('#modalPreguntarSeguir').modal('show');
		}
		if(success == 0) //falló al intentar guardar
		{
			$( "span" ).text("No se pudo guardar, revise los datos!" ).show().fadeOut( 5000 );
		}
	
}

//despúes de crear al usuario sale del formulario
function salir()
{
	location.reload();
}

//Despliega el formulario para buscar usuario
function buscarUsuario(){
	$("#formulario").load("<?php echo base_url('Usuarios/loadView/findUser'); ?>", function() {
	    $(this).show(700);
	});
}

//búsqueda del usuario según el criterio
//carga una tabla dinámica con los datos encontrados
function buscarUsuarioCriterio(criterio)
{
	if(criterio == 1) //según el texto de búsqueda (cedula,nombre o apellido)
	{
		var data = $("#busqueda").val(); //texto de búsqueda
		if(data===''){
			$('#info').html("<h2>Texto de b&uacute;squeda vac&iacute;o.</h2>" ).show().fadeOut( 3000 ); 
			return;}
		$("#tablaResultados").load("<?php echo base_url('Usuarios/findUser/1/'); ?>"+data, function() {
		    $(this).show(700);
		});
	}
	if(criterio == 2) // los últimos 10 registrados
	{
		$("#tablaResultados").load("<?php echo base_url('Usuarios/findUser/2/0'); ?>", function() {
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
	$("#modalBodyUpdateUsuario").load("<?php echo base_url('Usuarios/findUser/id/'); ?>"+idUsuario, function() {
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

// despliega ventana modal para modificar permisos de usuarios
function permisosUsuarios(idUsuario)
{
	$('#modalPermisos').modal({
		keyboard : false
	});
	$('#modalPermisos').modal('show');
	
	$("#modalBodyPermiso").load("<?php echo base_url('Usuarios/getPermission/'); ?>"+idUsuario, function() {
	    $(this).show(700);
	});
	
}

</script>
</html>		