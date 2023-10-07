<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
//header("Content-Type: application/json; charset=utf-8"); 
//$data = array();
$vigente = 0;
/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', '202027099', 'marketzone');
/** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

/** comprobar la conexión */
if ($link->connect_errno) {
	die('Falló la conexión: ' . $link->connect_error . '<br/>');
	//exit();
}

/** Crear una tabla que no devuelve un conjunto de resultados */
if ($result = $link->query("SELECT * FROM productos WHERE eliminado = $vigente")) {
	/** Se extraen las tuplas obtenidas de la consulta */
	$row = $result->fetch_all(MYSQLI_ASSOC);

	/** Se crea un arreglo con la estructura deseada */
	foreach ($row as $num => $registro) {            // Se recorren tuplas
		foreach ($registro as $key => $value) {      // Se recorren campos
			$data[$num][$key] = utf8_encode($value);
		}
	}

	/** útil para liberar memoria asociada a un resultado con demasiada información */
	$result->free();
}

$link->close();

/** Se devuelven los datos en formato JSON */
// echo json_encode($data, JSON_PRETTY_PRINT);

?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Producto</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<h3>PRODUCTO</h3>

	<br />

	<?php if (isset($row)) :  ?>

		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					<th scope="col">Actualizar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($data as $key => $value) {
					echo "<tr id=$value[id]>";
					echo '<th scope=value class="row-data">' . $value["id"] . '</th>';
					echo '<td class="row-data">' . $value["nombre"] . ' </td>';
					echo '<td class="row-data">' . $value["marca"] . ' </td>';
					echo '<td class="row-data">' . $value["modelo"] . ' </td>';
					echo '<td class="row-data">' . $value["precio"] . ' </td>';
					echo '<td class="row-data">' . $value["unidades"] . ' </td>';
					echo '<td class="row-data">' . $value["detalles"] . ' </td>';
					echo '<td class="row-data">' . "<img width= 150 height= 150 src= $value[imagen] >" . '</td>';
					echo '<td>' . '<input type= "button" style="margin-top: 25%;" value= "Actualizar" onclick= "show()" </input>' . '</td>';
					echo "</tr>";
				}
				?>
			</tbody>
		</table>

	<?php elseif (!empty($id)) : ?>

		<script>
			alert('El ID del producto no existe');
		</script>

	<?php endif; ?>
	<script>
		function show() {
			// se obtiene el id de la fila donde está el botón presinado
			var rowId = event.target.parentNode.parentNode.id;

			// se obtienen los datos de la fila en forma de arreglo
			var data = document.getElementById(rowId).querySelectorAll(".row-data");
			/*
			querySelectorAll() devuelve una lista de elementos (NodeList) que 
			coinciden con el grupo de selectores CSS indicados.
			(ver: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors)

			En este caso se obtienen todos los datos de la fila con el id encontrado
			y que pertenecen a la clase "row-data".
			*/

			var id = data[0].innerHTML;
			var nombre = data[1].innerHTML;
			var marca = data[2].innerHTML;
			var modelo = data[3].innerHTML;
			var precio = data[4].innerHTML;
			var unidades = data[5].innerHTML;
			var detalles = data[6].innerHTML;
			var img = data[7].firstElementChild.getAttribute('src');

			alert("Id: " + id + "\nNombre: " + nombre + "\nMarca: " + marca + "\nModelo: " + modelo + "\nPrecio: " + precio + "\nUnidades: " + unidades);
			send2form(id,nombre, marca, modelo, precio, unidades, detalles, img);
		}
	</script> 
	<script>
		function send2form(id,nombre, marca, modelo, precio, unidades, detalles, img) {
			var form = document.createElement("form");

			var idIn = document.createElement("input");
			idIn.type = 'hidden';
			idIn.name = 'id';
			idIn.value = id;
			form.appendChild(idIn);
		
			var nombreIn = document.createElement("input");
			nombreIn.type = 'text';
			nombreIn.name = 'nombre';
			nombreIn.value = nombre;
			form.appendChild(nombreIn);

			var marcaIn = document.createElement("input");
			marcaIn.type = 'text';
			marcaIn.name = 'marca';
			marcaIn.value = marca;
			form.appendChild(marcaIn);

			var modeloIn = document.createElement("input");
			modeloIn.type = 'text';
			modeloIn.name = 'modelo';
			modeloIn.value = modelo;
			form.appendChild(modeloIn);

			var precioIn = document.createElement("input");
			precioIn.type = 'number';
			precioIn.name = 'precio';
			precioIn.value = parseFloat(precio);
			form.appendChild(precioIn);

			var detallesIn = document.createElement("input");
			detallesIn.type = 'text';
			detallesIn.name = 'detalles';
			detallesIn.value = detalles;
			form.appendChild(detallesIn);

			var unidadesIn = document.createElement("input");
			unidadesIn.type = 'number';
			unidadesIn.name = 'unidades';
			unidadesIn.value = parseInt(unidades);
			form.appendChild(unidadesIn);

			var imgIn = document.createElement("input");
			imgIn.type = 'text';
			imgIn.name = 'img';
			imgIn.value = img;
			form.appendChild(imgIn); 

			console.log(form);

			form.method = 'POST';
			form.action = 'http://localhost/tecweb_new/practicas/p07/formulario_productosv2.php';

			document.body.appendChild(form);
			form.submit();
		}
	</script>
</body>

</html>