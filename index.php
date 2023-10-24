<?php
define("adress", "localhost");
define("user", "test");
define("pass", "test");
define("database", "test");
$connState = "";
$mysqli = new mysqli(adress, user, pass, database);
if ($mysqli === false) {
    die("Насяльника фсё пльоха" . $mysqli->connect_error);
    $connState = "Подключение не удалось";
} else {
    $connState = "Подключение прошло успешно!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h3>Статус подключения:</h3>
    <p><?php echo $connState;  ?></p>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input name="userLogin" type="text">
        <input name="userPassword" type="text">
        <input type="submit" value="Войти">
    </form>
    <p>
        <?php
        echo $_POST["userLogin"]." ".$_POST["userPassword"];
        ?>
    </p>
</body>

</html>