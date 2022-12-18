<?php 
$conn = mysqli_connect("localhost","root","","sekolah") or die (mysqli_error($conn));

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    };
    return $rows;
};

function hapusGuru($data){
    global $conn;
    $id = $data["id_guru"];
    mysqli_query($conn,"DELETE FROM guru WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function tambahGuru($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $mapel = htmlspecialchars($data["mapel"]);
    $gambar = upload();

    $query = "INSERT INTO guru (nama, mapel, gambar)  VALUES ('$nama','$mapel','$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function ubahGuru($data){
    global $conn;

    $id = htmlspecialchars($data["id_guru"]);
    $nama = htmlspecialchars($data["unama"]);
    $mapel = htmlspecialchars($data["umapel"]);
    $gambarLama = $data["gambarlama"];

    // cek apakah user pilih gambar baru atau tidak

    if($_FILES['gambar']['error']===4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE guru SET
    nama = '$nama',
    mapel = '$mapel',
    gambar = '$gambar'
    WHERE id = $id
    ";
    mysqli_query($conn,$query);
}

function tambahSiswa($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $status = htmlspecialchars($data["statuss"]);
    $gambar = upload();

    $query = "INSERT INTO guru (nama, kelas, statuss, gambar)  VALUES ('$nama','$mapel','$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang di upload
    if ($error === 4){
        echo "
        <script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }
    $extensiGambarFalid = ['jpg','jpeg','png'];
    $extensiGambar = explode('.',$namafile);
    $extensiGambar = strtolower(end($extensiGambar));

    if(!in_array($extensiGambar,$extensiGambarFalid)){
        echo "
        <script>
        alert('yang anda upload bukan gambar');
        </script>";
        return false;
    }

    if($ukuranfile > 1000000){
        echo "
        <script>
        alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }
    
    $namafilebaru = uniqid();
    $namafilebaru .= ".";
    $namafilebaru .= $extensiGambar;

    move_uploaded_file($tmpname,'img/'.$namafilebaru);
    return $namafilebaru;
}

function aksi($fungsi,$aler,$lokasi){
    if ($fungsi($_POST) > 0){
        echo "
        <script>
        alert('data berhasil di $aler!');
        document.location.href = '$lokasi';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('data gagal di $aler!');
        document.location.href = '$lokasi';
        </script>
        ";
    }
}
?>