<?php
/**
 * formulario update de cliente
 */


	$id = $USER->id;
	$email = $USER->email;
	$nombre = $USER->nombre;
	$apellido = $USER->apellido;
	$cedula = $USER->cedula;
	$fecha = $USER->fecha_nac;
	$tel = $USER->telefono;
	$cel = $USER->celular;
	$pais = $USER->idpais;
	$postal = $USER->ap_postal;
	
	
	
	$captcha = $CAPTCHA['image'];
	
	foreach ($PERMISO as $item)
	{
		$create = $item['C'];
		$read = $item['R'];
		$update = $item['U'];
		$delete = $item['D'];
		$print = $item['I'];
	}
	
	// <tr> para actualizar la lista de los usuarios dinamicamente mediante jquery </tr>.
	$tr;
	
	if($update == 1) 
	{
		$tr = "<td><button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editarUsuario($id);'><i class='glyphicon glyphicon-pencil'></i> Modificar</button>";
	}
	else 
		$tr = $tr."<td>";
	if($delete == 1)
		$tr = $tr."<button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='bottom' title='Eliminar' onclick='eliminarUsuario($id);'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</button></td></tr>";
	else
		$tr = $tr."</td></tr>";

?>
<form data-toggle="validator" role="form" id="updateUserForm" style="background-color: #f2faea;">
                <div class="control-group form-group">
                        <div class="controls">
                            <label>C&eacute;dula:</label>
                            <input type="text" value="<?php echo ($cedula); ?>" style="width: 25%;" class="form-control" id="cedula_update" required data-validation-required-message="Por favor ingrese cedula del usuario.">
                            <p class="help-block"></p>
                        </div>
                </div>
                
  				<div class="control-group form-group">
                        <div class="controls">
                            <label>Nombre(s):</label>
                            <input type="text" value="<?php echo ($nombre); ?>" style="width: 75%;" class="form-control" id="name_update" required data-validation-required-message="Por favor ingrese el nombre.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Apellido(s):</label>
                            <input type="text" value="<?php echo ($apellido); ?>" style="width: 75%;" class="form-control" id="lastname_update" required data-validation-required-message="Por favor ingrese el apellido.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    
                 
				  <div class="control-group form-group">
				  <div class="controls">
					    <label for="inputEmail_update" class="control-label">Email:</label>
					    <input type="email" value="<?php echo ($email); ?>" style="width: 50%;" class="form-control" id="inputEmail_update" placeholder="Email" data-error="Correo Inv&aacute;lido" required>
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
<!-- 				  bb -->
					<div class="control-group form-group">
				  <div class="controls">
					    <label for="datepicker" class="control-label">Fecha Nacimiento:</label>
					    <input type="date" style="width: 50%;" class="form-control" name="datepicker" placeholder="Nacimiento o Cumplea&ntilde;os (ej. 1990-12-31)" value="" id="datepicker">
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
				  
				   <div class="control-group form-group">
				  <div class="controls">
					    <label for="telefono" class="control-label">Tel&eacute;fono:</label>
					    <input type="text" style="width: 25%;" class="form-control" name="telefono"  value="<?php echo ($tel); ?>" id="telefono">
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
				   <div class="control-group form-group">
				  <div class="controls">
					    <label for="celular" class="control-label">Celular:</label>
					    <input type="text" style="width: 25%;" class="form-control" name="celular" value="<?php echo ($cel); ?>" id="celular">
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
				  
				  <div class="control-group form-group">
				  <div class="controls">
					    <label for="pais" class="control-label">Pa&iacute;s:</label>
					    <select id="pais" class="form-control" ></select>
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
				  
				  <div class="control-group form-group">
				  <div class="controls">
					    <label for="appostal" class="control-label">Apartado Postal:</label>
					    <input type="text" style="width: 25%;" class="form-control" name="appostal" value="<?php echo ($postal); ?>"  id="appostal">
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
				  
				  <div class='alert alert-warning'>
				  	<label for="empresa" class="control-label">Empresa:</label>
					    <select id="empresa" class="form-control" ></select>
				  			
				  </div>
<!-- cc -->
				 <div class="checkbox-inline">
				   <label>
				   	<input type="checkbox" id="resetPass" >Reiniciar contrase&ntilde;a 
				   </label>  
				 </div>  
				 <br><br>
				<div class='alert alert-info'>
					 <div class="image">
					 	<?php echo ($captcha);?>
					 	
					 </div>
					 <a class ='refresh'><img id = 'ref_symbol' src ="<?php echo base_url('images/ic_menu_refresh.png'); ?>">Recargar</a>
					<br>
				
					<div >
					  <div class="controls">
						    <label for="captcha" class="control-label">Captcha Text:</label>
						    <input type="text" value="" style="width: 50%;" class="form-control" id="captcha" placeholder="" required>
						    <div class="help-block with-errors" id ="errorCaptcha"></div>
					    </div>
					  </div>
				  </div>
				<br>
				 
			     <div class="form-group">
			    
			    	<button type="submit" class="btn btn-primary" >Actualizar Usuario</button>
			  	</div>
			  	<span style="color: red; display: block;"></span>
  				

 
</form>


<script>
$(function() {
	   
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd');    // Le pasamos el formato de la fecha
    $('#datepicker').datepicker("setDate","<?php echo ($fecha); ?>");
});

$(document).ready(function() {
	
	//validación de los datos del usuario antes de actualizarlos
	$("#updateUserForm").submit(function(event) {
		
		event.preventDefault();
		
		
		$('#modalUpdateUsuario').modal('hide'); //cerrar ventana modal update
		
		var cedula = $('#cedula_update').val();
		var email = $('#inputEmail_update').val();
		var nombres = $('#name_update').val();
		var apellidos = $('#lastname_update').val();
		var idEmpresa = $('#empresa').val();
		var fecha = $('#datepicker').val();
		var tel = $('#telefono').val();
		var cel = $('#celular').val();
		var appostal = $('#appostal').val();
		var pais = $('#pais').val();
		
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

		///////////////////////
		var captcha = $('#captcha').val();
		var resetPass = $('#resetPass').prop('checked');
		var success = 0;
		$.ajaxSetup({async: false});
		// valida captcha
		$.post('<?php echo base_url("Usuarios/validarCaptcha/"); ?>'+captcha,function () {
		})
		  .done(function(exito) {
			  if($.trim(exito) == '1') // captcha válido
			  { 
				  $.post('<?php echo base_url("Costumers/updateCostumer/").$id; ?>/'+cedula+'/'+email+'/'+nombres+'/'+apellidos+'/'+resetPass+'/'+fecha+'/'+tel+'/'+cel+'/'+pais+'/'+appostal,function () {
					})
					  .done(function(retorno) {
						  success = $.trim(retorno);
					  });
			  }	 
			  else if($.trim(exito) == '0') // captcha fail
			  {
				  $('#errorCaptcha').text("Error de Captcha!!" ).show().fadeOut( 5000 );
			  }
		  });
		if(success == '1') 
		{
			// se actualiza tabla de usuarios
			var tr = "<tr ><td id='<?php echo $id; ?>'><?php echo $id; ?></td><td>"+nombres+"</td><td>"+apellidos+"</td><td>"+cedula+"</td><td>"+email+"</td><?php echo $tr; ?>";
			$("tr#<?php echo $id; ?>").parent().replaceWith(tr);
			// aviso al usuario
			$('#aviso').html("<h2>Datos Actualizados.</h2>" ).show().fadeOut( 5000 );
		 	$('#modalAviso').modal('show');
		}
		else if(success == '0') //no hubo cambios
		{
			// aviso al usuario
			 	$('#aviso').html("<h2>No hubo Cambios.</h2>" ).show().fadeOut( 5000 );
			 	$('#modalAviso').modal('show');
		}
		});
	
		

	// refresca imagen captcha
	$("a.refresh").click(function() {
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "Usuarios/refreshCaptcha",
				success: function(res) {
				if (res)
				{
					jQuery("div.image").html(res);
				}
				}
			});
		});
	
	try {
		// esto se ejecuta cuando el documento se carga completamente
			// mediante json carga los paises
			$.ajaxSetup({async: false});
				$.getJSON('<?php echo base_url("Costumers/getPaises"); ?>',function (datos){
					if(datos == '') // no hay empresas registradas
					{
						$("<option value='0'>No Hay Paises Registrados</option>").appendTo("#pais");
						
						return;
					}
				    $.each(datos, function(i, pais){
				    	$("<option value='"+pais.id+"'>"+pais.pais+"</option>").appendTo("#pais");
				    	
				    });
				    $("#pais").val("<?php echo ($pais); ?>");
				  });
								
				  
	} catch (e) {
		 alert(e);
	}
	try {
		// esto se ejecuta cuando el documento se carga completamente
			// mediante json carga las empresas
			
				$.getJSON('<?php echo base_url("Costumers/getEmpresas"); ?>',function (datos){
					if(datos == '') // no hay empresas registradas
					{
						$("<option value='0'>No Hay Empresas Registradas</option>").appendTo("#empresa");
						return;
					}
				    $.each(datos, function(i, empresa){
				    	$("<option value='"+empresa.id+"'>"+empresa.nombrecomercial+"</option>").appendTo("#empresa");
				    });
				  });
								
				  
	} catch (e) {
		 alert(e);
	}

});



</script>