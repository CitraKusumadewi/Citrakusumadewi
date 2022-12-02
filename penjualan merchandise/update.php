<!DOCTYPE html>
<html>
    <head>
        <title>Form Penjualan Merchandise </title>
        <!-- Load file CSS Bootstrap offline -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
        //include file koneksi,untuk konesikan ke database include "koneksi.php";
        include "koneksi.php";

        //fungsi untuk mencegah inputan karakter yang tidak sesuai 
        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        //cek apakah ada kiriman form dari method post 
        if ($_SERVER["REQUEST_METHOD"]=="POST"){

            $username=input($_POST["username"]);
            $nama=input($_POST["nama"]);
            $alamat=input($_POST["alamat"]);
            $email=input($_POST["email"]);
            $no_hp=input($_POST["no_hp"]);

            //Query input menginput data kedalam tabel pembeli
            $sql="insert into pembeli (username,nama,alamat,email,no_hp) values
            ('$username','$nama','$alamat','$email','$no_hp')";

            //mengeksekusi atau menjalakan query diatas 
            $hasil=mysqli_query($kon, $sql);

            //kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if($hasil) {
                header("Location:index.php");
            }
            else {
                echo "<div class='alert alert-danger'>Data Gagal Diupdate.</div>";
            }
        }

        ?>

        <h2>Update Data</h2>
        <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="post">
        <div class ="form-group">
                <label>Username:</label>
                <input tyoe ="text" name="username" class="form-control" placeholder="Masukkan Username" required/>
        </div>
        <div class ="form-group">
                <label>Nama:</label>
                <input tyoe ="text" name="nama" class="form-control" placeholder="Masukkan Nama" required/>
        </div>
        <div class ="form-group">
                <label>Alamat:</label>
                <input tyoe ="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required/>
        </div>
        <div class ="form-group">
                <label>Email:</label>
                <input tyoe ="text" name="email" class="form-control" placeholder="Masukkan Email" required/>
        </div>
        <div class ="form-group">
                <label>No HP:</label>
                <input tyoe ="text" name="no_hp" class="form-control" placeholder="Masukkan No HP" required/>
        </div>
    <input type="hidden" name="id_pembeli" value="<?php echo $data['id_pembeli']; ?>"/>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </body>
    </html>