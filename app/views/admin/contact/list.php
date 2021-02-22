<div class="container">
    <?php  $session->flash();?>
    <h2>Danh sách liên hệ</h2>
    <div class="add-cate pt-2 pb-4">
    </div>
    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Ngày Gửi</th>
                <th>Trạng Thái</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($contacts as $item):?>
            <tr>
                <td><?=$item->id?></td>
                <td><?=$item->name?></td>
                <td><?=$item->email?></td>
                <td><?=$item->created_at?></td>
                <td><?= $item->status ? 'Đã xem' : 'Chưa xem' ?></td>

                <td>
                    <a class="btn btn-outline-success rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air "
                        href="<?=BASE_URL?>/admin/contact/detail/<?=$item->id?>">
                        <i class="far fa-eye-slash"> Mở thư</i>
                    </a>
                    <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air "
                        onclick="return confirm('Bạn có chắc chắn xóa không ?')"
                        href="<?=BASE_URL?>/admin/contact/delete/<?=$item->id?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
</div>