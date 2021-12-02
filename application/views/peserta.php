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
							<h1 class="m-0">Data Pelatihan</h1>
						</div><!-- /.col -->
						<div class="col-6">
							<form action="<?= site_url() ?>peserta/import" method="post" enctype="multipart/form-data">
								<label for="exampleFormControlFile1">Import Data</label>
								<div class="row">
									<div class="col-8">
										<div class="form-group">
											<input type="file" name="csv" required accept=".csv" class="form-control">
										</div>
									</div>
									<div class="col-2">
										<div class="form-group">
											<button type="submit" class=" btn btn-success">Submit</button>
										</div>
									</div>
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
						<div class="col-lg-12">
							<div class="card">
								<div class="card-body">
									<table id="data" class="table table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Name</th>
												<th>Potition</th>
												<th>Jabatan</th>
												<th>Area</th>
												<th>Email</th>
												<th>Batch</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($dapel as $data) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><a href="<?= base_url() ?>peserta/detail/<?= $data->id_peserta ?>" target="_blank"><?= $data->nama_peserta ?></a></td>
													<td><?= $data->posisi_peserta ?></td>
													<td><?= $data->area_peserta ?></td>
													<td><?= $data->jabatan_peserta ?></td>
													<td><?= $data->email_peserta ?></td>
													<td><?= $data->batch_peserta ?></td>
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