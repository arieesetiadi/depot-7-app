<?php 
    require_once 'Connection.php';

    class Minuman extends Connection{

        private $conn;
        public function __construct()
        {
            $this->conn = parent::__construct();
        }

        public function getMinuman(){

            $minuman = [];

            $sql = "SELECT * FROM minuman";
            $res = mysqli_query($this->conn, $sql);

            while($r = mysqli_fetch_assoc($res)){
                $minuman[] = $r;
            }

            return $minuman;
        }

        public function tambahMinuman($minuman){

            $nama_minuman = $minuman['nama_minuman'];
            $harga_minuman = $minuman['harga_minuman'];
            $gambar_minuman = $minuman['gambar_minuman'];

            $sql = "INSERT INTO minuman VALUES (0, '$nama_minuman',$harga_minuman,'$gambar_minuman')";
            $exe = mysqli_query($this->conn, $sql);

            if($exe == true){
                echo '<script>
                    alert("Data Minuman Berhasil Ditambahkan");
                    document.location.href = "adminminuman.php";
                </script>';
            }else{
                echo '<script>
                    alert("Data Minuman Gagal Ditambahkan");
                    document.location.href = "adminminuman.php";
                </script>';
            }

        }

        public function hapusMinuman($id){
            $sql = "DELETE FROM minuman WHERE id_minuman = $id";
            $exe = mysqli_query($this->conn, $sql);

            if($exe == true){
                echo '<script>
                    alert("Data Minuman Berhasil Dihapus");
                    document.location.href = "adminminuman.php";
                </script>';
            }else{
                echo '<script>
                    alert("Data Minuman Gagal Dihapus");
                    document.location.href = "adminminuman.php";
                </script>';
            }
        }

        public function getMinumanById($id){
            $sql = "SELECT * FROM minuman WHERE id_minuman = $id";
            $exe = mysqli_query($this->conn, $sql);

            return mysqli_fetch_assoc($exe);
        }

        public function ubahMinuman($minuman){
            $id = $minuman["id_minuman"];
            $nama_minuman = $minuman['nama_minuman'];
            $harga_minuman = $minuman['harga_minuman'];
            $gambar_minum = $minuman['gambar_minum'];

            $sql = "UPDATE minuman SET
                nama_minuman = '$nama_minuman',
                harga_minuman = $harga_minuman,
                gambar_minum = '$gambar_minum'
                where id_minuman = $id
            ";

            $exe = mysqli_query($this->conn, $sql);

            if($exe == true){
                echo '<script>
                    alert("Data Minuman Berhasil Diubah");
                    document.location.href = "adminminuman.php";
                </script>';
            }else{
                echo '<script>
                    alert("Data Minuman Gagal Diubah");
                    document.location.href = "adminminuman.php";
                </script>';
            }
        }
    }
?>