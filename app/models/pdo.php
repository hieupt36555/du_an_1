<?php
    function pdo_get_connection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=duan1", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "thanhcong";
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Thành công đữ liệu
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);

    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// truy vấn nhiều dữ liệu
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// truy vấn  1 dữ liệu
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // đọc và hiển thị giá trị trong danh sách trả về
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
pdo_get_connection();

//banner//
function insert_banner($imgbanner,$link){
    $sql = "INSERT INTO banner(img, link) VALUES ('$imgbanner', '$link')";
    pdo_execute($sql);
}
function delete_banner($id_banner)
{
    $sql = "DELETE FROM banner WHERE id_banner= '$id_banner'";
    pdo_query($sql);
}
function load_all_banner(){
    $sql = "SELECT * FROM banner ORDER BY id_banner DESC";
    $listbanner = pdo_query($sql);
    return $listbanner;
}
function loadOnebanner($id_banner)
{
    $sql = "SELECT * FROM banner WHERE id_banner = '$id_banner'";
    $bner = pdo_query_one($sql);
    return $bner;
}
function update_banner($id_banner, $imgbanner, $link){
    $sql="UPDATE banner set img='".$imgbanner."', link='".$link."' WHERE id_banner = ".$id_banner;
    pdo_execute($sql);
}
//end bannerr//

//binh luan//
function load_all_binh_luan(){
    $sql = "SELECT * FROM binh_luan ORDER BY id_binh_luan DESC";
    $listbl = pdo_query($sql);
    return $listbl;
}
// function load_all_binh_luan_inner(){
//     $sql = "SELECT binh_luan.id_binh_luan,  taikhoan.ten_dang_nhap as binh_luan.nguoi_binh_luan,";
//     $listbl = pdo_query($sql);
//     return $listbl;
// }
function loadOnebl($id_binh_luan)
{
    $sql = "SELECT * FROM binh_luan WHERE id_binh_luan = '$id_binh_luan'";
    $bl = pdo_query_one($sql);
    return $bl;
}
function delete_bl($id_binh_luan)
{
    $sql = "DELETE FROM binh_luan WHERE id_binh_luan= '$id_binh_luan'";
    pdo_query($sql);
}
function update_bl($id_binh_luan, $ten_dang_nhap, $danh_gia, $noi_dung, $ngay_binh_luan, $id_san_pham, $id_tai_khoan){
    $sql="update binh_luan set noi_dung='$noi_dung', danh_gia='$danh_gia' where id_binh_luan=".$id_binh_luan;
    pdo_execute($sql);
}
//end binh luan//

//hoa don//
function insert_hoa_don($ho_ten,$sdt,$dia_chi,$ten_san_pham,$gia,$ma_khuyen_mai,$phuong_thuc_thanh_toan,$tong_tien,$trang_thai){
    $sql = "INSERT INTO hoa_don(ho_ten,sdt,dia_chi,ten_san_pham,gia,ma_khuyen_mai,phuong_thuc_thanh_toan,tong_tien,trang_thai) VALUES ('$ho_ten','$sdt','$dia_chi','$ten_san_pham','$gia','$ma_khuyen_mai','$phuong_thuc_thanh_toan','$tong_tien','$trang_thai')";
    pdo_execute($sql);
}
function delete_hoa_don($id_hoa_don)
{
    $sql = "DELETE FROM hoa_don WHERE id_hoa_don= '$id_hoa_don'";
    pdo_query($sql);
}
function load_all_hoa_don(){
    $sql = "SELECT * FROM hoa_don ORDER BY id_hoa_don DESC";
    $listhd = pdo_query($sql);
    return $listhd;
}
// function loadOnebanner($id_banner)
// {
//     $sql = "SELECT * FROM banner WHERE id_banner = '$id_banner'";
//     $bner = pdo_query_one($sql);
//     return $bner;
// }
// function update_banner($id_banner, $imgbanner, $link){
//     $sql="UPDATE banner set img='".$imgbanner."', link='".$link."' WHERE id_banner = ".$id_banner;
//     pdo_execute($sql);
// }
//end hoa don///
?>