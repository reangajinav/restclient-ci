<?php if($this->session->flashdata('pesan')): ?>	
	<?php echo $this->session->flashdata('pesan'); ?>
<?php endif ?>

<div class="container">

	<div class="mt-2 mb-2">
		<a href="<?php echo base_url('index/tambah'); ?>" class="btn btn-info">Tambah Provinsi</a>
	</div>

	<div class="table-responsive">
		
		<table class="table" id="tableprovinsi">
			<thead class="thead-default">
				<tr>
					<th>No</th>
					<th>Provinsi</th>
					<th>Jumlah Penduduk</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($provinsi as $key => $value) { ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['nama_provinsi'] ?></td>
						<td><?php echo $value['jumlah_penduduk'] ?></td>
						<td>
							<a href="<?php echo base_url("index/ubah/".$value["id_provinsi"]); ?>" class="btn btn-warning btn-sm">Ubah</a>
							<a href="<?php echo base_url("index/hapus/".$value["id_provinsi"]); ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin?')">Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>