<?php require_once 'C:\xampp\htdocs\blog-gyak\Config\bootstrap.php'; ?>


<div class="container">
    <div class="row mt-4">
        <div class="col">
            <h1 class="m-5 d-flex justify-content-center " >Szerző módosítás</h1>
        </div>
       
    </div>
    <div class="m-5 d-flex justify-content-center row">
        <div class="col">
            <form action="<?= BASE_URL ?>/private-user-update.php" method="post">
                <div class="mb-3">
                    
                <input type="hidden" name="id" value="<?= $form["id"]; ?>"><br><br> 

                <label for="name" class="form-label">Név</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $form['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $form['email'] ?>">
                </div>
                <label for="status" class="form-label">Status</label>
                 <input type="text" class="form-control" id="status" name="status" value="active">
                 
                <button type="submit" class="m-1 d-flex justify-content-center btn btn-primary">Módosít</button>
                <input class="btn btn-secondary" id="cancel" type="button" value="Mégse">
            </form>
        </div>
    </div>
</div>


<?php include TEMPLATE_PATH . '/common/footer.view.php'; ?>
