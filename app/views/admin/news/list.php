<div class="container">
    <?php $session->flash(); ?>
    <h2>Danh sách tin tức</h2>
    <div class="float-right mr-4">
        <a class="btn btn-success  mb-3" 
            href="<?=BASE_URL?>/admin/news/create">
            <i class="far fa-plus-square mr-2">
                Create Category
            </i>
        </a>
    </div>
    <table class="table  table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($news as $item):?>
            <tr>
                <td><?=$item->id?></td>
                <td style="max-width: 380px;"><?=$item->name?></td>
                <td style="width:150px;" class="m-4">
                <img src="<?=BASE_URL?>/public/backend/image/new/<?=$item->image?>" alt="" style="max-width:100%; max-height: 100%;" >
                </td>
                <td><?=$item->created_at?></td>
                <td>
                    <a class="btn mr-2 btn-outline-warning rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" 
                    href="<?=BASE_URL?>/admin/news/edit/<?=$item->id?>">
                    <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air " onclick="return confirm('Bạn có chắc chắn xóa không ?')" 
                    href="<?=BASE_URL?>/admin/news/delete/<?=$item->id?>">
                    <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
</div>

