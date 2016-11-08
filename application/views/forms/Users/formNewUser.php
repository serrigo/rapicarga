<?php  $captcha = $CAPTCHA['image']; ?>
<!-- Formulario datos de usuario -->
        <div class="row">
            <div class="col-md-8">
                <h3>Datos del Usuario del Sistema</h3>
                <form data-toggle="validator" role="form" id="contactForm">
                <div class="control-group form-group">
                        <div class="controls">
                            <label>C&eacute;dula:</label>
                            <input type="text" style="width: 25%;" class="form-control" id="cedula" required data-validation-required-message="Por favor ingrese cedula del usuario.">
                            <p class="help-block"></p>
                        </div>
                </div>
                
  				<div class="control-group form-group">
                        <div class="controls">
                            <label>Nombre(s):</label>
                            <input type="text" style="width: 75%;" class="form-control" id="name" required data-validation-required-message="Por favor ingrese el nombre.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Apellido(s):</label>
                            <input type="text" style="width: 75%;" class="form-control" id="lastname" required data-validation-required-message="Por favor ingrese el apellido.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    
                 
				  <div class="control-group form-group">
				  <div class="controls">
					    <label for="inputEmail" class="control-label">Email</label>
					    <input type="email" style="width: 50%;" class="form-control" id="inputEmail" placeholder="Email" data-error="Correo Inv&aacute;lido" required>
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
				  
				  <div class="control-group form-group">
				   <div class="controls">
				    <label for="inputPassword" class="control-label">Contrase&ntilde;a</label>
				      <input type="password" style="width: 50%;" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
				      <span class="help-block">M&iacute;nimo de 6 caracteres</span>
				    </div>
    
				    <div class="control-group form-group">
				     <div class="controls">
				     <label for="inputPasswordConfirm" class="control-label">Confirme Contrase&ntilde;a</label>
				      <input type="password" style="width: 50%;" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Oh oh, no son iguales.." placeholder="Confirme" required>
				      <div class="help-block with-errors"></div>
				    </div>
				    </div>
				   <div class='alert alert-info'>
					 <div class="image">
					 	<?php echo ($captcha);?>
					 	
					 </div>
					 <a  class ='refresh'><img id = 'ref_symbol' src ="<?php echo base_url('images/ic_menu_refresh.png'); ?>">Recargar</a>
					<br>
				
					<div >
					  <div class="controls">
						    <label for="captcha" class="control-label">Captcha Text:</label>
						    <input type="text" value="" style="width: 50%;" class="form-control" id="captcha" placeholder="" required>
						    <div class="help-block with-errors" id ="errorCaptcha_"></div>
					    </div>
					  </div>
				  </div> 
				  <div id="success"></div>
				    
			     <div class="form-group">
			    	<button type="submit" class="btn btn-primary">Crear Usuario</button>
			  	</div>
			  	<span style="color: red; display:block;"></span>
  				</div>

 
</form>

            </div>
        </div>
<script>
$(document).ready(function() {

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
        
        
	
	
	