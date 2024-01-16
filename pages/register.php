<?php
if (filter_input(INPUT_POST, 'register', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
 // Get the form data 
        $username = $_POST['username'];
        $email = $_POST['email'];

        $password = $_POST['password'];

        // Hash the password 
        $db->register($email, $username, $password);
}
?>

<div id="login">
    <div id="bg"></div>

    <form method="POST">
        <div class="form-field">
            <input type="email" placeholder="Email cím" name="email" required/>
        </div>
        <div class="form-field">
            <input type="username" placeholder="Felhasználónév" name="username" required/>
        </div>
        <div class="form-field">
            <input type="password" placeholder="Jelszó" name="password" required/>
        </div>
        <div class="form-field">

            <button class="btn" type="submit" name="register" value="1">Regisztráció</button>
        </div>
    </form>
</div>