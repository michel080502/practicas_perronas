<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Registro de productos</title>
  <style type="text/css">
    ol,
    ul {
      list-style-type: none;
    }
  </style>
</head>

<body>
  <h1>Actualiza datos de producto</h1>

  <form id="formulariProducto" action="http://localhost/tecweb_new/practicas/p07/update_productos.php" method="POST" onsubmit="return validar()">
    <h2>Información del Producto</h2>

    <fieldset>
      <legend>Producto</legend>

      <ul>
        <li>
          <label for="form-nombre">Nombre:</label>
          <input type="text" name="nombre" id="form-nombre" required value="<?= !empty($_POST['nombre']) ? $_POST['nombre'] : $_GET['nombre'] ?>" />
        </li>
        <br />
        <li>
          <label for="form-marca">Marca:</label>
          <select id="form-marca" name="marca" required>
            <option value="<?= !empty($_POST['marca']) ? $_POST['marca'] : $_GET['marca'] ?>"><?= !empty($_POST['marca']) ? $_POST['marca'] : $_GET['marca'] ?></option>
            <option value="Nikon">Nikon</option>
            <option value="Sony">Sony</option>
            <option value="Pentax">Pentax</option>
            <option value="FujiFilm">FujiFilm</option>
            <option value="Canon">Canon</option>
          </select>
        </li>
        <br />
        <li>
          <label for="form-modelo">Modelo:</label>
          <input type="text" name="modelo" id="form-modelo" required value="<?= !empty($_POST['modelo']) ? $_POST['modelo'] : $_GET['modelo'] ?>" />
        </li>
        <br />
        <li>
          <label for="form-precio">Precio:</label>
          <input type="number" name="precio" id="form-precio" required value="<?= !empty($_POST['precio']) ? $_POST['precio'] : $_GET['precio'] ?>" />
        </li>
        <br />
        <li>
          <label for="form-detalles">Detalles: </label><br /><textarea name="detalles" rows="4" cols="60" id="form-detalles"><?= !empty($_POST['detalles']) ? $_POST['detalles'] : $_GET['detalles'] ?></textarea>
        </li>
        <br />
        <li>
          <label for="form-unidades">Unidades:</label>
          <input type="number" name="unidades" id="form-unidades" min="0" value="<?= !empty($_POST['unidades']) ? $_POST['unidades'] : $_GET['unidades'] ?>" />
        </li>
        <br />
        <li>
          <label for="form-img">Ruta de la Imagen:</label>
          <input type="text" name="img" id="form-img" value="<?= !empty($_POST['img']) ? $_POST['img'] : $_GET['img'] ?>" />
        </li>
        <br />
        <li>
          <input type="hidden" name="id" value="<?= !empty($_POST['id']) ? $_POST['id'] : $_GET['id'] ?>">
        </li>
      </ul>
    </fieldset>

    <p>
      <input type="submit" value="¡Actualizar!" />
      <input type="reset" />
    </p>
  </form>

  <script>
    function validar() {
      var nombre = document.getElementById("form-nombre").value;
      var marca = document.getElementById("form-marca").value;
      var modelo = document.getElementById("form-modelo").value;
      var precio = document.getElementById("form-precio").value;
      var detalles = document.getElementById("form-detalles").value;
      var unidades = document.getElementById("form-unidades").value;
      var img = document.getElementById("form-img").value;

      var validado = true;
      var patron_nombre = /^[a-zA-Z0-9\s]+$/;
      var patron_modelo = /^[a-zA-Z0-9]+$/;
      var patron_precio = /^[0-9.]+$/;
      var patron_detalles = /^[a-zA-Z0-9.%:,\s]+$/;
      var patron_unidades = /^[0-9]+$/;
      var patron_img = /^[a-zA-Z0-9./_]+$/;

      if (!patron_nombre.test(nombre) || nombre.lenght > 100) {
        validado = false;
        alert("Escribe un nombre solo con letras y de 100 caracteres");
      } else if ((marca == 0)) {
        validado = false;
        alert("Selecciona una marca");
      } else if (!patron_modelo.test(modelo) && modelo.lenght <= 25) {
        validado = false;
        alert(
          "Escribe un modelo con letras y números y de 25 caracteres maximo"
        );
      } else if (!patron_precio.test(precio) || parseFloat(precio) < 99.99) {
        validado = false;
        alert("Ingresa precio con dos números decimales positivos mayor a 99.99");
      } else if (!patron_detalles.test(detalles) || detalles.lenght > 250) {
        validado = false;
        alert(
          "Verifique que los detalles sean descritos con letras y números y sea menor a 250 caracteres"
        );
      } else if (!patron_unidades.test(unidades)) {
        validado = false;
        alert("El campo unidades tiene que usar números positivos");
      } else if (!patron_img.test(img)) {
        validado = false;
        alert("Ingrese una ruta de imagen valida");
      }

      return validado;
    }
  </script>

</body>

</html>