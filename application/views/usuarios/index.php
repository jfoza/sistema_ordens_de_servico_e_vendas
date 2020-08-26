<?php $this->load->view('layout/sidebar') ?>

<!-- Main Content -->
<div id="content">

	<?php $this->load->view('layout/navbar') ?>

	<!-- Begin Page Content -->
	<div class="container-fluid">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
			</ol>
		</nav

		<?php if($message = $this->session->flashdata('error')) : ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>
							<i class="fas fa-exclamation-triangle"></i>
							&nbsp;&nbsp;<?php echo $message ?>
						</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		<?php endif;  ?>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<a title="Cadastrar novo usuário" href="" class="btn btn-success btn-sm float-lg-right">
					<i class="fas fa-user-plus"></i>&nbsp;Novo
				</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered dataTable"  width="100%" cellspacing="0">
						<thead>
						<tr>
							<th>#</th>
							<th>Usuário</th>
							<th>Login</th>
							<th>Ativo</th>
							<th class="text-center no-sort">Ações</th>
						</tr>
						</thead>
						<tbody>
							<?php foreach ($usuarios as $user) : ?>
								<tr>
									<td><?php echo $user->id ?></td>
									<td><?php echo $user->username ?></td>
									<td><?php echo $user->email ?></td>
									<td><?php echo $user->active ?></td>
									<td class="text-center">
										<a title="Editar" href="<?php echo base_url('usuarios/edit/' .$user->id); ?>" class="btn btn-sm btn-primary">
											<i class="fas fa-user-edit"></i>&nbsp; Editar
										</a>
										<a title="Excluir" href="" class="btn btn-sm btn-danger">
											<i class="fas fa-user-times"></i>&nbsp; Excluir
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


