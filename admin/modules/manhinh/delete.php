<?php
    require_once __DIR__. '/../../autoload/autoload.php';

    if($_SESSION['admin_lv'] == 1)
    {
        $_SESSION['error'] = "Bạn không có quyền thay đổi thông tin này!";
        redirectAdmin("manhinh");
    }

    $id = intval(getInput('id'));

    $EditProduct = $db->fetchID("product",$id);
    if( empty($EditProduct))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("manhinh");
    }

    $num = $db->delete("product",$id);
    $num2 = $db->delete("manhinh",$id);
    if($num > 0)
        {
            $_SESSION['success'] = "Xóa thành công!";
            redirectAdmin("manhinh");
        }
        else
        {
             $_SESSION['error'] = "Xóa thất bại!";
             redirectAdmin("manhinh");
        }

?>