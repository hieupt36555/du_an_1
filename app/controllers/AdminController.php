<?php
include "../../models/pdo.php";
if(isset($_GET["act"]) && ($_GET["act"] !="")){
    switch ($_GET["act"]) {
        //tai khoan//
        case 'listtk':
            include "taikhoan/list.php";
            break;
        case 'addtk':
            include "taikhoan/add.php";
            break;
        case 'detailtk':
            include "taikhoan/detail.php";
            break;
        case 'updatetk':
            include "taikhoan/update.php";
            break;
        //end taikhoan//
        
        //chuc vu//
        case 'listcv':
            include "chucvu/list.php";
            break;
        case 'addcv':
            include "chucvu/add.php";
            break;
        case 'updatecv':
            include "chucvu/update.php";
            break;
        //end chuc vu//
        
        //danh muc//
        case 'listdm':
            include "danhmuc/list.php";
            break;
        case 'adddm':
            include "danhmuc/add.php";
            break;
        case 'updatedm':
            include "danhmuc/update.php";
            break;
        //end danh muc///

        //san pham//
        case 'listsp':
            include "sanpham/list.php";
            break;
        case 'addsp':
            include "sanpham/add.php";
            break;
        case 'detailsp':
            include "sanpham/detail.php";
            break;
        case 'updatesp':
            include "sanpham/update.php";
            break;
        //end san pham//

        //bien the//
        case 'listbt':
            include "bienthe/list.php";
            break;
        case 'addbt':
            include "bienthe/add.php";
            break;
        case 'updatebt':
            include "bienthe/update.php";
            break;
        //end bien the//

        //don hang//
        case 'listdh':
            $listhd=load_all_hoa_don();
            include "donhang/list.php";
            break;
        case 'adddh':
            if (isset($_POST['them'])) {
                $ho_ten=$_POST['ho_ten'];
                $sdt=$_POST['sdt'];
                $dia_chi=$_POST['dia_chi'];
                $ten_san_pham=$_POST['ten_san_pham'];
                $gia=$_POST['gia'];
                $ma_khuyen_mai=$_POST['ma_khuyen_mai'];
                $phuong_thuc_thanh_toan=$_POST['phuong_thuc_thanh_toan'];
                $tong_tien=$_POST['tong_tien'];
                $trang_thai=$_POST['trang_thai'];
                insert_hoa_don($ho_ten,$sdt,$dia_chi,$ten_san_pham,$gia,$ma_khuyen_mai,$phuong_thuc_thanh_toan,$tong_tien,$trang_thai);
                $thongbao = "Thêm thành công";
            }
            include "donhang/add.php";
            break;
        case 'detaildh':
            include "donhang/detail.php";
            break;
        case 'updatedh':
            include "donhang/update.php";
            break;
        //end don hang//

        //binh luan//
        case 'listbl':
            $listbl= load_all_binh_luan();
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $id = $_GET["id"];
                delete_bl($id);
                }
            $listbl = load_all_binh_luan();
            include "binhluan/list.php";
            break;
        case 'updatebl': //view
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $id = $_GET["id"];
                $bl = loadOnebl($id);
            }else{
                echo "Lỗi id";
            }
            include "binhluan/update.php";
            // break;
        case 'suabl': //update
            if (isset($_POST['capnhat'])&&($_POST['capnhat'])) {
                $id_binh_luan=$_POST['id_binh_luan'];
                $ten_dang_nhap=$_POST['ten_dang_nhap'];
                $danh_gia=$_POST['danh_gia'];
                $noi_dung=$_POST['noi_dung'];
                $ngay_binh_luan=$_POST['ngay_binh_luan'];
                $id_san_pham=$_POST['id_san_pham'];
                $id_tai_khoan=$_POST['id_tai_khoan'];
                update_bl($id_binh_luan, $ten_dang_nhap, $danh_gia, $noi_dung, $ngay_binh_luan, $id_san_pham, $id_tai_khoan);
                $thongbao="Cap Nhat thanh cong";
                
            }else{
                $thongbao="Cap nhat loi";
            }
            
            $listbl=load_all_binh_luan();
            include "binhluan/list.php";
            break;
        //end binh luan//

        //banner//
        case 'listbanner':
            $listbanner = load_all_banner();
            include "banner/list.php";
            break;
        case 'xoabanner':
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $id = $_GET["id"];
                delete_banner($id);
                }
            $listbanner = load_all_banner();
            include "banner/list.php";
            break;
        case 'addbanner':
            if (isset($_POST['thembanner'])) {
                // $img=$_POST['img'];
                $link=$_POST['link'];

                $imgbanner=$_FILES['img']['name'];
                $target_dir="../../../public/images/banner/";
                $target_file=$target_dir . basename($_FILES["img"]["name"]);
                move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                insert_banner($imgbanner,$link);
                $thongbao = "Thêm thành công";
            }
            include "banner/add.php";
            break;
        case 'updatebanner':
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $id = $_GET["id"];
                $bner = loadOnebanner($id);
            }
            include "banner/update.php";
            break;
        case 'updatebner':
                if (isset($_POST['capnhat'])&&($_POST['capnhat'])) {
                    $id_banner=$_POST['id_banner'];
                    // $imgbanner=$_POST['img'];
                    $link=$_POST['link'];
                    $imgbanner=$_FILES['img']['name'];
                    $target_dir="../../../public/images/banner/";
                    $target_file=$target_dir . basename($_FILES["img"]["name"]);
                    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                    update_banner($id_banner, $imgbanner, $link);
                    $thongbao="Cap Nhat thanh cong";
                }else{
                    $thongbao="Cap nhat loi";
                }
                
                $listbanner=load_all_banner();
                include "banner/update.php";
                break;
        //end banner//

        //tin tuc//
        case 'listtt':
            include "tintuc/list.php";
            break;
        case 'addtt':
            include "tintuc/add.php";
            break;
        case 'updatett':
            include "tintuc/update.php";
            break;
        //end tin tuc//

        //khuyen mai//
        case 'listkm':
            include "khuyenmai/list.php";
            break;
        case 'addkm':
            include "khuyenmai/add.php";
            break;
        case 'updatekm':
            include "khuyenmai/update.php";
            break;
        //end tin tuc//

        //lien he//
        case 'listlh':
            include "lienhe/list.php";
            break;
        case 'updatelh':
            include "lienhe/update.php";
            break;
        //end lien he//
        
    }
}else{
    include "home.php";
}
?>