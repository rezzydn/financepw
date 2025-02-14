<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jurnal extends CI_Model {
    public function getJurnal($start, $end) 
    {
        $jpConditionDate = null;
        $juConditionDate = null;
        if($start && $end) {
            $jpConditionDate = "WHERE pm.tanggal_pesanan >= '$start' AND pm.tanggal_pesanan <= '$end'";
            $juConditionDate = "WHERE tanggal >= '$start' AND tanggal <= '$end'";
        }

        $sqlJurnalPembelian = "SELECT 
                                    pm.no_pesanan AS no_jurnal, 
                                    DATE_FORMAT(pm.waktu, '%d %M %Y %H:%i:%s') AS tgl_jurnal, 
                                    'Pembelian' AS sumber, 
                                    pm.nilai AS nominal, 
                                    pm.keterangan AS keterangan
                                FROM 
                                    pembelian_master pm 
                                INNER JOIN 
                                    (SELECT DISTINCT id_data_pembelian FROM jurnal_pembelian) jp 
                                ON jp.id_data_pembelian = pm.id
                                $jpConditionDate";

        $sqlJurnalUmum = "SELECT 
                                kode_transaksi as no_jurnal, 
                                DATE_FORMAT(tanggal, '%d %M %Y %H:%i:%s') AS tgl_jurnal,
                                'Jurnal Umum' AS sumber,
                                CASE
                                    WHEN debit <> 0 THEN debit
                                    ELSE kredit
                                END AS nominal,
                                keterangan
                            FROM 
                                jurnal_umum
                            $juConditionDate";

        $sqlJurnalPenjualan = "SELECT 
                                pm.no_pesanan AS no_jurnal, 
                                DATE_FORMAT(pm.waktu, '%d %M %Y %H:%i:%s') AS tgl_jurnal, 
                                'Penjualan' AS sumber, 
                                pm.nilai AS nominal, 
                                pm.keterangan AS keterangan
                            FROM 
                                penjualan_master pm 
                            INNER JOIN 
                                (SELECT DISTINCT id_data_penjualan FROM jurnal_penjualan) jp 
                            ON jp.id_data_penjualan = pm.id
                            $jpConditionDate";

        $sql    = "$sqlJurnalPembelian
                    UNION
                    $sqlJurnalUmum
                    UNION
                    $sqlJurnalPenjualan
                    ORDER by no_jurnal DESC";
        $result = $this->db->query($sql)->result_array(); 
        
        return  $result;
    }
}