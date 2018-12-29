<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/ajax.js"></script>
<script src="js/ventas.js"></script>

<div id="clientData">

</div>

<input type="text" id="item_id" onkeyup="setClientData(this, 'parent')">
<button id="reloader">Reload</button>

<script type="text/javascript">

  $('#reloader').click(function(){

    // var item_id = $('#item_id').val();
    //
    // $.ajax({
    //   url:'include/load_client.php',
    //   data: {idOrName: item_id},
    //   success: function(data){
    //     console.log(data);
    //     $('#clientData').html(data);
    //   }
    // });
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
    var today = dd + '/' + mm + '/' + yyyy;
    alert(today);

  });

</script>
