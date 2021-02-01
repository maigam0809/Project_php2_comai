
<div class="container">
    <?php $session->flash(); ?>
    <h2>Danh sách Info Shop</h2>
    <table class="table  table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <!-- <th>Detail</th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($info as $item):?>
            <tr>
                <td><?=$item->id?></td>
                <td><?=$item->name?></td>
                <td style="width:150px;" class="m-4">
                <?=$item->email?>
                </td>
                <td><?=$item->phone?></td>
                <!-- <td>
                    <a class="btn btn-success " href="<?=BASE_URL?>/admin/info_shop/detail/<?=$item->id?>">
                    <i class="fas fa-low-vision"></i>
                </a> -->
                <td>
                    <a class="btn mr-2 btn-outline-warning rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" 
                    href="<?=BASE_URL?>/admin/info_shop/edit/<?=$item->id?>">
                    <i class="fa fa-edit"></i>
                    </a>
                   
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
</div>

