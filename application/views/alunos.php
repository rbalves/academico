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
      <h1>Alunos</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header">
          <a href="#">
            <button id="novo" class="btn btn-success btn-modal" data-toggle="modal" data-target="#form"><span class="fa fa-plus"></span> Novo</button>
          </a>
          <a href="#">
            <button id="relatorio" class="btn btn-info"><span class="fa fa-file"></span> Relatório</button>
          </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="table" class="table table-bordered table-hover">
            <thead>
              <th>ID</th>
              <th>Nome</th>
              <th>Data de Nascimento</th>
              <th>CEP</th>
              <th>Logradouro</th>
              <th>Número</th>
              <th>Bairro</th>
              <th>Cidade</th>
              <th>Estado</th>
              <th>Curso</th>
              <th>Criado em</th>
              <th></th>
              <th></th>
            </thead>
            <tbody>
              <?php
                foreach ($consulta->result() as $row)
                {
                  echo "

                        <td>".$row->id_aluno."</td>
                        <td>".$row->nome."</td>
                        <td>".date_format(date_create($row->data_nascimento),"d/m/Y")."</td>
                        <td>".$row->cep."</td>
                        <td>".$row->logradouro."</td>
                        <td>".$row->numero."</td>
                        <td>".$row->bairro."</td>
                        <td>".$row->cidade."</td>
                        <td>".$row->estado."</td>
                        <td>".$row->id_curso."</td>
                        <td>".date_format(date_create($row->data_criacao),"d/m/Y")."</td>
                        <td style='text-align: center'>
                          <button id='editar' class='btn btn-primary btn-modal' data-toggle='modal' data-target='#form'><span class='fa fa-edit'></span> Editar</button>
                        </td>
                        <td style='text-align: center'>
                          <button id='deletar' class='btn btn-danger btn-modal' data-toggle='modal' data-target='#form'><span class='fa fa-trash'></span> Deletar</button>
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
        <div class="row">
          <div class="form-group col-md-4">
            <label for="input-cep"><b>CEP:</b></label>
            <input type="text" class="form-control" id="input-cep" name="cep" placeholder="(Opcional)">
          </div>
          <div class="form-group col-md-8">
            <label for="logradouro"><b>Logradouro:</b></label>
            <input type="text" class="form-control" id="logradouro" name="logradouro" data-cep="logradouro" required="">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label for="numero"><b>Número:</b></label>
            <input type="text" class="form-control" id="numero" name="numero" data-cep="numero" required="">
          </div>
          <div class="form-group col-md-8">
            <label for="bairro"><b>Bairro:</b></label>
            <input type="text" class="form-control" id="bairro" name="bairro" data-cep="bairro" required="">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label for="cidade"><b>Cidade:</b></label>
            <input type="text" class="form-control" id="cidade" name="cidade" data-cep="cidade" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="uf"><b>Estado:</b></label>
            <input type="text" class="form-control" id="uf" name="uf" data-cep="uf" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="curso">Curso:</label>
          <select class="form-control" id="curso">
            <option>Informática</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Salvar</button>
      </div>
    </div>

  </div>
</div>

<?php
  include("estrutura/js.php")
?>

<script src="application/views/js/my.js"></script>

<script type="text/javascript">
  $("#aluno").addClass("active");

  $(document).ready(function() {
    $('#input-cep').cep();
  });

</script>

</body>
</html>
