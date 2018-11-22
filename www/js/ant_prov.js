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
              alert("\tDebe ingresar un id de proveedor existente!!!\t");
            }else{
              $(document).find("div[id='provData']").html(data);
            }
          }
      });
    } else {
      alert("\tDebe ingresar un id de proveedor existente!!!\t");
    }
  }

}

//Muestra los datos mas relevantes del Proveedor si es que es seleccionado desde la Pop Up windows (Nombre, Concurencia)--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function setProvDataPopUp(w){

  var id_Prov = $(w).find("input[name='sel_item_id']").val();

  $.ajax({
    url: '../include/load_prov.php',
    data: {id: id_Prov},
      success: function(data){
        $(window.opener.document).find("div[id='provData']").html(data);
        window.close()
      }
  });

}

function endAnt(action) {

  if(action == 'load'){

    var monto     = $(document).find("input[name='monto']").val();
    var date_Ped  = $(document).find("input[name='date_Ped']").val();
    var date_Lleg = $(document).find("input[name='date_Lleg']").val();
    var obs_Ant   = $(document).find("textarea[name='obs_Ant']").val();
    var id_Prov2  = $(document).find("input[name='id_Prov']").val();

    if((id_Prov2 !="" && monto !="" && date_Ped != "" && date_Lleg != "") || (id_Prov2 !=undefined && monto !=undefined && date_Ped != undefined && date_Lleg != undefined)){
      var loadConfir = confirm("\t¿Esta seguro que desea cargar el pedido?\t");
      if(loadConfir == true){
        $.ajax({
          url: '../include/cargar_ant.php',
          data:{monto: monto,
                datePed: date_Ped,
                dateLleg: date_Lleg,
                obsAnt: obs_Ant,
                idProv: id_Prov2},
          success: function(data){
            if(data =='100'){
              alert("\tSe ha cargado el pedido exitosamente!\t");
              window.close()
            }else if (data == '101') {
              alert("\tDebe completar todos los campos necesarios.\t");
            } else {
              alert("\tSe a producido un error inesperado: "+data+".")
            }
          }
        });
      }
    }else{
      alert("\tDebe completar todos los campos necesarios.\t");
    }

  } else if (action == 'cancel') {
    var confCancel = confirm('\t¿Esta seguro que desea cancelar el pedido?\t');
    if (confCancel == true) {
      window.close();
    }
  }
}
