<?php include "views/inc/header.php"; ?>

<div class="containerA" style="padding: 180px 0 170px 0; ">
    <div class=    
    <div class="row" style="justify-content: center; align-items: center;">
        <div class="container">
            <?php if (!empty($posts)): ?>
                <?php $rowCount = 0; ?>
                <?php foreach ($posts as $post): ?>
                    <?php if ($rowCount % 4 === 0): ?>
                        <?php if ($rowCount > 0): ?>
                            </div>
                        <?php endif; ?>
                        <div class="row justify-content-center align-items-center" style="padding-bottom: 20px;">
                    <?php endif; ?>

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card" style="height: 400px; position: relative;">
                            <!-- Card content goes here -->
                            <img class="card-img-top" src="<?php echo ROOT . $post['url_imange_album']; ?>" style="height: 160px" alt="Card image cap">
                            <div class="card-body" style="position: absolute; bottom: 10px;">
                                <h5 class="card-title">
                                  <strong>  <?php echo $post['name']; ?> </strong>
                                </h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Finddddd mo out</a>
                            </div>
                        </div>
                    </div>

                    <?php $rowCount++; ?>
                <?php endforeach; ?>

                <?php if ($rowCount > 0): ?>
                    </div>
                <?php endif; ?>

            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "views/inc/footer.php"; ?>
