<div class="container">
    <h2>Thông tin phản hồi từ khách hàng:</h2>
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?= BASE_URL ?>/admin/contact/index">QUAY LẠI</a>
    </div>
    <table class="table" id="dataTable">
        <?php

                $a = $data['contactId'];
        ?>
        <tr>
        <th class="a"><span> TÊN KHÁCH HÀNG:</span> <?= $a->name?></th>
        </tr>
        <tr>
            <p> NỘI DUNG :</p>
            <textarea class="form-control" name="describe" id="detail2" cols="30"
                rows="15"><?= $a->describe?></textarea>
        </tr>




    </table>
</div>

<style>
tr>th>span,
tr>th>p {
    color: black;
}

#contact_describe {
    width: 100%;
    min-height: 300px;
}
</style>