//Variable para llevar el numero de item que se cargo a la venta
var num_item = 1;


//Funcion de filtro para el buscador de productos---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
$(document).ready(function(){

  $("#myInput").on("keyup", function() {
    if (event.keyCode == 13){

      loadProd();

      var value = $(this).val().toLowerCase();

      $("#myTable tr").filter(function() {

        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

      });
    }
  });
});

//Agrega una nueva fila a la tabla al hacer un click en el boton de agregar----------------------------------------------------------------------------------------------------------------------------------------------------------
function addProd(){
  num_item++;

  $("#myTable").append('<tr id="tr'+num_item+'"><td style="width: 70px" id="numOfRow">'+num_item+'</td><td style="width: 300px"> <input type="hidden" name="id_product'+num_item+'" value="" id="'+num_item+'"> <span id="Prod_name" onclick="popUpWin(this);" >Seleccionar producto</span> </td><td>$-</td><td style="width: 100px"> <input type="text" name="cant_product" id="invis_input_cant" onkeyup="setTotalPrice(this);"> </td><td>$<span id="total_price">-</span></td><td style="width: 50px"><button type="button" name="deleteRow" class="btn btn-danger" style="border-radius: 5px; width: 40px; height: 20px"><span class="glyphicon glyphicon-minus" style="float: inherit" onclick="deleteProd(this);"></span></button></td>');

}

//Abre la ventana pop up para la seleccion del producto-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function popUpWin(w){

  var item_follow = $(w).prev().attr('name');
  var trNum = $(w).closest('tr').attr('id');
  var n_item = $(w).prev().attr('id');
  window.open("select_Prod.php/?toSelect='"+item_follow+"'&trRow="+trNum+"&nItem="+n_item+"&solicitante='ventas'", 'Seleccion de productos');

}

//Elimina el item al cual se le hizo click, resta 1 al numero de item-----------------------------------------------------------------------------------------------
function deleteProd(r){

  var i = $(r).closest("tr").index();
  var numRows = document.getElementById("myTable").rows.length;
  var totalSum = 0;

  for(var   j = i; j < numRows-1; j++){
    $(document.getElementById("myTable").rows[j+1]).find("td[id='numOfRow']").html(j+1);
    $(document.getElementById("myTable").rows[j+1]).attr('id', 'tr'+(j+1));
    $(document.getElementById("myTable").rows[j+1]).find("input[name='id_product"+(j+2)+"']").attr('id', (j+1));
    $(document.getElementById("myTable").rows[j+1]).find("input[id='"+(j+1)+"']").attr('name', 'id_product'+(j+1));
  }
  num_item = num_item - 1;
  document.getElementById("myTable").deleteRow(i);

  $(document).find("span[id='total_price']").each(function(){
    var actTotal = $(this).text();
    if (actTotal != "-"){
       totalSum = parseFloat(totalSum) + parseFloat(actTotal);
    }
  });
  $(document).find("span[id='total_price_venta']").text(totalSum);

}

//Calcula el precio total por producto segun el precio y la cantidad al precionar enter-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function setTotalPrice(w, e){
  var e = (e) ? e : ((event) ? event : null);

  if(e.keyCode == 13){
    var cant = $(w).val();
    var price = $(w).closest("tr").find("span[id='itemPrice']").text();
    var totalSum = 0;
    if (price == "-" || cant == ""){
      $(w).closest("tr").find("span[id='total_price']").text(0);
    }else{
      $(w).closest("tr").find("span[id='total_price']").text(price*cant);
    }

    $(document).find("span[id='total_price']").each(function(){
      var actTotal = $(this).text();
      if (actTotal != "-"){
         totalSum = parseFloat(totalSum) + parseFloat(actTotal);
      }
    });
    $(document).find("span[id='total_price_venta']").text(totalSum);

  }

};

//Se calcula el vuelto que se le deberia entregar al cliente.-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function calcVuelto(e){
  var e = (e) ? e : ((event) ? event : null);

  if(e.keyCode == 13){

    var montoTotal = $(document).find("span[id='total_price_venta']").text();
    var montoPago = $(document).find("input[name='Pago']").val();
    var vuelto = montoPago-montoTotal;
    $(document).find("span[id='price_vuelto']").text(vuelto);

  }

}

//Toma el id del item seleccionado en el POP UP modifica la tabla con los datos del item seleccionado en la ventana padre--------------------------------------------------------------------------------------------------------------------------
function setProductVentas(w){

  var selected_item   = $(w).find("input[name='sel_item_id']").val();
  var item_to_change  = $(document).find("input[name='change_this']").val();
  var tableRow        = $(document).find("input[name='tableRow']").val();
  var n_item          = $(document).find("input[name='n_item']").val();

  $.ajax({
    url: '../include/load_prd.php',
    data: {idprod: selected_item,
      nItem: n_item},
      success: function(data){
        $(window.opener.document).find("tr[id="+tableRow+"]").html(data);
        window.close();
      }

  });

}

//Muestra los datos mas relevantes del cliente si es que se puso el ID del cliente en el formulario (Nombre, Apellido, Monto de deudas relacionadas al cliente)--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function setClientDataParent(w, e){
  var e = (e) ? e : ((event) ? event : null);
  if (e.keyCode == 13){
    var id_or_name = $(w).val();
    if (id_or_name != ""){

      $.ajax({
        url: '../include/load_client.php',
        data: {idOrName: id_or_name},
          success: function(data){
            $(document).find("div[id='clientData']").html(data);
          }
      });
    }
  }

}

//Muestra los datos mas relevantes del cliente si es que es seleccionado desde la Pop Up windows (Nombre, Apellido, Monto de deudas relacionadas al cliente)--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function setClientDataPopUp(w){

  var id_C = $(w).find("input[name='sel_item_id']").val();
  console.log(id_C);

  $.ajax({
    url: '../include/load_client.php',
    data: {idOrName: id_C},
      success: function(data){
        $(window.opener.document).find("div[id='clientData']").html(data);
        window.close()
      }
  });

}

//Al cerrar la venta se cargan los datos pertinentes a las tablas------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function endSellProcess(action){

  if(action == 'load'){
    var d = new Date();
    var dd = d.getDate();
    var mm = d.getMonth()+1; //January is 0!
    var yyyy = d.getFullYear();
    if(dd<10) {
        dd = '0'+dd;
    }
    if(mm<10) {
        mm = '0'+mm;
    }

    // var id_V        = $(document).find("input[name='id_Venta']").val();
    var date_V      = dd + '/' + mm + '/' + yyyy;
    var price_Total = $(document).find("span[id='total_price_venta']").text();
    var price_Pago  = $(document).find("input[name='Pago']").val();
    var obs_V       = $(document).find("textarea[name='obs_V']").val();
    var id_C        = $(document).find("input[name='id_C']").val();
    var vuelto      = $('#devolver:checked').val();
    var sobrante    = $(document).find("span[id='price_vuelto']").text();

    var id_Prod     = [];
    var cant        = [];
    var numRows     = document.getElementById("myTable").rows.length;

    for(i=0; i<numRows; i++){
      var id_Prod_act = $(document.getElementById("myTable").rows[i]).find("input[name='id_prod']").val();
      var cant_act    = $(document.getElementById("myTable").rows[i]).find("input[name='cant_product']").val();

      id_Prod.push(id_Prod_act);
      cant.push(cant_act);
    }

    $.ajax({
      url: '../include/cargar_venta.php',
      data:{dateV: date_V,
            priceTot: price_Total,
            pricePago: price_Pago,
            obsV: obs_V,
            idC: id_C,
            vuelto: vuelto,
            sobrante: sobrante,
            prods: id_Prod,
            cants: cant},
      success: function(data){
        console.log(data);
        if(data == '100'){
          alert("\tSe ha cargado exitosamente la deuda.\t");
          window.close();
        } else if (data == '101') {
          alert("\tSe ha producido un error en la carga de datos, por favor vuelva a intentar.\t");
        }
      }
    });

  } else if (action == 'cancel') {

    alert("\tSe a cancelado la venta. Volvera al menu principal.\t");
    window.close();
  }

}
