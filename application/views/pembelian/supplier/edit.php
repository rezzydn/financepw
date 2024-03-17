<div class="hp-main-layout-content">
    
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="row justify-content-between">
				<div class="col pe-md-32 pe-md-120">
					<h4>Edit Data Supplier</h4>
				</div>
				<div class="col-12 mt-16">
					<form action="<?= base_url('pembelian/Supplier/update')?>" method="POST">
						<div class="mb-24">
							<label class="form-label">Kode</label>
							<input type="hidden" class="form-control" name="id" value="<?= $data[0]->idSupplier ?>">
							<input type="text" class="form-control" name="kode" value="<?= $data[0]->kode ?>">
						</div>
						<div class="mb-24">
							<label class="form-label">Nama Akun</label>
							<input type="text" class="form-control" name="nama" value="<?= $data[0]->nama ?>">
						</div>
						<div class="mb-24">
							<label class="form-label">Alamat</label>
							<input type="text" class="form-control" name="alamat" value="<?= $data[0]->alamat ?>">
						</div>
						<div class="mb-24">
							<label class="form-label">No Telp</label>
							<input type="number" class="form-control" name="no_telp" value="<?= $data[0]->no_telp ?>">
						</div>
						<div class="mb-24">
							<label class="form-label">Email</label>
							<input type="email" class="form-control" name="email" value="<?= $data[0]->email ?>">
						</div>
						<div class="text-end">
							<a href="<?= base_url('master/Supplier')?>" class="btn btn-text text-black-100 hp-hover-bg-black-10 hp-hover-bg-dark-80 hp-hover-text-color-dark-0">Batal</a>
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
