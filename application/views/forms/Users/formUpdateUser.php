<?php
/**
 * formulario update de usuario
 */


	$id = $USER->id;
	$email = $USER->email;
	$nombre = $USER->nombre;
	$apellido = $USER->apellido;
	$cedula = $USER->cedula;
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
		$tr = $tr."<button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='bottom' title='Permisos' onclick='permisosUsuarios($id);'><i class='glyphicon glyphicon-lock'></i> Permisos</button>";
			
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
			  	<span style="color: red; display:block;"></span>
  				

 
</form>


<script>
$(document).ready(function() {

	//validación de los datos del usuario antes de actualizarlos
	$("#updateUserForm").submit(function(event) {
		
		event.preventDefault();
		
		
		$('#modalUpdateUsuario').modal('hide'); //cerrar ventana modal update
		
		var cedula = $('#cedula_update').val();
		var email = $('#inputEmail_update').val();
		var nombres = $('#name_update').val();
		var apellidos = $('#lastname_update').val();
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
				  $.post('<?php echo base_url("Usuarios/updateUser/").$id; ?>/'+cedula+'/'+email+'/'+nombres+'/'+apellidos+'/'+resetPass,function () {
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
			$("tr#<?php /* TODO: no esta actualizando dinamicamente; */ echo $id; ?>").parent().replaceWith(tr);
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
	
});



</script>