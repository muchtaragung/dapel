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
												<th>CONFIDENCE/GOAL</th>
												<th>COMITMENT/LOCUS</th>
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
														if ($data->skill == 'low' && $data->knowledge == 'low'  && $data->locus == 'eksternal' && $data->goal == 'tidak') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill">L0</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'low'  && $data->locus == 'internal' && $data->goal == 'tidak') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill"1/2</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'low'  && $data->locus == 'eksternal' && $data->goal == 'punya') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill">L2/1</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'low'  && $data->locus == 'internal' && $data->goal == 'punya') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill">L1</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'high'  && $data->locus == 'eksternal' && $data->goal == 'tidak') {
															echo '<span style="background-color:yellow" class="badge-lg badge badge-pill">L2</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'high'  && $data->locus == 'internal' && $data->goal == 'tidak') {
															echo '<span style="background-color:yellow" class="badge-lg badge badge-pill">L1/2</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'high'  && $data->locus == 'eksternal' && $data->goal == 'punya') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill">L2</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'high'  && $data->locus == 'internal' && $data->goal == 'punya') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill">L1</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'low'  && $data->locus == 'eksternal' && $data->goal == 'tidak') {
															echo '<span style="background-color:yellow" class="badge-lg badge badge-pill">L2/3</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'low'  && $data->locus == 'internal' && $data->goal == 'tidak') {
															echo '<span class="badge-lg badge badge-pill badge-success">L3/2</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'low'  && $data->locus == 'eksternal' && $data->goal == 'punya') {
															echo '<span style="background-color:yellow" class="badge-lg badge badge-pill">L2/3</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'low'  && $data->locus == 'internal' && $data->goal == 'punya') {
															echo '<span class="badge-lg badge badge-pill badge-success">L3</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'high'  && $data->locus == 'eksternal' && $data->goal == 'tidak') {
															echo '<span class="badge-lg badge badge-pill badge-success">L3</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'high'  && $data->locus == 'internal' && $data->goal == 'tidak') {
															echo '<span class="badge-lg badge badge-pill badge-primary">L4/3</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'high'  && $data->locus == 'eksternal' && $data->goal == 'punya') {
															echo '<span class="badge-lg badge badge-pill badge-success">L3/4</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'high'  && $data->locus == 'internal' && $data->goal == 'punya') {
															echo '<span class="badge-lg badge badge-pill badge-primary">L4</span>';
														} else {
															$level['level'] = 'ERROR';
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