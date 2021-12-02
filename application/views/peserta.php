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
												<th>Nama</th>
												<th>Goal</th>
												<th>Locus</th>
												<th>Knowledge</th>
												<th>Skill</th>
												<th>Result</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($dapel as $data) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $data->nama ?></td>
													<td><?= $data->goal ?></td>
													<td><?= $data->locus ?></td>
													<td><?= $data->knowledge ?></td>
													<td><?= $data->skill ?></td>
													<td>
														<?php
														if ($data->skill == 'low' && $data->knowledge == 'low' && $data->goal == 'tidak' && $data->locus == 'eksternal') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill">L0</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'low' && $data->goal == 'tidak' && $data->locus == 'internal') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill"2/1</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'low' && $data->goal == 'punya' && $data->locus == 'eksternal') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill">L1/2</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'low' && $data->goal == 'punya' && $data->locus == 'internal') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill">L1</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'high' && $data->goal == 'tidak' && $data->locus == 'eksternal') {
															echo '<span class="badge-lg badge badge-pill badge-warning">L2</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'high' && $data->goal == 'tidak' && $data->locus == 'internal') {
															echo '<span class="badge-lg badge badge-pill badge-warning">L2</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'high' && $data->goal == 'punya' && $data->locus == 'eksternal') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill">L1/2</span>';
														} else if ($data->skill == 'low' && $data->knowledge == 'high' && $data->goal == 'punya' && $data->locus == 'internal') {
															echo '<span style="background-color:orange" class="badge-lg badge badge-pill">L1</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'low' && $data->goal == 'tidak' && $data->locus == 'eksternal') {
															echo '<span class="badge-lg badge badge-pill badge-warning">L2/3</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'low' && $data->goal == 'tidak' && $data->locus == 'internal') {
															echo '<span class="badge-lg badge badge-pill badge-warning">L2/3</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'low' && $data->goal == 'punya' && $data->locus == 'eksternal') {
															echo '<span class="badge-lg badge badge-pill badge-success">L3/2</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'low' && $data->goal == 'punya' && $data->locus == 'internal') {
															echo '<span class="badge-lg badge badge-pill badge-success">L3</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'high' && $data->goal == 'tidak' && $data->locus == 'eksternal') {
															echo '<span class="badge-lg badge badge-pill badge-success">L3</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'high' && $data->goal == 'tidak' && $data->locus == 'internal') {
															echo '<span class="badge-lg badge badge-pill badge-success">L3/4</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'high' && $data->goal == 'punya' && $data->locus == 'eksternal') {
															echo '<span class="badge-lg badge badge-pill badge-primary">L4/3</span>';
														} else if ($data->skill == 'high' && $data->knowledge == 'high' && $data->goal == 'punya' && $data->locus == 'internal') {
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