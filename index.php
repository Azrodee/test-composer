<head>
    <title>test composer</title>
</head>
<?php
require __DIR__ . '/vendor/autoload.php';

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

$bFound = false;

if(file_exists(__DIR__.'/data/image.png')){
    $bFound = true;
}
?>
<body>
    <h2>
        <?php
            echo ($bFound) ? "Image found, displaying : " : "Image not found, generating...";
        ?>
    </h2>
    <?php
        if($bFound){
            echo '<img src="/data/image.png" alt="test image">';
        }
    ?>
</body>
<?php
if(!$bFound){
    $manager = new ImageManager(new Driver());
    $image = $manager->create(1024, 1024)->fill('ccc');
    $image_file = $image->toPng();
    $image_file->save(__DIR__.'/data/image.png');
    sleep(3);
    header("Refresh:0");
}
?>