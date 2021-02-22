<footer style="background-image: url(<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['bg_footer']->image?>); padding-bottom: 146px;
    background-size: 100% 100%;" >
    <div class="container " style="margin-top: 0px">
        <div class="list-top ">
            <div class="top-item row">
                <div class="item flex-column item-none-1 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <a href="">
                        <img src="<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['logo_footer']->image?>" alt="">
                    </a>
                    <p>
                        Siêu thị MiniMart cung cấp các mặt hàng siêu sạch đem lại sức khỏe cho bạn.
                    </p>
                    <div class="d-flex">
                        <img class="img_bg" src="<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['icon_footer1']->image?>" alt="">
                        <p><?=$data['info_shop']->address?></p>
                    </div>
                    <div class="d-flex">
                        <img class="img_bg" src="<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['icon_footer2']->image?>" alt="">
                        <p><?=$data['info_shop']->phone?></p>
                    </div>
                    <div class="d-flex">
                        <img class="img_bg" src="<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['icon_footer3']->image?>" alt="">
                        <p><?=$data['info_shop']->email?></p>
                    </div>
                </div>
                <ul class="item  item-list flex-column col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h4>Trang</h4>
                    <li> <a href="<?=BASE_URL?>/home">Trang chủ</a></li>
                    <li> <a href="<?=BASE_URL?>/info_shop">Giới thiệu</a></li>
                    <li> <a href="<?=BASE_URL?>/news">Tin tức</a></li>
                    <li> <a href="<?=BASE_URL?>/contact">Liên hệ</a></li>
                </ul>

                <ul class="item item-list flex-column  col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h4><a href="">Gửi email</a></h4>
                    <li> <span class="text">Gửi email nhận khuyến mãi</span>
                    </li>
                    <li class="form">
                        <form action="<?= BASE_URL?>/reset/email_sale" method="post">
                        <input type="email" name="email" id="" placeholder="Email của bạn" required>
                        <button type="submit" name="btn_email">
                            <i class="fa fa-paper-plane"></i>
                        </button>
                        </form>
                    </li>
                    <li>
                        <!-- <php
                            $session = new session(); $session->flash();
                        ?> -->
                    </li>
                    <li>
                        <h4 class="item-title">
                            <a href="">Kết nối</a>
                        </h4>
                        <ul class="follow_option d-flex">

                            <li>
                                <a class="goplus" href="#" title="Theo dõi Google Plus Minimart"><i
                                        class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li>
                                <a class="twitter" href="#" title="Theo dõi Twitter Minimart"><i
                                        class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="fb" href="#" title="Theo dõi Facebook Minimart"><i
                                        class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a class="in" href="#" title="Theo dõi Linkedin Minimart"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
        <div class="footer_bottom">

            <div class="top">
                <a href="#" id="back-to-top" class="backtop show" title="Lên đầu trang">
                    Lên đầu trang <i class="fa fa-arrow-up"></i></a>
            </div>


        </div>

    </div>
</footer>
