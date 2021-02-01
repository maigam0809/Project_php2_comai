
<div class="container">
    <?php $session->flash(); ?>
    <h2>Danh sách bình luận</h2>
    <table class="table  table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Content</th>
                <th>Người bình luận</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comments as $item):?>
            <tr>
                <td><?=$item->id?></td>
                <td value="<?=$item->product_id?>"><?=$item->name?></td>
                <td value="<?=$item->user_id?>"><?=$item->user_name?></td>
                <td><?=$item->content?></td>
                <td><?=$item->created_at?></td>
                <td>
                    <a class="btn mr-2 btn-outline-warning rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" 
                    href="<?=BASE_URL?>/admin/comments/detail/<?=$item->id?>">
                    <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air " onclick="return confirm('Bạn có chắc chắn xóa không ?')" 
                    href="<?=BASE_URL?>/admin/comments/delete/<?=$item->id?>">
                    <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
</div>

