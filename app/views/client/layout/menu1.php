<section >
    <div id="background" style="background-image: url(<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['banner']->image?>);">
        <div class="container">
            <div id="menu" class="col-lg-3 col-md-12">
                <div id="cate2" class="cate2">
                    <p>
                        <span><i class="fas fa-bars" id="cate-menu"></i> DANH MỤC</span>
                        <i class="hiden fas fa-user" id="fa-user"></i>
                    </p>
                    <div id="acount" class="acount">
                        <ul>
                            <li style=" list-style: none;"><a href="login.html">Đăng nhập</a></li>
                            <li style=" list-style: none;"><a href="">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div id="cate" class="dm-none">
                    <a href="">
                        <span><i class="fas fa-bars"></i> DANH MỤC</span>
                        <i class="hiden fas fa-user"></i>
                    </a>
                </div>

                <div class="show2 hiden-none-menu" id="show_menu_cate">
                    <?php foreach($data['categories'] as $item):?>
                    <li>
                        <a href="<?= BASE_URL?>/product_type_sale/<?= $item->id?>"><img class="hiden-none" src="<?=IMGAE_DISPLAY?>/backend/image/categories/<?=$item->image?>" alt=""><?=$item->name?></a>
                    </li>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>