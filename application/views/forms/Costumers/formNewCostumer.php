<?php  $captcha = $CAPTCHA['image']; ?>
<!-- Formulario datos de usuario -->
        <div class="row">
            <div class="col-md-8">
                <h3>Ingrese datos del Cliente</h3>
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
					    <label for="datepicker" class="control-label">Fecha Nacimiento:</label>
					    <input type="date" style="width: 50%;" class="form-control" name="datepicker" placeholder="Nacimiento o Cumplea&ntilde;os (ej. 1990-12-31)" value="" id="datepicker">
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
				  
				   <div class="control-group form-group">
				  <div class="controls">
					    <label for="telefono" class="control-label">Tel&eacute;fono:</label>
					    <input type="text" style="width: 25%;" class="form-control" name="telefono"  value="" id="telefono">
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
				   <div class="control-group form-group">
				  <div class="controls">
					    <label for="celular" class="control-label">Celular:</label>
					    <input type="text" style="width: 25%;" class="form-control" name="celular" value="" id="celular">
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
					    <input type="text" style="width: 25%;" class="form-control" name="appostal"  id="appostal">
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
				  
				  <div class='alert alert-warning'>
				  	<p>Empresa:</p><br>
				  		<input type="text" style="width: 50%;"  readonly class="form-control" id="inputEmpresa" >
				  		<br>
				  		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSelEmpresa" data-whatever="@mdo">Seleccionar empresa</button>
				  		
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
			    	<button type="submit" class="btn btn-primary">Crear Cliente</button>
			  	</div>
			  	<span style="color: red; display:block;"></span>
  				</div>

 
</form>

            </div>
        </div>
        
        <!--  Modal seleccionar empresa-->  
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalSelEmpresa" >
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Seleccionar Empresa</h4>
		      </div><!-- /.modal-header -->
		      <div class="modal-body" id="modalBody">
		      
<!-- 		      
 -->
		      		<div class="well well-sm">
						<button type="button" class="btn btn-default" id="buscar" style="display:block;">Crear Empresa</button>
						 <div id="selectE" style="display:block;">
							<label>Empresa:</label><select id="lstEmpresa" class="form-control" ></select>
							<br>
							<button type="button" class="btn btn-default" id="agregar" >Agregar</button>
						</div>
						 <div id="frmnuevaEmpresa" style="display:none;">
		     			<div class="row" style="margin-left: 10px;">
		     				 <div class="control-group form-group">
							  <div class="controls">
								    <label for="nombreEmpresa" class="control-label">Nombre Legal Empresa:</label>
								    <input type="text" style="width: 50%;" class="form-control" name="nombreEmpresa"  id="nombreEmpresa">
							    </div>
							  </div>
							  
							  <div class="control-group form-group">
							  <div class="controls">
								    <label for="ruc" class="control-label">R.U.C. Empresa:</label>
								    <input type="text" style="width: 25%;" class="form-control" name="ruc"  id="ruc">
							    </div>
							  </div>
							  
							  <div class="control-group form-group">
							  <div class="controls">
								    <label for="nombreEmpresa2" class="control-label">Nombre Comercial Empresa:</label>
								    <input type="text" style="width: 50%;" class="form-control" name="nombreEmpresa2"  id="nombreEmpresa2">
							    </div>
							  </div>
							  
							  <div class="control-group form-group">
							  <div class="controls">
								    <label for="direccionEmpresa" class="control-label">Direcci&oacute;n Empresa:</label>
								    <input type="text" style="width: 50%;" class="form-control" name="direccionEmpresa"  id="direccionEmpresa">
							    </div>
							  </div>
							  
							  <div class="control-group form-group">
							  <div class="controls">
								    <label for="ciudadEmp" class="control-label">Ciudad:</label>
								    <input type="text" style="width: 25%;" class="form-control" name="ciudadEmp"  id="ciudadEmp">
							    </div>
							  </div>
							  
							  <div class="control-group form-group">
							  <div class="controls">
								    <label for="telEmpresa" class="control-label">Tel&eacute;fono:</label>
								    <input type="text" style="width: 25%;" class="form-control" name="telEmpresa"  id="telEmpresa">
							    </div>
							  </div>
							  
							  <div class="control-group form-group">
							  <div class="controls">
								    <label for="faxEmpresa" class="control-label">Fax:</label>
								    <input type="text" style="width: 25%;" class="form-control" name="faxEmpresa"  id="faxEmpresa">
							    </div>
							  </div>
							  
							  <div class="control-group form-group">
							  <div class="controls">
								    <label for="correoEmpresa" class="control-label">Correo :</label>
								    <input type="text" style="width: 40%;" class="form-control" name="correoEmpresa"  id="correoEmpresa">
							    </div>
							  </div>
							  
							  <div class="control-group form-group">
								  <div class="controls">
									    <label for="lstPais" class="control-label">Pa&iacute;s:</label>
									    <select id="lstPais" class="form-control" ></select>
								    </div>
				  				</div>
							<br>
						 <button type="button" class="btn btn-default" id="crearagregar"  >Crear y agregar empresa</button>  
		     			</div><!-- /.modal-row -->
		     		</div><!-- /.modal-frm -->
		     		
					</div>
		      
		      
<!-- 		      
 -->
		     		
		    </div><!-- /.modal-body -->
		      
		    </div> <!-- /.modal-content -->
		  </div> <!-- /.modal-dalog -->
		</div> <!-- /.modal seleccionar-->
          
<script>
$(function() {
   
    $( "#datepicker" ).datepicker();
        $( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd');    // Le pasamos el formato de la fecha
});

// $(function(){
// 	  $("#pais").autocomplete({
// 	    source: "get_paises/?"
// 	  });
	   
// 	});
	

	
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

	// evento click del botón nuevo empresa
	//mostrar/ocultar formulario de nueva empresa
	$("#buscar").click(function () {	
		$('#frmnuevaEmpresa').toggle(300);
		$('#buscar').toggle(500);
		$('#selectE').toggle(500);
		
		
	});
	try {
		// esto se ejecuta cuando el documento se carga completamente
			// mediante json carga las empresas
			
				$.getJSON('<?php echo base_url("Costumers/getEmpresas"); ?>',function (datos){
					if(datos == '') // no hay empresas registradas
					{
						$("<option value='0'>No Hay Empresas Registradas</option>").appendTo("#lstEmpresa");
						return;
					}
				    $.each(datos, function(i, empresa){
				    	$("<option value='"+empresa.id+"'>"+empresa.nombrecomercial+"</option>").appendTo("#lstEmpresa");
				    });
				  });
								
				  
	} catch (e) {
		 alert(e);
	}
	try {
		// esto se ejecuta cuando el documento se carga completamente
			// mediante json carga los paise
			
				$.getJSON('<?php echo base_url("Costumers/getPaises"); ?>',function (datos){
					if(datos == '') // no hay empresas registradas
					{
						$("<option value='0'>No Hay Paises Registrados</option>").appendTo("#lstPais");
						$("<option value='0'>No Hay Paises Registrados</option>").appendTo("#pais");
						return;
					}
				    $.each(datos, function(i, pais){
				    	$("<option value='"+pais.id+"'>"+pais.pais+"</option>").appendTo("#lstPais");
				    	$("<option value='"+pais.id+"'>"+pais.pais+"</option>").appendTo("#pais");
				    });
				  });
								
				  
	} catch (e) {
		 alert(e);
	}

	// evento click del botón agregar empresa
	//selecciona index del listbox 
	
	
	$("#agregar").click(function () {	
		idEmpresa = $('#lstEmpresa').val(); // id de la empresa
		if(idEmpresa == 0) return; // validar
		nomEmpresa = $("#lstEmpresa option:selected").html(); // nombre de la empresa	
		$("#inputEmpresa").val(nomEmpresa);
		$('#modalSelEmpresa').modal('hide');
	});
	
	$("#crearagregar").click(function () {	
		var nombreCom;
		var ruc;
		var diremp;
		var ciudademp;
		var faxemp;
		var telemp;
		var paisemp;
		var correoemp;

		nomEmpresa = $("#nombreEmpresa").val();
		nombreCom = $("#nombreEmpresa2").val();
		diremp = $("#direccionEmpresa").val();
		ciudademp = $("#ciudadEmp").val();
		faxemp = $("#faxEmpresa").val();
		telemp = $("#telEmpresa").val();
		paisemp = $('#lstPais').val();
		correoemp = $("#correoEmpresa").val();
		ruc = $("#ruc").val();
		
		if(nomEmpresa === '') {
			alert('Falta Nombre de Empresa');
			return;
		}
		if(nombreCom === '') {
			alert('Falta Nombre de Empresa');
			return;
		}
		if(ciudademp === '') {
			ciudademp = "null";
		}
		if(diremp === '') {
			diremp = "null";
		}
		if(telemp === '') {
			telemp = "null";
		}
		if(faxemp === '') {
			faxemp = "null";
		}

		if(correoemp === '') {
			correoemp = "null";
		}
		if(ruc === '') {
			alert('Falta RUC de Empresa');
			return;
		}
		
		
		$.post('<?php echo base_url("Costumers/createBusiness/"); ?>'+nomEmpresa+'/'+nombreCom+'/'+diremp+'/'+ciudademp+'/'+faxemp+'/'+telemp+'/'+paisemp+'/'+correoemp+'/'+ruc,function () {
		})
		  .done(function(retorno) {
			  if($.trim(retorno) != '0' || $.trim(retorno) != '-1') //si hubo éxito 
				{
				  idEmpresa = $.trim(retorno);
				}
			  else
			  {
				  // TODO: Avisar al Usuario
				  alert("Error..");
			  }
		  });
				
		$("#inputEmpresa").val(nombreCom);
		$('#modalSelEmpresa').modal('hide');
	});
	
});


</script>       
        
        
	
	
	