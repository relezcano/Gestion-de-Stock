//Funcion para abrir popup windows por unica vez, cuando se vuelve a clickear el link, se hace focus en la ventana ya abierta.

//   function popitup(url) {
//   var newwindow = window.open(url,'Ingresos');
//   if (window.focus) {newwindow.focus()}
//
//     if (!newwindow.closed) {newwindow.focus()}
//   return false;
// }

  function windowOpener(url, name, namepopup) {

  if(typeof(namepopup) != "object" || namepopup.closed)  {
      namepopup =  window.open(url, name);
  }
  else{
      namepopup.location.href = url;
  }

  namepopup.focus();
  }
