<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Example Select Data Dependent</title>
</head>

<body>
	<div class="container">
		<div class="content">
			<!-- Image and text -->
			<nav class="navbar navbar-light bg-light">
				<a class="navbar-brand" href="#">
					<img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
					Info Maseh
				</a>
			</nav>
		</div>
		<div class="mt-3">

			<!-- Notifikasi -->
			<?php
			$sukses = $this->session->flashdata('sukses');
			if ($sukses != "") {
			?>
				<div id="notifikasi" class="alert alert-success">
					<h4>Sukses</h4>
					<p><?php echo $sukses; ?></p>
				</div>
			<?php } ?>

			<?php
			$error = $this->session->flashdata('error');
			if ($error != "") {
			?>
				<div id="notifikasi" class="alert alert-danger">
					<h4>Gagal</h4>
					<p><?php echo $error; ?></p>
				</div>
			<?php } ?>

			<!-- Button trigger modal tambah-->
			<p>
				<a href="javascript:void(0);" data-toggle="modal" data-target="#modal-tambah" class="btn btn-md btn-success"> <i class="fa fa-plus"></i> Tambah Data</a>
			</p>

		</div>
		<!-- Content -->
		<div class="col-xs-12">
			<div class="box box-warning">
				<div class="box-header">
					<h3 class="box-title">Data Example</h3>
				</div>
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead class="text-center">
							<tr>
								<th>No</th>
								<th>Keterangan Butir Kegiatan</th>
								<th>Sub Unsur</th>
								<th>Unsur</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 0;
							foreach ($ket_butir as $data) :
								$no++
							?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data->nama; ?></td>
									<td><?php echo $data->sub_unsur; ?></td>
									<td><?php echo $data->unsur; ?></td>
									<td class="text-center">
										<a href="javascript:void(0);" data-toggle="modal" data-target="#modal-ubah<?php echo $data->id; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Ubah</a>
										<a href="javascript:void(0);" data-toggle="modal" data-target="#modal-hapus<?php echo $data->id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
									</td>
								</tr>
							<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>

	</div>

	<!-- Modal -->
	<div class="modal fade" id="modal-tambah">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah <?php echo $title; ?></h4>
				</div>
				<form action="<?php echo base_url('create/ket_butir_kegiatan'); ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label>Unsur</label>
							<select class="form-control unsur_id" name="unsur" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
								<option value="">--Pilih Unsur--</option>
								<?php foreach ($unsur as $data) : ?>
									<option value="<?php echo $data->id; ?>"><?php echo $data->nama; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Sub Unsur</label>
							<select class="form-control sub_unsur_id" name="subunsur" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
								<option value="">--Pilih Sub Unsur--</option>
							</select>
						</div>
						<div class="form-group">
							<label>Keterangan Butir Kegiatan</label>
							<input type="text" class="form-control" name="butir_kegiatan" placeholder="Keterangan Butir Kegiatan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
						<div class="modal-footer">
							<button class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
							<button class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php foreach ($ket_butir as $data) : ?>
		<div class="modal fade" id="modal-ubah<?php echo $data->id; ?>"">
            <div class=" modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Edit Data <?php echo $title; ?></h4>
				</div>
				<form action="<?php echo base_url('update/ket_butir_kegiatan/') . $data->id; ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label>Unsur</label>
							<select class="form-control unsur_id" name="unsur" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
								<option value="">--Pilih Unsur--</option>
								<?php foreach ($unsur as $u) : ?>
									<option <?php if ($data->id_unsur == $u->id) {
												echo "selected";
											} ?> value="<?php echo $u->id; ?>"><?php echo $u->nama; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Sub Unsur</label>
							<select class="form-control sub_unsur_id" name="subunsur" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
								<?php foreach ($this->example->get_sub_unsur($data->id_unsur)->result() as $s) : ?>
									<option <?php if ($data->id_sub == $s->id) {
												echo "selected";
											} ?> value="<?php echo $s->id; ?>"><?php echo $s->nama; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Keterangan Butir Kegiatan</label>
							<input type="text" class="form-control" name="butir_kegiatan" value="<?php echo $data->nama; ?>" placeholder="Sub Unsur" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
						<div class="modal-footer">
							<button class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
							<button class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>


		<div class="modal fade" id="modal-hapus<?php echo $data->id; ?>"">
                <div class=" modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Hapus <?php echo $title; ?></h4>
				</div>
				<form action="<?php echo base_url('delete/ket_butir_kegiatan/') . $data->id; ?>" method="post">
					<div class="modal-body">
						<div>
							<span> Apakah anda yakin akan menghapus <br><label><?php echo $data->nama; ?></label> dari <label><?php echo $title; ?> ?</label></span>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
						<button class="btn btn-danger">Hapus</button>
					</div>
				</form>
			</div>
		</div>
		</div>
	<?php endforeach; ?>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://sijempolpp.purwakartakab.go.id/assets/mamet/jquery/dist/jquery.min.js"></script>
	<!-- INI HARTANYA -->
	<script type="text/javascript">
		$(document).ready(function() {

			$('.unsur_id').change(function() {
				var id = $(this).val();
				$.ajax({
					url: "<?php echo site_url('welcome/get_sub_unsur'); ?>",
					method: "POST",
					data: {
						id: id
					},
					// async: true,
					dataType: 'json',
					success: function(data) {

						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id + '>' + data[i].nama + '</option>';
						}
						$('.sub_unsur_id').html(html);

					}
				});
				return false;
			});

		});
	</script>
	<!-- INI HARTANYA -->

</body>

</html>
