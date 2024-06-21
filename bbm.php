
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #E7F0DC;
    color: black;
    margin: 0;
    padding: 0;
}

form{
  display: flex;
  justify-content:center;
}

/* Container Styles */
.main {
    max-width: 800px;
    margin: 20px auto;
    padding: 0 20px;
}

/* Heading Styles */
h1 {
    text-align: center;
    margin-bottom: 20px;
    margin-top: 30px;
}

/* Form Styles */
.form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

}

/* Label Styles */
label {
    display: block;
    margin-bottom: 5px;
}

.select{
  
    margin-right: 10px;
}

/* Input Styles */
input[type="number"],
select {
    width: 200px;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    
}

/* Button Styles */
button[type="submit"] {
    background-color: red;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button[type="submit"]:hover {
    background-color: #C40C0C;
}

/* Message Styles */
#p {
    margin-top: 10px;
    font-size: 14px;
    color: #007bff;
}
/* CSS untuk elemen bukti transaksi */
#bukti { 
    background-color: #f9f9f9; /* Warna latar belakang */
    padding: 20px; /* Ruang dalam */
    border-radius: 5px; /* Sudut melengkung */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    margin-top: 20px; /* Jarak atas */
    max-width: 640px;
    margin: 20px auto;
}

#bukti h3 {
    font-size: 18px; /* Ukuran font judul */
    color: #333; /* Warna teks */
    margin-bottom: 10px; /* Jarak bawah */
}

#bukti p {
    font-size: 16px; /* Ukuran font teks */
    color: #666; /* Warna teks */
    margin-bottom: 8px; /* Jarak bawah */
}

#bukti hr {
    border: none; /* Hilangkan garis */
    border-top: 1px dashed #ccc; /* Garis putus-putus */
    margin-top: 15px; /* Jarak atas */
    margin-bottom: 15px; /* Jarak bawah */
}

/* CSS untuk belah */
.belah {
    display: flex; /* Atur tata letak flex */
    justify-content: space-between; /* Atur jarak ruang antara */
    align-items: center; /* Pusatkan secara vertikal */
}

/* CSS untuk tombol tampilkan */
#tampilkan {
    background-color: #007bff; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    padding: 10px 20px; /* Ukuran padding */
    border: none; /* Hilangkan border */
    border-radius: 5px; /* Sudut melengkung */
    cursor: pointer; /* Kursor pointer */
}

#tampilkan:hover {
    background-color: #0056b3; /* Warna latar belakang saat hover */
}

@media print{
    .form {
        display: none;
    }
}

.btn{
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

    </style>
</head>
<body>
    <h1>Bensin Shell</h1>
    <main>
        <form action="" method="post">
                <div class="form">
            <div class="BB">
                <label for="">Masukkan Jumlah Liter</label>
                <input type="number" name="BB" id="jumlah" required>
            </div>
            <div class="brg">
                <label for="">Plih Tipe Bahan Bakar:</label>
                <select name="brg" id="jenis" required>
                    <option value="">pilih jenis bensin</option>
                    <option value="Shell Super">Shell Super</option>
                    <option value="Shell V-Power">Shell V-Power</option>
                    <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                    <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>    
                </select>
            </div> 
            <div class="select">
                <label for="">Masukan Uang:</label>
                <input type="number" name="bayar" required>
                <div class="btn">
                    <button type="submit" name="cash" id="bayar">bayar!</button>
                </div>
            </div>
            <div class="btn">
                <p id="p"></p>
            </div>
                
            
        </div>
        </form>
    <div class="btn">
        <button type="submit" class="ilang" onclick="window.print()">Cetak Bon Ini</button>
    </div>
           
    </main>
    <div class="php">
    <?php

use function PHPSTORM_META\type;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    class Shell{
        protected $harga,
                $jumlah,
                $jenis,
                $tempat,
                $ppn,
                $uang;
    
            public function __construct($harga,$jumlah,$jenis,$uang){
            $this -> harga = $harga;
            $this -> jumlah = $jumlah;
            $this -> jenis = $jenis;
            $this -> ppn = 10;
            $this -> uang = $uang;
        }
        
        public function getHarga(){
            return $this -> harga;
        }
        public function getJumlah(){
            return $this -> jumlah;
        }
        public function getJenis(){
            return $this -> jenis;
        }
        
        public function getPpn(){
            return $this -> ppn;
        }
         
        public function getUang(){
            return $this -> uang;
        }
    }
    
    class Harga extends Shell{

        public function hargaTotal(){
            $total =  $this -> harga *  (int)$this -> jumlah;  
            $total += $total * $this -> ppn / 100;
            return $total;
        }
        public function bayarr(){
            $total = $this -> hargaTotal();
            $bayar = $this -> uang;
            $jmlh = $this -> getJumlah();
            $kembalian = $bayar - $total;
            echo "<hr>"; // Garis putus-putus setelah output
            echo "<div class='bukti' id='bukti' display = 'none'>";
            echo "<hr>"; // Garis putus-putus sebelum output
            echo"<div class='belah>'";
            echo "<h3>Bukti Transaksi:</h3>";
            echo "<p><strong>Anda membeli bahan bakar minyak dengan tipe :</strong> " . $this->jenis . "</p>";
            print "<p><strong>dengan jumlah :</strong> " . $this -> jumlah . " Liter</p>"; // Menambahkan kata "Liter" 
            echo "<p><strong>Total yang harus anda bayar:</strong> Rp " . number_format($this -> hargaTotal(), 2, ',', '.') . "</p>";
            echo "<hr>";
            echo"
            Anda membayar sebesar Rp. "  . number_format($this -> uang, 2, ',', '.') . " dan anda harus membayar dengan nominal Rp." .number_format($total, 2, ',', '.') . " dan anda mendapat kan kembalian dengan sebesar Rp." . number_format($kembalian, 2, ',', '.');
            echo "<hr>";
            echo"
            </div>
            
            ";
            echo "</div>";
           
            
        }
    }  
    if(isset($_POST['cash'])){ // Ubah dari submit menjadi submit
        if(isset($_POST["brg"], $_POST["BB"] , $_POST['bayar'])) { // Memeriksa ketersediaan input
            
            $jenis = $_POST["brg"];
            $jumlah = $_POST["BB"];
            $uang = $_POST["bayar"];
            $hargaBahanBakar = [
                "Shell Super" => 15420.00,
                "Shell V-Power" => 16130.00,
                "Shell V-Power Diesel" => 18310.00,
                "Shell V-Power Nitro" => 16510.00,
            ];
            
            if(array_key_exists($jenis, $hargaBahanBakar)) {
                $uang = $_POST["bayar"];
                $harga = $hargaBahanBakar[$jenis] + $jumlah;
                $beli = new Harga($harga, $jumlah, $jenis,$uang);
                $beli->bayarr();
            } else {
                echo "<p style='text-align: center;'>uang anda tidak cukup</p>";
            }
        }
    }

}
?>
</div>
</body>
</html>