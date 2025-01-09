const uriSegments = window.location.pathname.split('/');
const BASE_URL = window.location.origin + '/' + uriSegments[1];

function callResponseForSummary() {
	$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart');
	$('#total').load(BASE_URL + '/' + 'Cart/total');
	$('#totQty').load(BASE_URL + '/' + 'Cart/total_qty');
	$('#totDiskon').load(BASE_URL + '/' + 'Cart/total_diskon');
	$('#totPajak').load(BASE_URL + '/' + 'Cart/total_pajak');
	$('#totProduk').load(BASE_URL + '/' + 'Cart/total_produk');
	$('#totalBruto').load(BASE_URL + '/' + 'Cart/total_bruto');	
}

function pilihProdukPembelian(element) {
	const id = $(element).data('id');
	const name = $(element).data('name');
	const price = $(element).data('price');
	$.ajax({
		type: "POST",
		url:  BASE_URL + '/' + 'Cart/add',
		data: {"id" : id, "name" : name, "price" : price},
		success: function (response) {
			$('#modal_barang').modal('hide');			
			callResponseForSummary()
		},
		error: function (xhr, status, error) {
			console.error("AJAX Error: ", status, error);
		}
	});
}

$('#clear-cart').click(function (e) { 
	e.preventDefault();

	$.ajax({
		type: "POST",
		url:  BASE_URL + '/' + 'Cart/destroyCart',
		success: function (response) {
			callResponseForSummary()
		}
	});
});

//hapus row di detail cart
$(document).on('click','.hapus_cart',function(e){
	e.preventDefault();
	var row_id=$(this).attr("id"); 
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/hapus_cart',
		method : "POST",
		data : {row_id : row_id},
		success :function(res){			
			callResponseForSummary()
		}
	});
});

//update qty

function Qty(element){
    var rowid =  $(element).data('id');
    var qty=  $(element).val(); 

	let listId = $(element).data('list_id')
	let diskonPrtg = $(`.diskonPrtg_${listId}`).val()
	let productPrice = $(element).data('price');
	let pajak = $(`.pajak_${listId}`).val()

    //mengambil row_id dari artibut id
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/update_qty',
		method : "POST",
		data : {rowid:rowid,qty:qty,pajak:pajak},
		success :function(data){		
			callResponseForSummary()

			if(diskonPrtg > 0) {
				$.ajax({
					url:  BASE_URL + '/' + 'Cart/update_diskonPrtg',
					method : "POST",
					data : {rowid:rowid,diskonPrtg:diskonPrtg,productPrice:productPrice,qty:qty,pajak:pajak},
					success :function(data){
						callResponseForSummary()
					}
				});
			}
		}
	});
}

function DiskonPresentage(element){
	
    var rowid =  $(element).data('id');
    var diskonPrtg=  $(element).val(); 

	let listId = $(element).data('list_id')
	let qty = $(`.qty_${listId}`).data('qty')
	let productPrice = $(element).data('price');
	let pajak = $(`.pajak_${listId}`).val()

    //mengambil row_id dari artibut id
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/update_diskonPrtg',
		method : "POST",
		data : {rowid:rowid,diskonPrtg:diskonPrtg,productPrice:productPrice,qty:qty,pajak:pajak},
		success :function(data){
			callResponseForSummary()
		}
	});
}

function DiskonNilai(element){
	
    var rowid =  $(element).data('id');
    var DiskonNilai=  $(element).val(); 
    //mengambil row_id dari artibut id
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/update_DiskonNilai',
		method : "POST",
		data : {rowid:rowid,diskonNilai:DiskonNilai},
		success :function(data){
			callResponseForSummary()
		}
	});
}
$(document).on('change','.Pajak',function(element){ 
	element.preventDefault();
	console.log('ok');
	var rowid =  $(this).data('id');
    var Pajak =  $(this).val(); 

	let listId = $(this).data('list_id')
	let diskonNilai = $(`.diskonNilai_${listId}`).val()
	let diskonPrtg = $(`.diskonPrtg_${listId}`).val()
	let qty = $(`.qty_${listId}`).data('qty')
	let productPrice = $(`.qty_${listId}`).data('price')


    //mengambil row_id dari artibut id
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/update_Pajak',
		method : "POST",
		data : {
				rowid:rowid,
				pajak:Pajak,
				qty:qty,
				productPrice:productPrice,
				diskonPrtg: diskonPrtg,
				diskonNilai: diskonNilai
			},
		success :function(data){
			callResponseForSummary()
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
			callResponseForSummary()
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
										callResponseForSummary()
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
