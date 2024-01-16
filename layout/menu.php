<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <div class="d-flex justify-content-between w-100">
 
                <a class="navbar-brand" href="#">Autóbérlés</a>
               
 
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=fooldal">Kezdőlap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=login">Belépés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=kapcsolat">Kapcsolat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=rolunk">Rólunk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<style>
    #hatter-container{
    background-image: url(./images/hatter.png);
    width: 100%;
    height: 300px;
 
}
#hatter-container p{
    font-size: 50px;
    font-style: inherit;
    color: white;
    text-align: center;
    padding-top: 110px;
    font-family: cursive;
    font-weight: bold;
}
</style>
        <div id="hatter-container"><p>Székesfehérvár Autóbérlés</p></div>

<?= $auto = filter_input(INPUT_GET, "auto"); ?>