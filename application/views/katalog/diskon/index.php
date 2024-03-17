<div class="hp-main-layout-content">

    <div class="row mb-32 gy-32">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('Dashboard')?>">Home</a> / Diskon
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col pe-md-32 pe-md-120">
                            <h4>Data Diskon</h4>
                        </div>

                        <div class="col hp-flex-none w-auto">
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#add_supplier">
                                <i class="ri-user-add-line remix-icon"></i>
                                <span>Tambah Data</span>
                            </button>
                        </div>


                        <div class="col-12 mt-16">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Produk Diskon</th>
                                        <th scope="col">Jumlah Diskon</th>
                                        <th scope="col">Kode Diskon</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach($discount as $row ) { ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $row->name_discount?></td>
                                        <td><?= $this->M_Crud->format_harga($row->price)?></td>
                                        <td><?= $row->kode_discount?></td>
                                        <td><?= $row->status?></td>
                                        <td>
                                            <div class="col hp-flex-none w-auto">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Ubah
                                                    </button>

                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:;">Aktif</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:;">Nonaktif</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
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
    </div>

</div>

<div class="modal fade" id="add_supplier" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-16 px-24">
                <h5 class="modal-title" id="addNewUserLabel">Tambah Customer</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider m-0"></div>

            <form action="<?= base_url('pembelian/Supplier/store')?>" method="POST">
                <div class="modal-body">
                    <div class="row gx-8">
                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label for="kode" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Kode Supplier
                                </label>
                                <input type="text" class="form-control" name="kode">
                            </div>
                        </div>

                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label for="userName" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Nama Lengkap
                                </label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="email" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Email
                                </label>
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="phone" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    No. Telp
                                </label>
                                <input type="text" class="form-control" name="no_telp">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-24">
                                <label for="aboutText" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer pt-0 px-24 pb-24">
                    <div class="divider"></div>

                    <button type="submit" class="m-0 btn btn-primary w-100">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>