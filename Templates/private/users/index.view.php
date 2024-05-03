<?php // require_once 'C:\xampp\htdocs\blog-gyak\Config\bootstrap.php'; ?>
<?php require_once 'Config/bootstrap.php'; ?>

<?php require_once CONTROLLER_PATH . '/PrivateUserController.php'; ?>

<div class="container">
    <div class="row mt-4">
        <div class="col">
            <h1>Felhasználók</h1>
        </div>
        <div class="col text-end">
            <a href="<?= BASE_URL ?> /create-user.php" class="btn btn-primary">Új felhasználó</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped datatable" style="width:100%">
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Név</th>
                    <th>Email</th>
                    <th>Állapot</th>
                    <th>Hozzáadva</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
            
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['status'] ?></td>
                    <td><?= $user['created_at'] ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>/private-user-edit.php?id=<?= $user['id'] ?>" class="btn btn-warning">Szerkesztés</a>
                        <button onclick="confirmStatusChange(<?= $user['id'] ?>)" class="btn btn-primary">Állapot</button>
                        <a href="<?= BASE_URL ?>/private-user-delete.php?id=<?= $user['id'] ?>" class="btn btn-danger">Törlés</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
                                
        </table>
    </div>
</div>
<script>
    function confirmStatusChange(id)
    {
        Swal.fire({
            title: 'Biztos vagy benne?',
            text: "A felhasználó állapotának megváltoztatása. Ha inaktívra váltod, a felhasználó nem fog tudni bejelentkezni!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Igen, változtassam meg!',
            cancelButtonText: 'Mégsem'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= BASE_URL ?>/private-user-status.php?id=' + id;
            }
        });
    }
</script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Biztos vagy benne?',
            text: "A felhasználó törlése visszavonhatatlan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Igen, törlöm!',
            cancelButtonText: 'Mégsem'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= BASE_URL ?>/private-user-status?id=' + id;
            }
        });
    }
</script>
<?php require_once TEMPLATE_PATH . '/common/footer.view.php' ?>
