<div>
    <p><a href="../public/add" class="addarticlebtn">+ Ajouter un article</a></p>
</div>

<table class="table">
    <thead>
    <div class="tab-div">
        <tr>
            <th>Title</th>
            <th>Image Path</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($req_products as $admin_display):?>
        <tr class="tr">
            <td><?= substr(htmlspecialchars($admin_display['name']), 0, 20)?>&nbsp;[...]</td>
            <td><?= $admin_display['image'];?></td>
            <td><?= substr(htmlspecialchars($admin_display['description']), 0, 70) ?>&nbsp;[...]</td>
            <td><a class="edit-icon" href="../public/delete?id=<?= $admin_display['id']?>"><i class="far fa-times-circle"></i></a></td>
            <td><a class="edit-icon" href="../public/edit?id=<?= $admin_display['id']?>"><i class="fas fa-edit"></i></a></td>
        </tr>
    <?php endforeach ;?>
    </tbody>
    </div>
</table>
