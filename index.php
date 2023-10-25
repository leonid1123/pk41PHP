<?php
define("adress", "localhost");
define("user", "test");
define("pass", "test");
define("database", "test");
$connState = "";
try {
    $pdo = new PDO("mysql:host=" . adress . ";dbname=" . database, user, pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connState = "всё хорошо";
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
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
        <input name="go" type="submit" value="Войти">
    </form>
    <p>
        <?php
        if (isset($_POST["go"])){
            $sqlReq = "SELECT * FROM users WHERE login='" . $_POST['userLogin'] . "' AND password='" . 
            $_POST['userPassword'] . "';";
            $stmt = $pdo->prepare($sqlReq);
            $stmt->execute();
            echo $stmt->rowCount();
        }
        #echo $_POST["userLogin"] . " " . $_POST["userPassword"];
        ?>
    </p>
</body>

</html>