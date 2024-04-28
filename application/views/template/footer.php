            <footer class="w-100 py-18 px-16 py-sm-24 px-sm-32 hp-bg-color-black-10 hp-bg-color-dark-100">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-6">
                        <p class="hp-badge-text mb-0 text-center text-sm-start hp-text-color-dark-30">COPYRIGHT ©2023 FINANCE PRETTYWELL, All rights Reserved</p>
                    </div>

                    <div class="col-12 col-sm-6 mt-8 mt-sm-0 text-center text-sm-end">
                        <a href="https://hypeople-studio.gitbook.io/yoda/change-log" target="_blank" class="hp-badge-text hp-text-color-dark-30">🥁 Version: Dev 1.0</a>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <div class="scroll-to-top">
        <button type="button" class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"></path>
                </g>
            </svg>
        </button>
    </div>

    <!-- Plugin -->
    <script src="<?= base_url()?>assets/app-assets/js/plugin/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/app-assets/js/plugin/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/app-assets/js/plugin/swiper-bundle.min.js"></script>
    <script src="<?= base_url()?>assets/app-assets/js/plugin/jquery.mask.min.js"></script>
    <script src="<?= base_url()?>assets/app-assets/js/plugin/autocomplete.min.js"></script>
    <script src="<?= base_url()?>assets/app-assets/js/plugin/moment.min.js"></script>

    <!-- Layouts -->
    <script src="<?= base_url()?>assets/app-assets/js/layouts/header-search.js"></script>
    <script src="<?= base_url()?>assets/app-assets/js/layouts/sider.js"></script>
    <script src="<?= base_url()?>assets/app-assets/js/components/input-number.js"></script>

    <!-- Base -->
    <script src="<?= base_url()?>assets/app-assets/js/base/index.js"></script>

    <!-- Charts -->
    <script src="<?= base_url()?>assets/app-assets/js/plugin/apexcharts.min.js"></script>
    <script src="<?= base_url()?>assets/app-assets/js/charts/apex-chart.js"></script>

    <!-- Cards -->
    <script src="<?= base_url()?>assets/app-assets/js/cards/card-analytic.js"></script>
    <script src="<?= base_url()?>assets/app-assets/js/cards/card-advance.js"></script>
    <script src="<?= base_url()?>assets/app-assets/js/cards/card-statistic.js"></script>

    <!-- Horizontal -->
    <script src="<?= base_url()?>assets/app-assets/js/layouts/horizontal-menu.js"></script>

    <!-- Custom -->
    <script src="<?= base_url()?>assets/assets/js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url()?>assets/assets/js/transaksi-pembelian.js"></script>
    <script src="<?= base_url()?>assets/assets/js/gudang.js"></script>
    <script src="<?= base_url()?>assets/assets/js/retur-penjualan.js"></script>
    <script src="<?= base_url()?>assets/assets/js/tambah-jurnal.js"></script>

	<script>
		  window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
        }, 5000);
		$(document).ready(function() {
			$('#detai_cart').load("<?= base_url()?>cart/load_cart");
			$('#detai_cart_ju   ').load("<?= base_url()?>cart/load_cart_ju");
			$('#total').load("<?= base_url()?>cart/total");
			$('#totQty').load("<?= base_url()?>cart/total_qty");
			$('#totDiskon').load("<?= base_url()?>cart/total_diskon");
			$('#totPajak').load("<?= base_url()?>cart/total_pajak");
			$('#totProduk').load("<?= base_url()?>cart/total_produk");
			$('#totalBruto').load("<?= base_url()?>cart/total_bruto");
		});	
		$(document).ready(function () {
			$('#cart_pesanan').load("<?= base_url()?>cart/load_cart_pesanan");
		});
		$(document).ready(function () {
			$('#cart_retur').load("<?= base_url()?>cart/load_cart_retur");
		});
	</script>
</body>

</html>
