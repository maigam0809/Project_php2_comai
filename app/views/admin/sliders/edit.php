<div class="container">
    <?php  $session->flash();?>
    <h1>Cập nhật loại hàng</h1>
    <form action="<?=BASE_URL?>/admin/sliders/update/<?=$slideId->id?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id" value="<?=$slideId->id?>">
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" value="<?=$slideId->name?>" class="form-control" placeholder="Enter name" id="name">
            <p style="color:red;">  <?php echo $errors['name'] ?? ''; ?></p>
            
        </div>
        <div class="form-group">
            <label for="image">Ảnh</label>
            <input type="file" class="form-control" name="image" id="image">
                <div style="margin: 20px;">
                    <img style="max-width: 100%; max-height: 100%" src="<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$slideId->image?>" alt="">
                </div>
        </div>
        <div class="form-group">
            <label for="created_at">Tên danh mục</label>
            <input type="date" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
    </form>
</div>