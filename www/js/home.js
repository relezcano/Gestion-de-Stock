//Actualiza las alertas cada 1 minuto:

//En las alertas de Productos, te avisa los productos en stock que esten en escaces, segun el margen que se dio de alerta (cant_Rep), siempre y cuando su estado sea Activo (A). Los productos que esten de Baja (B) no figuraran.
setInterval(function(){
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

  $.ajax({
    url: '../include/alert_prd.php',
    success: function(data){
      $(document).find("div[id='DashboardProd']").html(data);
    }
  });
}, 5000);

//En cuanto a las alertas de Proveedores te avisa las fechas en las que estan por venir los proveedores y te permite acer click para sacar un listado de los productos a pedir. Tambien te avisa cuando volvera el proveedor con el pedido que se le hizo y el monto que se le debera pagar.
setInterval(function(){
  var d = new Date();
  var dd = d.getDate();
  var mm = d.getMonth()+1; //January is 0!
  var yyyy = d.getFullYear();
  if(mm<10) {
      mm = '0'+mm;
  }

  var yearMonth = yyyy+"-"+mm;
  var day = dd;

  $.ajax({
    url: '../include/alert_prov.php',
    data: {yearMonth: yearMonth,
          day: day},
    success: function(data){
      $(document).find("div[id='DashboardProv']").html(data);
    }
  });
}, 5000);

//Si el proveedor no llego en fecha, el usuario puede hacer click en el aviso y modificar la fecha de llegada del proveedor. Se abre una ventana popup para modificar el anticipo.
function popUpModAnt(w) {

  var id_Ant = $(w).find("input[name='id_Ant']").val();

  window.open('../abm/pedidos.php?idAnt='+id_Ant);

}

//Al hacer click en el boton del menu de usuario se amplia el menu desde el costado.
function navBar(){
  var estadoNav = $(document).find("input[name='estadoNavBar']").val();
  if (estadoNav == 'close') {
    document.getElementById("mySidenav").style.width = "335px";
    $(document).find("input[name='estadoNavBar']").val("open");
  } else {
      document.getElementById("mySidenav").style.width = "0";
      $(document).find("input[name='estadoNavBar']").val("close");
    }
  }

//Conjunto de funciones para deshabilitar el boton derecho.
// var isNS = (navigator.appName == "Netscape") ? 1 : 0;
//
// if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
//
// function mischandler(){
// return false;
// }
//
// function mousehandler(e){
// var myevent = (isNS) ? e : event;
// var eventbutton = (isNS) ? myevent.which : myevent.button;
// if((eventbutton==2)||(eventbutton==3)) return false;
// }
// document.oncontextmenu = mischandler;
// document.onmousedown = mousehandler;
// document.onmouseup = mousehandler;
