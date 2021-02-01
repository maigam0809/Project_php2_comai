<div class="container">
    <div class="float-right mr-4 mb-1">
        <a class="btn btn-success" href="<?=BASE_URL?>/admin/comments/index">
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
                <td><?=$commentId->id?></td>
            </tr>
            <tr>
                <th>Product id</th>
                <td value="<?=$commentId->product_id?>"><?=$commentId->product_id?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?=$commentId->content?></td>
            </tr>
            <tr>
                <th>User id</th>
                <td alue="<?=$commentId->user_id?>"><?=$commentId->user_id?></td>
            </tr>
        </tbody>
    </table>
</div>