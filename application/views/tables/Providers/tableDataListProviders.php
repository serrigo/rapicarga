<?php

	foreach ($PERMISO as $item)
	{
		$create = 	$item['C'];
		$read = 	$item['R'];
		$update = 	$item['U'];
		$delete = 	$item['D'];
		$print = 	$item['I'];
	}
?>
<table class="table table-hover" id="tablaDatos">
<thead>
<tr style="background:#AEC9E0;"><th>Id</th>
<th>Proveedor</th><th>Tipo de Servicio</th><th>Acciones</th>
</tr>
</thead>
<tbody>
<?php

		foreach ($PROVEEDORES as $item)
		{
			

			echo("<tr id='$item[id]'><td>$item[id]</td>"); //id en el <tr> para poder eliminarlo mediante ajax
			echo("<td id='$item[id]'>$item[proveedor]</td>"); //id en el <td> para poder modificarlo mediante ajax
			echo("<td>$item[servicio]</td>");
			if($update == 1) //solo si tiene el permiso para modificar se muestran las opciones
			{
				echo("<td><button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editarUsuario($item[id]);'><i class='glyphicon glyphicon-pencil'></i> Modificar </button>");
				echo("<button type='button' class='btn btn-link' data-toggle='modal' data-target='#modalCostos' title='Permisos' onclick='permisosUsuarios($item[id]);'><i class='glyphicon glyphicon-lock'></i> Costos por Servicios</button>");
					
			}
			else echo("<td>");
			if($delete == 1)//solo si tiene el permiso para borrar se muestra la opción
				echo("<button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='bottom' title='Eliminar' onclick='eliminarUsuario($item[id]);'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</button></td></tr>");
			else echo("</td></tr>");
		}
			
	?>
</tbody>		
</table>
<hr>
<!--  Modal formulario ->  
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalCostos" >
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Actualizar Costos del Proveedor</h4>
		      </div>
		      <div class="modal-body" id="modalBodyUpdateUsuario">
		     		<?php echo form_dropdown('tipocarga', $TIPOCARGA, '', 'class="form-control" style="width:50%;" id="tipocarga"'); ?>
		     		<div id="carga">
		     		</div>
		    </div>
		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal update-->
 <script type="text/javascript">
 function permisosUsuarios(id)
 {
	 $("#carga").html("<h2>Hola Mundo</h2>");
	 return;
 }
</script>				  