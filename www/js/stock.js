function showLote(param){
  var prod = $(param).find("input[name='idProd']").val();

  window.open("show_lotes.php/?id_prod=" + prod);
}
