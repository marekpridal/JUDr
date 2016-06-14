<!DOCTYPE html>
<html>
<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user']))
{
    header("location: index.php");
}
?>
    <head>
    <meta charset="utf-8"><!--kódování-->
    <meta name="theme-color" content="#db5945"> <!--Změna barvy tabu v android google chrome-->
    <meta name="viewport" content="width=device-width, initial-scale=1"><!--přizpůsobení velikosti pro mobil-->
    <meta name="description" content="Popis"/><!--popis-->
    <title>Databáze</title><!--název--> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"><!--bootstrap-->
    <link rel="icon" sizes="192x192" href="icon.png"><!--ikona-->
    <link rel="stylesheet" href="dynatable/jquery.dynatable.css"><!--dynatable styl-->
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css"><!--font awesome-->
    <link rel="stylesheet" href="style.css" type="text/css"><!--styl-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script><!--jQuery-->
    <script type="text/javascript" src="dynatable/jquery.dynatable.js"></script><!--Dynatable JS-->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
    <link rel="stylesheet" href="login.css" type="text/css">
</head>
<body class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
            <form action="" method="post" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input class="form-control" id="inputEmail" name="username" placeholder="Přihlašovací jméno" type="text" required autofocus>
                <input id="inputPassword" class="form-control" name="password" placeholder="**********" type="password" required>
                <input name="submit" type="submit" value="Přihlásit" class="btn btn-lg btn-primary btn-block btn-signin">
                <span><?php echo $error; ?></span>
            </form>
        </div>
    </div>
</body>
</html>
<script>
$( document ).ready(function() {
    // DOM ready

    // Test data
    /*
     * To test the script you should discomment the function
     * testLocalStorageData and refresh the page. The function
     * will load some test data and the loadProfile
     * will do the changes in the UI
     */
    // testLocalStorageData();
    // Load profile if it exits
    loadProfile();
});

/**
 * Function that gets the data of the profile in case
 * thar it has already saved in localstorage. Only the
 * UI will be update in case that all data is available
 *
 * A not existing key in localstorage return null
 *
 */
function getLocalProfile(callback){
    var profileImgSrc      = localStorage.getItem("PROFILE_IMG_SRC");
    var profileName        = localStorage.getItem("PROFILE_NAME");
    var profileReAuthEmail = localStorage.getItem("PROFILE_REAUTH_EMAIL");

    if(profileName !== null
            && profileReAuthEmail !== null
            && profileImgSrc !== null) {
        callback(profileImgSrc, profileName, profileReAuthEmail);
    }
}

/**
 * Main function that load the profile if exists
 * in localstorage
 */
function loadProfile() {
    if(!supportsHTML5Storage()) { return false; }
    // we have to provide to the callback the basic
    // information to set the profile
    getLocalProfile(function(profileImgSrc, profileName, profileReAuthEmail) {
        //changes in the UI
        $("#profile-img").attr("src",profileImgSrc);
        $("#profile-name").html(profileName);
        $("#reauth-email").html(profileReAuthEmail);
        $("#inputEmail").hide();
        $("#remember").hide();
    });
}

/**
 * function that checks if the browser supports HTML5
 * local storage
 *
 * @returns {boolean}
 */
function supportsHTML5Storage() {
    try {
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch (e) {
        return false;
    }
}

/**
 * Test data. This data will be safe by the web app
 * in the first successful login of a auth user.
 * To Test the scripts, delete the localstorage data
 * and comment this call.
 *
 * @returns {boolean}
 */
function testLocalStorageData() {
    if(!supportsHTML5Storage()) { return false; }
    localStorage.setItem("PROFILE_IMG_SRC", "//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" );
    localStorage.setItem("PROFILE_NAME", "César Izquierdo Tello");
    localStorage.setItem("PROFILE_REAUTH_EMAIL", "oneaccount@gmail.com");
}
</script>