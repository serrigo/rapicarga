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
<th>Nombre(s)</th><th>Apellido(s)</th><th>C&eacute;dula</th><th>Email</th><th>Acciones</th>
</tr>
</thead>
<tbody>
<?php

		foreach ($USER as $item)
		{
			

			echo("<tr id='$item[id]'><td>$item[id]</td>"); //id en el <tr> para poder eliminarlo mediante ajax
			echo("<td id='$item[id]'>$item[nombre]</td>"); //id en el <td> para poder modificarlo mediante ajax
			echo("<td>$item[apellido]</td>");
			echo("<td>$item[cedula]</td>");
			echo("<td>$item[email]</td>");
			if($update == 1) //solo si tiene el permiso para modificar se muestran las opciones
			{
				echo("<td><button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editarUsuario($item[id]);'><i class='glyphicon glyphicon-pencil'></i> Modificar</button>");
				echo("<button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='bottom' title='Permisos' onclick='permisosUsuarios($item[id]);'><i class='glyphicon glyphicon-lock'></i> Permisos</button>");
					
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