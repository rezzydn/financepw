<div class="hp-main-layout-content">

    <div class="row mb-32 gy-32">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('Dashboard')?>">Home</a> / Persediaan / Monitoring Stok
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col pe-md-32 pe-md-120">
                            <h4>Monitor Stok</h4>
                        </div>

                        <div class="col-12 mt-16">
                            <div class="row">

                                <div class="col-12 col-lg-12">
                                    <ul class="nav nav-pills mb-12" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" href="<?= base_url('persediaan/MonitorStok/index')?>">Stok Kosong</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" href="<?= base_url('persediaan/MonitorStok/menipis')?>" >Stok Menipis</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" href="<?= base_url('persediaan/MonitorStok/palinglaku')?>" >Paling Laku</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pesanan-pembelian" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row justify-content-between">
                                                        <div class="col pe-md-32 pe-md-120">
                                                            <h4>Stok Menipis</h4>
                                                        </div>

                                                        <div class="col hp-flex-none w-auto">
                                                            <a href="#" class="btn btn-outline-secondary">
                                                                <i class="iconly-Broken-PaperUpload"></i> | Export
                                                            </a>
                                                        </div>

                                                        <?php if($this->session->flashdata('success')) { ?>
                                                                <?= $this->session->flashdata('success') ?>
                                                            <?php } ?>
                                                        <div class="col-12 mt-16">
                                                            <table class="table table-hover table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col"></th>
                                                                        <th scope="col">Nama Produk</th>
                                                                        <th scope="col">Lokasi</th>
                                                                        <th scope="col">On Hand</th>
                                                                        <th scope="col">On Order</th>
                                                                        <th scope="col">Tersedia</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach($products as $row) { ?>
																		<tr>
																			<td><img src="<?= base_url('assets/images/products-pw/'.$row->pic_1); ?>" height="20"></td>																			
																			<td><?= $row->product_name?></td>
																			<td>Gudang</td>
																			<td>10</td>
																			<td>10</td>
                                                                            <td><?= $row->stock?></td>
																			<td>
																				<a class="btn btn-secondary btn-sm">Lihat Produk</a>
																			</td>
																		</tr>
																	<?php }?>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="col-12 mt-24 hljs-container">
                                                            <pre>
                                                                <code class="html" data-component='table' data-code='striped-rows'></code>
                                                            </pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row justify-content-between">
                                                        <div class="col pe-md-32 pe-md-120">
                                                            <h4>Penerimaan Barang</h4>
                                                        </div>

                                                        <div class="col hp-flex-none w-auto">
                                                            <a href="#" class="btn btn-outline-secondary">
                                                                <i class="iconly-Broken-PaperUpload"></i> | Export
                                                            </a>
                                                            <a class="btn btn-primary dropdown-toggle" href="javascript:;" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:5px;">
                                                                Tambah Baru
                                                            </a>

                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <li>
																	<a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Penerimaan Pembelian</a>
                                                                    <!-- <a class="dropdown-item" href="javascript:;">Penerimaan Pembelian</a> -->
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:;">Retur Pembelian</a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:;">Transfer Masuk</a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <?php if($this->session->flashdata('success')) { ?>
                                                                <?= $this->session->flashdata('success') ?>
                                                            <?php } ?>
                                                        <div class="col-12 mt-16">
                                                            <table class="table table-hover table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Nomor</th>
                                                                        <th scope="col">Tanggal</th>
                                                                        <th scope="col">Lokasi</th>
                                                                        <th scope="col">Sumber</th>
                                                                        <th scope="col">Dikerjakan Oleh</th>
                                                                        <th scope="col">Progress</th>
                                                                        <th scope="col">Keterangan</th>
                                                                        <!-- <th scope="col">Action</th> -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
																	<?php foreach ($data as $key => $value) { ?>
																		<tr>
																			<th scope="row"><?= $value->no_terima?></th>
																			<td><?= date('d M Y' ,strtotime($value->tanggal_pesanan))?></td>
																			<td><?= $value->lokasi?></td>
																			<td><?= $value->no_pesanan?></td>
																			<td><?= $value->user?></td>
																			<td>
																				<span <?= $value->StatusInt1 < $value->StatusInt1 ? 'class="text-warning"' : 'class="text-success"' ;?>>
																					<?= $value->StatusInt1?>/<?= $value->StatusInt1?>
																				</span>
																			</td>
																			<td><?= $value->keterangan?></td>
																			<!-- <td>
																				<a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</a>
																			</td> -->
																		</tr>
																	<?php }?>
                                                                </tbody>
                                                            </table>
                                                        </div>
														<!-- Modal -->
														<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="staticBackdropLabel">Stock Yang Diterima</h5>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
																	<table class="table table-hover table-striped">
																	<form>
																		<div class="mb-24">
																			<label for="exampleInputEmail1" class="form-label">Sumber</label>
																			<select class="form-select" aria-label="Default select example">
																				<option selected>-Pilih Sumber-</option>
																				<?php foreach ($sumber as $key => $sum) { ?>
																					<option value="1">One</option>
																				<?php }?>
																			</select>
																		</div>
																		<div class="mb-24">
																			<label for="exampleInputEmail1" class="form-label">Stock Diterima</label>
																			<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
																			<div id="emailHelp" class="form-text">Dari 300</div>
																		</div>
																	</form>
																	</table>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-text" data-bs-dismiss="modal">Close</button>
																			<button type="button" class="btn btn-primary">Understood</button>
																	</div>
																</div>
															</div>
														</div>
														<!-- EndModal -->
                                                        <div class="col-12 mt-24 hljs-container">
                                                            <pre>
                                                                <code class="html" data-component='table' data-code='striped-rows'></code>
                                                            </pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row justify-content-between">
                                                        <div class="col pe-md-32 pe-md-120">
                                                            <h4>Barang Return</h4>
                                                        </div>

                                                        <div class="col hp-flex-none w-auto">
                                                            <a href="#" class="btn btn-outline-secondary">
                                                                <i class="iconly-Broken-PaperUpload"></i> | Export
                                                            </a>
                                                        </div>

                                                        <?php if($this->session->flashdata('success')) { ?>
                                                                <?= $this->session->flashdata('success') ?>
                                                            <?php } ?>
                                                        <div class="col-12 mt-16">
                                                            <table class="table table-hover table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">No. Return</th>
                                                                        <th scope="col">Tanggal</th>
                                                                        <th scope="col">Nama Pelanggan</th>
                                                                        <th scope="col">Status</th>
                                                                        <th scope="col">Nilai</th>
                                                                        <th scope="col">Opsi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">RT-0000001</th>
                                                                        <td>22 Juni 2023</td>
                                                                        <td>Shopee - Rezy Andrean</td>
                                                                        <td>Proses Return</td>
                                                                        <td>Rp. 119.000</td>
                                                                        <td>
                                                                            <a class="btn btn-primary btn-sm m-2 dropdown-toggle" href="javascript:;" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:5px;">
                                                                                Ubah status
                                                                            </a>

                                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="javascript:;">Proses Return</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="javascript:;">Diterima</a>
                                                                                </li>
                                                                            </ul>
                                                                            <a href="" class="btn btn-danger btn-sm m-2">Hapus</a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="col-12 mt-24 hljs-container">
                                                            <pre>
                                                                <code class="html" data-component='table' data-code='striped-rows'></code>
                                                            </pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-24 hljs-container">
                            <pre>
                                <code class="html" data-component='tabs' data-code='basic'></code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
