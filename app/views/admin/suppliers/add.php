<div class="container">
    <?php  $session->flash();?>
    <h1>Thêm nhà cung cấp</h1>
    <form action="<?=BASE_URL?>/admin/suppliers/store" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="name">Tên nhà cung cấp</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" id="name" value="<?php echo $states['name'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $errors['name'] ?? ''; ?>
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
            <input type="hidden" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
            
        </div>
        <div class="form-group">
            <label for="description">Giới thiệu</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10"><?php echo $states['desc'] ?? '' ?></textarea>
            <p style="color:red;">
            <?php echo $errors['description'] ?? ''; ?>
            </p>
        </div>
        <button type="submit" class="btn btn-primary">Thêm nhà cung cấp</button>
    </form>
</div>


