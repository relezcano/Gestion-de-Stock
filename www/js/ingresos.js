//Variable para llevar el numero de item que se cargo a la venta
var num_item = 1;

//Agrega una nueva fila a la tabla al hacer un click en el boton de agregar----------------------------------------------------------------------------------------------------------------------------------------------------------
function addProd(){
  num_item++;

  $("#myTable").append('<tr id="tr'+num_item+'"><td style="width: 70px" id="numOfRow">'+num_item+'</td><td style="width: 250px"><input type="hidden" name="id_product'+num_item+'" value="" id="'+num_item+'"><span id="Prod_name" onclick="popUpWin(this);">Seleccionar producto</span></td><td><span>$-</span></td><td style="width: 100px">-</td><td style="width: 100px">-</td><td></td><td style="width: 50px"><button type="button" name="deleteRow" class="btn btn-danger" style="border-radius: 5px; width: 40px; height: 20px"><span class="glyphicon glyphicon-minus" style="float: inherit" onclick="deleteProd(this);"></span></button></td><input type="hidden" name="id_prod" value="none"></tr>');

}

//Abre la ventana pop up para la seleccion del producto-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function popUpWin(w){

  var item_follow = $(w).prev().attr('name');
  var trNum = $(w).closest('tr').attr('id');
  var n_item = $(w).prev().attr('id');
  window.open("select_Prod.php/?toSelect='"+item_follow+"'&trRow="+trNum+"&nItem="+n_item+"&solicitante='ingresos'", 'Seleccion de productos');

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

//Toma el id del item seleccionado en el POP UP modifica la tabla con los datos del item seleccionado en la ventana padre--------------------------------------------------------------------------------------------------------------------------
function setProductIngresos(w){

  var selected_item   = $(w).find("input[name='sel_item_id']").val();
  var item_to_change  = $(document).find("input[name='change_this']").val();
  var tableRow        = $(document).find("input[name='tableRow']").val();
  var n_item          = $(document).find("input[name='n_item']").val();
  var solicitante     = $(document).find("input[name='solicitante']").val();

  $.ajax({
    url: '../include/load_prd.php',
    data: {idprod: selected_item,
      nItem: n_item,
      solicitante: solicitante},
      success: function(data){
        $(window.opener.document).find("tr[id="+tableRow+"]").html(data);
        window.close();
      }

  });

}

//Muestra los datos mas relevantes del Proveedor si es que se puso el ID del cliente en el formulario (Nombre, Concurrencia)--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function setProvDataParent(w, e){
  var e = (e) ? e : ((event) ? event : null);

  if (e.keyCode == 13){
    var id_Prov = $(w).val();
    if (id_Prov != ""){

      $.ajax({
        url: '../include/load_prov.php',
        data: {id: id_Prov},
          success: function(data){
            if(data == 404){
              alert("\tDebe ingresar un id de proveedor existente.\t");
              $(document).find("div[id='provData']").html("");
              $(w).val("");
            }else{
              $(w).val("");
              $(document).find("div[id='provData']").html(data);
            }
          }
      });
    } else {
      alert("\tDebe ingresar un id de proveedor existente.\t");
    }
  }

}

//Muestra los datos mas relevantes del Proveedor si es que es seleccionado desde la Pop Up windows (Nombre, Concurencia)--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function setProvDataPopUp(w){

  var id_Prov = $(w).find("input[name='sel_prov_id']").val();

  $.ajax({
    url: '../include/load_prov.php',
    data: {id: id_Prov},
      success: function(data){
        $(window.opener.document).find("div[id='provData']").html(data);
        window.close()
      }
  });

}

//Funcion para cargar los datos del pedido relacionado al ingreso de mercaderia (Si es que existe) desde una ventana PoPUp.
function setAntPopUp(w){

  var id_Ant = $(w).find("input[name='sel_ant_id']").val();

  $.ajax({
    url:'../include/load_ant.php',
    data: {id: id_Ant},
    success: function(data){
      $(window.opener.document).find("div[id='antData']").html(data);
      window.close();
    }
  });

  //FALTA AGREGAR QUE SOLO MUESTRE EN EL LISTADO A LOS PEDIDOS DEL PROVEEDOR SELECCIONADO PREVIAMENTE.

}

//Funcion para cargar los datos del pedido relacionado al ingreso de mercaderia (Si es que existe) desde el formulario.
function setAntDataParent(w, e){
  var e = (e) ? e : ((event) ? event : null);

  if (e.keyCode == 13){
    var id_Ant  = $(w).val();
    var id_Prov = $(document).find("input[name='id_Prov']").val();
    if (id_Ant != ""){

      $.ajax({
        url: '../include/load_ant.php',
        data: {id: id_Ant,
              idProv: id_Prov},
        success: function(data){
          if(data == 101){
            alert("\tDebe ingresar un id de pedido existente.\t");
            $(document).find("div[id='antData']").html(" ");
            $(w).val(" ")
          }else if (data == 102) {
            alert("\tEl pedido seleccionado no corresponde con el proveedor.\t");
          }else{
            $(document).find("div[id='antData']").html(data);
          }
        }
      });
    } else {
      alert("\tDebe ingresar un id de proveedor existente!!!\t");
    }
  }

}

//Una vez se termina con el formulario el usuario puede cancelar el proceso, lo que cerraria la ventana sin realizar movimeinos en la base de datos, o cargar los lotes a la base de datos----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function endLote(action){

  //Si la accion es de cargar los lotes, se procede a cargarlos.
  if(action == 'load'){
    //Lineas de codigo para extraer la fecha actual.
    var d = new Date();
    var dd = d.getDate();
    var mm = d.getMonth()+1; //Enero es 0
    var yyyy = d.getFullYear();
    if(dd<10) {
        dd = '0'+dd;
    }
    if(mm<10) {
        mm = '0'+mm;
    }

    //Se extraen del formulario los datos pertinentes que seran iguales en todos los lotes.
    var date_Alt      = yyyy+'-'+mm+'-'+dd;
    var n_Comp        = $(document).find("input[name='n_Comp']").val();
    var obs_L         = $(document).find("textarea[name='obs_L']").val();
    var id_Prov1      = $(document).find("input[name='id_Prov']").val();
    var numRows       = document.getElementById("myTable").rows.length;
    var id_Ant        = $(document).find("input[name='id_Ant']").val();

    //Se hace una variable para almacenar la query que se ejecutara.
    var query         = "INSERT INTO Lote (cant, price_C, date_Alt, date_Ven, n_Comp, obs_L, id_Prod1, id_Prov1) VALUES ";

    //Se hace una iteracion por cada fila de la tabla para extraer los datos especificos de cada lote.
    for(var   i = 0; i < numRows; i++){
      var cant        = $(document.getElementById("myTable").rows[i]).find("input[name='cant_product']").val();
      var price_C     = $(document.getElementById("myTable").rows[i]).find("input[name='price_C_prod']").val();
      var date_Ven    = $(document.getElementById("myTable").rows[i]).find("input[name='date_Ven_prod']").val();
      var id_Prod1    = $(document.getElementById("myTable").rows[i]).find("input[name='id_prod']").val();

      //Se agregan los datos de cada lote que se quiere cargar a la query
      if((cant != "" && price_C != "" && date_Ven != "") && (cant != undefined && price_C != undefined && date_Ven != undefined)){

          query = query + "('"+cant+"', '"+price_C+"', '"+date_Alt+"', '"+date_Ven+"', '"+n_Comp+"', '"+obs_L+"', '"+id_Prod1+"', '"+id_Prov1+"')";

          //Si aun faltan datos por cargar, se agrega una coma y un espacio, caso contrario se agrega un ";".
          if (i != numRows-1){
            query = query + ", ";
          } else {
            query = query + ";";
          }

      }else{
        alert("\tFalta completar datos de los productos!\t");
        break;
      }
    }

    if(n_Comp != "" && (id_Prov1 != null || id_Prov1 != "") && numRows != 0){
      var loadConf = confirm("\t¿Esta seguro que desea ingresar los productos?\t");
      if(loadConf == true){
        $.ajax({
          url: '../include/change_ant.php',
          data: {idAnt: id_Ant}
        });

        //Ejecucion de ajax para enviar la query al archivo que la ejecuta cargando asi los datos en la DB.
        $.ajax({
          url: '../include/cargar_lote.php',
          data: {query: query},
          success: function(data){
            if(data == '100'){
              alert("\tSe ha cargado la mercaderia exitosamente\t");

              //Se pregunta al usuario si desea imprimir las etiquetas para colocar en las cajas de los lotes.
              var printLabel = confirm("\t¿Desea imprimir las etiquetas para los lotes?\t");
              if(printLabel == true){

                var bultos = [];

                for (var   j = 0; j < numRows; j++){

                  var actBulto = $(document.getElementById("myTable").rows[j]).find("input[name='cant_bultos']").val();
                  bultos.push(actBulto);

                }
                $.ajax({
                  url: "../include/label_lotes.php",
                  data: {nComp: n_Comp,
                        bultos: bultos},
                  success: function(data){
                    labels = window.open('../include/labels.php/?data='+data)
                    labels.print();
                    window.close();
                  }
                });
              }else {
                window.close();
              }
            } else if (data == '101') {
              alert("\tSe ha generado un error en la carga, intente nuevamente\t");
            }
          }
        });
      }
    } else {
      alert("\tDebe completar los datos generales para continuar\t");
    }
    //Si la accion que se desea realizar es cancelar la carga, simplemente se muestra una alerta de que se cerrara la ventana.
  } else if (action == 'cancel') {
    var cancelConf = confirm("\t¿Esta seguro que desea cancelar el ingreso?\t");
    if(cancelConf == true){
      window.close();
    }
  }

}
