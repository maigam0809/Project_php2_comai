    <li class="breadcrumb-item active cl-control" aria-current="page">
        <?php $a = $data['cate_id'];
            echo $a->name ?>
    </li>
    </nav>

    </div>
    </section>
    <!-- bắt đầu phần content -->

    <div class="content content_sale">
        <div class="container col-12 col-bg">
            <div class="row">
                <div class="bg_collection clearfix">
                    <!-- start turn left -->
                    <article class="content_left dqdt-sidebar sidebar left-content col-lg-3 col-lg-3-fix show-product2">
                        <article class="aside-filter aside-item sidebar-category collection-category">
                            <div class="aside-title">
                                <div class="title_module border_bottom_10">
                                    <h2><span>Danh sách sản phẩm</span></h2>
                                </div>
                            </div>
                            <div class="aside-content">
                                <nav class="nav-category navbar-toggleable-md">
                                    <ul class="nav navbar-pills">
                                        <?php foreach ($data['categories'] as $item) : ?>
                                        <li class="nav-item lv1">
                                            <a href="<?= BASE_URL ?>/product_type_sale/<?= $item->id?>"
                                                class="nav-link"><?= $item->name ?></a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </nav>
                            </div>

                        </article>

                        <article class="aside-filter">
                            <div class="filter-container">
                                <div class="filter-container__selected-filter">

                                    <div class="filter-container__selected-filter-list">
                                        <ul></ul>
                                    </div>

                                </div>
                            </div>
                        </article>

                        <article class="aside-item aside-filter hidden-md hidden-sm hidden-xs">
                            <div class="aside-title aside-title-fillter">
                                <div class="title_module border_bottom_10">
                                    <h2><span>SP bán chạy</span></h2>
                                </div>
                            </div>

                            <div class="sale_off_today">
                                <div class="not-dqowl wrp_list_product">
                                    <?php $dem = 0;
                                foreach ($data['topView5'] as $item) :
                                    $toll_sale = 100 - $item->sale;
                                    $tich = $toll_sale * $item->price;
                                    $price_sale = ($tich / 100);
                                ?>
                                    <?php if ($dem <= 5) { ?>
                                    <div class="item_small">
                                        <div class="product-mini-item clearfix on-sale">
                                            <a href="<?= BASE_URL ?>/product_detail/<?= $item->id ?>"
                                                class="product-img">
                                                <img src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item->image ?>"
                                                    alt="">
                                            </a>
                                            <div class="product-info">
                                                <h3>
                                                    <a href="<?= BASE_URL ?>/product_detail/<?= $item->id ?>"
                                                        class="product-name text3line"><?= $item->name ?></a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="price">
                                                        <span class="product-price"><?= $price_sale ?>₫/kg</span>
                                                    </span>
                                                    <!-- giá khuyến mãi -->
                                                    <span class="old-price">
                                                        <del class="sale-price"><?= $item->price ?>₫/kg</del>
                                                    </span>
                                                    <!-- giá gốc của sản phẩm nhé-->
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php $dem++;
                                    } ?>
                                    <?php endforeach; ?>
                                    <span class="view_more">
                                        <a href="" title="Xem thêm">
                                            Xem thêm
                                            <i class="fas fa-caret-right"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </article>

                    </article>
                    <!-- end turn left -->


                    <!-- start turn right -->
                    <article class="content_right dqdt-sidebar sidebar left-content col-lg-9 col-lg-9-fix col-xs-12">
                        <article class="aside-filter aside-item sidebar-category collection-category">
                            <div class="aside-title">
                                <div class="title_module border_bottom_10">
                                    <h2><span><?php $a = $data['cate_id'];
                                            echo $a->name ?></span></h2>
                                </div>
                            </div>
                            <?php if (!empty($data['proId'])) : ?>
                            <section class="products-view products-view-grid aside-content">
                                <div class="row row-noGutter-45">
                                    <!-- box-1 -->
                                    <?php
                                    foreach ($data['proId'] as $item) :
                                        $toll_sale = 100 - $item->sale;
                                        $tich = $toll_sale * $item->price;
                                        $price_sale = ($tich / 100);
                                    ?>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="  margin-bottom: 10px;">

                                        <div class="product_border">
                                            <div class="product-box-h">
                                                <div class="border_in">
                                                    <div class="icon_pro">
                                                        <?php if ($item->sale> 0) : ?>
                                                        <div class="price"
                                                            style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                                            <a data-toggle="modal" data-target="#myModal"
                                                                class="xem_nhanh" href="">
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
                                                        <div>
                                                            <a class="like" href="#">
                                                                <i class="far fa-heart"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-thumbnail">
                                                        <a class="image_link"
                                                            href="<?= BASE_URL ?>/product_detail/<?= $item->id ?>"
                                                            title="<?= $item->name ?>">
                                                            <img class="lazyload loaded"
                                                                src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item->image ?>">
                                                        </a>
                                                        <div class="pro_action">
                                                            <?php if ($item->quantity != 0) : ?>
                                                            <form action="" method="post">
                                                                <input type="hidden" name="<?= $item->id ?>" value="1">
                                                                <button type="submit" name="btn_cart"
                                                                    class="btn btn-cart hidden ">Thêm vào giỏ hàng
                                                                </button>
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
                                                                title="<?= $item->name ?>"><?= $item->name?></a>
                                                        </h3>
                                                        <div class="product-hides">
                                                            <div class="price-box clearfix">
                                                                <span
                                                                    class="price product-price"><?= $price_sale ?>₫/kg</span>
                                                                <span class="price product-price-old">
                                                                    <?php if ($item->sale > 0) : ?>
                                                                    <del><?= $item->price ?>₫/kg</del>
                                                                    <?php endif ?>
                                                                </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <?php endforeach; ?>
                                </div>
                            </section>
                            <!-- <span class="view_more">
                                <a href="" title="Xem thêm">
                                    <php if ($_SESSION['so_luong_page'] > 1) { ?>
                                        <php for ($i = 1; $i <= $_SESSION['so_luong_page']; $i++) { ?>
                                            <a class="btn btn-info" href="<?= BASE_URL ?>/product_type_sale/index/<= $item['cate_id'] ?>/<= $i?>"><?= $i ?></a>
                                           

                                    <php }
                                    } ?>
                                </a>
                            </span> -->
                            <?php endif ?>
                            <?php if (empty($data['proId'])) { ?>
                            <img src="<?= IMGAE_DISPLAY ?>/backend/image/products/404.jpg" style="width: 100%;">
                            <?php } ?>
                        </article>
                    </article>
                    <!-- end turn right -->
                </div>
            </div>
        </div>
    </div>
    <!-- kết thúc phần content -->