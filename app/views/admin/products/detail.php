<div class="container">
    <div class="float-right mr-4 mb-1">
        <a class="btn btn-success" href="<?=BASE_URL?>/admin/products/index">
            Quay lại
        </a>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Key</th>
                <th scope="col">Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>ID</th>
                <td><?=$proId->id?></td>
            </tr>
            <tr>
                <th>Cate_id</th>
                <td><?=$proId->cate_id?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?=$proId->name?></td>
            </tr>
            <tr>
                <th>Image</th>
                <td> <img style="max-width: 150px; max-height: 100%;"
                        src="<?=BASE_URL?>/public/backend/image/products/<?=$proId->image?>" alt=""></td>
            </tr>
            <tr>
                <th>Intro</th>
                <td><?=$proId->intro?></td>
            </tr>
            <tr>
                <th>Price</th>
                <td><?=$proId->price?></td>
            </tr>
            <tr>
                <th>Sale</th>
                <td><?=$proId->sale?></td>
            </tr>
            <tr>
                <th>View</th>
                <td><?=$proId->view?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?=$proId->description?></td>
            </tr>

        </tbody>
    </table>
</div>