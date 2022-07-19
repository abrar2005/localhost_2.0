<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localhost</title>

    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/button.css">

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>
    <header>
        <h1>localhost</h1>
        <!-- DARKMODE BTN -->
        <button id="theme-toggle">LIGHT</button>
    </header>

    <?php
    // SPECIFY WHICH FOLDER TO START AT WHEN YOU ENTER LOCALHOST
    $main_url = "./sites";

    if (!isset($_GET['file'])) {
        include("assets/includes/_all_rows.php");
    } else {
        $main_url = $_GET["file"];
        include("assets/includes/_all_rows.php");
    }

    ?>

    <script src="assets/js/main.js"></script>
</body>

</html>