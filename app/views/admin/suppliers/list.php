<div class="container">
    <?php $session->flash();?>
    <h2>Danh sách nhà cung cấp</h2>
    <div class="float-right mr-4">
        <a class="btn btn-success" 
            href="<?=BASE_URL?>/admin/suppliers/create">
            <i class="far fa-plus-square mr-2">
               Create
            </i>
        </a>
    </div>
    <table class="table text-center  table-hover">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($supp as $item):?>
            <tr>
                <td><?=$item->id?></td>
                <td><?=$item->name?></td>
                <td class="" style="width: 150px; max-height: 100px; margin: 0 5px;">
                    <img style="max-width: 100%; max-height: 100%;"
                        src="<?=BASE_URL?>/public/backend/image/suppliers/<?=$item->image?>" alt="">
                </td>
                <td><?=$item->created_at?></td>
                
                <td>
                    <a class="btn mr-2 btn-outline-warning rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                        href="<?=BASE_URL?>/admin/suppliers/edit/<?=$item->id?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air "
                        onclick="return confirm('Bạn có chắc chắn xóa không ?')"
                        href="<?=BASE_URL?>/admin/suppliers/delete/<?=$item->id?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>

               
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
</div>