
<table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>
                    <a class="btn" href="role&action=create">Tạo mới</a>
                </th>
              
            </tr>
        </thead>
        <tbody>
            <?php foreach($roles as $r): ?>
            <tr>
                <td><?= $r->id?></td>
                <td><?= $r->name?></td>
                <td>
                    <a href="?id=<?=$r->id?>">Sửa</a>
                    <a onclick="return confirm('Bạn có muốn xóa thật không?')" href="role&action=delete?id=<?=$r->id?>">Xoá</a>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>

</table>