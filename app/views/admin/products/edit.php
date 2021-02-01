
<div class="container mr-4 ml-4 col-12">
    <h1>Sửa sản phẩm</h1>
    <?php 
    $session->flash();?>
    <form class="row pr-4" action="<?=BASE_URL?>/admin/products/update/<?=$proId->id?>" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="<?=$proId->id?>">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên nhà cung cấp</label>
                <select name="supplier_id" class="form-control">
                    <?php
                            foreach ($suppNames as $item) {
                                if($item->id == $proId->supplier_id){
                                    echo '<option selected value="'.$item->id.'">'.$item->name.'</option>';
                                }
                                else{
                                    echo '<option value="'.$item->id.'">'.$item->name.'</option>';
                                }
                            }
                        ?>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input value="<?=$proId->name?>" type="text" name="name" class="form-control" placeholder="Enter name" id="name">
                <p style="color:red;">
                <?php echo $errors['name'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="intro" title="Product Intro">Giới thiệu</label>
                <input value="<?=$proId->intro?>" type="text" name="intro" class="form-control" placeholder="Enter name" id="intro">
                <p style="color:red;">
                <?php echo $errors['intro'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="price" title="Product Intro">Giá</label>
                <input value="<?=$proId->price?>" type="number" name="price" class="form-control" placeholder="Enter name" id="price">
                <p style="color:red;">
                <?php echo $errors['price'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="created_at" title="created_at">Created_at</label>
                <input value="<?=$proId->created_at?>" type="date" name="created_at" class="form-control" placeholder="Enter name" id="created_at">
            
            </div>
            <div class="form-group">
                <label for="created_by" title="Product view">Created_by</label>
                <input value="<?=$proId->created_by?>" type="date" name="created_by" class="form-control" placeholder="Enter name" id="created_by">
                <p style="color:red;">
                <?php echo $errors['created_by'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="description" title="Product description">Mô tả</label>
                <textarea name="description" id="" class="form-control" cols="30" rows="5">
                    <?=$proId->description?>
                </textarea>
                <p style="color:red;">
                <?php echo $errors['description'] ?? ''; ?>
                </p>
            </div>
           
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="">Tên loại</label>
                <select name="cate_id" class="form-control">
                    <?php
                            foreach ($cateNames as $item) {
                                if($item->id == $proId->cate_id){
                                    echo '<option selected value="'.$item->id.'">'.$item->name.'</option>';
                                }
                                else{
                                    echo '<option value="'.$item->id.'">'.$item->name.'</option>';
                                }
                            }
                        ?>
                </select>
            </div>
        
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" class="form-control" name="image" id="image">
                <input type="hidden" value="<?=$proId->image?>" class="form-control" name="image"  id="image">
                <div style="margin: 20px 0px; ">
                    <img src="<?=IMGAE_DISPLAY?>/backend/image/products/<?=$proId->image?>" alt="" style="width:150px">
                </div>
                <p style="color:red;">
                <?php echo $errors['image'] ?? ''; ?>
                </p>
            </div>

            <div class="form-group">
                <label for="view" title="Product view">View</label>
                <input value="<?=$proId->view?>" type="number" name="view" class="form-control" placeholder="Enter name" id="view">
                <p style="color:red;">
                <?php echo $errors['view'] ?? ''; ?>
                </p>
            </div>

            <div class="form-group">
                <label for="sale" title="Product view">Sale</label>
                <input value="<?=$proId->sale?>" type="number" name="sale" class="form-control" placeholder="Enter name" id="sale">
                <p style="color:red;">
                <?php echo $errors['sale'] ?? ''; ?>
                </p>
            </div>
            <!-- <div class="form-group">
                <label for="status" title="Product status">Status</label>
                <input value="<=$proId->status?>" type="number" name="status" class="form-control" placeholder="Enter name" id="status">
                <p style="color:red;">
                <php echo $errors['status'] ?? ''; ?>
                </p>
            </div> -->
           
        </div>

        <button type="submit"  class="btn btn-primary">Cập nhật sản phẩm</button>
    </form>
</div>