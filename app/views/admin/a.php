
TRang list phần xoá và phần sửa icon
<td>
    <a class="btn mr-2 btn-outline-warning rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" 
    href="<?=BASE_URL?>/admin/category/edit/<?=$item->id?>">
    <i class="fa fa-edit"></i>
    </a>
    <a class="btn btn-outline-danger rounded-circle m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air " onclick="return confirm('Bạn có chắc chắn xóa không ?')" 
    href="<?=BASE_URL?>/admin/category/delete/<?=$item->id?>">
    <i class="fa fa-trash"></i>
    </a>
</td>
Phần Thêm
<div class="float-right mr-4">
        <a class="btn btn-success  mb-3" 
            href="<?=BASE_URL?>/admin/category/create">
            <i class="far fa-plus-square mr-2">
                Create Category
            </i>
        </a>
    </div>




Trang index
<?php
    use App\Core\Session;
    if(isset($data['suppliers'])){
        $supp = $data['suppliers'];
    }

    if(isset($data['items'])){
        $items = $data['items'];
    }
   
    $session = new Session();
    // $errors = $session->getFormError();
    // $states = $session->getFormState();
    
    require_once "./app/views/admin/main/index.php";
?>

// thêm thành phần

$states : Hiển thị giá trị cũ <?php echo $states['name'] ?? ''; ?>
$errors: Hiển thị giá trị khi có lỗi <?php echo $errors['name'] ?? ''; ?>


<?=BASE_URL?>/admin/category/store
