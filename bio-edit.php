<?php
    require_once 'app/model/class.bio.php';
 
    //Untuk memanggil kelas biodata()
    $auth_bio = new Biodata();
 
    //Mengambil id_bio untuk menampilkan semua data di form edit
    if (isset($_GET['edit_ibio']) && !empty($_GET['edit_ibio'])) {
        $ibio       = $_GET['edit_ibio'];
        $stmt_edit  = $auth_bio->runQuery("SELECT * FROM biodata WHERE id_bio=:ibio");
        $stmt_edit->execute(array(':ibio'=>$ibio));
        $edit_row   = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    }
    else {
        $auth_bio->redirect('index.php');
    }
 
    //Mengeksekusi data untuk di update
    if (isset($_POST['btn-update'])) {
        $nama   = $_POST['nama'];
        $phone  = $_POST['phone'];
        $alamat = $_POST['alamat'];
 
        if ($nama == "") {
            $error[]    = "Nama masih kosong!";
        }
        elseif ($phone == "") {
            $error[]    = "Telepon masih kosong!";
        }
        elseif (strlen($phone) > 14) {
            $error[]    = "Nomor telepon tidak valid!";
        }
        elseif ($alamat == "") {
            $error[]    = "Alamat masih kosong!";
        }
        else {
            try {
                if ($auth_bio->updateBio($nama, $phone, $alamat, $ibio)) {
                    $auth_bio->redirect('index.php?saved');
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
 
 
    //Untuk menampilkan view
    include 'app/view/header.php';
    include 'app/view/menu.php';
    include 'app/view/bio-edit.blade.php';
    include 'app/view/footer.php';
 ?>