<div class="hp-main-layout-content">
    
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="row justify-content-between">
				<div class="col pe-md-32 pe-md-120">
					<h4>Create Data Customer</h4>
				</div>
				<div class="col-12 mt-16">
				<form action="<?= base_url('master/Customer/store')?>" method="POST">
						<div class="mb-24">
							<label class="form-label">Kod Customer</label>
							<input type="text" class="form-control" name="kode" placeholder="Kode ..">
						</div>
						<div class="mb-24">
							<label class="form-label">Nama Customer</label>
							<input type="text" class="form-control" name="nama" placeholder="Nama ..">
						</div>
						<div class="mb-24">
							<label class="form-label">Alamat</label>
							<input type="text" class="form-control" name="alamat" placeholder="Alamat ..">
						</div>
						<div class="mb-24">
							<label class="form-label">No Telp</label>
							<input type="number" class="form-control" name="no_telp" placeholder="No Telp ..">
						</div>
						<div class="mb-24">
							<label class="form-label">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email ..">
						</div>
						<div class="mb-24">
							<label class="form-label">Tipe</label>
							<input type="text" class="form-control" name="tipe" placeholder="Tipe ..">
						</div>
						<div class="text-end">
							<a href="<?= base_url('master/Customer')?>" class="btn btn-text text-black-100 hp-hover-bg-black-10 hp-hover-bg-dark-80 hp-hover-text-color-dark-0">Batal</a>
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
