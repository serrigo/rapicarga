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
							 * Menú dinámico según los permisos de usuario
							 */
							foreach ($PROVEEDORES as $item)
							{
								$create = $item['C'];
								$read = $item['R'];
								$update = $item['U'];
								$delete = $item['D'];
								$print = $item['I'];
							}
								if($create == 1) //si tiene  permiso para crear se muestra el acceso
								{
									echo("<li  onclick='crearProveedor();'><a href='#'>Crear Proveedor</a></li>");
								}
								if($read  == 1) //si tiene  permiso para buscar se muestra el acceso
								{
									echo("<li  onclick='administar();'><a href='#'>Administrar</a></li>");
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
	 	<h3><span class="label label-info">M&oacute;dulo Proveedores</span></h3>
	 		<div id="formulario" style="display: none;">
	 		</div>
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
var nombre ;
var servicio ;

//Despliega el formulario para crear proveedor
function crearProveedor(){
	$("#formulario").load("<?php echo base_url('Proveedores/loadView/newProvider'); ?>", function() {
	    $(this).show(700);
	});

}


function administar(){
	$("#formulario").load("<?php echo base_url('Proveedores/loadView/tableProvider'); ?>", function() {
	    $(this).show(700);
	});

}

//validación de los datos del usuario antes de guardarlos
$("#formulario").submit(function(event) {
	
	event.preventDefault();
	
	nombre = $('#nomprov').val();
	servicio = $('#servicio').val();
	
	if(servicio == 0)
	{
		alert('Falta seleccionar servicio');
		return;
	}
	if(nombre === '') {
		alert('Falta nombre del proveedor');
		return;
	}
	guardarCliente();
	});

//guarda los datos del nuevo prov
function guardarCliente() {
	
	var success = 0;
	$.ajaxSetup({async: false});
	$.post('<?php echo base_url("Proveedores/createProvider/"); ?>'+nombre+'/'+servicio,function () {
		})
		  .done(function(retorno) {
			  success = retorno;	 
		  });
	  
    
		if(success == 1) // exito al insertar
		{
			$( "span" ).html("<h3>Datos Guardados</3>" ).show().fadeOut( 1000 );
			location.reload();
		}
		if(success == 0) //falló al intentar guardar
		{
			$( "span" ).html("<h3>No se pudo guardar, revise los datos!,<br> Posible llave duplicada.</h3>" ).show().fadeOut( 10000 );
		}
	
}

</script>
</html>		
