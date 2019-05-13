<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $titulo ?> Livros</title>
	<?= link_tag('assets/bootstrap/css/bootstrap.min.css') ?>
	<?= link_tag('assets/bootstrap/css/bootstrap-theme.min.css') ?>
	<style>
		.erro {
			color: #f00;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center"><?= $titulo ?></h1>
		<div class="col-md-6 col-md-offset-3">
			<div class="row">
				<?= form_open('livro/store')  ?>
					<div class="form-group">
						<label for="titulo">Título</label><span class="erro"><?php echo form_error('titulo') ?  : ''; ?></span>
						<input type="text" name="titulo" id="titulo" class="form-control" value="<?= set_value('titulo') ? : (isset($titulo) ? $titulo : '') ?>" autofocus='true' />
					</div>
					<div class="form-group">
						<label for="categoria">Categoria</label><span class="erro"><?php echo form_error('categoria') ?  : ''; ?></span>
						<input type="text" name="categoria" id="categoria" class="form-control" value="<?= set_value('categoria') ? : (isset($categoria) ? $categoria : ''); ?>" />
					</div>
					<div class="form-group">
						<label for="editora">Editora</label><span class="erro"><?php echo form_error('editora') ?  : ''; ?></span>
						<input type="text" name="editora" id="editora" class="form-control" value="<?= set_value('editora') ? : (isset($editora) ? $editora : '') ; ?>" />
					</div>
					
					<div class="form-group text-right">
						<?= anchor('', 'Cancelar') ?>	
					<input type="reset" value="Limpar Dados" class="btn btn-reset" /> 	
					<input type="submit" value="Salvar" class="btn btn-success" /> 
					</div>
					<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
				<?= form_close(); ?>
			</div>
			<div class="row"><hr></div>
			<div class="row">
				<?= anchor('', 'Página Inicial') ?>
			</div>
		</div>	
	</div>
</body>
</html>