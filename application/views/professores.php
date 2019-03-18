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
      <h1>Professores</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header">
          <a href="#">
            <button id="novo" class="btn btn-success btn-modal" data-toggle="modal" data-target="#form"><span class="fa fa-plus"></span> Novo</button>
          </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="table" class="table table-bordered table-hover">
            <thead>
              <th>ID</th>
              <th>Nome</th>
              <th>Data de Nascimento</th>
              <th>Criado em</th>
              <th></th>
            </thead>
            <tbody>
              <?php
                foreach ($consulta->result() as $row)
                {
                  echo "
                        <td>".$row->id_professor."</td>
                        <td>".$row->nome."</td>
                        <td>".date_format(date_create($row->data_nascimento),"d/m/Y")."</td>
                        <td>".date_format(date_create($row->data_criacao),"d/m/Y")."</td>
                        <td style='text-align: center'>
                          <button id='editar".$row->id_professor."' class='btn btn-primary btn-modal' data-toggle='modal' data-target='#form'><span class='fa fa-edit'></span> Editar</button>
                        </td>
                  ";
                }
              ?>
            </tbody>
          </table>
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

<!-- Modal -->
<div id="form" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form id="form" action="professor/salvar">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" id="nome">
        </div>
        <div class="form-group">
          <label for="data_nascimento">Data de Nascimento:</label>
          <input type="date" class="form-control" id="data_nascimento">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Salvar</button>
      </div>
    </div>
    </form>
  </div>
</div>

<?php
  include("estrutura/js.php")
?>

<script src="application/views/js/my.js"></script>

<script type="text/javascript">
  $("#professor").addClass("active");
</script>

</body>
</html>
