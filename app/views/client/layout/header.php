<?php

$user=null;

// session_destroy();

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    // echo "<pre>";
    // var_dump($user);
    // die;
}


if ($user && ($user->role == 0)) {
    if (!empty($user->image)) {
       $avatar= "<a href='".BASE_URL."/info_user/".$user->id."'><img src='".IMGAE_DISPLAY."/backend/image/user/".$user->image." ' style='width:50px; height: 50px;border-radius: 90%;margin-right: 7px;'></a>";
    }
    else{
        $avatar="<a href='".BASE_URL."/info_user/".$user->id."'><i class='fas fa-user'></i></a>"; 
    } 
    $text="<a href='".BASE_URL."/logout'>Đăng xuất</a>";
}
elseif($user && ($user->role) == 1){
    
    if (!empty($user->image)) {
       $avatar= "<a href='".BASE_URL."/info_user/".$user->id."'><img src='".IMGAE_DISPLAY."/backend/image/user/".$user->image." ' style='width:50px; height: 50px;border-radius: 90%;margin-right: 7px;'></a>";
    }
    else{
        $avatar="<i class='fas fa-user'></i>"; 
    } 
    
    $text="<a href='".BASE_URL."/admin/home'>Admin</a> <br>
    <a href='".BASE_URL."/logout'>Đăng xuất</a>";
}
else{
    $text="<a href='".BASE_URL."/login'>Đăng nhập</a> <br>
    <a href='".BASE_URL."/register'>Đăng ký</a>";
    $avatar="<i class='fas fa-user'></i>";
}
?>

<?php
use App\Models\InfoShop;
use App\Models\Slider;

    // Hàm sử dụng các thuộc tính
    $info_shop1 = InfoShop::all();
    $data['info_shop'] = $info_shop1[0];
    $data['slides'] = Slider::all();
    $data['logo_header'] = Slider::like('chuc_nang','logo_header');
    $data['logo_footer'] = Slider::like('chuc_nang','logo_footer');
    $data['banner'] = Slider::like('chuc_nang','banner');
    $data['bg_image1'] = Slider::like('chuc_nang','bg_image1');
    $data['bg_image2']= Slider::like('chuc_nang','bg_image2');
    $data['bg_image3'] = Slider::like('chuc_nang','bg_image3');
    $data['icon_footer1'] = Slider::like('chuc_nang','icon_footer1');
    $data['icon_footer2'] = Slider::like('chuc_nang','icon_footer2');
    $data['icon_footer3'] = Slider::like('chuc_nang','icon_footer3');
    $data['bg_footer'] = Slider::like('chuc_nang','bg_footer');
    $data['bg_body_right'] = Slider::like('chuc_nang','bg_body_right');
    $data['bg_body_left'] = Slider::like('chuc_nang','bg_body_left');

?>

<header>
    <div class="index-container">
        <!-- start top -->
        <div class="container">
            <div class="index-top">
                <div class="top">
                    <i class="fas fa-check"></i>
                    <p>Giá cả nhiều ưu đãi hấp dẫn khi mua hàng</p>
                </div>
                <div class="top top-middle">
                    <i class="fas fa-plane"></i>
                    <p>Giao hàng miễn phí toàn quốc và nhanh chóng</p>
                </div>
                <div class="top">
                    <i class="fas fa-star"></i>
                    <p>Sản phẩm đa dạng đạt tiêu chuẩn có kiểm định</p>
                </div>
            </div>
        </div>
        <!-- end top -->
        <!-- start header -->
        <header class="container-fluid">
            <div class="container">
                <div class="index-header">
                    <div class="logo">
                        <a href="<?=BASE_URL?>/home">
                            <img src="<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['logo_header']->image?>" alt="">
                        </a>
                    </div>
                    <div class="flex">
                        <div class="header-middle">
                            <form id="form-search" method="get" action="<?=BASE_URL?>/search/" class="form">
                                <i class="fas fa-search"></i>
                                <input type="text" id="myText" value="<?= $data['request'] ?? ''?>"
                                    name="search_text" placeholder="Tìm kiếm ở đây">
                                <button id="search">Tìm kiếm</button>
                            </form>


                            <div class="link">
                                <a href="<?= BASE_URL?>/product_ban_chay">Bán chạy nhất</a> |
                                <a href="<?= BASE_URL?>/news">Tin tức</a> |
                                <a href="<?= BASE_URL?>/product_sale">Giảm giá</a>
                            </div>
                        </div>
                        <div class="header-final">
                            <div class="detail detail-none1">
                                <!-- <i class="fas fa-heart"></i> -->
                                <i class="fas fa-history"></i>
                                <a href="<?= BASE_URL?>/history"> Xem đơn hàng</a>
                            </div>
                            <div class="detail detail-none2">`
                                <?php  echo $avatar; ?>  
                                <div>
                                <?php  echo $text; ?>

                            </div>
                        </div>
                        <div class="detail btn">
                            <i class="fas fa-shopping-bag"></i>
                            <a href="<?= BASE_URL?>/cart">GIỎ
                                HÀNG(<?= isset ($_SESSION['dem'])?$_SESSION['dem']:"" ?>)</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</header>
<!-- end header -->
</div>
</header>

<script>
jQuery(document).ready(function(){

	var fixKeyword=function (str) {  
		str= str.toLowerCase();   
		str= str.replace(/[^\s0-9a-zA-ZấầẩẫậẤẦẨẪẬắằẳẵặẮẰẲẴẶáàảãạâăÁÀẢÃẠÂĂếềểễệẾỀỂỄỆéèẻẽẹêÉÈẺẼẸÊíìỉĩịÍÌỈĨỊốồổỗộỐỒỔÔỘớờởỡợỚỜỞỠỢóòỏõọôơÓÒỎÕỌÔƠứừửữựỨỪỬỮỰúùủũụưÚÙỦŨỤƯýỳỷỹỵÝỲỶỸỴđĐ]+/g," "); 
		str= str.replace(/^\s+|\s+$/g,""); 
		str= str.replace(/\s{1,}/g,"+"); 		
		return str;  
	}   
	jQuery('#form-search').submit(function(){
		var keywordObj=jQuery(this).find('input[name=search_text]')[0];
		
		if(typeof keywordObj !='undefined' && keywordObj!=null)
		{
			var keyword=jQuery(keywordObj).val();
			keyword=fixKeyword(keyword);
			keyword=jQuery.trim(keyword);
			if(keyword=='')
			{
				alert('Bạn chưa nhập từ khóa. (Không tính các ký tự đặc biệt vào độ dài từ khóa)');
				jQuery(keywordObj).focus();
				return false;
			}
			window.location.replace('http://localhost<?=BASE_URL?>/search/'+keyword+'/');
		}
		return false;
	});
});
</script>