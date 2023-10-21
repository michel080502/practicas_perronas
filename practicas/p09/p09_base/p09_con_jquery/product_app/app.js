// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
  precio: 0.0,
  unidades: 1,
  modelo: "XX-000",
  marca: "NA",
  detalles: "NA",
  imagen: "img/default.png",
};

function init() {
  /**
   * Convierte el JSON a string para poder mostrarlo
   * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
   */
  var JsonString = JSON.stringify(baseJSON, null, 2);
  document.getElementById("description").value = JsonString;
  // SE LISTAN TODOS LOS PRODUCTOS
}

$(document).ready(function () {
  let editar = false;
  listarProductos();
  $("#search").keyup(function (e) {
    if ($("#search").val()) {
      let search = $("#search").val();
      console.log(search);
      $.ajax({
        type: "GET",
        url: "http://localhost:3000/p09/p09_base/p09_con_jquery/product_app/backend/product-search.php",
        data: { search },
        success: function (response) {
          console.log(response);
          let productos = JSON.parse(response);
          let template = "";
          let template_bar = "";

          if (Object.keys(productos).length > 0) {
            productos.forEach((element) => {
              let descripcion = "";
              descripcion += "<li>precio: " + element.precio + "</li>";
              descripcion += "<li>unidades: " + element.unidades + "</li>";
              descripcion += "<li>modelo: " + element.modelo + "</li>";
              descripcion += "<li>marca: " + element.marca + "</li>";
              descripcion += "<li>detalles: " + element.detalles + "</li>";

              template += `
                <tr productId="${element.id}">
                    <td>${element.id}</td>
                    <td>${element.nombre}</td>
                    <td><ul>${descripcion}</ul></td>
                    <td>
                        <button class="product-delete btn btn-danger">
                            Eliminar
                        </button>
                    </td>
                </tr>
                 `;
              template_bar += `
                <li>${productos.nombre}</il>
                `;
            });
            $("#products").html(template);
          }
        },
      });
    }
  });

  $("#product-form").submit(function (e) {
    var descripcion_producto = $("#description").val();
    var productoJSON = JSON.parse(descripcion_producto);
    productoJSON["nombre"] = $("#name").val();
    productoJSON["id"] = $("#productId").val()
    var JsonString = JSON.stringify(productoJSON, null, 2);
    let url =
      editar == false
        ? "http://localhost:3000/p09/p09_base/p09_con_jquery/product_app/backend/product-add.php"
        : "http://localhost:3000/p09/p09_base/p09_con_jquery/product_app/backend/product-edit.php";

    $.post(
      url,
      JsonString,
      function (response) {
        listarProductos();
        let respuesta = JSON.parse(response);
        let template_bar = "";
        template_bar += `
                        <li style="list-style: none;">status: ${respuesta.status}</li>
                        <li style="list-style: none;">message: ${respuesta.message}</li>
                    `;
        $("#product-result").attr("class", "card my-4 d-block");
        $("#container").html(template_bar);
      }
    );
    e.preventDefault();
  });

  function listarProductos() {
    $.ajax({
      type: "GET",
      url: "http://localhost:3000/p09/p09_base/p09_con_jquery/product_app/backend/product-list.php",
      success: function (response) {
        let productos = JSON.parse(response);
        console.log(productos);
        if (Object.keys(productos).length > 0) {
          let template = "";
          productos.forEach((element) => {
            let descripcion = "";
            descripcion += "<li>precio: " + element.precio + "</li>";
            descripcion += "<li>unidades: " + element.unidades + "</li>";
            descripcion += "<li>modelo: " + element.modelo + "</li>";
            descripcion += "<li>marca: " + element.marca + "</li>";
            descripcion += "<li>detalles: " + element.detalles + "</li>";

            template += `
                        <tr productId="${element.id}">
                            <td>${element.id}</td>
                            <td><a href="#" class="product-item">${element.nombre}</a></td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
          });
          $("#products").html(template);
        }
      },
    });
  }

  $(document).on("click", ".product-delete", function () {
    if (confirm("Estas seguro de querer eliminarlo?")) {
      let element = $(this)[0].parentElement.parentElement;
      let id = $(element).attr("productId");
      $.ajax({
        type: "GET",
        url: "http://localhost:3000/p09/p09_base/p09_con_jquery/product_app/backend/product-delete.php",
        data: { id },
        success: function (response) {
          listarProductos();
          let respuesta = JSON.parse(response);
          let template_bar = "";
          template_bar += `
                            <li style="list-style: none;">status: ${respuesta.status}</li>
                            <li style="list-style: none;">message: ${respuesta.message}</li>
                        `;
          $("#product-result").attr("class", "card my-4 d-block");
          $("#container").html(template_bar);
        },
      });
    }
  });

  $(document).on("click", ".product-item", function () {
    console.log("Editando");
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr("productId");
    $.get(
      "http://localhost:3000/p09/p09_base/p09_con_jquery/product_app/backend/product-single.php",
      { id },
      function (response) {
        let datos = JSON.parse(response);
        console.log(datos);
        $("#name").val(datos.nombre);
        let editJSON = {
          precio: datos.precio,
          unidades: datos.unidades,
          modelo: datos.modelo,
          marca: datos.marca,
          detalles: datos.detalles,
          imagen: datos.imagen,
        };
        $("#description").val(JSON.stringify(editJSON, null, 2));
        $("#productId").val(datos.id);
        editar = true;
      }
    );
  });
});
