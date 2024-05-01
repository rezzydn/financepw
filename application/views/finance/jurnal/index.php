
<div class="hp-main-layout-content">

    <div class="row mb-32 gy-32">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('admin/Dashboard')?>">Home</a> / Jurnal
                    </li>
                </ol>
            </nav>
        </div>
		
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col pe-md-32 pe-md-120">
                            <h4>Jurnal</h4>
                        </div>

                        <div class="col hp-flex-none w-auto">
                            <button type="button" class="btn btn-outline w-100" data-bs-toggle="modal" data-bs-target="#add_perkiraan_akun">
                                <i class="ri-gallery-upload-line remix-icon"></i>
                                <span>Export</span>
                            </button>
                        </div>

                        <div class="col hp-flex-none w-auto">
                            <a href="<?= base_url('finance/Jurnal/create')?>" class="btn btn-primary w-100">
                                <i class="ri-add-line remix-icon"></i>
                                <span>Tambah Baru</span>
                            </a>
                        </div>

                        <div class="col-12 col-md-4 col-xl-2">
                            <div class="input-group align-items-center">
                                <span class="input-group-text bg-white hp-bg-dark-100 border-end-0 pe-0">
                                    <i class="iconly-Curved-Calendar text-black-80" style="font-size: 16px;"></i>
                                </span>
                                <input type="date" class="form-control border-start-0 ps-8" placeholder="Tanggal Awal">
                            </div>
                        </div>

                        <div class="col-12 col-md-4 col-xl-2">
                            <div class="input-group align-items-center">
                                <span class="input-group-text bg-white hp-bg-dark-100 border-end-0 pe-0">
                                    <i class="iconly-Curved-Calendar text-black-80" style="font-size: 16px;"></i>
                                </span>
                                <input type="date" class="form-control border-start-0 ps-8" placeholder="Tanggal Akhir">
                            </div>
                        </div>
					
                        <div class="col hp-flex-none w-auto">
                            <a href class="btn btn-primary w-60">
                                <span>Terapkan</span>
                            </a>
                        </div>
					
						<?php if($this->session->flashdata('success')) { ?>
                                <?= $this->session->flashdata('success') ?>
                            <?php } ?>
                        <div class="col-12 mt-16">
						<table class="table table-hover table-striped " id="example" >
                            <thead>
                                <tr>
                                    <th scope="col">No. Jurnal</th>
                                    <th scope="col">Tanggal Jurnal</th>
                                    <th scope="col">Sumber</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col">Tipe Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach ($jurnals as $key => $value) { 
                                ?>
                                <tr>
                                    <th scope="row"><a href="<?= base_url('admin/finance/Jurnal/detail')?>"><b><?= $value['no_jurnal'] ?></b></a></th>
                                    <td><?= $value['tgl_jurnal'] ?></td>
                                    <td><?= $value['sumber'] ?></td>
                                    <td>Rp. <?= number_format($value['nominal']) ?></td>
                                    <td><?= $value['keterangan'] ?></td>
                                    <td>
                                        <?php if ($value['sumber'] == 'Jurnal Umum') {
                                            echo '<span class="badge rounded-pill text-warning bg-secondary-4 hp-bg-dark-warning border-warning">Manual</span>';
                                        } else if ($value['sumber'] == 'Pembelian' || $value['sumber'] == 'Penjualan'){
                                            echo '<span class="badge rounded-pill text-dark bg-secondary-4 hp-bg-dark-dark border-dark">Otomatis</span>';
                                        } else {
                                            echo '-';
                                        }
                                        ?>
									</td>
                                    <td>
                                        <?php if ($value['sumber'] == 'Jurnal Umum') {
                                            echo 'Manual - Transaksi ' . $value['sumber'];
                                        } else if ($value['sumber'] == 'Pembelian' || $value['sumber'] == 'Penjualan'){
                                            echo "Otomatis - Transaksi " . $value['sumber'];
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                </tr>
								<!-- <tr>
                                    <th scope="row"><a href="<?= base_url('admin/finance/Jurnal/detail')?>"><b>JU-00001</b></a></th>
                                    <td>01 Juli 2023 09:35</td>
                                    <td>Jurnal Umum</td>
                                    <td>Rp. 1.500.000</td>
                                    <td>-</td>
                                    <td>
                                        <span class="badge rounded-pill text-warning bg-secondary-4 hp-bg-dark-warning border-warning">Manual</span>
									</td>
                                    <td>Transaksi Jurnal</td>
                                </tr>

                                <tr>
                                <th scope="row"><a href="<?= base_url('admin/finance/Jurnal/detail')?>"><b>JU-00002</b></a></th>
                                    <td>01 Juli 2023 10:39</td>
                                    <td>Pembelian</td>
                                    <td>Rp. 15.000.000</td>
                                    <td>Transaksi Pembelian Restock</td>
                                    <td>
                                        <span class="badge rounded-pill text-dark bg-secondary-4 hp-bg-dark-dark border-dark">Otomatis</span>
									</td>
                                    <td>Otomatis - Transaksi Pembelian</td>
                                </tr> -->
                                <?php } ?>
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
