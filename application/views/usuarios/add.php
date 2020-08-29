<?php $this->load->view('layout/sidebar') ?>

<div id="content">

<?php $this->load->view('layout/navbar') ?>

	<div class="container-fluid">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('usuarios') ?>">Usuários</a></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
			</ol>
		</nav

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<a title="Voltar" href="<?php echo base_url('usuarios') ?>" class="btn btn-success btn-sm float-lg-right">
					<i class="fas fa-arrow-left"></i>&nbsp; Voltar
				</a>
			</div>

			<div class="card-body">
				<form method="post" name="form_add">
					<div class="form-group row">
						<!--Editar Nome-->
						<div class="col-md-4">
							<label>Nome</label>
							<input type="text"
								   class="form-control"
								   name="first_name"
								   placeholder="Seu nome"
								   value="<?php echo set_value('first_name') ?>"
							/>
							<?php echo form_error(
								'first_name',
								' <small class="form-text text-danger">','</small> ');
							?>
						</div>

						<!--Editar sobrenome-->
						<div class="col-md-4">
							<label>Sobrenome</label>
							<input type="text"
								   class="form-control"
								   name="last_name"
								   placeholder="Seu sobrenome"
								   value="<?php echo set_value('last_name') ?>"
							/>
							<?php echo form_error(
								'last_name',
								' <small class="form-text text-danger">','</small> ');
							?>
						</div>

						<!--Editar email-->
						<div class="col-md-4">
							<label>Email(Login)</label>
							<input type="email"
								   class="form-control"
								   name="email"
								   placeholder="Seu email"
								   value="<?php echo set_value('email') ?>"
							/>
							<?php echo form_error(
								'email',
								' <small class="form-text text-danger">','</small> ');
							?>
						</div>
					</div>

					<div class="form-group row">
						<!--Editar nome de usuario-->
						<div class="col-md-4">
							<label>Usuário</label>
							<input type="text"
								   class="form-control"
								   name="username"
								   placeholder="Seu usuário"
								   value="<?php echo set_value('username') ?>"
							/>
							<?php echo form_error(
								'username',
								' <small class="form-text text-danger">','</small> '
							);?>
						</div>

						<!--Editar senha de acesso-->
						<div class="col-md-4">
							<label>Senha</label>
							<input type="password"
								   class="form-control"
								   name="password"
								   placeholder="Sua senha de acesso"
							/>
							<?php echo form_error(
								'password',
								' <small class="form-text text-danger">','</small> ');
							?>
						</div>

						<!--Confirmação de senha-->
						<div class="col-md-4">
							<label>Confirmação de senha</label>
							<input type="password"
								   class="form-control"
								   name="confirm_password"
								   placeholder="Confirme sua senha"
							/>
							<?php echo form_error(
								'confirm_password',
								' <small class="form-text text-danger">','</small> ');
							?>
						</div>
					</div>

					<div class="form-group row">
						<!--Editar Ativo/Inativo-->
						<div class="col-md-6">
							<label>Ativo</label>
							<select class="form-control" name="active">
								<option value="0">Não</option>
								<option value="1">Sim</option>
							</select>
						</div>

						<!--Editar Perfil de acesso-->
						<div class="col-md-6">
							<label>Perfil de acesso</label>
							<select class="form-control" name="perfil_usuario">
								<option value="2">Vendedor</option>
								<option value="1">Administrador</option>
							</select>
						</div>
					</div>

					<button type="submit" class="btn btn-primary btn-sm">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</div>


