<?php 
    require_once 'Connection.php';

    class Makanan extends Connection{

        private $conn;
        public function __construct()
        {
            $this->conn = parent::__construct();
        }

        public function getMakanan(){

            $makanan = [];

            $sql = "SELECT * FROM makanan";
            $res = mysqli_query($this->conn, $sql);

            while($r = mysqli_fetch_assoc($res)){
                $makanan[] = $r;
            }

            return $makanan;
        }

        public function getRecommendMakanan(){
            $makanan = [];

            $sql = "SELECT * FROM makanan LIMIT 3";
            $res = mysqli_query($this->conn, $sql);

            while($r = mysqli_fetch_assoc($res)){
                $makanan[] = $r;
            }

            return $makanan;
        }
        
        public function tambahMakanan($makanan){

            $nama_makanan = $makanan['nama_makanan'];
            $harga_makanan = $makanan['harga_makanan'];
            $gambar_makanan = $makanan['gambar_makanan'];

            $sql = "INSERT INTO makanan VALUES (0, '$nama_makanan',$harga_makanan,'$gambar_makanan')";
            $exe = mysqli_query($this->conn, $sql);

            if($exe == true){
                echo '<script>
                    alert("Data Makanan Berhasil Ditambahkan");
                    document.location.href = "adminmakanan.php";
                </script>';
            }else{
                echo '<script>
                    alert("Data Makanan Gagal Ditambahkan");
                    document.location.href = "adminmakanan.php";
                </script>';
            }

        }

        public function getMakananById($id){
            $sql = "SELECT * FROM makanan WHERE id_makanan = $id";
            $exe = mysqli_query($this->conn, $sql);

            return mysqli_fetch_assoc($exe);
        }

        public function hapusMakanan($id){
            $sql = "DELETE FROM makanan WHERE id_makanan = $id";
            $exe = mysqli_query($this->conn, $sql);

            if($exe == true){
                echo '<script>
                    alert("Data Makanan Berhasil Dihapus");
                    document.location.href = "adminmakanan.php";
                </script>';
            }else{
                echo '<script>
                    alert("Data Makanan Gagal Dihapus");
                    document.location.href = "adminmakanan.php";
                </script>';
            }
        }

        public function ubahMakanan($makanan){
            $id = $makanan["id_makanan"];
            $nama_makanan = $makanan['nama_makanan'];
            $harga_makanan = $makanan['harga_makanan'];
            $gambar_makanan = $makanan['gambar_makanan'];

            $sql = "UPDATE makanan SET
                nama_makanan = '$nama_makanan',
                harga_makanan = $harga_makanan,
                gambar_makanan = '$gambar_makanan'
                where id_makanan = $id
            ";

            $exe = mysqli_query($this->conn, $sql);

            if($exe == true){
                echo '<script>
                    alert("Data Makanan Berhasil Diubah");
                    document.location.href = "adminmakanan.php";
                </script>';
            }else{
                echo '<script>
                    alert("Data Makanan Gagal Diubah");
                    document.location.href = "adminmakanan.php";
                </script>';
            }
        }
    }
?>