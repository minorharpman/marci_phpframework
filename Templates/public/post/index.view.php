<?php
//require_once 'C:\xampp\htdocs\blog-gyak\Config\bootstrap.php' ; 
?>
<?php require_once 'Config/bootstrap.php'; ?>
<?php include 'Templates/common/header.view.php'; ?>
<?php //include 'Templates/common/topnavbar.view.php'; ?>


<?php if (isset($posts)) : ?>

    <!-- Page content-->
   
    <div class="container mt-5">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-6">
                <?php foreach ($posts as $post) : ?>
                    <div class="card mb-4">
                        <a href="post.php?id=<?= $post['id'] ?>"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="Image" /></a>
                        <div class="card-body">
                            <div class="small text-muted"><?= $post['created_at'] ?></div>
                            <h2 class="card-title"><?= $post['title'] ?></h2>
                            <p class="card-text"><?= $post['summary'] ?></p>
                            <a class="btn btn-primary" href="post.php?id=<?= $post['id'] ?>">Read more →</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
                            <!-- Side widgets-->
                            <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>

    </div>
<?php else : ?>
    <p>No posts available.</p>
<?php endif; ?>



<!-- Footer-->
<?php include 'Templates/common/footer.view.php'; ?>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->

<script src="js/scripts.js"></script>






<!-- Footer-->
<?php //include 'Templates/common/footer.view.php'; ?>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->

<script src="js/scripts.js"></script>