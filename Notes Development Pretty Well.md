# 12 - 04 - 24

### Tabel gudang_masuk

```
ALTER TABLE gudang_masuk ADD COLUMN id_produk  INT UNSIGNED
```

### Tabel v_pembelian_master

```
select `pm`.`id` AS `id`,`pm`.`no_pesanan` AS `no_pesanan`,`pm`.`lokasi` AS `lokasi`,`pm`.`nama_supplier` AS `nama_supplier`,`pm`.`tanggal_pesanan` AS `tanggal_pesanan`,`pm`.`status` AS `status`,`pm`.`nilai_bruto` AS `nilai_bruto`,`pm`.`diskon` AS `diskon`,`pm`.`pajak` AS `pajak`,`pm`.`nilai` AS `nilai`,`pm`.`keterangan` AS `keterangan`,`pm`.`waktu` AS `waktu`,`pm`.`status1` AS `status1`,`pm`.`status2` AS `status2`,`pm`.`StatusInt1` AS `StatusInt1`,`pm`.`StatusInt2` AS `StatusInt2`,`pd`.`qty` AS `qty`,`pd`.`id_produk` AS `id_produk` from (`pembelian_master` `pm` left join (select `pembelian_detail`.`no_pesanan` AS `no_pesanan`,sum(`pembelian_detail`.`qty`) AS `qty`,`pembelian_detail`.`id_produk` AS `id_produk` from `pembelian_detail` group by `pembelian_detail`.`no_pesanan`,`pembelian_detail`.`id_produk`) `pd` on((`pm`.`no_pesanan` = `pd`.`no_pesanan`)))
```
