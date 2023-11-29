<?php
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$autoAdatok=$db->getAuto($id);
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
}}
function reklamsav() {
    $html='<div id="reklamsav"><img src="./Design/reklam.jpg" style="width: 100%; height: 100%;"></div>';
    return $html;
}

function jarmuleiras() {
    global $autoAdatok;
    $html='<div id="jarmuLeiras">'
            . '<h4> Márka: ' .  $autoAdatok[0]['marka'] . "</h4>"
            . "<h4> Modell: " . $autoAdatok[0]['modell'] . "</h4>"
            . "<h4> Motor: " . $autoAdatok[0]['motor'] . "</h4>"
            . "<h4> Üzemanyag: " . $autoAdatok[0]['uzemanyag'] . "</h4>"
            . "<h4> Kilométeróra állás: " . $autoAdatok[0]['km'] . "</h4>"
            . "<h4> Kaukció: " . $autoAdatok[0]['kaukcio'] . "</h4>"
            . "<h4> Bérleti díj: " . $autoAdatok[0]['berletidij'] . "</h4>"
            . "</div>";
    return $html;
}
function jarmuKep(){
     global $autoAdatok;
     global $image;
    $html='<div id="jarmuKep"><img src="' . $image . '" alt="' . $autoAdatok[0]['modell'] . ' kép"></div>';
    return $html;
}
function tajekoztato(){
    $html='<div id="tajekoztato">
      <p>Kérjük ne feledje, nem csak a képeket érdemes megnézni, a szöveges leírások, bérleti feltételek elolvasása is hasznos.</p>
      <p> Az áraknál induló napi árak vannak feltüntetve.</p>
      <p> Az árak mindig egyediek, mely függ a bérelt napok számától, a megtett km-től, és a célországtól.</p>
      <p>Ezek vonatkoznak belföldre, külföldre. Napi km korlát nincs meghatározva.</p>
    </div>';
    return $html;
}
function kiemeltAjanlatok(){
$html='<div id="kiemeltAjanlatok">
      <h4 style="text-align: center;">Ezek a járművek is érdekelhetik.</h4 style="text-align: center;">
        <div class="container mt-4">
          <div class="card-columns">
            <div class="card" style="width: 18rem;">
              <img src="./Design/audi.JPG" class="card-img-top" alt="Kép 1">
              <div class="card-body">
                <h5 class="card-title">Kártya 1</h5>
                <p class="card-text">Audi a4 2.5V6</p>
              </div>
            </div>
            <div class="card" style="width: 18rem;">
              <img src="./Design/passat.jfif" class="card-img-top" alt="Kép 2">
              <div class="card-body">
                <h5 class="card-title">Kártya 2</h5>
                <p class="card-text">Volkswagen passat 1.9TDI</p>
              </div>
            </div>
            <div class="card" style="width: 18rem;"><img src="./Design/suzuki.jpg" class="card-img-top" alt="Kép 3"><div class="card-body"><h5 class="card-title">Kártya 3</h5><p class="card-text">Suzuki swift 1.0</p></div></div></div></div></div>';
    return $html;
}
?>

<div id="felosztas">
    <?php 
        echo reklamsav();
        echo jarmuleiras();
        echo jarmuKep();
        echo tajekoztato();
        echo kiemeltAjanlatok();
    ?>
</div>