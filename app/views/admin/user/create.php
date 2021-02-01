
<div class="container">
    <?php  $session->flash();?>
    <h1>Thêm khách hàng</h1>
    <form action="<?=BASE_URL?>/admin/users/store" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="name">Tên khách hàng</label>
            <input type="text" name="user_name" class="form-control" value="<?php echo $states['user_name'] ?? ''; ?>" placeholder="Enter name" id="name" require>
            <p style="color:red;">
            <?php echo $errors['user_name'] ?? ''; ?>
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
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control"  id="email" placeholder="Nhập Email" value="<?php echo $states['email'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $errors["email"] ?? ''; ?>
            </p>
        </div>

        <div class="form-group">
            <label for="user_password">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Nhập Mật khẩu" id="password"  value="<?php echo $states['password'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $errors["password"] ?? ''; ?>
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
            <label for="role">Vai trò</label> <br>
            <span>Khách hàng </span><input type="radio" id="role" name="role" value="0">
            <span>Nhân viên: </span><input type="radio" checked id="role" name="role" value="1"  >
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Nhập số điện thoại"  value="<?php echo $states['phone'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $errors["phone"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="created_at">Ngày tạo</label>
            <input type="hidden" class="form-control" name="created_at" id="created_at" value="<?= date("Y-m-d", time()); ?>">
        </div>
       

        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
    </form>

 
</div>
       
