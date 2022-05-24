TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `trigger_pengurangan` AFTER INSERT ON `tb_penjualan`\nFOR EACH ROW BEGIN\nUPDATE tb_stockbarang SET jumlah_barang=jumlah_barang-NEW.qty\nWHERE kd_barang=NEW.kd_barang;\nEND'
sql_modes=0
definers='root@localhost'
client_cs_names='utf8'
connection_cl_names='utf8_general_ci'
db_cl_names='latin1_swedish_ci'
