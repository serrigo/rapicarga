
<div class="row">
				<div class="col-md-8">
                <h3>Escriba el correo, apellido o c&eacute;dula del usuario para buscarlo</h3>
                <form data-toggle="validator" role="form" id="searchForm">
	                <div class="control-group form-group">
	                        <div class="controls">
	                            <label>Criterio de b&uacute;squeda:</label>
	                            <input type="text" style="width: 50%;" class="form-control" id="busqueda" required data-validation-required-message="filtro de b&uacute;squeda.">
	                            <p class="help-block"></p>
	                        </div>
	                        <div class="form-group">
			    				<button type="button" class="btn btn-primary" onclick="buscarUsuarioCriterio(1);">Buscar Usuario</button>
			    				<button type="button" class="btn btn-primary" onclick="buscarUsuarioCriterio(2);">&Uacute;ltimos</button>
			  				</div>
			  			<span style="color: red; display:block;"></span>
	                </div>
                </form>
                </div>
                <div id="tablaResultados"></div>
</div>
