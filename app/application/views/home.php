<!DOCTYPE html>
<html>
<head>
  <?php
    include("estrutura/head.php");
  ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <?php
      include("estrutura/header.php");
    ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <?php
      include("estrutura/menu.php");
    ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="jumbotron">
          <h1>Bem vindo ao Sistema Acadêmico</h1>
          <p>Através do menu lateral você pode navegar pelo sistema.</p>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php
      include("estrutura/footer.php");
    ?>
  </footer>

</div>
<!-- ./wrapper -->

<?php
  include("estrutura/js.php")
?>
</body>
</html>
