<div class="container">
    <h2>Danh sách sản phẩm</h2>
    <?php
    $session->flash();
    ?> 
    <div class="float-right mr-4 mb-1">
        <a class="btn btn-success" 
            href="<?=BASE_URL?>/admin/products/create">
            <i class="far fa-plus-square mr-2">
               Create
            </i>
        </a>
    </div>
    
    <table class="table text-center  table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Loại</th>
                <th>Tên sản phẩm</th>              
                <th>Hình ảnh</th>
                <th>Ngày tạo</th>
                <th>Chi tiết</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $item):?>
            <tr>
                <td><?=$item->id?></td>
                <td value=""><?=$item->cate_id?></td>
                <td><?=$item->name?></td>
                
                <td style="width: 200px; height: 150px; margin: 0 20px;">
                <img style="max-width: 100%; max-height: 100%;" src="<?=BASE_URL?>/public/backend/image/products/<?=$item->image?>" alt="">
                </td>
                <td><?=$item->created_at?></td>
                <td>
                    <a class="btn btn-success " href="<?=BASE_URL?>/admin/products/detail/<?=$item->id?>">
                    <i class="fas fa-low-vision"></i>
                </a>
                </td>
                <td>
                    <a class="btn mr-2 btn-outline-warning rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                        href="<?=BASE_URL?>/admin/products/edit/<?=$item->id?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air "
                        onclick="return confirm('Bạn có chắc chắn xóa không ?')"
                        href="<?=BASE_URL?>/admin/products/delete/<?=$item->id?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
    <!-- <div class="text-right mr-4 mt-0">
    <php if ($_SESSION['so_luong_page'] > 1) { ?>
        <php for ($i = 1; $i <= $_SESSION['so_luong_page']; $i++) { ?>
            <a style="width: 50px;" class="btn btn-outline-info mr-1" href="<= BASE_URL ?>/admin/products/index/<?= $i?>"><?= $i ?></a>
    <php 
            }
        } 
    ?> -->
    <!-- </div> -->
    
</div>


