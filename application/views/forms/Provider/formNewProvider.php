<!-- Formulario nuevo proveedor -->
        <div class="row">
            <div class="col-md-8">
                <h3>Datos del Proveedor</h3>
                <form data-toggle="validator" role="form" id="frmProv">
                <div class="control-group form-group">
                        <div class="controls">
                            <label>Nombre del Proveedor:</label>
                            <input type="text" style="width: 50%;" class="form-control" id="nomprov" required data-validation-required-message="Ingrese nombre">
                            <p class="help-block"></p>
                        </div>
                </div>
               	<div class="control-group form-group">
				  <div class="controls">
					    <label for="servicio" class="control-label">Tipo de Servicio:</label>
					    <?php echo form_dropdown('servicio', $SERVICIOS, '', 'class="form-control" id="servicio"'); ?>
					   
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
				 				    
			     <div class="form-group">
			    	<button type="submit" class="btn btn-primary">Crear Proveedor</button>
			  	</div>
			  	<span style="color: red; display:block;"></span>

				</form>
		</div>
            </div>
<script>



</script>