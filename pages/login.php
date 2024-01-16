<?php
if (filter_input(INPUT_POST, 'login', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
 // Get the form data 
        $myusername = $_POST['username'];
        $mypassword = $_POST['password'];
        // Hash the password 
        $db->register($email, $username, $password);
}
?>

<div id="login">
    <div id="bg"></div>

<form>
  <div class="form-field">
    <input type="username" placeholder="Felhasználónév" required/>
  </div>
  
  <div class="form-field">
    <input type="password" placeholder="Jelszó" required/>                         </div>
    <a href="index.php?menu=register"><p>Még nem regisztráltál?</p>
  <div class="form-field">
    <button class="btn" type="submit">Bejelentkezés</button>
  </div>
</form>
</div>