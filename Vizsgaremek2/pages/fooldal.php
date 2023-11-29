<div class="fixed-container mt-15 mb-5">
    <div class="row">
        <?php
        foreach ($db->osszesAuto() as $row) {
            $image = null;
            if (file_exists("./autokepek/" . $row['modell'] . ".jpg")) {
                $image = "./autokepek/" . $row['modell'] . ".jpg";
            } else if (file_exists("./autokepek/" . $row['modell'] . ".png")) {
                $image = "./autokepek/" . $row['modell'] . ".png";
            } else if (file_exists("./autokepek/" . $row['modell'] . ".jpeg")) {
                $image = "./autokepek/" . $row['modell'] . ".jpeg";
            } else if (file_exists("./autokepek/" . $row['modell'] . ".jfif")) {
                $image = "./autokepek/" . $row['modell'] . ".jfif";
            } else {
                $image = "./images/noimage.jpg";
            }
            ?>
        <div class="col-md-3 mb-4">
                    <div class="card" style="width: 100%; height: 300px;"> <!-- Állítsd be a kívánt magasságot -->
                        <a href="index.php?menu=kivalasztottauto&id=<?php echo $row["id"];?>" ><img src="<?= $image ?>" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['modell'] ?></h5>
                        <p class="card-text">Márka: <?= $row['marka'] ?></p>
                        <p class="card-text">Bérletidíj: <?= $row['berletidij'] ?> Ft</p>
                        <p class="hidden"></p>
                    </div>
                    </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
