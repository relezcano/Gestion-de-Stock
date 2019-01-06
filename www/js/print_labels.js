function setComp(e){
  var e = (e) ? e : ((event) ? event : null);

    if(e.keyCode == 13){
      var input_Comp  = $(document).find("input[name='input_Comp']").val();

      n_Comp      = $(document).find("input[name='n_Comp']").val(input_Comp);

  }
}

function endPrintLabel(action){

  if (action == "print") {

    var n_Comp = $(document).find("input[name='n_Comp']").val();

    $.ajax({
      url: "../include/label_lotes.php",
      data: {nComp: n_Comp},
      success: function(data){
        labels = window.open('../include/labels.php/?data='+data)
        labels.print();
        window.close();
      }
    });

  }else if (action == 'cancel') {
    var cancelConf = confirm("\t¿Esta seguro que desea cancelar la impresión de etiquetas?\t");
    if(cancelConf == true){
      window.close();
    }
  }

}
