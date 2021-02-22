<li class="breadcrumb-item active cl-control" aria-current="page">Đăng nhập tài khoản</li>
</nav>
</div>
</section>
<div class="container-fluild login-detail">
    <div class="container">
        <?php 
        use App\Core\Session;
        $session = new Session;
        $errors = $session->getFormError();
        $states = $session->getFormState();
        $session->flash();
        ?>
        <h4>ĐĂNG NHẬP TÀI KHOẢN</h4>
        <div class="main">
            <div class="to-login">
                <p>Nếu bạn đã có tài khoản, đăng nhập tại đây</p>
                <form action="<?=BASE_URL ?>/login_store" method="post">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="<?php echo $states['email'] ?? ''; ?>">
                        <p style="color:red;">
                            <?php echo $errors['email'] ?? ''; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu *</label>
                        <input type="password" class="form-control" id="pwd" name="password" placeholder="Mật khẩu"
                            value="<?php echo $states['password'] ?? ''; ?>">
                        <p style="color:red;">
                            <?php echo $errors['password'] ?? ''; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="">Đăng nhập</button>
                        <a class="btn btn-info" href="<?=BASE_URL ?>/register">Đăng ký</a>
                    </div>
                </form>
            </div>
            <div class="get-pass">
                <p>Bạn quên mật khẩu? Nhập địa chỉ email để lấy lại mật khẩu qua email</p>
                <form action="<?= BASE_URL?>/reset" method="post">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" name="email" id="email" required placeholder="Email">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" name="btn_reset">Lấy lại mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>