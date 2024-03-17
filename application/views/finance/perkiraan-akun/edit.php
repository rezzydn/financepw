<div class="hp-main-layout-content">
    
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="row justify-content-between">
				<div class="col pe-md-32 pe-md-120">
					<h4>Edit Data Perkiraan Akun</h4>
				</div>
				<div class="col-12 mt-16">
					<form action="<?= base_url('finance/PerkiraanAkun/update')?>" method="POST">
						<div class="mb-24">
							<label class="form-label">No. Akun</label>
							<input type="hidden" class="form-control" name="id" value="<?= $data[0]->idPerkiraanAkun ?>">
							<input type="text" class="form-control" name="no_akun" value="<?= $data[0]->no ?>">
						</div>
						<div class="mb-24">
							<label class="form-label">Nama Akun</label>
							<input type="text" class="form-control" name="nama_akun" value="<?= $data[0]->nama ?>">
						</div>
						<div class="mb-24">
							<label class="form-label">Saldo Awal</label>
							<input type="number" class="form-control" name="saldo_awal" value="<?= $data[0]->saldo_awal ?>">
						</div>
						<div class="mb-24">
							<label class="form-label">Kelompok Akun</label>
							<input type="text" class="form-control" name="kel_akun" value="<?= $data[0]->kelompok ?>">
						</div>
						<div class="text-end">
							<a href="<?= base_url('finance/PerkiraanAkun')?>" class="btn btn-text text-black-100 hp-hover-bg-black-10 hp-hover-bg-dark-80 hp-hover-text-color-dark-0">Batal</a>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>

				<div class="col-12 mt-24 hljs-container">
					<pre>
						<code class="html" data-component='form' data-code='basic'></code>
					</pre>
				</div>
			</div>
		</div>
	</div>
</div>

 
</div>
