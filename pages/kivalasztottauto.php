
<div id="kivalasztottauto">
<?php
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$autoAdatok = $db->getAuto($id);
if ($autoAdatok) {
    $imagePath = "./autokepek/" . $autoAdatok[0]['modell']."/kep1";
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
            ."<table>"
            . "<tr><td class='o1'>Üzemanyag:</td> <td class='o2'>" . $autoAdatok[0]['uzemanyag'] . "</td><tr>"
            . "<tr><td class='o1'>Kilométeróra állás: </td> <td class='o2'>" . $autoAdatok[0]['km'] . " Km</td><tr>"
            . "<tr><td class='o1'>Kaukció: </td> <td class='o2'>" . $autoAdatok[0]['kaukcio'] . " Ft</td><tr>"
            . "<tr><td class='o1'>Bérleti díj: </td> <td class='o2'>" . $autoAdatok[0]['berletidij'] . " Ft</td><tr>"
            . "<tr><td class='o1'>Szállítható Személyek: </td> <td class='o2'>" . $autoAdatok[0]['szszam'] . " Fő</td><tr>"
            . "<tr><td class='o1'>Fogyasztás </td> <td class='o2'>" . $autoAdatok[0]['fogyasztas'] . " L /100Km</td><tr>"
            . "</table></div>";
    return $html;
}

function jarmuKep() {
    global $autoAdatok;
    global $image;
    $html = '<div id="jarmuKep">'
            . '<img style="max-width: 600px; heigth: auto;" src="' . $image . '" alt="' . $autoAdatok[0]['modell'] . ' kép" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">'
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
        <div class="wrapper">
            <?php
            $a = 0;
            
            foreach ($db->osszesAuto() as $row) {
                $image = null;
            if (file_exists("./autokepek/" . $row['modell'] . "/kep1.jpg")) {
                $image = "./autokepek/" . $row['modell'] . "/kep1.jpg";
            } else {
                $image = "./images/noimage.jpg";
            }

                if ($a < 4) {
                    ?>
                    <a href="index.php?menu=kivalasztottauto&id=<?php echo $row["id"]; ?>" >
                        
                            <div class="card"><div class="info">
                                <h1><?= $row['marka'] ?> <?= $row['modell'] ?>
                                <?= $row['berletidij'] ?></div></h1>
                                <img src="<?= $image ?>" class="card-img-top" alt="...">
                              
                            
                        </div></a>
                    <?php
                    $a++;
                }
            }
            ?>

        </div>
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
            <div class="numbertext">1 / 3</div>
            <img src="./autokepek/<?= $autoAdatok[0]['modell'] ?>/kep1.jpg" style="width:100%" >
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 3</div>
            <img src="./autokepek/<?= $autoAdatok[0]['modell'] ?>/kep2.jpg" style="width:100%" >
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 3</div>
            <img src="./autokepek/<?= $autoAdatok[0]['modell'] ?>/kep3.jpg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="row"   style="display: flex; flex-direction: row;">
            <img class="demo cursor" src="./autokepek/<?= $autoAdatok[0]['modell'] ?>/kep1.jpg" style="width:100%; display: flex; flex-direction: row;" onclick="currentSlide(1)">
            <img class="demo cursor" src="./autokepek/<?= $autoAdatok[0]['modell'] ?>/kep2.jpg" style="width:100%; display: flex; flex-direction: row;" onclick="currentSlide(2)" >
            <img class="demo cursor" src="./autokepek/<?= $autoAdatok[0]['modell'] ?>/kep3.jpg" style="width:100%; display: flex; flex-direction: row;" onclick="currentSlide(3)" >
        </div>
</div>


</div>