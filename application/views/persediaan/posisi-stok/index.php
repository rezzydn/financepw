<div class="hp-main-layout-content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col pe-md-32 pe-md-120">
                        <h4>Posisi Stok</h4>
                        <!-- <span class="badge rounded-pill text-secondary bg-secondary-4 hp-bg-dark-secondary border-secondary">On Hand</span>
                        <span class="badge rounded-pill text-warning bg-secondary-4 hp-bg-dark-warning border-warning">On Order</span>
                        <span class="badge rounded-pill text-success bg-secondary-4 hp-bg-dark-success border-success">Reserved</span>
                        <span class="badge rounded-pill text-dark bg-secondary-4 hp-bg-dark-dark border-dark">Available</span> -->
                    </div>

                    <div class="col hp-flex-none w-auto">
                        
                        <a href="#" class="btn btn-outline-secondary">
                            <i class="iconly-Broken-PaperUpload"></i> | Export
                        </a>
                    </div>

                    <div class="col-12 mt-16">
                        <table class="table table-hover table-striped " id="example" >
                            <thead>
                                <tr>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col">Harga Pokok</th>
                                    <th scope="col">Stok Gudang</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php 
                                    $no = 1;
                                    foreach ($stocks as $key => $value) { 
                                ?>
                                    <tr>
                                        <th scope="row"><?= $value->nama_produk ?></th>
                                        <td>
                                            <span class="badge rounded-pill text-info bg-info-4 hp-bg-dark-info border-info">
                                                <span class="spinner-grow spinner-grow-sm me-8" role="status" aria-hidden="true"></span>
                                                Satuan
                                            </span></td>
                                        <td>Rp. <?= $value->nilai ?></td>
                                        <td>
                                            <span class="badge rounded-pill text-secondary bg-secondary-4 hp-bg-dark-secondary border-secondary"><?= $value->qty_total ?></span>
                                            <!-- <span class="badge rounded-pill text-warning bg-secondary-4 hp-bg-dark-warning border-warning">0</span>
                                            <span class="badge rounded-pill text-success bg-secondary-4 hp-bg-dark-success border-success">0</span>
                                            <span class="badge rounded-pill text-dark bg-secondary-4 hp-bg-dark-dark border-dark">0</span> -->
                                        </td>
                                    </tr>
                                <?php
                                    } 
                                ?>
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
