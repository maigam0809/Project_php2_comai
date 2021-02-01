<div class="container">
    <?php  $session->flash();?>
    <h1>Thêm tin tức</h1>
    <form action="<?=BASE_URL?>/admin/news/store" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="name">Tiêu đề</label>
            <input type="text" name="name" class="form-control" value="<?php echo $states['name'] ?? ''; ?>"
                placeholder="Enter name" id="name" require>
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
            <label for="created_at">Mô tả</label>
            <textarea class="form-control" name="description" id="description"  cols="30" rows="5"><?php echo $states['description'] ?? '';?></textarea>
            <p style="color:red;">
            <?php echo $errors['description'] ?? ''; ?>
            </p>
        </div>
        <input type="hidden" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
        <div class="form-group">
            <label for="detail">Chi tiết</label>
            <textarea class="form-control" name="detail" id="detail2"  cols="30" rows="15"><?php echo $states['detail'] ?? '';?></textarea>
            <p style="color:red;">
            <?php echo $errors['detail'] ?? ''; ?>
            </p>
        </div>

        <div class="form-group">
            <label for="created_at">Created at</label>
            <input type="date" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>"
                id="created_at">
        </div>

        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
    </form>


</div>