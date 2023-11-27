<?php 

require_once "./index.php";
if(isset($_POST["token"])){
    header("location:./index.php?pages=google&action=home");
    exit;

}
if(isset($_GET["code"])){
    $token -> $goo->fetchAccessTokenWithAuthCode($_GET["code"]);
    if(!isset($token["error"])){
        $_SESSION["token"] = $token;
        header("location: ./index.php?pages=google&action=home");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($token["error"])){ ?>
    <div><?= print_r($token); ?></div>
    <?php } ?>
    <a href="<?= $goo->createAuthUrl()?>">Login with Google</a>
</body>
</html>