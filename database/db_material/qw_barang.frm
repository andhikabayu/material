TYPE=VIEW
query=select `db_material`.`tb_barang`.`id_barang` AS `id_barang`,`db_material`.`tb_barang`.`kd_barang` AS `kd_barang`,`db_material`.`tb_barang`.`nama_barang` AS `nama_barang`,`db_material`.`tb_merek`.`id_merek` AS `id_merek`,`db_material`.`tb_merek`.`merek` AS `merek` from (`db_material`.`tb_barang` join `db_material`.`tb_merek` on((`db_material`.`tb_barang`.`id_merek` = `db_material`.`tb_merek`.`id_merek`)))
md5=de11a9d479299a0e53ead881770c0594
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2016-09-12 11:32:43
create-version=1
source=select id_barang,kd_barang,nama_barang,tb_merek.id_merek,merek from tb_barang\ninner join tb_merek on tb_barang.id_merek = tb_merek.id_merek
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `db_material`.`tb_barang`.`id_barang` AS `id_barang`,`db_material`.`tb_barang`.`kd_barang` AS `kd_barang`,`db_material`.`tb_barang`.`nama_barang` AS `nama_barang`,`db_material`.`tb_merek`.`id_merek` AS `id_merek`,`db_material`.`tb_merek`.`merek` AS `merek` from (`db_material`.`tb_barang` join `db_material`.`tb_merek` on((`db_material`.`tb_barang`.`id_merek` = `db_material`.`tb_merek`.`id_merek`)))
