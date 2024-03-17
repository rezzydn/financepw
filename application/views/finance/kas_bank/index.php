<div class="hp-main-layout-content">

    <div class="row mb-32 gy-32">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('Dashboard')?>">Home</a> / Finance / Kas & Bank
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col pe-md-32 pe-md-120">
                            <h4>Kas & Bank</h4>
                        </div>

                        <div class="col-12 mt-16">
                            <div class="row">

                                <div class="col-12 col-lg-12">
                                    <ul class="nav nav-pills mb-12" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pill-kas-tab" data-bs-toggle="pill" data-bs-target="#pills-kas" type="button" role="tab" aria-controls="pills-kas" aria-selected="true">Kas</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-bank-tab" data-bs-toggle="pill" data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank" aria-selected="false">Bank</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-rekonsiliasi-tab" data-bs-toggle="pill" data-bs-target="#pills-rekonsiliasi" type="button" role="tab" aria-controls="pills-rekonsiliasi" aria-selected="false">Rekonsiliasi Bank</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-transaksi-tab" data-bs-toggle="pill" data-bs-target="#pills-transaksi" type="button" role="tab" aria-controls="pills-transaksi" aria-selected="false">Transaksi</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-kas" role="tabpanel" aria-labelledby="pills-kas-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row justify-content-between">
                                                        <div class="col pe-md-32 pe-md-120">
                                                            <h4>Kas</h4>
                                                        </div>

                                                        <?php if($this->session->flashdata('success')) { ?>
                                                                <?= $this->session->flashdata('success') ?>
                                                        <?php } ?>
                                                        <div class="col-12 mt-16">
                                                            <div class="row mx-0">
                                                                
                                                                <div class="w-auto px-0 me-16">
                                                                    <div class="card" style="max-width: 18rem;">
                                                                        <img src="<?= base_url()?>assets/images/kas.png" alt="Card Title" class="card-img-top">

                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Saldo : Rp. 50.000.000</h5>
                                                                            <p class="card-text hp-p1-body">Nominal yang terdapat pada akun Kas (1 - 1000) di semua transaksi jurnal.</p>
                                                                            <a href="#" class="btn btn-primary">Kas</a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="w-auto px-0 me-16">
                                                                    <div class="card" style="max-width: 18rem;">
                                                                        <img src="<?= base_url()?>assets/images/bank.png" alt="Card Title" class="card-img-top">

                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Saldo : Rp. 0</h5>
                                                                            <p class="card-text hp-p1-body">Nominal yang terdapat pada akun Bank (1 - 1001) di semua transaksi jurnal.</p>
                                                                            <a href="#" class="btn btn-primary">Bank</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                        <div class="tab-pane fade" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
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
                                                                    <a class="dropdown-item" href="javascript:;">Penerimaan Pembelian</a>
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
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">BIL-0000001</th>
                                                                        <td>22 Juni 2023</td>
                                                                        <td>Gudang</td>
                                                                        <td>PO-000001</td>
                                                                        <td>Admin 1 </td>
                                                                        <td>
                                                                            0/500
                                                                        </td>
                                                                        <td>Restock CeraMON 50mL 500pcs.</td>
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
                                        <div class="tab-pane fade" id="pills-rekonsiliasi" role="tabpanel" aria-labelledby="pills-rekonsiliasi-tab">
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
                                        <div class="tab-pane fade" id="pills-transaksi" role="tabpanel" aria-labelledby="pills-transaksi-tab">
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