<li class="breadcrumb-item"><a href="<?= BASE_URL?>">Tin tức</a></li>
<i class="fas fa-caret-right cl-control"></i>
<li class="breadcrumb-item active cl-control" aria-current="page"><?= $data['newId']->name?></li>
</nav>
</div>
</section>
<div class="container">
    <div class="row  ">
        <div class="col-md-6 cart-detail col-md-offset-3">
            <div class="new_detail ">
                <div class="tieude">
                    <h1 style="text-align: center;"><?= $data['newId']->name;?></h1>
                </div>
                <br>
                <div class="image center-block"  style="width: 300px;">
                    <img class="img-responsive" src="<?=BASE_URL?>/public/backend/image/new/<?=$data['newId']->image?>" alt="" width="100%"
                        >
                </div>
                <br>
                <div class="content" style="padding: 0 10px;">
                    <b>
                        <?=$data['newId']->description?>
                    </b>
                    <br>
                    <div>
                        <?=$data['newId']->detail?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
.content img {
    max-width: 100%;
}
</style>
