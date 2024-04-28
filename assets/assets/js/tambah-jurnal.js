
function pilihDaftarAkun(element) {
	
	const id = $(element).data('id');
	const no = $(element).data('no');
	const name = $(element).data('name');
	const kelompok = $(element).data('kelompok');
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	$.ajax({
		type: "POST",
		url:  BASE_URL + '/' + 'Cart/addCartJU',
		data: {"id_akun": id, "akun" : name, "kelompok" : kelompok},
		success: function (response) {
			console.log('response', response)
			$('#modal_barang').modal('hide');			
			$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart');
			$('#total').load(BASE_URL + '/' + 'Cart/total');
			$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
			$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
			$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
			$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
			$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');	
		}
	});
}

$('#clear-cart').click(function (e) { 
	e.preventDefault();

	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	$.ajax({
		type: "POST",
		url:  BASE_URL + '/' + 'Cart/destroyCart',
		success: function (response) {
			$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart');
			$('#total').load(BASE_URL + '/' + 'Cart/total');
			$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
			$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
			$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
			$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
			$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');
		}
	});
});

//hapus row di detail cart
$(document).on('click','.hapus_cart',function(e){
	e.preventDefault();
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	var row_id=$(this).attr("id"); 
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/hapus_cart',
		method : "POST",
		data : {row_id : row_id},
		success :function(res){			
			$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart');
			$('#total').load(BASE_URL + '/' + 'Cart/total');
			$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
			$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
			$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
			$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
			$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');
		}
	});
});

//update qty

function Qty(element){
	// 
	console.log(element);
    var rowid =  $(element).data('id');
    var qty=  $(element).val(); 
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	// console.log(qty);
    //mengambil row_id dari artibut id
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/update_qty',
		method : "POST",
		data : {rowid:rowid,qty:qty},
		success :function(data){		
			$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart');
			$('#total').load(BASE_URL + '/' + 'Cart/total');
			$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
			$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
			$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
			$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
			$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');
		}
	});
}

function DiskonPresentage(element){
	
    var rowid =  $(element).data('id');
    var diskonPrtg=  $(element).val(); 
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	console.log(diskonPrtg);
    //mengambil row_id dari artibut id
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/update_diskonPrtg',
		method : "POST",
		data : {rowid:rowid,diskonPrtg:diskonPrtg},
		success :function(data){
			$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart');
			$('#total').load(BASE_URL + '/' + 'Cart/total');
			$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
			$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
			$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
			$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
			$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');
		}
	});
}
function DiskonNilai(element){
	
    var rowid =  $(element).data('id');
    var DiskonNilai=  $(element).val(); 
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	console.log(DiskonNilai);
    //mengambil row_id dari artibut id
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/update_DiskonNilai',
		method : "POST",
		data : {rowid:rowid,diskonNilai:DiskonNilai},
		success :function(data){
			$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart');
			$('#total').load(BASE_URL + '/' + 'Cart/total');
			$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
			$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
			$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
			$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
			$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');
		}
	});
}
$(document).on('change','.Pajak',function(e){ 
	e.preventDefault();
	console.log('ok');
	var rowid =  $(this).data('id');
    var Pajak =  $(this).val(); 
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	console.log(Pajak);
    //mengambil row_id dari artibut id
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/update_Pajak',
		method : "POST",
		data : {rowid:rowid,pajak:Pajak},
		success :function(data){
			$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart');
			$('#total').load(BASE_URL + '/' + 'Cart/total');
			$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
			$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
			$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
			$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
			$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');
		}
	});
});
function Pajak(element){
	
    var rowid =  $(element).data('id');
    var Pajak=  $(element).val(); 
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
    //mengambil row_id dari artibut id
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/update_Pajak',
		method : "POST",
		data : {rowid:rowid,pajak:Pajak},
		success :function(data){
			console.log(data);
			$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart');
			$('#total').load(BASE_URL + '/' + 'Cart/total');
			$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
			$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
			$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
			$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
			$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');
		}
	});
}

//store transaksi pembelian
$("#btn-simpan-pembelian").click(function (e) { 
	e.preventDefault();
	const NoPesanan = $('#NoPesanan').val();
	const St = $('#St').val();
	const Supplier = $('#Supplier option:selected').val();
	const Lokasi = $('#Lokasi option:selected').val();
	const TanggalPesanan = $('#TanggalPesanan').val();
	const Keterangan = $('#Keterangan').val();
	const NilaiBruto = $('#totalBruto').text().replace(/[.,]/g, '');;
	const Diskon = $('#totDiskon').text().replace(/[.,]/g, '');;
	const Pajak = $('#totPajak').text().replace(/[.,]/g, '');;
	const Nilai = $('#total').text().replace(/[.,]/g, '');;
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
				url:  BASE_URL + '/' + 'pembelian/Transaksi/addMaster',
				data : {
						NoPesanan:NoPesanan,
						St:St,
						Supplier:Supplier,
						Lokasi:Lokasi,
						TanggalPesanan:TanggalPesanan,
						Keterangan:Keterangan,
						NilaiBruto:NilaiBruto,
						Diskon:Diskon,
						Pajak:Pajak,
						Nilai:Nilai,
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
