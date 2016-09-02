<?php
include 'include/header.php';
?>



<div class="container">
  <div class="row">
    <?php
      if (isset($_GET['tab'])) {
        if (file_exists("tabs/".$_GET['tab'].".php")) {
          include "tabs/".$_GET['tab'].".php";
        }else{
          include "tabs/error.php";
        }
      }else{
          include "tabs/mis-datos.php";
      }
     ?>
  </div>
</div>






















  <!--SCRIPTS-->
  <script src="../js/jquery-2.2.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/myJs.js"></script>
  </body>

</html>
