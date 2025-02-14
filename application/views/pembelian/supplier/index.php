<div class="hp-main-layout-content">

    <div class="row mb-32 gy-32">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('Dashboard')?>">Home</a> / Supplier
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col pe-md-32 pe-md-120">
                            <h4>Daftar Supplier</h4>
                        </div>

                        <div class="col hp-flex-none w-auto">
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#add_supplier">
                                <i class="ri-user-add-line remix-icon"></i>
                                <span>Tambah Data</span>
                            </button>
                        </div>

						<?php if($this->session->flashdata('success')) { ?>
                                <?= $this->session->flashdata('success') ?>
                            <?php } ?>
                        <div class="col-12 mt-16">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Supplier</th>
                                        <th scope="col">Nama Supplier</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Telepon</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $no = 1;
                                    foreach ($data as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $value->kode?></td>
                                        <td><?= $value->nama?></td>
                                        <td><?= $value->alamat?></td>
                                        <td><?= $value->no_telp?></td>
                                        <td><?= $value->email?></td>
                                        <td>
                                            <a href="<?= base_url('pembelian/Supplier/edit/'.$value->idSupplier)?>" class="btn btn-warning btn-sm m-2">Edit</a>
                                            <a href="<?= base_url('pembelian/Supplier/delete/'.$value->idSupplier)?>" class="btn btn-danger btn-sm m-2" onclick="return confirm('are you sure?')">Delete</a>
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
                <h5 class="modal-title" id="addNewUserLabel">Tambah Supplier</h5>
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
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
									Kode Supplier
                                </label>
                                <input type="text" class="form-control" name="kode" placeholder="Kode ..">
                            </div>
                        </div>

                        <div class="col-12 col-md-12">
							<div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Nama Supplier
                                </label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama ..">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="email" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Email
                                </label>
                                <input type="email" class="form-control" name="email" placeholder="Email ..">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    No Telepon
                                </label>
                                <input type="number" class="form-control" name="no_telp" placeholder="No Telp ..">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Alamat
                                </label>
                                <textarea type="text" class="form-control" name="alamat" placeholder="Alamat .."></textarea>
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
