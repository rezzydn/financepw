<div class="hp-main-layout-content">

    <div class="row mb-32 gy-32">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('Dashboard')?>">Home</a> / Gudang / Barang Keluar
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col pe-md-32 pe-md-120">
                            <h4>Barang Keluar</h4>
                        </div>

                        <div class="col-12 mt-16">
                            <div class="row">

                                <div class="col-12 col-lg-12">
                                    <ul class="nav nav-pills mb-12" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pesanan-pembelian-tab" data-bs-toggle="pill" data-bs-target="#return-pembelian" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Return Pembelian</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#transfer-keluar" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Transfer Keluar</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="return-pembelian" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row justify-content-between">
                                                        <div class="col pe-md-32 pe-md-120">
                                                            <h4>Pesanan Pembelian</h4>
                                                        </div>

                                                        <div class="col hp-flex-none w-auto">
                                                            <a href="#" class="btn btn-outline-secondary">
                                                                <i class="iconly-Broken-PaperUpload"></i> | Export
                                                            </a>
                                                            <a href="#" class="btn btn-secondary">
                                                                <i class="iconly-Broken-Plus"></i> | Tambah Baru
                                                            </a>
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
                                                                        <th scope="col">Nama Supplier</th>
                                                                        <th scope="col">Lokasi</th>
                                                                        <th scope="col">No. Referensi</th>
                                                                        <th scope="col">Keterangan</th>
                                                                        <th scope="col">Total QTY</th>
                                                                        <th scope="col">Opsi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">RTO-0000001</th>
                                                                        <td>22 Juni 2023 10:35</td>
                                                                        <td>PT. Rezy Abadi Jaya </td>
                                                                        <td>Gudang</td>
                                                                        <td>BIL-000001</td>
                                                                        <td>Return CeraMON 50mL pack problem.</td>
                                                                        <td>500 Pcs</td>
                                                                        <td>
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
                                        <div class="tab-pane fade" id="transfer-keluar" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row justify-content-between">
                                                        <div class="col pe-md-32 pe-md-120">
                                                            <h4>Transfer Keluar</h4>
                                                        </div>

                                                        <div class="col hp-flex-none w-auto">
                                                            <a href="#" class="btn btn-outline-secondary">
                                                                <i class="iconly-Broken-PaperUpload"></i> | Export
                                                            </a>
                                                            <a href="#" class="btn btn-outline-secondary">
                                                                <i class="iconly-Broken-PaperDownload"></i> | Import
                                                            </a>
                                                            <a href="#" class="btn btn-secondary">
                                                                <i class="iconly-Broken-Plus"></i> | Tambah Baru
                                                            </a>
                                                        </div>

                                                        <?php if($this->session->flashdata('success')) { ?>
                                                                <?= $this->session->flashdata('success') ?>
                                                            <?php } ?>
                                                        <div class="col-12 mt-16">
                                                            <table class="table table-hover table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">No. Transfer</th>
                                                                        <th scope="col">Tanggal</th>
                                                                        <th scope="col">Lokasi Asal</th>
                                                                        <th scope="col">Tujuan</th>
                                                                        <th scope="col">Keterangan</th>
                                                                        <th scope="col">Dibuat Oleh</th>
                                                                        <th scope="col">Opsi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">TFO-0000001</th>
                                                                        <td>22 Juni 2023 10:35</td>
                                                                        <td>Gudang</td>
                                                                        <td>Distributor 1</td>
                                                                        <td>Restock Distributor 1 CeraMON 50mL</td>
                                                                        <td>Admin 1 | admin@gmail.com </td>
                                                                        <td>
                                                                            <a href="" class="btn btn-primary btn-sm m-2">Cetak</a>
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