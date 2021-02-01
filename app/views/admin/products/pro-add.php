<div class="container mr-4 ml-4 col-12">
    <h1>Thêm sản phẩm</h1>
    <?php $session->flash();?>
    <form class="row pr-4" action="<?=BASE_URL?>/admin/products/store" enctype="multipart/form-data" method="post">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên nhà cung cấp</label>
                <select name="supplier_id" class="form-control" id="supplier_id">
                    <?php
                    foreach ($suppNames as $item) : ?>
                        <option value="<?= $item->id ?>"
                            <?php echo (isset($states['supplier_id']) && $states['supplier_id'] == $item->id) ? 'selected' : ''; ?>>
                            <?= $item->name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Tên sản phẩm</label> 
                <input type="text" name="name" class="form-control" value="<?php echo $states['name'] ?? '';?> " placeholder="Enter name" id="name">
                <p style="color:red;">
                <?php echo $errors['name'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="intro" title="Product Intro">Xuất xứ</label>
                <input type="text" name="intro" value="<?php echo $states['intro'] ?? '';?>" class="form-control" placeholder="Enter name" id="intro">
                <p style="color:red;">
                <?php echo $errors['intro'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="price" title="Product Intro">Gía</label>
                <input type="number" name="price" value="<?php echo $states['price'] ?? '0';?>" class="form-control" placeholder="Enter name" id="price">
                <p style="color:red;">
                <?php echo $errors['price'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="sale" title="Product view">Sale</label>
                <input type="number" name="sale" class="form-control" value="<?php echo $states['price'] ?? '';?>" placeholder="Enter name" id="sale">
                <p style="color:red;">
                <?php echo $errors['sale'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="description" title="Product description">Mô tả</label>
                <p style="color:red;">
                <?php echo $errors['description'] ?? ''; ?>
                </p>
                <textarea name="description" id="info_detail" class="form-control" cols="30" rows="5"><?php echo $states['description'] ?? '';?></textarea>
            </div>
           
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="">Tên loại</label>
                <select name="cate_id" class="form-control" id="cate_id">
                    <?php
                    foreach ($cateNames as $item) : ?>
                        <option value="<?= $item->id ?>"
                            <?php echo (isset($states['cate_id']) && $states['cate_id'] == $item->id) ? 'selected' : ''; ?>>
                            <?= $item->name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" class="form-control" name="image" id="image">
                <p style="color:red;">
                <?php echo $errors['image'] ?? ''; ?>
                </p>
            </div>

            <div class="form-group">
                <label for="created_at">Ngày tạo</label>
                <input type="date" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
            </div>
            <div class="form-group">
                <label for="created_by">Product Created by</label>
                <input type="date" name="created_by" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
            </div>

            <div class="form-group">
                <label for="view" title="Product view">View</label>
                <input type="number" name="view" class="form-control" value="0" placeholder="Enter name" id="view">
                <p style="color:red;">
                <?php echo $errors['view'] ?? ''; ?>
                </p>
            </div>
            
            <!-- <div class="form-group">
                <label for="status" title="Product view">Status</label>
                <input type="number" name="status" value="0" class="form-control" placeholder="Enter name" id="status">
            </div> -->

           
        </div>

        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
    </form>
</div>