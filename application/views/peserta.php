<?php $this->load->view('layout/head') ?>

<body class="hold-transition layout-top-nav">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('layout/navbar') ?>
		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container">
					<div class="row mb-2">
						<div class="col-6">
							<h1 class="m-0">Data Trakindo</h1>
						</div><!-- /.col -->

						<div class="col-6">
							<form action="<?= site_url() ?>peserta/import" method="post" enctype="multipart/form-data">
								<label for="exampleFormControlFile1">Import Data</label>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<input type="file" name="csv" required accept=".csv" class="form-control">
										</div>
									</div>
									<?php if ($dapel == null) : ?>
										<div class="col-2">
											<div class="form-group">
												<button type="submit" class=" btn btn-success">Submit</button>
											</div>
										</div>
										<div class="col-4">
											<div class="form-group">
												<button type="" class=" btn btn-danger disabled">Delete All Data</button>
											</div>
										</div>
									<?php else : ?>
										<div class="col-2">
											<div class="form-group">
												<button type="submit" class=" btn btn-success">Submit</button>
											</div>
										</div>
										<div class="col-4">
											<div class="form-group">
												<button onclick=" confirmDelete('<?= site_url('peserta/truncate') ?>')" class="btn btn-danger ">Delete All Data</button>
											</div>
										</div>
										<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
										<script>
											function confirmDelete(link) {
												Swal.fire({
													title: 'Apakah Anda Ingin Menghapus Semua Data?',
													icon: 'warning',
													showCancelButton: true,
													confirmButtonColor: '#3085d6',
													cancelButtonColor: '#d33',
													confirmButtonText: 'Ya'
												}).then((result) => {
													if (result.isConfirmed) {
														window.location.replace(link)
													}
												})
											}
										</script>
									<?php endif ?>
								</div>
							</form>
						</div>

					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<?php if ($this->session->flashdata('msg')) : ?>
								<div class="alert alert-success w-100" role="alert">
									<?= $this->session->flashdata('msg') ?>
								</div>
							<?php endif ?>
							<?php if ($this->session->flashdata('error')) : ?>
								<div class="alert alert-warning w-100" role="alert">
									<?= $this->session->flashdata('error') ?>
								</div>
							<?php endif ?>
						</div>

						<div class="col-lg-12">
							<div class="card">
								<div class="card-body">
									<table id="data" class="table table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>NAMA</th>
												<th>GOAL</th>
												<th>LOCUS</th>
												<th>KNOWLEDGE</th>
												<th>SKILL</th>
												<th>RESULT</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($dapel as $data) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= ucwords($data->nama) ?></td>
													<td><?= ucwords($data->goal) ?></td>
													<td><?= ucwords($data->locus) ?></td>
													<td><?= ucwords($data->knowledge) ?></td>
													<td><?= ucwords($data->skill) ?></td>
													<td>
														<?php

														if ($data->goal == 'punya' && $data->locus == 'internal') {
															$mindset = 'good';
														} elseif ($data->goal == 'punya' && $data->locus == 'eksternal') {
															$mindset = 'mediocre';
														} elseif ($data->goal == 'tidak' && $data->locus == 'internal') {
															$mindset = 'mediocre';
														} elseif ($data->goal == 'tidak' && $data->locus == 'eksternal') {
															$mindset = 'poor';
														}

														if ($data->skill == 'high' && $data->knowledge == 'high') {
															$competency = 'good';
														} elseif ($data->skill == 'high' && $data->knowledge == 'mediocre') {
															$competency = 'good';
														} elseif ($data->skill == 'high' && $data->knowledge == 'low') {
															$competency = 'mediocre';
														} elseif ($data->skill == 'mediocre' && $data->knowledge == 'high') {
															$competency = 'mediocre';
														} elseif ($data->skill == 'mediocre' && $data->knowledge == 'mediocre') {
															$competency = 'mediocre';
														} elseif ($data->skill == 'mediocre' && $data->knowledge == 'low') {
															$competency = 'poor';
														} elseif ($data->skill == 'low' && $data->knowledge == 'high') {
															$competency = 'mediocre';
														} elseif ($data->skill == 'low' && $data->knowledge == 'mediocre') {
															$competency = 'poor';
														} elseif ($data->skill == 'low' && $data->knowledge == 'low') {
															$competency = 'poor';
														}

														if ($mindset == 'good' && $competency == 'good') {
															echo	'<span class="badge badge-info">Good</span>';
														} elseif ($mindset == 'mediocre' && $competency == 'mediocre') {
															echo '<span class="badge badge-warning">Mediocre</span>';
														} elseif ($mindset == 'poor' && $competency == 'mediocre') {
															echo '<span class="badge badge-danger">Poor</span>';
														} elseif ($mindset == 'poor' && $competency == 'good') {
															echo '<span class="badge badge-warning">Mediocre</span>';
														} elseif ($mindset == 'good' && $competency == 'poor') {
															echo '<span class="badge badge-warning">Mediocre</span>';
														} elseif ($mindset == 'good' && $competency == 'mediocre') {
															echo	'<span class="badge badge-warning">Mediocre</span>';
														} elseif ($mindset == 'poor' && $competency == 'poor') {
															echo	'<span class="badge badge-danger">Poor</span>';
														} elseif ($mindset == 'mediocre' && $competency == 'good') {
															echo	'<span class="badge badge-warning">Mediocre</span>';
														} elseif ($mindset == 'mediocre' && $competency == 'poor') {
															echo	'<span class="badge badge-danger">Poor</span>';
														} else {
															echo	'Data Error';
														}
														?>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /.col-md-6 -->
					</div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
			<div class="p-3">
				<h5>Title</h5>
				<p>Sidebar content</p>
			</div>
		</aside>
		<!-- /.control-sidebar -->

		<?php $this->load->view('layout/footer'); ?>
	</div>
	<!-- ./wrapper -->
	<?php $this->load->view('layout/script'); ?>
</body>

</html>