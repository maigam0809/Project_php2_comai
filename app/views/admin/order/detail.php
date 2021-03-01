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
                <td><?=$orderId->id?></td>
            </tr>
            <tr>
                <th>User_name</th>
                <td><?=$orderId->user_id?></td>
            </tr>
            <tr>
                <th>Intro</th>
                <td><?=$orderId->intro?></td>
            </tr>
            <tr>
                <th>Price</th>
                <td><?=$orderId->price?></td>
            </tr>
            <tr>
                <th>Sale</th>
                <td><?=$orderId->sale?></td>
            </tr>
            <tr>
                <th>View</th>
                <td><?=$orderId->view?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?=$orderId->description?></td>
            </tr>

        </tbody>
    </table>
</div>