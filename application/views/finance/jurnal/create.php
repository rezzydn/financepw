<div class="hp-main-layout-content">

    <div class="row mb-32 gy-32">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('admin/Dashboard')?>">Home</a> / <a href="<?= base_url('finance/Jurnal')?>">Jurnal</a> /	Tambah Data 
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col pe-md-32 pe-md-120">
                            <h4>Tambah Jurnal Manual</h4>
                        </div>

                        <!-- <div class="col hp-flex-none w-auto">
                            <a href="<?= base_url('pembelian/Transaksi')?>" class="btn btn-danger w-100" >
                                <i class="ri-user-add-line remix-icon"></i>
                                <span>Batal</span>
                            </a>
                        </div> -->
						<div class="col-12 mt-16">
						<form>
						<div class="modal-body">
							<div class="row gx-8">
								<div class="col-12 col-md-6">
									<div class="mb-24">
										<label for="name" class="form-label">
											No. Jurnal
										</label>
										<input type="text" class="form-control" name="NoJurnal" id="NoJurnal" value="<?= $NoJurnal ?>" readonly>
										<input type="hidden" class="form-control" name="NoJurnal" id="St" value="New" readonly>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="mb-24">
										<label class="form-label">
											<span class="text-danger me-4">*</span>
											Tanggal
										</label>
										<input type="date" class="form-control" name="tanggal_jurnal" id="TanggalPesanan" placeholder="Tanggal Jurnal">
									</div>
								</div>
								<div class="col-12 col-md-12">
									<div class="mb-24">
										<label for="name" class="form-label">
											Keterangan
										</label>
										<textarea type="text" class="form-control" name="keterangan" id="Keterangan" placeholder="Keterangan .."></textarea>
									</div>
								</div>

							</div>
						</div>
						<div>
							<div class="divider"></div>
							<button type="button" class="btn btn-primary mb-24" data-bs-toggle="modal" data-bs-target="#modal_coa">
                                <i class="ri-add-line remix-icon"></i>
                                <span>Tambah Data</span>
                            </button>
						</div>
						<table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Akun</th>
                                        <th scope="col">Debit</th>
                                        <th scope="col">Kredit</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="detai_cart">                            
                                </tbody>
								<?php if ($this->cart->contents()) { ?>
								<tfoot>
									<tr>
										<td colspan="8">
											<button id="clear-cart" class="btn btn-warning">clear</button>
										</td>
									</tr>
								</tfoot>
								<?php } ?>	
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
                            <a href="<?= base_url('finance/Transaksi')?>" class="btn btn-danger w-100 mb-12" >
                                <i class="ri-close-line remix-icon"></i>
                                <span>Batal</span>
                            </a>
                        </div>
						<hr>
						<div class="col-12 mt-16">
							<div class="col-12 col-md-12 d-block ">
								<div class="row mb-24">
									<div class="col-6">Debit</div>
									<div class="col-6 text-end">Rp <span id="tot_debit"></span></div>
								</div>
								<div class="row mb-24">
									<div class="col-6">Kredit</div>
									<div class="col-6 text-end">Rp <span id="tot_kredit"></span></div>
								</div>
                                <div class="row mb-24">
									<div class="col-6">Selisih</div>
									<div class="col-6 text-end">Rp <span id="selisih"></span></div>
								</div>
							</div>						
						</div>
						<hr>
						<div class="col-12 mt-16">
							<div class="col-12 col-md-12 ">
								<div class="row mb-24">
									<button type="button" class="btn btn-success" id="btn-simpan-pembelian">Simpan</button>
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
<div class="modal fade" id="modal_coa" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-16 px-24">
                <h5 class="modal-title" id="addNewUserLabel">Daftar Akun</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider m-0"></div>

			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>Nomor Akun</th>
						<th>Nama</th>
						<th>Kelompok Akun</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($daftar_akun as $key => $coa) { ?>
						<tr>
							<td><?= $coa->no ?></td>
							<td><?= $coa->nama ?></td>
							<td><?= $coa->kelompok ?></td>
							<td>
								<button type="button" class="btn btn-primary"
								data-id="<?= $coa->idPerkiraanAkun ?>"
                                data-no="<?= $coa->no ?>"  
								data-name="<?= $coa->nama ?>" 
								data-kelompok="<?= $coa->kelompok ?>" 
								onClick="pilihDaftarAkun(this)">Pilih</button>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
    </div>
</div>
