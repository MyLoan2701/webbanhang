<?php
    if(!isset($_POST['request']) && !isset($_GET['request'])) die(null);

    // Hướng dẫn tại https://stackoverflow.com/questions/17122218/get-all-the-images-from-a-folder-in-php 
    switch ($_POST['request']) {
    	// lấy tất cả hình ảnh banners
    	case 'getallbanners':
				$directory = "../../../images/banner-chung";
                // lấy file ảnh định dạng png hoặc gif
                $images = glob($directory . "/*.{jpg,png,gif}", GLOB_BRACE); 
                die (json_encode($images));
    		break;

        case 'getsmallbanner':
                $directory = "../../../images/smallbanner";
                $images = glob($directory . "/*.{jpg,png,gif}", GLOB_BRACE); 
                die (json_encode($images));
            break;
            
        
    	default:
    		# code...
    		break;
    }
?>