
<div class="container">
    <?php  $session->flash();?>
    <h1>Thêm ảnh</h1>
    <form action="<?=BASE_URL?>/admin/sliders/store" enctype="multipart/form-data" method="post">
    <div class="form-group">
            <label for="name">Tên ảnh</label>
            <input type="text" name="name" class="form-control" value="<?php echo $states['name'] ?? ''; ?>" placeholder="Enter name" id="name" require>
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
            <label for="created_at">Tên danh mục</label>
            <input type="date" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
        </div>

        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
    </form>

 
</div>
       
