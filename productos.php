<?php
  include 'include/header.php';
?>


<?php

    if (isset($_GET['tipo'])) {
      if (file_exists('productos/'.$_GET['tipo'].'.php')) {
        include 'productos/'.$_GET['tipo'].'.php';
      }else{
        include 'productos/error.php';
      }
    }else {
      include 'productos/menu.php';
    }

 ?>

<?php
  include 'include/footer.php';
?>
