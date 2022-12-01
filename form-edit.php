<?php
include("config.php");

if (!isset($_GET['id'])) {
    header('Location: list-siswa.php');
}

$id = $_GET['id'];

$sql = "Select * From calon_siswa Where id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Edit Siswa | SMK Coding</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1><a href="index.php">Portal SMK Coding</a></h1>
    </header>
    <div class=" formContainer" style="margin-top: 80px; margin-bottom: 80px">
        <h2 style="margin-bottom: 40px;">Form Edit Data Siswa</h2>
        <div class="container">
            <form id="formMahasiswa" autocomplete="off" action="proses-edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Calon Siswa" class="form-control" minlength="3" maxlength="40" value="<?php echo $siswa['nama'] ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap Siswa"><?php echo $siswa['alamat'] ?></textarea>
                </div>
                <div class=" form-group">
                    <label for="sekolah_asal">Sekolah Asal</label>
                    <input type="text" name="sekolah_asal" placeholder="Sekolah Asal Calon Siswa" class="form-control" minlength="1" value="<?php echo $siswa['sekolah_asal'] ?>">
                </div>
                <div class=" form-group">
                    <label for="agama">Agama</label>
                    <?php $agama = $siswa['agama']; ?>
                    <select name="agama" class="form-control">
                        <option>Pilih Agama Calon Siswa</option>
                        <option <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                        <option <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                        <option <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                        <option <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                        <option <?php echo ($agama == 'Atheis') ? "selected" : "" ?>>Atheis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <?php $jk = $siswa['jenis_kelamin']; ?>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>> Laki-laki<br>
                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>> Perempuan<br>
                </div>
                <button name="simpan" type="submit" class="btn btn-primary" style="margin-top: 20px;">Simpan</button>
            </form>
        </div>
    </div>
    <footer>
        <h6>Copyright 2022 | SMK Coding | Doanda Dresta Rahma</h6>
    </footer>
</body>

</html>