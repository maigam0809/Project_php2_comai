<div class="container">
    <h1>Cập nhật nhà cung cấp</h1>
    <?php  $session->flash();?>
    <form action="<?=BASE_URL?>/admin/suppliers/update/<?=$suppId->id?>" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="<?=$suppId->id?>" class="form-control" placeholder="Enter name" id="id">
        <div class="form-group">
            <label for="supplier_name">Tên nhà cung cấp</label>
            <input type="text" name="name" value="<?=$suppId->name?>" class="form-control" placeholder="Enter name" id="supplier_name">
            <p style="color:red;">
            <?php echo $errors['name'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="image">Ảnh</label>
            <input type="file" class="form-control" name="image" id="image">
            <input type="hidden" value="<?=$suppId->image?>" class="form-control" name="image"  id="image">
            <div style="width: 200px;max-height: 100px; margin-top: 10px;">
                <img style="max-width: 100%; max-height: 100%;" src="<?=IMGAE_DISPLAY?>/backend/image/suppliers/<?=$suppId->image?>" alt="">
            </div>
            <p style="color:red;">
            <?php echo $errors["image"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <input type="hidden" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
        </div>
        <div class="form-group pt-4">
            <label for="description">Giới thiệu</label>
            <textarea name="description" class="form-control" cols="30" rows="10"><?=$suppId->description?></textarea>
            <p style="color:red;">
            <?php echo $errors["description"] ?? ''; ?>
            </p>
        </div>
        <button type="submit"  class="btn btn-primary">Cập nhật danh mục</button>
    </form>
</div>