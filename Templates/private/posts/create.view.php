
<?php //require_once 'C:\xampp\htdocs\blog-gyak\Config\bootstrap.php'; ?>
<?php require_once 'Config/bootstrap.php'; ?>
<?php require_once TEMPLATE_PATH . '/common/header.view.php' ?>
<?php include TEMPLATE_PATH . '/common/topnavbar.view.php'; ?>

<?php

$title = $author_id = $summary = $articleText = $category = '';
?>

Üzenet:
<?= isset($message) ? $message : '' ?>

    <h1 class="m-5 d-flex justify-content-center">Új cikk hozzáadása</h1>
    <main class="m-4 d-flex justify-content-center">
    
    <form action="private-create-posts.php" method="POST">
            <label for="title">Cikk címe:</label><br>
            <input type="text" id="title" name="title" value="<?php echo $title; ?>"><br><br>

            <label for="author_id">Szerző:</label><br>
            <input type="text" id="author_id" name="author_id" value="<?php echo $author_id; ?>"><br><br>

            <label for="summary">Összefoglaló:</label><br>
            <textarea id="summary" name="summary" rows="4" cols="50" value="<?php echo $summary; ?>" ></textarea><br><br>

            <label for="articleText">Cikk tartalma:</label><br>
            <textarea id="articleText" name="articleText" rows="8" cols="50" value="<?php echo $articleText; ?>"></textarea><br><br>

            <label for="category">Kategória:</label><br>
            <input type="text" id="category" name="category" value="<?php echo $category; ?>"><br><br>

            <input class="btn btn-primary" name="submit" type="submit" value="Hozzáadás">
            <input class="btn btn-secondary" id="cancel" type="button" value="Mégse">
        </form>
</main>
    <script>

        document.getElementById("cancel").addEventListener("click", function() {
    
        window.location.href = 'http://localhost/blog-gyak/';
        });
    </script>

    <?php include TEMPLATE_PATH . '/common/footer.view.php'; ?>