<div class="container">
    <h2>Danh sách user</h2>
    <?php  $session->flash();?> 
    <div class="float-right mr-4">
        <a class="btn btn-success  mb-3" 
            href="<?=BASE_URL?>/admin/users/create">
            <i class="far fa-plus-square mr-2">
                Create User
            </i>
        </a>
    </div>
    <table class="table"id="dataTable">
        <thead>
            <tr>
            <th>STT</th>
                <th>TÊN</th>
                <th>ẢNH</th>
                <th>Email</th>
                <th>VAI TRÒ</th>
                <th>NGÀY TẠO</th>
                <!-- <th>CHI TIẾT</th> -->
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $item):?>
            <tr>
            <td><?=$item->id?></td>
                <td><?=$item->user_name?></td>
                <td class="text-center" style="width:100px; height: 150px; margin: 20px;">
                    <img style="max-width: 100%; max-height: 120px;" src="<?=BASE_URL?>/public/backend/image/user/<?=$item->image?>" alt="">
                </td>

                <td><?=$item->email?></td>
                <td><?= $item->role ? 'Nhân viên' : 'Khách hàng' ?></td>
                <td><?=$item->created_at?></td>
                <!-- <td>
                    <a class="btn btn-success"  href="<?=BASE_URL?>/admin/users/detail/<?=$item->id?>">Chi tiết</a>
                </td> -->
              
                <td>
                    <a class="btn mr-2 btn-outline-warning rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" 
                    href="<?=BASE_URL?>/admin/users/edit/<?=$item->id?>">
                    <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air " onclick="return confirm('Bạn có chắc chắn xóa không ?')" 
                    href="<?=BASE_URL?>/admin/users/delete/<?=$item->id?>">
                    <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ;?>
            
        </tbody>
    </table>
</div>

