<?php
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    
    // -- le kell kérdezni az id alapján az autó adatait
    $autoAdatok = $db->getAuto($id);
    
    // Ellenőrizd, hogy van-e érték a $autoAdatok tömbben, mielőtt hivatkozol rá
    if ($autoAdatok) {
        // Kép elérési útvonalának összeállítása
        $imagePath = "./autokepek/" . $autoAdatok[0]['modell'];
        
        // Kép kiterjesztéseinek ellenőrzése
        $imageExtensions = ['jpg', 'png', 'jpeg', 'jfif'];
        foreach ($imageExtensions as $extension) {
            if (file_exists("$imagePath.$extension")) {
                $image = "$imagePath.$extension";
                break;
            }
        }
        
        // Ha nem található kép, használjunk alapértelmezettet
        if (!isset($image)) {
            $image = "./images/noimage.jpg";
        }
?>
<div class="container.fluid ">
    <div class="row">
   <div class="col-lg-2">
       <img src="./images/reklam.png" style="height: 650px; width: 195px;">
    </div>
    <div class="col-lg-5"><?php
        // Formázd meg az adatokat és jelenítsd meg szövegként
       
        echo "<h4> Márka: " . $autoAdatok[0]['marka'] . "</h4>";
        echo "<h4> Modell: " . $autoAdatok[0]['modell'] . "</h4>";
        echo "<h4> Motor: " . $autoAdatok[0]['motor'] . "</h4>";
        echo "<h4> Üzemanyag: " . $autoAdatok[0]['uzemanyag'] . "</h4>";
        echo "<h4> Kilométeróra állás: " . $autoAdatok[0]['km'] . "</h4>";
        echo "<h4> Kaució: " . $autoAdatok[0]['kaukcio'] . "</h4>";
        echo "<h4> Bérleti díj: " . $autoAdatok[0]['berletidij'] . "</h4>";
    } else {
        // Kezeld a hibát, például kiírhatod egy üzenetet vagy visszatérhetsz egy alapértelmezett értékkel
        echo "Nincs ilyen autó az adatbázisban";
    }
    ?>
        
    </div>
        <div class="col-lg-5">
   <?php echo '<img src="' . $image . '" alt="' . $autoAdatok[0]['modell'] . ' kép" style="height: 500px; width: 650px;"><br>';?>
    </div>
    </div>
</div>
