<!-- start content -->
<section class="content">
    <div class="container">
        <!-- start voucher-->
        <div class="voucher">

            <div class="col-lg-4  img_voucher">
                <div class="img_effect ">
                    <a href="#" title="Banner 1">
                        <img class="image_voucher"
                            src="<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['bg_image1']->image?>">
                    </a>
                </div>
            </div>

            <div class="col-lg-4  img_voucher">
                <div class="img_effect ">
                    <a href="#" title="Banner 1">
                        <img class="image_voucher"
                            src="<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['bg_image2']->image?>">
                    </a>
                </div>
            </div>

            <div class="col-lg-4  img_voucher">
                <div class="img_effect ">
                    <a href="#" title="Banner 1">
                        <img class="image_voucher"
                            src="<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['bg_image3']->image?>">
                    </a>
                </div>
            </div>



        </div>
        <!-- end voucher-->

        <!-- start Sản phẩm bán chạy -->

        <div class="product">
            <div class="title_top_menu">
                <span class="title-head">
                    <a href="#" class="dk" title="Sản phẩm bán chạy">Sản phẩm bán chạy</a>

                </span>
            </div>
            <div class="product_wap owl-carousel ">

                <?php foreach($data['top10'] as $item){
                    $toll_sale = 100 - $item->sale;
                    $tich = $toll_sale * $item->price;
                    $price_sale = ($tich / 100);
                 ?>

                <div class="card">
                    
                    <div class="product_border">
                        <div class="product-box-h">
                            <div class="border_in">
                                <div class="icon_pro">
                                    <?php if ($item->sale > 0) : ?>
                                    <div class="price"
                                        style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                        <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                            - <?= $item->sale ?>%
                                        </a>
                                    </div>
                                    <?php else : ?>
                                    <div class="price"
                                        style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                        <a data-toggle="modal" data-target="#myModal" href="">
                                            no price
                                        </a>
                                    </div>
                                    <?php endif ?>

                                    <!-- <div>
                                        <a class="like" href="#">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </div> -->
                                    <div>
                                        <a data-toggle="modal" data-target="#myModal" class="xem_nhanh hidden" href="">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-thumbnail">
                                    <a class="image_link" href="<?= BASE_URL ?>/product_detail/<?= $item->id ?>"
                                        title="<?= $item->name ?>">
                                        <img class="lazyload loaded"
                                            src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item->image ?>">
                                    </a>
                                    <div class="pro_action">
                                        <?php if ($item->quantity != 0) : ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="<?= $item->id ?>" value="1">
                                            <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào
                                                giỏ hàng </button>
                                        </form>
                                        <?php else : ?>
                                        <form>
                                            <a class="btn btn_cart">Hết hàng </a>
                                        </form>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-name"><a class="height_name" href="#"
                                            title="Chuối Nam Mỹ"><?=$item->name?></a>
                                    </h3>
                                    <div class="product-hides">
                                        <div class="price-box clearfix">
                                            <span class="price product-price"><?=$item->price?></span>
                                            <span class="price product-price-old">
                                                <del><?=$item->price?></del>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <?php }?>
                <!-- end product -->
            </div>

        </div>

        <!-- end Sản phẩm bán chạy -->

        <!-- start đồ khô -->

        <div class="product" style="margin-top: -40px;">
            <div class="title_top_menu">
                <span class="title-head">
                    <a href="#" class="dk" title="Sản phẩm bán chạy"><?=$data['takeHoaQuaSay'][0]->cate_name?></a>
                </span>
            </div>
            <div class="product_wap owl-carousel ">
                <?php foreach($data['takeHoaQuaSay'] as $item){
                    $toll_sale = 100 - $item->sale;
                    $tich = $toll_sale * $item->price;
                    $price_sale = ($tich / 100);
                 ?>
                <div class="card">
                    <div class="product_border">
                        <div class="product-box-h">
                            <div class="border_in">
                                <div class="icon_pro">
                                    <?php if ($item->sale > 0) : ?>
                                    <div class="price"
                                        style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                        <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                            - <?= $item->sale ?>%
                                        </a>
                                    </div>
                                    <?php else : ?>
                                    <div class="price"
                                        style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                        <a data-toggle="modal" data-target="#myModal" href="">
                                            no price
                                        </a>
                                    </div>
                                    <?php endif ?>

                                    <!-- <div>
                                        <a class="like" href="#">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </div> -->
                                    <div>
                                        <a data-toggle="modal" data-target="#myModal" class="xem_nhanh hidden" href="">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-thumbnail">
                                    <a class="image_link" href="<?= BASE_URL ?>/product_detail/<?= $item->id ?>"
                                        title="<?= $item->name ?>">
                                        <img class="lazyload loaded"
                                            src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item->image ?>">
                                    </a>
                                    <div class="pro_action">
                                        <?php if ($item->quantity != 0) : ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="<?= $item->id ?>" value="1">
                                            <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào
                                                giỏ hàng </button>
                                        </form>
                                        <?php else : ?>
                                        <form>
                                            <a class="btn btn_cart">Hết hàng </a>
                                        </form>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-name"><a class="height_name" href="#"
                                            title="Chuối Nam Mỹ"><?=$item->name?></a>
                                    </h3>
                                    <div class="product-hides">
                                        <div class="price-box clearfix">
                                            <span class="price product-price"><?=$item->price?></span>
                                            <span class="price product-price-old">
                                                <del><?=$item->price?></del>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <?php }?>
                <!-- end product -->
            </div>

        </div>

        <!-- end đồ khô -->

        <!-- start Rau quả -->
          
        <div class="product" style="margin-top: -40px;">
            <div class="title_top_menu">
                <span class="title-head">
                    <a href="#" class="dk" title="Sản phẩm bán chạy"><?=$data['takeHoaQua'][0]->cate_name?></a>

                </span>
            </div>
            <div class="product_wap owl-carousel ">

                <?php foreach($data['takeHoaQua'] as $item){
                    $toll_sale = 100 - $item->sale;
                    $tich = $toll_sale * $item->price;
                    $price_sale = ($tich / 100);
                 ?>

                <div class="card">
                    
                    <div class="product_border">
                        <div class="product-box-h">
                            <div class="border_in">
                                <div class="icon_pro">
                                    <?php if ($item->sale > 0) : ?>
                                    <div class="price"
                                        style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                        <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                            - <?= $item->sale ?>%
                                        </a>
                                    </div>
                                    <?php else : ?>
                                    <div class="price"
                                        style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                        <a data-toggle="modal" data-target="#myModal" href="">
                                            no price
                                        </a>
                                    </div>
                                    <?php endif ?>

                                    <!-- <div>
                                        <a class="like" href="#">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </div> -->
                                    <div>
                                        <a data-toggle="modal" data-target="#myModal" class="xem_nhanh hidden" href="">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-thumbnail">
                                    <a class="image_link" href="<?= BASE_URL ?>/product_detail/<?= $item->id ?>"
                                        title="<?= $item->name ?>">
                                        <img class="lazyload loaded"
                                            src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item->image ?>">
                                    </a>
                                    <div class="pro_action">
                                        <?php if ($item->quantity != 0) : ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="<?= $item->id ?>" value="1">
                                            <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào
                                                giỏ hàng </button>
                                        </form>
                                        <?php else : ?>
                                        <form>
                                            <a class="btn btn_cart">Hết hàng </a>
                                        </form>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-name"><a class="height_name" href="#"
                                            title="Chuối Nam Mỹ"><?=$item->name?></a>
                                    </h3>
                                    <div class="product-hides">
                                        <div class="price-box clearfix">
                                            <span class="price product-price"><?=$item->price?></span>
                                            <span class="price product-price-old">
                                                <del><?=$item->price?></del>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <?php }?>
                <!-- end product -->
            </div>

        </div>

        <!-- end rau quả -->
         <!-- start Rau củ -->
          
         <div class="product" style="margin-top: -40px;">
            <div class="title_top_menu">
                <span class="title-head">
                    <a href="#" class="dk" title="Sản phẩm bán chạy"><?=$data['takeRauCu'][0]->cate_name?></a>

                </span>
            </div>
            <div class="product_wap owl-carousel ">

                <?php foreach($data['takeRauCu'] as $item){
                    $toll_sale = 100 - $item->sale;
                    $tich = $toll_sale * $item->price;
                    $price_sale = ($tich / 100);
                 ?>

                <div class="card">
                    
                    <div class="product_border">
                        <div class="product-box-h">
                            <div class="border_in">
                                <div class="icon_pro">
                                    <?php if ($item->sale > 0) : ?>
                                    <div class="price"
                                        style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                        <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                            - <?= $item->sale ?>%
                                        </a>
                                    </div>
                                    <?php else : ?>
                                    <div class="price"
                                        style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                        <a data-toggle="modal" data-target="#myModal" href="">
                                            no price
                                        </a>
                                    </div>
                                    <?php endif ?>

                                    <!-- <div>
                                        <a class="like" href="#">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </div> -->
                                    <div>
                                        <a data-toggle="modal" data-target="#myModal" class="xem_nhanh hidden" href="">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-thumbnail">
                                    <a class="image_link" href="<?= BASE_URL ?>/product_detail/<?= $item->id ?>"
                                        title="<?= $item->name ?>">
                                        <img class="lazyload loaded"
                                            src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item->image ?>">
                                    </a>
                                    <div class="pro_action">
                                        <?php if ($item->quantity != 0) : ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="<?= $item->id ?>" value="1">
                                            <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào
                                                giỏ hàng </button>
                                        </form>
                                        <?php else : ?>
                                        <form>
                                            <a class="btn btn_cart">Hết hàng </a>
                                        </form>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-name"><a class="height_name" href="#"
                                            title="Chuối Nam Mỹ"><?=$item->name?></a>
                                    </h3>
                                    <div class="product-hides">
                                        <div class="price-box clearfix">
                                            <span class="price product-price"><?=$item->price?></span>
                                            <span class="price product-price-old">
                                                <del><?=$item->price?></del>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <?php }?>
                <!-- end product -->
            </div>

        </div>

        <!-- end rau củ -->
    </div>

    <div class="content-buttom show-product" style="margin-top: -40px;">
        <div class="img flex">
            <img src="<?= IMGAE_DISPLAY ?>/backend/image/sliders/<?= $data['bg_body_left']->image ?>" alt="">
            <img src="<?= IMGAE_DISPLAY ?>/backend/image/sliders/<?= $data['bg_body_right']->image ?>" alt="">
        </div>
        <div class="container content_product_relative">

        <div class="product">
            <div class="title_top_menu">
                <span class="title-head">
                    <a href="#" class="dk" title="<?=$data['takeDongLanh'][0]->cate_name?>"><?=$data['takeDongLanh'][0]->cate_name?></a>

                </span>
            </div>
            <div class="product_wap owl-carousel ">

                <?php foreach($data['takeDongLanh'] as $item){
                    $toll_sale = 100 - $item->sale;
                    $tich = $toll_sale * $item->price;
                    $price_sale = ($tich / 100);
                 ?>

                <div class="card">
                    
                    <div class="product_border">
                        <div class="product-box-h">
                            <div class="border_in">
                                <div class="icon_pro">
                                    <?php if ($item->sale > 0) : ?>
                                    <div class="price"
                                        style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                        <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                            - <?= $item->sale ?>%
                                        </a>
                                    </div>
                                    <?php else : ?>
                                    <div class="price"
                                        style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                        <a data-toggle="modal" data-target="#myModal" href="">
                                            no price
                                        </a>
                                    </div>
                                    <?php endif ?>

                                    <!-- <div>
                                        <a class="like" href="#">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </div> -->
                                    <div>
                                        <a data-toggle="modal" data-target="#myModal" class="xem_nhanh hidden" href="">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-thumbnail">
                                    <a class="image_link" href="<?= BASE_URL ?>/product_detail/<?= $item->id ?>"
                                        title="<?= $item->name ?>">
                                        <img class="lazyload loaded"
                                            src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item->image ?>">
                                    </a>
                                    <div class="pro_action">
                                        <?php if ($item->quantity != 0) : ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="<?= $item->id ?>" value="1">
                                            <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào
                                                giỏ hàng </button>
                                        </form>
                                        <?php else : ?>
                                        <form>
                                            <a class="btn btn_cart">Hết hàng </a>
                                        </form>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-name"><a class="height_name" href="#"
                                            title="Chuối Nam Mỹ"><?=$item->name?></a>
                                    </h3>
                                    <div class="product-hides">
                                        <div class="price-box clearfix">
                                            <span class="price product-price"><?=$item->price?></span>
                                            <span class="price product-price-old">
                                                <del><?=$item->price?></del>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <?php }?>
                <!-- end product -->
            </div>

        </div>
        </div>



    </div>
   
</section>
<!-- end content-->


<script type="text/javascript" src="<?=TOPUBLIC?>/js/slider_sick.js"></script>