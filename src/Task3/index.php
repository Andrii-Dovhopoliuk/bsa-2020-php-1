<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Task1\Track;
use App\Task3\CarTrackHtmlPresenter;
use \App\Task1\Car;

$arena = new Track(4, 40);

$presenter = new CarTrackHtmlPresenter();
$presentation = $presenter->present($arena);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Built-in Web Server</title>
</head>
<body>
<?php echo $presentation; ?>
</body>
</html>