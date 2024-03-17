$(document).ready(function () {
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	// load cart pesanan on page ready
	$('#cart_retur').load(BASE_URL + '/' + 'Cart/load_cart_retur');	
	$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');	

});

function pilihProdukRetur(element) {
	
	const id = $(element).data('id');
	const name = $(element).data('name');
	const price = $(element).data('price');
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	$.ajax({
		type: "POST",
		url:  BASE_URL + '/' + 'Cart/add',
		data: {"id" : id, "name" : name, "price" : price},
		success: function (response) {
			$('#modal_barang').modal('hide');			
			$('#cart_retur').load(BASE_URL + '/' + 'Cart/load_cart_retur');
			$('#total').load(BASE_URL + '/' + 'Cart/total');
			$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
			$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
			$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
			$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
			$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');	
		}
	});
}

//hapus row di detail cart
$(document).on('click','.hapus_cart_retur',function(e){
	e.preventDefault();
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	var row_id=$(this).attr("id"); 
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/hapus_cart',
		method : "POST",
		data : {row_id : row_id},
		success :function(res){			
			$('#cart_retur').load(BASE_URL + '/' + 'Cart/load_cart_retur');
			$('#total').load(BASE_URL + '/' + 'Cart/total');
			$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
			$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
			$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
			$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
			$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');
		}
	});
});


function QtyRetur(element){
	// 
	console.log(element);
    var rowid =  $(element).data('id');
    var qty=  $(element).val(); 
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
    //mengambil row_id dari artibut id
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/update_qty_retur',
		method : "POST",
		data : {rowid:rowid,qty:qty},
		success :function(data){
			$('#cart_retur').load(BASE_URL + '/' + 'Cart/load_cart_retur');	
			$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');	
			$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');

		}
	});
}

//store retur penjualan
$("#btn-simpan-retur-penjualan").click(function (e) { 
	e.preventDefault();
	const NoPesanan = $('#NoPesanan').val();
	const Supplier = $('#Supplier option:selected').val();
	const Lokasi = $('#Lokasi option:selected').val();
	const TanggalPesanan = $('#TanggalPesanan').val();
	const Keterangan = $('#Keterangan').val();
	const NilaiBruto = $('#totalBruto').text().replace(/[.,]/g, '');;
	
	let uriSegments = window.location.pathname.split('/');
	let BASE_URL = window.location.origin + '/' + uriSegments[1];
	
	Swal.fire({
		title: 'Are you sure?',
		text: "Anda Akan Menyimpan Data Transaksi ini",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes!'
	  }).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				method : "POST",
				url:  BASE_URL + '/' + 'gudang/BarangMasuk/addReturPenjualan',
				data : {
						NoPesanan:NoPesanan,
						Supplier:Supplier,
						Lokasi:Lokasi,
						TanggalPesanan:TanggalPesanan,
						Keterangan:Keterangan,
						NilaiBruto:NilaiBruto,
					},
				beforeSend: function() {
					$.ajax({
						type: "POST",
						url:  BASE_URL + '/' + 'cart/validasiCart',
						success: function (response) {
							if (response == '1') {
								Swal.fire({
								icon: 'warning',
								title: 'Barang harus diisi!',
								})
							}
							return false;
						}
					});
				},	
				success: function (response) {
					console.log(response);
					if (response == 'ok') {
						Swal.fire({
							toast: true,
							title: 'Berhasil',
							text: "Transaksi Berhasil",
							icon: 'success',
							// showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'ok!'
							}).then((result) => {
							if (result.isConfirmed) {					
								$.ajax({
									type: "POST",
									url:  BASE_URL + '/' + 'cart/destroyCart',
									success: function (response) {
										$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart');
										$('#total').load(BASE_URL + '/' + 'Cart/total');
										$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
										$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
										$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
										$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
										$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');
										location.reload();
									}
								});
							}
						})
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Gagal Menambahkan Data!',
						})
						// location.reload();
					}
				}
			});
		}
	  })
	
});
