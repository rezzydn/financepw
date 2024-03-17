
<div class="hp-main-layout-content">

    <div class="row mb-32 gy-32">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a> / Perkiraan Akun
                    </li>
                </ol>
            </nav>
        </div>
		
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col pe-md-32 pe-md-120">
                            <h4>Daftar Perkiraan Akun</h4>
                        </div>
					
                        <div class="col hp-flex-none w-auto">
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#add_perkiraan_akun">
                                <i class="ri-user-add-line remix-icon"></i>
                                <span>Tambah Data</span>
                            </button>
                        </div>
					
						<?php if($this->session->flashdata('success')) { ?>
                                <?= $this->session->flashdata('success') ?>
                            <?php } ?>
                        <div class="col-12 mt-16">
						<table class="table table-hover table-striped " id="example" >
                            <thead>
                                <tr>
                                    <th scope="col">No Akun</th>
                                    <th scope="col">Nama Akun</th>
                                    <th scope="col">Kelompok Akun</th>
                                    <th scope="col">Saldo Awal</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach ($data as $key => $value) { ?>
								<tr>
                                    <th scope="row"><?= $value->no?></th>
                                    <td><?= $value->nama?></td>
                                    <td><?= $value->kelompok?></td>
                                    <td>Rp. <?= number_format($value->saldo_awal)?></td>
                                    <td>
										<a href="<?= base_url('finance/PerkiraanAkun/edit/'.$value->idPerkiraanAkun)?>" class="btn btn-secondary btn-sm m-2">Edit</a>
										<a href="<?= base_url('finance/PerkiraanAkun/delete/'.$value->idPerkiraanAkun)?>" class="btn btn-danger btn-sm m-2" onclick="return confirm('are you sure?')">Delete</a>
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

<div class="modal fade" id="add_perkiraan_akun" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-16 px-24">
                <h5 class="modal-title" id="addNewUserLabel">Tambah Perkiraan Akun</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider m-0"></div>

			<form action="<?= base_url('master/PerkiraanAkun/store')?>" method="POST">
                <div class="modal-body">
                    <div class="row gx-8">
                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    No Akun
                                </label>
                                <input type="text" class="form-control" name="no_akun" placeholder="No. Akun ..">
                            </div>
                        </div>

                        <div class="col-12 col-md-12">
							<div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Nama Akun
                                </label>
                                <input type="text" class="form-control" name="nama_akun" placeholder="Nama Akun ..">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="email" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Kelompok Akun
                                </label>
                                <input type="text" class="form-control" name="kel_akun" placeholder="Kelompok Akun ..">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Saldo Awal
                                </label>
                                <input type="number" class="form-control" name="saldo_awal" placeholder="Saldo Awal ..">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer pt-0 px-24 pb-24">
                    <div class="divider"></div>

                    <button type="submit" class="m-0 btn btn-primary w-100">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
