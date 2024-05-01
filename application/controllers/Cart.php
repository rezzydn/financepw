<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Transaksi');
		// var_dump($this->cart->contents());die;
	}
	
	public function index()
	{
	
	}
	public function dataCart()
	{
		$cart = $this->cart->contents();
		echo json_encode($cart);
	}
	public function add()
	{
		
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => 1,
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
			'options'    => array('DiskonPrtg' => 0,'DiskonNilai' => 0, 'Pajak' => 0),
			'type'	  => 'JP'
		);
		$this->cart->insert($data);		
		echo $this->ShowCart();
	}	
	public function add_retur()
	{
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => 1,
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
			'options'    => array('Deskripsi' => ''),
		);
		$this->cart->insert($data);		
		echo $this->ShowCart();
	}	
	
	public function ShowCart()
	{	
		$output = '';
		$count = 1;
		
		foreach($this->cart->contents() as $items)
		{
			if($items['type'] != 'JU') {
				$select0 = $items['options']['Pajak'] == '0' ? 'selected' : '' ;
				$select10 = $items['options']['Pajak'] == '10' ? 'selected' : '' ;
				$select11 = $items['options']['Pajak'] == '11' ? 'selected' : '' ;
				
				$output .= '
				<tr> 	
					<td>'.$count++.'</td>
					<td>'.$items["name"].'</td>
					<td>'.$items["price"].'</td>
					<td><input style="width: 100px;" type="number"  value="'.$items['qty'].'" id="qty"  data-id="'.$items['rowid'].'" data-qty="'.$items["qty"].'" onchange="Qty(this)"></td>
					<td><input style="width: 100px;" type="number"  value="'.round($items["options"]["DiskonPrtg"],2).'" id="diskonPrtg"  data-id="'.$items['rowid'].'" data-diskonPrtg="'.$items["options"]["DiskonPrtg"].'" onchange="DiskonPresentage(this)"></td>
					<td><input style="width: 100px;" type="number"  value="'.$items["options"]["DiskonNilai"].'" id="diskonNilai"  data-id="'.$items['rowid'].'" data-diskon="'.$items["options"]["DiskonNilai"].'" onchange="DiskonNilai(this)"></td>
					<td>
						<select data-id="'.$items['rowid'].'" class="Pajak">
							<option value="0" '.$select0.'>0 %</option>
							<option value="10" '.$select10.'>10 %</option>
							<option value="11" '.$select11.'>11 %</option>
						</select>
					</td>
					<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">
					Batal</button></td>	
				</tr>
				';
			}
		}
		
		return $output;
	}
	public function cart_pesanan_pembelian()
	{	
		$output = '';
		$count = 1;
		
		foreach($this->cart->contents() as $items)
		{
			if($items['type'] != 'JU') {
				$output .= '
				<tr> 	
					<td>'.$count++.'</td>
					<td>'.$items["name"].'</td>
					<td>'.$items["qty"].'</td>
					<td><input style="width: 100px;" type="number"  value="'.$items['options']['qty_diterima'].'" id="qty"  data-id="'.$items['rowid'].'" data-qty="'.$items['options']["qty_diterima"].'" onchange="QtyDiterima(this)"></td>
				</tr>
				';
			}
		}
		// var_dump($output);die;
		return $output;
	}
	public function cart_retur()
	{	
		$output = '';
		$count = 1;
		
		foreach($this->cart->contents() as $items)
		{
			if($items['type'] != 'JU') {
				$output .= '
				<tr> 	
					<td>'.$count++.'</td>
					<td>'.$items["name"].'</td>
					<td>'.$items["price"].'</td>
					<td><input style="width: 100px;" type="number"  value="'.$items['qty'].'" id="qty"  data-id="'.$items['rowid'].'" data-qty="'.$items['qty'].'" onchange="QtyRetur(this)"></td>
					<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart_retur btn btn-danger btn-xs">
					Batal</button></td>	
				</tr>
				';
			}
		}
		// var_dump($output);die;
		return $output;
	}
	
	function load_cart(){ //load data cart
        echo $this->ShowCart();
    }

	function load_cart_pesanan(){ //load data cart
        echo $this->cart_pesanan_pembelian();
        
    }
	function load_cart_retur(){ //load data cart
        echo $this->cart_retur();
    }
	function load_cart_promo(){ //load data cart
        echo $this->ShowCartPromo();
        
    }
	
	function total()
	{
		$TotalBruto = 0;
		$totDiskon = 0;
		$totPajak = 0;
		foreach($this->cart->contents() as $items) {
			if($items['type'] != 'JU') {
				$TotalBruto += $items['qty'] * $items['price'];
				$totDiskon += $items['options']['DiskonNilai'];
				$totPajak +=  (($items['qty'] * $items['price']) - $items['options']['DiskonNilai']) * ($items['options']['Pajak'] /100) ;
			}
		}

		echo number_format($TotalBruto - $totDiskon + $totPajak);
	}
	function total_qty()
	{
		$qtyTot = 0;
		foreach($this->cart->contents() as $items) {
			if($items['type'] != 'JU') {
				$qtyTot += $items['qty'];
			}
		}
		echo $qtyTot;
	}
	function total_diskon()
	{
		$totDiskon = 0;
		foreach($this->cart->contents() as $items) {
			if($items['type'] != 'JU') {
				$totDiskon += $items['options']['DiskonNilai'];
			}
		}
		echo number_format($totDiskon);
	}
	function total_pajak()
	{
		$totPajak = 0;
		foreach($this->cart->contents() as $items) {
			if($items['type'] != 'JU') {
				$totPajak +=  (($items['qty'] * $items['price']) - $items['options']['DiskonNilai']) * ($items['options']['Pajak'] /100) ;
			}
		}
		echo number_format($totPajak);
	}
	function total_produk()
	{
		// $totProduk = count($this->cart->contents());
		$totProduk = 0;
		foreach ($this->cart->contents() as $item) {
			if ($item['type'] != "JU") {
				$totProduk++;
			}
		}
		echo number_format($totProduk);
	}
	function total_bruto()
	{
		$TotalBruto = 0;
		foreach($this->cart->contents() as $items) {
			if ($items['type'] != "JU") {
				$TotalBruto += $items['qty'] * $items['price'];
			}
		}
		echo number_format($TotalBruto);
	}
	function update_qty(){ //load data cart
		
        $rowid =  $this->input->post('rowid');
        $qty =  $this->input->post('qty');
	
        $data = array(
            'rowid' => $rowid, 
            'qty' => $qty, 
        );
		
        $this->cart->update($data);
        echo $this->load_cart();
    }
	function update_qty_retur(){ //load data cart
		
        $rowid =  $this->input->post('rowid');
        $qty =  $this->input->post('qty');
	
        $data = array(
            'rowid' => $rowid, 
            'qty' => $qty, 
        );
		
        $this->cart->update($data);
        echo $this->load_cart_retur();
  
    }
	function update_diskonPrtg(){ //load data cart
		
        $rowid =  $this->input->post('rowid');
        $DiskonPrtg =  $this->input->post('diskonPrtg');

		$data = array(
            'rowid' => $rowid, 
			'options'    => array('DiskonPrtg' => $DiskonPrtg,'DiskonNilai' => 0, 'Pajak' => 0),
        );
		
        $this->cart->update($data);
        echo $this->load_cart();
  
    }
	function update_DiskonNilai(){ //load data cart
		
        $rowid =  $this->input->post('rowid');
        $DiskonNilai =  $this->input->post('diskonNilai');
		$cartContents = $this->cart->contents();
		$array = array();

		foreach ($cartContents as $item) {
			if ($item['type'] != "JU") {
				$array[$rowid] = $item;
			}
		}
		$DiskonPrtg =(floatval($DiskonNilai) / ($array[$rowid]['qty'] * $array[$rowid]['price'])) * 100; 
		$data = array(
            'rowid' => $rowid, 
			'options' => array('DiskonPrtg' => $DiskonPrtg,'DiskonNilai' => $DiskonNilai, 'Pajak' => 0),
        );
		
        $this->cart->update($data);
        echo $this->load_cart();
  
    }
	function update_qty_diterima(){ //load data cart
		
        $rowid =  $this->input->post('rowid');
        $qty =  $this->input->post('qty');
		$data = array(
            'rowid' => $rowid, 
			'options'    => array('DiskonPrtg' => 0,'DiskonNilai' => 0, 'Pajak' => 0,'qty_diterima' => $qty),
        );
        $this->cart->update($data);
        echo $this->load_cart_pesanan();
  
    }
	function update_Pajak(){ //load data cart
		
        $rowid =  $this->input->post('rowid');
        $pajak =  $this->input->post('pajak');
		$cartContents = $this->cart->contents();
		foreach ($cartContents as $item) {	
			if ($item['type'] != "JU") {
				if($item['rowid'] == $rowid){
					// Data ditemukan berdasarkan ID
					$itemData = $item;
					break;
				}
			}
		}
		// var_dump($itemData);die;
		$data = array(
            'rowid' => $rowid, 
			'options' => array('DiskonPrtg' => $itemData['options']['DiskonPrtg'],'DiskonNilai' => $itemData['options']['DiskonNilai'], 'Pajak' => intval($pajak)),
        );
		// var_dump($data);die;
        $this->cart->update($data);
        echo $this->load_cart();
  
    }
	
    function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->ShowCart();
       
    }
    function destroyCart(){ //fungsi untuk menghapus item cart
		
		// session_destroy();
        // echo $this->ShowCart();
		$filteredContents = array_filter($this->cart->contents(), function($item) {
			return $item->type != "JU";
		});
		
		$this->cart->contents($filteredContents);
    }
    
	function validasiCart(){ //fungsi untuk menghapus item cart
		
		$data = $this->cart->contents();
		if ($data == []) {
			echo '1';
		} else {
			echo '2';
		}
    }

	function addCartJU() {
		$data = array(
			'id'			=> $this->input->post('id_akun'),
			'akun'   		=> $this->input->post('akun'),
			'kelompok'		=> $this->input->post('kelompok'),
			'debit'  		=> 0,
			'kredit' 		=> 0,
			'keterangan' 	=> '',
			'type'			=> 'JU'
		);
		$status = $this->cart->insertJU($data);		

		echo $this->ShowCartJU();
	}

	function ShowCartJU() {
		$output = '';
		$count = 1;
		
		foreach($this->cart->contents() as $items)
		{
			if($items['type'] == 'JU') {
				$output .= '
				<tr> 	
					<td>'.$items["akun"].'</td>
					<td><input style="width: 100px;" type="number"  value="'.$items['debit'].'" id="debit"  data-id="'.$items['rowid'].'" data-value="'.$items["debit"].'" onchange="changeDebit(this)"></td>
					<td><input style="width: 100px;" type="number"  value="'.$items["kredit"].'" id="kredit"  data-id="'.$items['rowid'].'" data-value="'.$items["kredit"].'" onchange="changeKredit(this)"></td>
					<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">
					Batal</button></td>	
				</tr>
				';
			}
		}
		
		return $output;
	}

	function load_cart_ju() {
        echo $this->ShowCartJU();
    }

	function totalDebitJU() {
		$totalDebit = 0;
		foreach($this->cart->contents() as $items) {
			if($items['type'] == 'JU') {
				$totalDebit += $items['debit'];
			}
		}
		echo number_format($totalDebit);
	} 

	function updateDebitJU() {
        $rowid =  $this->input->post('rowid');
        $debit =  $this->input->post('debit');
	
        $data = array(
            'rowid' => $rowid, 
            'debit' => $debit, 
        );
		
        $this->cart->update($data);
        echo $this->load_cart_ju();
    }

	function totalKreditJU() {
		$totalKredit = 0;
		foreach($this->cart->contents() as $items) {
			if($items['type'] == 'JU') {
				$totalKredit += $items['kredit'];
			}
		}
		echo number_format($totalKredit);
	}

	function updateKreditJU() {
        $rowid 	=  $this->input->post('rowid');
        $kredit =  $this->input->post('kredit');
	
        $data = array(
            'rowid' 	=> $rowid, 
            'kredit' 	=> $kredit, 
        );
		
        $this->cart->update($data);
        echo $this->load_cart_ju();
    }


	function selisihJU() {
		$totalKredit 	= 0;
		$totalDebit 	= 0;
		foreach($this->cart->contents() as $items) {
			if($items['type'] == 'JU') {
				$totalKredit += $items['kredit'];
				$totalDebit += $items['debit'];
			}
		}
		echo number_format($totalDebit - $totalKredit);

	}
}
