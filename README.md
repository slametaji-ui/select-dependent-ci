
# Form Select Dependent

Menampilkan Data Berdasarkan Data yang dipilih


## Modal Create

Buat modal create pada halaman Views anda

```bash
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

```

## Modal Edit

Buat modal edit pada halaman Views anda
```bash
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
```

## Controller Select Dependent

method berikut untuk mengambil data dari select dependent

```bash
    function get_sub_unsur()
	{
		$subunsur_id = $this->input->post('id', TRUE);
		$data = $this->example->get_sub_unsur($subunsur_id)->result();
		echo json_encode($data);
	}

	function get_butir_kegiatan()
	{
		$butir_kegiatan_id = $this->input->post('id', TRUE);
		$data = $this->example->get_butir_kegiatan($butir_kegiatan_id)->result();
		echo json_encode($data);
	}
```

## Model Database

Method Get Data dari Database
```bash
function get_unsur()
	{
		$query = $this->db->query("SELECT * FROM tbl_unsur")->result();
		return $query;
	}

	function get_subunsur()
	{
		$query = $this->db->query("SELECT a.*,b.nama as unsur FROM tbl_sub_unsur as a JOIN tbl_unsur as b ON id_unsur = b.id")->result();
		return $query;
	}

	function get_sub_unsur($unsur_id)
	{
		$query = $this->db->get_where('tbl_sub_unsur', array('id_unsur' => $unsur_id));
		return $query;
	}

	function get_ket_butir()
	{
		$query = $this->db->query("SELECT a.*,b.nama as sub_unsur,c.nama as unsur FROM tbl_butir_kegiatan as a JOIN tbl_sub_unsur as b ON id_sub = b.id JOIN tbl_unsur as c ON a.id_unsur = c.id")->result();
		return $query;
	}

	function get_butir_kegiatan($sub_id)
	{
		$query = $this->db->get_where('tbl_butir_kegiatan', array('id_sub' => $sub_id));
		return $query;
	}
```

semoga beruntung :)
  