<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h3 class="pl-1">MY PROFIL</h3>
	<hr>
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<div class="card mb-3" style="max-width: 500px;">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/') . $user['image'] ?>" class="card-img p-1" alt="...">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title"><b>Nama : </b><?= $user['name']; ?></h5>
					<hr>
					<p class="card-text"><b>Email : </b><?= $user['email']; ?></p>
					<hr>
					<p class="card-text"><b>Join :</b> <?= date('d-F-Y', $user['date_created']); ?></p>
				</div>
			</div>
		</div>
	</div>
</div> <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->