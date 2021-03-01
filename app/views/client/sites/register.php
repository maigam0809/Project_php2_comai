

<li class="breadcrumb-item active cl-control" aria-current="page">Đăng ký tài khoản</li>
            </nav>
        </div>
    </section>
<div class="container-fluild register-detail">
        <div class="container">
        <?php 
        
        use App\Core\Session;
        $session = new Session;
        $errors = $session->getFormError();
        $states = $session->getFormState();
        $session->flash();
        ?>
            <h4>ĐĂNG KÝ TÀI KHOẢN</h4>
            <p>Nếu chưa có tài khoản vui lòng đăng ký tại đây</p>
        </li>
          
        </div>
            <form action="<?=BASE_URL ?>/register_store" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="user_name">Tên</label>

                    <input type="text" name="user_name" class="form-control" placeholder="Nhập Tên" id="user_name" value="<?php echo $states['user_name'] ?? ''; ?>">
                    <p style="color:red;">
                    <?php echo $errors['user_name'] ?? ''; ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control"  id="email" placeholder="Nhập Email" value="<?php echo $states['email'] ?? ''; ?>">
                    <p style="color:red;">
                    <?php echo $errors['email'] ?? ''; ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="image">Ảnh</label>
                    <input type="file" class="form-control" name="image" id="image" require>
                    <p style="color:red;">
                    <?php echo $errors['image'] ?? ''; ?>
                    </p>
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="Nhập Mật khẩu" id="password"  value="<?php echo $states['password'] ?? ''; ?>">
                    <p style="color:red;">
                    <?php echo $errors['password'] ?? ''; ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="password">Xác nhận mật khẩu</label>
                    <input type="password" name="password2" class="form-control" placeholder="Nhập Mật khẩu" id="password2"  value="<?php echo $states['password2'] ?? ''; ?>">
                    <p style="color:red;">
                    <?php echo $errors['password2'] ?? ''; ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Nhập số điện thoại"  value="<?php echo $states['phone'] ?? '' ?>">
                    <p style="color:red;">
                    <?php echo $errors["phone"] ?? ''; ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>

                    <input type="text" class="form-control" name="address" id="address" placeholder="Nhập Địa chỉ"  value="<?php echo $states['address'] ?? '' ?>">
                    <p style="color:red;">
                    <?php echo $errors["address"] ?? ''; ?>
                    </p>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="role" id="role" value="">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="created_at" id="created_at" value="<?= date("Y-m-d", time()); ?>">
                </div>

                <button type="submit" name="" class="btn btn-primary">Đăng ký</button>
                <a href="<?=BASE_URL?>/login" class="btn btn-danger"> Đăng nhập</a>
            </form>
        </div>

    </div>