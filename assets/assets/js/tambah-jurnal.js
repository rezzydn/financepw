
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
			$('#modal_barang').modal('hide');			
			$('#detai_cart_ju').load(BASE_URL + '/' + 'Cart/load_cart_ju');
			$('#tot_debit').load(BASE_URL + '/' + 'Cart/totalDebitJU');
			$('#tot_kredit').load(BASE_URL + '/' + 'Cart/totalKreditJU');
			$('#selisih').load(BASE_URL + '/' + 'Cart/selisihJU');
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
			$('#detai_cart_ju').load(BASE_URL + '/' + 'Cart/load_cart_ju');
			$('#tot_debit').load(BASE_URL + '/' + 'Cart/totalDebitJU');
			$('#tot_kredit').load(BASE_URL + '/' + 'Cart/totalKreditJU');
			$('#selisih').load(BASE_URL + '/' + 'Cart/selisihJU');
		}
	});
});

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
			$('#detai_cart_ju').load(BASE_URL + '/' + 'Cart/load_cart_ju');
			$('#tot_debit').load(BASE_URL + '/' + 'Cart/totalDebitJU');
			$('#tot_kredit').load(BASE_URL + '/' + 'Cart/totalKreditJU');
			$('#selisih').load(BASE_URL + '/' + 'Cart/selisihJU');
		}
	});
});

function changeDebit(element){
	// 
    var rowid 	=  $(element).data('id');
    var debit	=  $(element).val(); 
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/updateDebitJU',
		method : "POST",
		data : {rowid:rowid,debit:debit},
		success :function(data){		
			$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart_ju');
			$('#tot_debit').load(BASE_URL + '/' + 'Cart/totalDebitJU');
			$('#tot_kredit').load(BASE_URL + '/' + 'Cart/totalKreditJU');
			$('#selisih').load(BASE_URL + '/' + 'Cart/selisihJU');
		}
	});
}

function changeKredit(element){
    var rowid 	=  $(element).data('id');
    var kredit	=  $(element).val(); 
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/updateKreditJU',
		method : "POST",
		data : {rowid:rowid,kredit:kredit},
		success :function(data){		
			$('#detai_cart_ju').load(BASE_URL + '/' + 'Cart/load_cart_ju');
			$('#tot_debit').load(BASE_URL + '/' + 'Cart/totalDebitJU');
			$('#tot_kredit').load(BASE_URL + '/' + 'Cart/totalKreditJU');
			$('#selisih').load(BASE_URL + '/' + 'Cart/selisihJU');
		}
	});
}

$("#btn-simpan-jurnal-umum").click(function (e) { 
	e.preventDefault();
	const NoJurnal = $('#NoJurnal').val();
	const TanggalJurnal = $('#TanggalJurnal').val();
	const keterangan = $('#Keterangan').val();
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
				url:  BASE_URL + '/' + 'finance/Jurnal/store',
				data : {
						NoJurnal:NoJurnal,
						TanggalJurnal:TanggalJurnal,
						keterangan:keterangan,
					},
				success: function (response) {
					let resp = JSON.parse(response);
					console.log(resp);
					console.log(resp.code);
					if (resp.code == '200') {
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
										$('#detai_cart').load(BASE_URL + '/' + 'Cart/load_cart_ju');
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

$("#btn-reset-filter").click(function (e) {
	e.preventDefault()
	let url = window.location.href;
	url 	= url.split('?')[0];
	window.location.replace(url);
})
