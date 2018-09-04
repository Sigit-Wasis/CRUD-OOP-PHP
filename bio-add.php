<?php
    require_once 'app/model/class.bio.php';
 
    $auth_bio = new Biodata();
 
    if (isset($_POST['btn-save'])) {
        $nama   = strip_tags($_POST['nama']);
        $phone  = strip_tags($_POST['phone']);
        $alamat = strip_tags($_POST['alamat']);
 
        if ($nama == "") {
            $error[]    = "Nama masih kosong!";
        }
        elseif ($phone == "") {
            $error[]    = "Nomor harus di isi. Bila tidak punya nomor cukup di isi NOL saja!";
        }
        elseif (strlen($phone) > 14) {
            $error[]    = "Nomor telepon anda tidak valid!";
        }
        elseif ($alamat == "") {
            $error[]    = "Alamat masih kosong!";
        }
        else {
            try {
                if ($auth_bio->insertBio($nama,$phone,$alamat)) {
                    $auth_bio->redirect('bio-add.php?saved');
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
 
    //Untuk menampilkan view
    include 'app/view/header.php';
    include 'app/view/menu.php';
    include 'app/view/bio-add.blade.php';
    include 'app/view/footer.php';
 ?>