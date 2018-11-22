<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['username']);
unset($_SESSION['pass']);
unset($_SESSION['admin']);

?>
<script>
  alert("     Se ha cerrado la sesión. Gracias por usar Elephant ® \n\t     Volviendo a la pantalla de inicio...")
</script>

<script>
  window.location.replace('../index.php');  // redireccionar a otra pagina.
</script>
