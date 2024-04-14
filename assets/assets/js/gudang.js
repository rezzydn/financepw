$(document).ready(function() {
	const QtyTotal = $('#totQty').text()

	console.log('QtyTotal', QtyTotal)
})


function QtyDiterima(element){
	// 
	console.log(element);
    var rowid =  $(element).data('id');
    var qty=  $(element).val(); 
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];
    //mengambil row_id dari artibut id
	$.ajax({
		url:  BASE_URL + '/' + 'Cart/update_qty_diterima',
		method : "POST",
		data : {rowid:rowid,qty:qty},
		success :function(data){
			$('#cart_pesanan').load(BASE_URL + '/' + 'Cart/load_cart_pesanan');	
		}
	});
}

$("#btn-simpan-pesanan-pembelian").click(function (e) { 
	e.preventDefault();
	const NoPesanan = $('#NoPesanan').val();
	const Supplier = $('#Supplier option:selected').val();
	const Lokasi = $('#Lokasi option:selected').val();
	const TanggalPesanan = $('#TanggalPesanan').val();
	const Keterangan = $('#Keterangan').val();
	const totQty = $('#totQty').text();
	const IdProduk = $("#IdProduk").val()
	var uriSegments = window.location.pathname.split('/');
	var BASE_URL = window.location.origin + '/' + uriSegments[1];

	$.ajax({
		type: "POST",
		url:  BASE_URL + '/' + 'gudang/BarangMasuk/addPesananMasuk',
		data : {
				NoPesanan:NoPesanan,
				Supplier:Supplier,
				Lokasi:Lokasi,
				TanggalPesanan:TanggalPesanan,
				Keterangan:Keterangan,
				totQty : totQty,
				IdProduk: IdProduk
			},
		success: function (response) {
		if (response == 'ok') {
			Swal.fire({
				title: 'Are you sure?',
				text: "Anda Akan Menerima QTY Terbilang!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya'
				}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire(
					'Success!',
					'Produk Sudah Diterima Gudang',
					'success'
					)
					location.reload();
				}
				})
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Coba Lagi!',
				  })
			}
		
		}
	});
});
