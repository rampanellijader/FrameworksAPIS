<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crud Livros</title>
	<?= link_tag('assets/bootstrap/css/bootstrap.min.css') ?>
	<?= link_tag('assets/bootstrap/css/bootstrap-theme.min.css') ?>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Livros</h1>
		<div class="col-md-12">
			<div class="row">
				<?= anchor('livro/create', 'Novo Livro', array('class' => 'btn btn-success')); ?>
			</div>
			<div class="row">
				<h3><?= $livros->num_rows(); ?> livros(s)</h3>
			</div>
			<div class="row">
			<?php if ($livros->num_rows() > 0): ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Código</th>
							<th>Título</th>
							<th>Categoria</th>
							<th>Editora</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($livros -> result() as $livro): ?>
						<tr>
							<td><?= $livro->id ?></td>
							<td><?= $livro->titulo ?></td>
							<td><?= $livro->categoria ?></td>
							<td><?= $livro->editora ?></td>
							<td><?= anchor("livro/edit/$livro->id", "Editar") ?>
								 | <a href="#" class='confirma_exclusao' data-id="<?= $livro->id ?>" data-titulo="<?= $livro->titulo ?>" />Excluir</a></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php else: ?>
					<h4>Nenhum registro cadastrado.</h4>
				<?php endif; ?>
			</div>
		</div>	
	</div>
<div class="modal fade" id="modal_confirmation">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmação de Exclusão</h4>
      </div>
      <div class="modal-body">
        <p>Deseja realmente excluir o registro <strong><span id="titulo_exclusao"></span></strong>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
        <button type="button" class="btn btn-danger" id="btn_excluir">Sim. Deletar registro</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?= base_url('assets/js/jquery.js') ?>"></script>	
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

	<script>
	
		var base_url = "<?= base_url(); ?>";
	
		$(function(){
			$('.confirma_exclusao').on('click', function(e) {
			    e.preventDefault();
			    
			    var titulo = $(this).data('titulo');
			    var id = $(this).data('id');
			    
			    $('#modal_confirmation').data('titulo', titulo);
			    $('#modal_confirmation').data('id', id);
			    $('#modal_confirmation').modal('show');
			});
			
			$('#modal_confirmation').on('show.bs.modal', function () {
			  var titulo = $(this).data('titulo');
			  $('#titulo_exclusao').text(titulo);
			});	
			
			$('#btn_excluir').click(function(){
				var id = $('#modal_confirmation').data('id');
				document.location.href = base_url + "index.php/livro/delete/"+id;
			});					
		});
	</script>
	
</body>
</html>