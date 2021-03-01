
<li class="breadcrumb-item active cl-control" aria-current="page">Thông tin khách hàng</li>
            </nav>
        </div>
    </section>
 
<div class="container-fluild cart-detail">
<div class="container">
    <h1> Sửa thông tin khách hàng</h1>
    <?php  
    
    use App\Core\Session;
        $userId = $data['userId'];
        $session = new Session;
        $errors = $session->getFormError();
        $states = $session->getFormState();
        $session->flash();
  
    ?>

    <?php date_default_timezone_set("Asia/Ho_Chi_Minh"); ?>
    <form action="<?=BASE_URL ?>/user_store/<?= $userId->id ?>" enctype="multipart/form-data" method="post">
    <input  name="id" type="hidden" value="<?= $userId->id ?>">
        <div class="form-group">
            <label for="user_name">Tên</label>
            <input type="text" name="user_name" class="form-control" placeholder="Nhập Tên" id="user_name" value="<?= $userId->user_name ?>">
            <p style="color:red;">
                <?php echo $errors['user_name'] ?? ''; ?>
            </p>
        </div>

        <div class="form-group">
            <label for="image">Ảnh</label>
            <input type="file" class="form-control" name="image" id="image" require>
            <div style="width: 200px;max-height: 100px; margin-top: 10px;">
                <img style="max-width: 100%; max-height: 100%;" src="<?=IMGAE_DISPLAY?>/backend/image/user/<?=$userId->image?>" alt="">
            </div>
            <p style="color:red;">
            <?php echo $errors['image'] ?? ''; ?>
        </p>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Nhập Email" value="<?= $userId->email ?>">
            <p style="color:red;">
                <?php echo $errors['email'] ?? ''; ?>
            </p>
        </div>

        <div class="form-group">
            <label for="user_address">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Nhập Địa chỉ" value="<?= $userId->address ?>">
            <p style="color:red;">
                <?php echo $errors['address'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="user_phone">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Nhập số điện thoại" value="<?= $userId->phone ?>">
            <p style="color:red;">
                <?php echo $errors['phone'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
        <label for="user_phone">Ngày đăng ký</label>
            <input type="data" disabled class="form-control" name="created_at" id="created_at" value="<?= $userId->created_at ?>">
        </div>
        <div class="form-group ">
        <label for="user_phone">Ngày cập nhật</label>
            <input type="data" disabled class="form-control" name="updated_at" id="updated_at" value="<?= date("Y-m-d") ?>">

        </div>
        <button type="submit" name="" onclick="return confirm('Ban có chắc muốn cập nhật ?')" class="btn btn-primary">Cập nhât</button>
        <a class="btn btn-info" href="<?=BASE_URL?>/home">Quay lại</a>
    </form>
</div>


</div>