<?php 
    require_once 'Connection.php';

    class Transaksi extends Connection{

        private $conn;

        public function __construct()
        {
            $this->conn = parent::__construct();
        }

        public function  simpanTransaksi($data, $pembeli, $tgl_trs, $waktu_pesan, $waktu_ambil){
            foreach($data as $d){
                $nama = $d['nama'];
                $harga = $d['harga'];
                $jumlah = $d['jumlah'];
                $total = $d['total_harga'];

                $sql = "INSERT INTO transaksi VALUES 
                    (0, '$nama', $harga, $jumlah, $total, '$pembeli', '$waktu_pesan', '$waktu_ambil', '$tgl_trs')
                ";

                $exe = mysqli_query($this->conn, $sql);
            }

            unset($_SESSION['waktu_ambil']);

            echo '<script>
                        alert("Transaksi Berhasil Disimpan");
                        document.location.href = "checkout.php";
                    </script>';
        }

        public function getTransaksi(){
            $transaksi = [];
            $sql = "SELECT * FROM transaksi ORDER BY id_transaksi DESC";
            $exe = mysqli_query($this->conn, $sql);

            while($t = mysqli_fetch_assoc($exe)){
                $transaksi[] = $t;
            }

            return $transaksi;
        }

        public function getTotal(){
            $total = 0;
            $sql = "SELECT total_harga FROM transaksi";
            $exe = mysqli_query($this->conn, $sql);
            while($t = mysqli_fetch_assoc($exe)){
                $total += $t['total_harga'];
            }
            return $total;
        }

        public function hapusTransaksi($id){
            $sql = "DELETE FROM transaksi WHERE id_transaksi = $id";
            $exe = mysqli_query($this->conn, $sql);

            if($exe == true){
                echo '<script>
                    alert("Data Transaksi Berhasil Dihapus");
                    document.location.href = "admintransaksi.php";
                </script>';
            }else{
                echo '<script>
                    alert("Data Transaksi Gagal Dihapus");
                    document.location.href = "admintransaksi.php";
                </script>';
            }
        }

    }