<div class="hp-main-layout-content">

    <div class="row mb-32 gy-32">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('Dashboard')?>">Home</a> / <a href="<?= base_url('pembelian/Transaksi')?>">Pembelian</a> /	Edit
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col pe-md-32 pe-md-120">
                            <h4>Retur Penjualan</h4>
                        </div>
						<div class="col-12 mt-16">
						<form>
						<div class="modal-body">
							<div class="row gx-8">
								<div class="col-12 col-md-6">
									<div class="mb-24">
										<label for="name" class="form-label">
											No. Pesanan
										</label>
										<input type="text" class="form-control" name="NoPesanan" id="NoPesanan" value="<?= $noretur?>" readonly>
										<!-- <input type="hidden" class="form-control" name="NoPesanan" id="St" value="Edit" readonly> -->

									</div>
								</div>

								<div class="col-12 col-md-6">
								<div class="mb-24">
									<label class="form-label">Supplier</label>
									<select class="form-select" id="Supplier" name="nama_supplier" >
										<option selected hidden>--Pilih--</option>
										<option value="Supplier">Supplier</option>
									</select>
								</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="mb-24">
										<label for="email" class="form-label">
											<span class="text-danger me-4">*</span>
											Lokasi
										</label>
										<select class="form-select" name="lokasi" id="Lokasi" >
											<!-- <option selected hidden>--Pilih--</option> -->
											<option value="Gundang" selected>Gudang</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="mb-24">
										<label class="form-label">
											<span class="text-danger me-4">*</span>
											Tanggal Pesanan
										</label>
										<input type="date" class="form-control" name="tanggal_pesanan" id="TanggalPesanan" >
									</div>
								</div>
								<div class="col-12 col-md-12">
									<div class="mb-24">
										<label for="name" class="form-label">
											Keterangan
										</label>
										<textarea type="text" class="form-control" name="keterangan" id="Keterangan"></textarea>
									</div>
								</div>

							</div>
						</div>
						<div>
							<div class="divider"></div>
							<h3>Produk</h3>
							<button type="button" class="btn btn-primary mb-24" data-bs-toggle="modal" data-bs-target="#modal_barang">
                                <i class="ri-user-add-line remix-icon"></i>
                                <span>Tambah Data</span>
                            </button>
						</div>
						<table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                        <!-- <th scope="col"></th> -->
                                    </tr>
                                </thead>
                                <tbody id="cart_retur">                            
                                </tbody>
									
                            </table>
					</form>
					</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col pe-md-32 pe-md-120">
                            <h4>Rincian</h4>
                        </div>
                        <div class="col hp-flex-none w-auto">
                            <a href="<?= base_url('pembelian/Transaksi/detail/'.$this->uri->segment(4))?>" class="btn btn-danger w-100 mb-12" >
                                <i class="ri-user-add-line remix-icon"></i>
                                <span>Batal Edit</span>
                            </a>
                        </div>
						<hr>
						<div class="row mb-24">
							<div class="col-6"><span id="totProduk"></span> Produk (Qty : <span id="totQty"></span>)</div>
							<div class="col-6 text-end">Rp <span id="totalBruto"></span></div>
						</div>
						<hr>
						
						<div class="col-12 mt-16">
							<div class="col-12 col-md-12 ">
								<div class="row mb-24">
									<button type="button" class="btn btn-success" id="btn-simpan-retur-penjualan">Simpan</button>
								</div>
							</div>						
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- barang  -->
<div class="modal fade" id="modal_barang" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-16 px-24">
                <h5 class="modal-title" id="addNewUserLabel">Daftar Barang</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider m-0"></div>

			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>Nama Produk</th>
						<th>Kategori</th>
						<th>Harga</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($produk as $key => $pro) { ?>
						<tr>
							<td><?= $pro->product_name ?></td>
							<td><?= $pro->category ?></td>
							<td><?= $pro->price ?></td>
							<td>
								<button type="button" class="btn btn-primary"
								data-id="<?= $pro->id ?>" 
								data-name="<?= $pro->product_name ?>" 
								data-price="<?= $pro->price ?>" 
								onClick="pilihProdukRetur(this)">Pilih</button>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
    </div>
</div>
