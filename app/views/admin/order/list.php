
<div class="container">
    <?php $session->flash(); ?>
    <h2>Danh sách loại hàng</h2>
    <div class="float-right mr-4">
        <a class="btn btn-success  mb-3" 
            href="<?=BASE_URL?>/admin/order/create">
            <i class="far fa-plus-square mr-2">
                Create Order
            </i>
        </a>
    </div>
    <table class="table  table-hover">
        <thead>
            <tr>
            <th>ID</th>
                <th>TÊN KH</th>
                <th>ĐỊA CHỈ GIAO HÀNG</th>
                <th>NGÀY ĐẶT</th>
                <th>TRẠNG THÁI</th>
                <th>CHI TIẾT</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $item):?>
            <tr>
                <td><?=$item->id?></td>
                <td><?=$item->user_name?></td>
                <td><?=$item->order_address?></td>
                <td><?=$item->order_date?></td>
                <td><?= $item->order_status ? 'Đã thanh toán' : 'Chưa thanh toán' ?></td>
                <td>
                    <a class="btn mr-2 btn-outline-success rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" 
                    href="<?=BASE_URL?>/admin/order/detail/<?=$item->id?>">
                    <i class="fa fa-low-vision"></i>
                    </a>
                </td>
                <td>
                    <a class="btn mr-2 btn-outline-warning rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" 
                    href="<?=BASE_URL?>/admin/order/edit/<?=$item->id?>">
                    <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air " onclick="return confirm('Bạn có chắc chắn xóa không ?')" 
                    href="<?=BASE_URL?>/admin/order/delete/<?=$item->id?>">
                    <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
</div>

