<?php
include_once 'phplog/logger.inc.php';

$Logger = new Logger("debug.log", PHPLOG_DEBUG, PHPLOG_TYPE_FILE);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Website</title>
</head>
<body>
    <h1>Test Website</h1>
    <p>This is a test website.</p>
    <p>The current date and time is: <?php echo date("Y-m-d H:i:s"); ?></p>

    <?php
    $Logger->log("This is a test log message.", PHPLOG_DEBUG);
    ?>

    <!-- Test Form -->
    <form action="index.php" method="get" style="padding-top: 30px;">
        <input type="text" name="test" placeholder="Test Form" value="">
        <input type="submit" value="Submit">
    </form>

    You submitted: <?php echo $_GET['test']; ?>
    <?php $Logger->log("User submitted: " . $_GET['test'], PHPLOG_DEBUG) ?>
</body>
</html>