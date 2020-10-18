<?php
$con->auth();
$conn=$con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $paket="select * from paket";
        $paket=$conn->query($paket);
        $sql="select * from pegawai";
        $pegawai=$conn->query($sql);
        $content="views/laundry/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['nama_pelanggan'])){
                $err['nama_pelanggan']="Nama Pelanggan Wajib";
            }
            if(empty($_POST['jenis_cucian'])){
                $err['jenis_cucian']="Jenis Cucian Wajib";
            }
            if(!is_numeric($_POST['id_paket'])){
                $err['id_paket']="Paket Wajib Terisi";
            }
            if(!is_numeric($_POST['id_pegawai'])){
                $err['id_pegawai']="Pegawai Wajib Terisi";
            }
            if(!isset($err)){
                $id_pegawai=$_SESSION['login']['id'];
                if(!empty($_POST['id_cucian'])){
                    //update
                    $sql="update cucian set jenis_cucian='$_POST[jenis_cucian]',nama_pelanggan='$_POST[nama_pelanggan]', id_paket='$_POST[id_paket]',berat='$_POST[berat]',
                    id_pegawai='$_POST[id_pegawai]' where id_cucian='$_POST[id_cucian]'";
                }else{
                    //save
                    $sql = "INSERT INTO cucian (nama_pelanggan,jenis_cucian,id_paket,berat,id_pegawai) 
                    VALUES ('$_POST[nama_pelanggan]','$_POST[jenis_cucian]','$_POST[id_paket]','$_POST[berat]','$_POST[id_pegawai]')";
                }
                    if ($conn->query($sql) === TRUE) {
                        header('Location: '.$con->site_url().'/admin/index.php?mod=laundry');
                    } else {
                        $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
                    }
            }
        }else{
            $err['msg']="tidak diijinkan";
        }
        if(isset($err)){
            $paket="select * from paket";
            $paket=$conn->query($paket);
            $sql="select * from pegawai";
            $pegawai=$conn->query($sql);
            $content="views/laundry/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $laundry ="select * from cucian where id_cucian='$_GET[id]'";
        $laundry=$conn->query($laundry);
        $_POST=$laundry->fetch_assoc();
        $_POST['id_paket']=$_POST['id_paket'];
        $_POST['id_cucian']=$_POST['id_cucian'];
        //var_dump($laundry);
        $paket="select * from paket";
        $paket=$conn->query($paket);
        $sql="select * from pegawai";
        $pegawai=$conn->query($sql);
        $content="views/laundry/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete';
        $laundry ="delete from cucian where id_cucian='$_GET[id]'";
        $laundry=$conn->query($laundry);
        header('Location: '.$con->site_url().'/admin/index.php?mod=laundry');
    break;
    default:
        $sql="SELECT * FROM cucian";
        $laundry=$conn->query($sql);
        $conn->close();
        $content="views/laundry/tampil.php";
        include_once 'views/template.php';
}
?>