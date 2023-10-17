// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
  precio: 0.0,
  unidades: 1,
  modelo: "XX-000",
  marca: "NA",
  detalles: "NA",
  imagen: "img/default.png",
};

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
  /**
   * Revisar la siguiente información para entender porqué usar event.preventDefault();
   * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
   * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
   */
  e.preventDefault();

  // SE OBTIENE EL ID A BUSCAR
  var id = document.getElementById("search").value;

  // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
  var client = getXMLHttpRequest();
  client.open("POST", "./backend/read.php", true);
  client.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  client.onreadystatechange = function () {
    // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
    if (client.readyState == 4 && client.status == 200) {
      console.log("[CLIENTE]\n" + client.responseText);
      // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
      let productos = JSON.parse(client.responseText); // similar a eval('('+client.responseText+')');

      // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
      if (Object.keys(productos).length > 0) {
        //SE CREA UNA LISTA GENERAL QUE ENLISTA TODOS LOS PRODUCTOS DE LA CONSULTA
        let templates = "";

        //SE RECORRE EL ARREGLO DE RESPUESTA DEL SERVIDOR
        productos.forEach((element) => {
          // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
          let descripcion = "";
          descripcion += "<li>precio: " + element.precio + "</li>";
          descripcion += "<li>unidades: " + element.unidades + "</li>";
          descripcion += "<li>modelo: " + element.modelo + "</li>";
          descripcion += "<li>marca: " + element.marca + "</li>";
          descripcion += "<li>detalles: " + element.detalles + "</li>";

          // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
          let template = "";
          template += `
                    <tr>
                        <td>${element.id}</td>
                        <td>${element.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                    </tr>
                `;
          //SE AGREGA EL TEMPLATE CREADO DE UN PRODUCTO AL ARREGLO DE LOS DEMAS PRODUCTOS
          templates += template;
        });
        // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
        document.getElementById("productos").innerHTML = templates;
      }
    }
  };
  client.send("id=" + id);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
  e.preventDefault();

  // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
  var productoJsonString = document.getElementById("description").value;
  // SE CONVIERTE EL JSON DE STRING A OBJETO
  var finalJSON = JSON.parse(productoJsonString);
  // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
  finalJSON["nombre"] = document.getElementById("name").value;
  //VALIDA LOS CAMPOS DEL JSON;
  if (validar(finalJSON)) {
    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON, null, 2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open("POST", "./backend/create.php", true);
    client.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
      // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
      if (client.readyState == 4 && client.status == 200) {
        console.log("[RESPUESTA DE SERVIDOR]\n" + client.responseText);
        let respuesta = JSON.parse(client.responseText);
        alert(respuesta.mensaje);
      }
    };
    client.send(productoJsonString);
  }
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
  var objetoAjax;

  try {
    objetoAjax = new XMLHttpRequest();
  } catch (err1) {
    /**
     * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
     *       pero se comparten por motivos historico-académicos.
     */
    try {
      // IE7 y IE8
      objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (err2) {
      try {
        // IE5 y IE6
        objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (err3) {
        objetoAjax = false;
      }
    }
  }
  return objetoAjax;
}

function init() {
  /**
   * Convierte el JSON a string para poder mostrarlo
   * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
   */
  var JsonString = JSON.stringify(baseJSON, null, 2);
  document.getElementById("description").value = JsonString;
}

function validar(finalJSON) {
  var nombre = finalJSON.nombre;
  var marca = finalJSON.marca;
  var modelo = finalJSON.modelo;
  var precio = finalJSON.precio;
  var detalles = finalJSON.detalles;
  var unidades = finalJSON.unidades;
  var img = finalJSON.imagen;

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
  } else if (marca == 0) {
    validado = false;
    alert("Escribe una marca");
  } else if (!patron_modelo.test(modelo) || modelo.lenght > 25 || modelo == 0) {
    validado = false;
    alert("Escribe un modelo con letras y números y de 25 caracteres maximo");
  } else if (!patron_precio.test(precio) || parseFloat(precio) < 99.99) {
    validado = false;
    alert("Ingresa precio con dos números decimales positivos mayor a 99.99");
  } else if (!patron_detalles.test(detalles) || detalles.lenght > 250) {
    validado = false;
    alert(
      "Verifique que los detalles sean descritos con letras y números y sea menor a 250 caracteres"
    );
  } else if (!patron_unidades.test(unidades) || precio < 0) {
    validado = false;
    alert("El campo unidades tiene que usar números positivos");
  } else if (!patron_img.test(img)) {
    validado = false;
    alert("Ingrese una ruta de imagen valida");
  }

  return validado;
}
