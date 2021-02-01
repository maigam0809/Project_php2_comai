<div class="container">
    <?php  $session->flash();?>
    <h1>Cập nhật Info shop</h1>
    <form action="<?=BASE_URL?>/admin/info_shop/update/<?=$infoId->id?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id" value="<?=$infoId->id?>">
            <label for="name">Tên cửa hàng</label>
            <input type="text" name="name" value="<?=$infoId->name?>" class="form-control" placeholder="Enter name" id="name">
            <p style="color:red;">  <?php echo $errors['name'] ?? ''; ?></p>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" value="<?=$infoId->email?>">
            <p style="color:red;">  <?php echo $errors['email'] ?? ''; ?></p>
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="phone" class="form-control" name="phone" id="" value="<?=$infoId->phone?>">
            <p style="color:red;"><?php echo $errors['phone'] ?? ''; ?></p>
        </div>

        <div class="form-group">
            <label for="detail">Chi tiết</label>
            <textarea class="form-control" name="detail" id="detail2"  cols="30" rows="15"><?=$infoId->detail?></textarea>
            <p style="color:red;">
            <?php echo $errors['detail'] ?? ''; ?>
            </p>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật info</button>
    </form>
</div>