<link rel="stylesheet" href="./layout/kivalasztottauto.css">
<?php
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$autoAdatok = $db->getAuto($id);
if ($autoAdatok) {
    $imagePath = "./autokepek/" . $autoAdatok[0]['modell'];
    $imageExtensions = ['jpg', 'png', 'jpeg', 'jfif'];
    foreach ($imageExtensions as $extension) {
        if (file_exists("$imagePath.$extension")) {
            $image = "$imagePath.$extension";
            break;
        }
    }

    if (!isset($image)) {
        $image = "./images/noimage.jpg";
    }
}

$modellneve = $autoAdatok[0]['modell'];
$kep1Neve = "kep1.jpg";
$kep2Neve = "kep2.jpg";
$kep3Neve = "kep3.jpg";

function reklamsav() {


    $html = '<div id="reklamsav">'
            . '<img id="image1" src="./Design/reklam1.jpg" style="width: 100%; height: 100%; alt="Első kép" ">'
            . '<img id="image2" src="./Design/reklam2.jpg" style="width: 100%; height: 100%; alt="Második kép" ">'
            . '</div>';
    return $html;
}

function jarmuleiras() {
    global $autoAdatok;
    $html = '<div id="jarmuLeiras">'
            . "<div style='font-size: 35px; font-style: inherit; color: black; text-align: center; padding-top: 10px; font-family: cursive; font-weight: bold;'><p>" . $autoAdatok[0]['marka'] . " " . $autoAdatok[0]['modell'] . " " . $autoAdatok[0]['motor'] . " bérelhető</p></div>"
            . "<h4> Üzemanyag: " . $autoAdatok[0]['uzemanyag'] . "</h4>"
            . "<h4> Kilométeróra állás: " . $autoAdatok[0]['km'] . "</h4>"
            . "<h4> Kaukció: " . $autoAdatok[0]['kaukcio'] . "</h4>"
            . "<h4> Bérleti díj: " . $autoAdatok[0]['berletidij'] . "</h4>"
            . "</div>";
    return $html;
}

function jarmuKep() {
    global $autoAdatok;
    global $image;
    $html = '<div id="jarmuKep">'
            . '<img style="max-width: 600px; heigth: auto; padding-top: 15%; padding-left: 5%;" src="' . $image . '" alt="' . $autoAdatok[0]['modell'] . ' kép" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">'
            . '</div>';
    return $html;
}

function tajekoztato() {
    $html = '<div id="tajekoztato">
      <p>Kérjük ne feledje, nem csak a képeket érdemes megnézni, a szöveges leírások, bérleti feltételek elolvasása is hasznos.</p>
      <p> Az áraknál induló napi árak vannak feltüntetve.</p>
      <p> Az árak mindig egyediek, mely függ a bérelt napok számától, a megtett km-től, és a célországtól.</p>
      <p>Ezek vonatkoznak belföldre, külföldre. Napi km korlát nincs meghatározva.</p>
    </div>';
    return $html;
}
?>

<div id="felosztas">
    <?php
    echo reklamsav();
    echo jarmuleiras();
    echo jarmuKep();
    echo tajekoztato();
    ?>
    <div id="kiemeltAjanlatok">
        
            <?php
            $a = 0;

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


                if ($a < 3) {
                    ?>
                    <a href="index.php?menu=kivalasztottauto&id=<?php echo $row["id"]; ?>" >
                        <div class="wrapper">
                            <div class="card">
                                <img src="<?= $image ?>" class="card-img-top" alt="...">

                                <h1><?= $row['marka'] ?> <?= $row['modell'] ?></h1>
                                <p><?= $row['berletidij'] ?></p>
                                <div class="info"><?= $row['berletidij'] ?></div>
                            </div>
                        </div></a>
                    <?php
                    $a++;
                }
            }
            ?>

        
    </div>
</div>

<script>
    let currentImage = 1;
    document.getElementById('image1').style.display = 'block';
    document.getElementById('image2').style.display = 'none';
    function changeImage() {

        if (currentImage === 1) {
            document.getElementById('image1').style.display = 'block';
            document.getElementById('image2').style.display = 'none';
            currentImage = 2;
        } else {
            document.getElementById('image1').style.display = 'none';
            document.getElementById('image2').style.display = 'block';
            currentImage = 1;
        }
    }

    setInterval(changeImage, 5000); // Ez másodpercenként váltja a képeket
</script>


<div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">

        <div class="mySlides">
            <div class="numbertext">1 / 4</div>
            <img src="./autokepek/a3.jpg" style="width:100%" >
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 4</div>
            <img src="./autokepek/a4.jpg" style="width:100%" >
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 4</div>
            <img src="./autokepek/a6.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">4 / 4</div>
            <img src="./autokepek/Vitara.jpg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>


        <div class="column">
            <img class="demo cursor" src="./autokepek/a3.jpg" style="width:100%" onclick="currentSlide(1)">
        </div>
        <div class="column">
            <img class="demo cursor" src="./autokepek/a4.jpg" style="width:100%" onclick="currentSlide(2)" >
        </div>
        <div class="column">
            <img class="demo cursor" src="./autokepek/a6.jpg" style="width:100%" onclick="currentSlide(3)" >
        </div>
        <div class="column">
            <img class="demo cursor" src="./autokepek/Vitara.jpg" style="width:100%" onclick="currentSlide(4)">
        </div>
    </div>
</div>


