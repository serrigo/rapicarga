<?php
// obtener el id del usuario
$id = $iDUSER;

?>

<div class="well well-sm">
<button type="button" class="btn btn-default" id="buscar" style="display:block;">Nuevo</button>
<div id="lista" style="display:none;">
<label>M&oacute;dulos disponibles:</label><select id="lstModulos" class="form-control" ></select>
</div>
 
 <div id="checkBoxes" style="display:none;">
	 <label class="checkbox-inline"><input type="checkbox" value="C">C</label>
	 <label class="checkbox-inline"><input type="checkbox" value="R">R</label>
	 <label class="checkbox-inline"><input type="checkbox" value="U">U</label>	
	 <label class="checkbox-inline"><input type="checkbox" value="D">D</label>
	 <label class="checkbox-inline"><input type="checkbox" value="I">I</label>		
 </div>	
 <button type="button" class="btn btn-default" id="agregar" style="display:none;" >Agregar</button>
</div>
<hr>

<!-- tabla de permisos  -->

<table class="table table-hover" id="tablaDatosPermisos">
<thead>
<tr style="background:#AEC9E0;"><th>ID Permiso</th>
<th>M&oacute;dulo</th><th>C</th><th>R</th><th>U</th><th>D</th><th>I</th>
</tr>
</thead>
<tbody>
<?php
	
		foreach ($USER as $item)
		{


			echo("<tr id='$item[idpermisos]'><td>$item[idpermisos]</td>");
			echo("<td>$item[nombre]</td>");
			if($item['C']==0)								//dependiendo si es 0 o 1 el valor traido, sera checked o no el checkbox
				echo("<td><input type='checkbox'/></td>");
			else 
				echo("<td><input type='checkbox' checked='checked' /></td>");
				
			if($item['R']==0)
				echo("<td><input type='checkbox' /></td>");
			else
				echo("<td><input type='checkbox' checked='checked' /></td>");
			if($item['U']==0)
				echo("<td><input type='checkbox'/></td>");
			else
				echo("<td><input type='checkbox' checked='checked' /></td>");
			if($item['D']==0)
				echo("<td><input type='checkbox'/></td>");
			else
				echo("<td><input type='checkbox' checked='checked' /></td>");
			if($item['I']==0)
				echo("<td><input type='checkbox'/></td></tr>");
			else
				echo("<td><input type='checkbox' checked='checked' /></td></tr>");
			
		}
	?>
</tbody>		
</table>
<hr>
<button type="button" class="btn btn-primary"  onclick="actualizarPermisos();">Actualizar</button>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">Cerrar</span></button>
<script >

//esto se ejecuta cuando el documento se carga completamente
$(document).ready(function() {

	var C, R, U, D, I;
	var nomModulo;
	var idUsuario = <?php echo $id; ?>; // paso de variable de php a js
	
	// evento click del botón agregar permiso
	//crea nuevo permiso, lo agrega a la bd y luego la lista
	
	$("#agregar").click(function () {	
		var idModulo = $('#lstModulos').val(); // id del modulo
		if(idModulo == 0) return; // si no hay más módulos disponibles, sale de la ejecución de la función
		nomModulo = $("#lstModulos option:selected").html(); // nombre del modulo
		// recorremos los checkboxes del crud
		
		C=0;
		R=0;
		U=0;
		D=0;
		I=0;
		// buscamos los checkboxes seleccionados linea por linea
		var seleccionados = [];
		$('#checkBoxes input:checked').each(function() {
			seleccionados.push($(this).attr('value'));
		});
		for(i=0;i < (seleccionados.length);i++)
		{
			if(seleccionados[i]=='C') C=1;
			if(seleccionados[i]=='R') R=1;
			if(seleccionados[i]=='U') U=1;
			if(seleccionados[i]=='D') D=1;
			if(seleccionados[i]=='I') I=1;
		}
		
		
		$.post('<?php echo base_url("Usuarios/createPermission/"); ?>'+idUsuario+'/'+idModulo+'/'+C+'/'+R+'/'+U+'/'+D+'/'+I,function () {
		})
		  .done(function(retorno) {
			  if($.trim(retorno) != '0' || $.trim(retorno) != '-1') //si hubo éxito en la insercción actualiza la tabla permisos dinámicamente
				{
					//construimos el string row <tr> para insertarlo a la tabla permisos
					var row;
					if(C == 0)
						row += "<td><input type='checkbox' /></td>";
						else
						row += "<td><input type='checkbox' checked='checked' /></td>";
					if(R == 0)
						row += "<td><input type='checkbox' /></td>";
						else
						row += "<td><input type='checkbox' checked='checked' /></td>";
					if(U == 0)
						row += "<td><input type='checkbox' /></td>";
						else
						row += "<td><input type='checkbox' checked='checked' /></td>";
					if(D == 0)
						row += "<td><input type='checkbox' /></td>";
						else
						row += "<td><input type='checkbox' checked='checked' /></td>";
					if(I == 0)
						row += "<td><input type='checkbox' /></td></tr>";
						else
						row += "<td><input type='checkbox' checked='checked' /></td></tr>";
					//inserccion de fila dinámica
					var tablaDatos= $("#tablaDatosPermisos");
					tablaDatos.append("<tr id='"+retorno+"'><td>"+retorno+"</td><td>"+nomModulo+"</td>"+row);
					//escondemos el formulario de nuevo permiso
					$("#buscar").click();
				}
			  else
			  {
				  // TODO: Avisar al Usuario
				  alert("Error..");
			  }
		  });
		
	});

	// evento click del botón nuevo permiso
	//mostrar/ocultar formulario de nuevo permiso
	$("#buscar").click(function () {	
		$('#lista').toggle(300);
		$('#checkBoxes').toggle(400);
		$('#buscar').toggle(500);
		$('#agregar').toggle(600);
		
	});

	
	
		  try {
			// esto se ejecuta cuando el documento se carga completamente
				// mediante json carga los modulos disponibles para agregar permiso, a la lista en el formulario agregar permiso
				
					$.getJSON('<?php echo base_url("Usuarios/getModulosDisponibles/"); ?>'+idUsuario,function (datos){
						if(datos == '') // no tiene modulos disponibles
						{
							$("<option value='0'>Ninguno</option>").appendTo("#lstModulos");
							return;
						}
					    $.each(datos, function(i, modulo){
					    	$("<option value='"+modulo.idmodulos+"'>"+modulo.nombre+"</option>").appendTo("#lstModulos");
					    });
					  });
									
					  
		} catch (e) {
			 alert(e);
		}

});//fin document ready

var tr_color = 1;
var exito = 0;

//Actuliza los permisos del usuario
function actualizarPermisos()
{
	var checkbox_checked;
	// recorre la tabla de permisos
    $("#tablaDatosPermisos tbody tr").each(function (index) 
    {
        var idPermiso,modulo, C, R, U, D, I;
        $(this).children("td").each(function (index2) 
        {
            //recorre la fila de la tabla y pregunta si el checkbox interno esta seleccionado
            switch (index2) 
            {
                case 0: 
                    	idPermiso = $(this).text(); //obtiene el id del permiso
                        break;
                case 2:
	                	checkbox_checked = $(this).find('input').is(':checked'); // checkbox de C
	        			if(checkbox_checked) C = 1;
	        			else C = 0;
	                	break;
                case 3: 
	                	checkbox_checked = $(this).find('input').is(':checked');// checkbox de R
	    				if(checkbox_checked) R = 1;
	    				else R = 0;
	            		break;
                case 4:
	                	checkbox_checked = $(this).find('input').is(':checked');// checkbox de U
	        			if(checkbox_checked) U = 1;
	        			else U = 0;
	                	break;
                case 5: 
	                	checkbox_checked = $(this).find('input').is(':checked');// checkbox de D
	        			if(checkbox_checked) D = 1;
	        			else D = 0;
	                	break;
                case 6: 
	                	checkbox_checked = $(this).find('input').is(':checked');// checkbox de I
	        			if(checkbox_checked) I = 1;
	        			else I = 0;
	                	break;
            }
          
        })
        // mediante ajax se actualiza los permisos
      //  var datos = 'permiso=' + idPermiso + '&c=' + C + '&r=' + R + '&u=' + U + '&d=' + D;
        exito = false;
        $.ajaxSetup({async: false});
        $.post('<?php echo base_url("Usuarios/updatePermission/"); ?>'+idPermiso+'/'+C+'/'+R+'/'+U+'/'+D+'/'+I,function () {
		})
		  .done(function(retorno) {
			  if($.trim(retorno) != '0' || $.trim(retorno) != '-1') //si hubo éxito
				{
				  exito = $.trim(retorno);
				}  
		  });	
      //cambio de color del 'row' de la tabla permisos (aviso al usuario)
      if(exito == '1')
      {
    	  if(tr_color == 1)
  		{
  			$(this).css("background-color", "#d9f1c1");   //cambia color de la fila si hubo update
  			
  		}
  		else
  		{
  			$(this).css("background-color", "#ECF8E0");   //cambia color de la fila si hubo update
  			
  		}	
      }
		  exito = false;		
    });
    //(alterna los valores 1 y 2 para cambiar el color del row) 
    tr_color = (tr_color == 1) ? 2 : 1;
}
</script>
			  				