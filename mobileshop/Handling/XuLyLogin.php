<?php
    session_start();
require_once '../Libs/DataProvider.php';
    if(isset($_POST['txtUserName']) && isset($_POST['txtPassword']))
    {
        $us = $_POST['txtUserName'];
        $ps = md5($_POST['txtPassword']);
        $sql = "SELECT ID, MaLoai, HoTen FROM `taikhoan` WHERE TenTaiKhoan = '$us' AND MatKhau = '$ps'";
        $result = DataProvider::ExecuteQuery($sql);
        $loaiNguoiDung = "";
        while ($row = mysqli_fetch_array($result)) {
            $loaiNguoiDung = $row['MaLoai'];
            $maTaiKhoan = $row["ID"];
        }

        if($loaiNguoiDung != "")
        {
            echo '<font style="color: blue">Đăng nhập thành công</font>';
            if($loaiNguoiDung == 1){
                $_SESSION['nguoiDung'] = $loaiNguoiDung;
                $_SESSION["maTaiKhoan"] = $maTaiKhoan;
                DataProvider::ChangeURL($_SERVER['PATH_INFO']);
            }else{
                $_SESSION['admin'] = $loaiNguoiDung;
                DataProvider::ChangeURL('Admin/');
            }
        }else{
            echo '<font style="color: red">Sai tài khoản hoặc mật khẩu</font>';
        }
    } else{
        DataProvider::ChangeURL('index.php');
    }
?>