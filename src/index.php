<?php

// load folders from directory
$folders = array_filter(glob('*'), 'is_dir');

function checkIfIsNetteFolder(string $folderPath): string
{
    // check if folder contains folder vendor and nette
    $vendorFolder = $folderPath . '/vendor';
    $netteFolder = $folderPath . '/vendor/nette';
    $laravelFolder = $folderPath . '/vendor/laravel';
    if (is_dir($vendorFolder) && is_dir($netteFolder) && !is_dir($laravelFolder)) {
        return $folderPath . '/www';
    }
    if (is_dir($laravelFolder)) {
        return $folderPath . '/public';
    }

    return $folderPath;
}


function generateFolderView(array $folders)
{
    foreach ($folders as $folder) {
        ?>
        <a href="../<?= checkIfIsNetteFolder($folder) ?>">
            <div class="imglink" id="gallery">
                <img
                    src="https://media.istockphoto.com/id/1409329028/vector/
                    no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg"
                    alt="">
                <h1><?= $folder ?></h1>
            </div>
        </a>
        <?php
    }
}


?>
<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Airsane Hub</title>
    <style>
        @import "https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;900&display=swap";
        @import "https://fonts.googleapis.com/css2?family=Quicksand&display=swap";

        * {
            margin: 0;
            padding: 0
        }

        header {
            text-align: center
        }

        body {
            display: grid;
            grid-template-rows:auto 1fr;
            height: 100vh;
            background: linear-gradient(to right, #2C5364, #203A43, #0F2027);
            background: #000;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none
        }

        body header, body main {
            padding: 8px 16px
        }



        #timedate .time {
            font-size: 64px;
            font-weight: 900
        }

        #timedate .date {
            font-size: 24px
        }

        main {
            display: grid;
            grid-template-columns:repeat(3, 1fr);
            justify-items: center;
            align-content: center;
            gap: 32px
        }

        main .imglink {
            background-position: center !important;
            background-size: 100% !important;
            background-repeat: no-repeat !important;
            width: 360px;
            max-width: 360px;
            height: 360px;
            max-height: 360px;
            border-radius: 16px;
            display: grid;
            align-content: end;
            box-shadow: inset 0 0 5px rgba(255, 255, 255, .5);
            transition: .2s;
            filter: grayscale(100%)
        }

        main .imglink:hover {
            background-size: 110% !important;
            filter: grayscale(0%)
        }

        main .imglink:hover h1 {
            background: rgba(0, 0, 0, .75)
        }

        main .imglink h1 {
            padding: 8px;
            background: rgba(0, 0, 0, .5);
            border-bottom-left-radius: 14px;
            border-bottom-right-radius: 14px;
            text-align: center;
            -webkit-backdrop-filter: blur(3px);
            backdrop-filter: blur(3px)
        }

        @media (max-width: 1500px) {
            main {
                gap: 32px
            }

            main .imglink {
                width: 320px !important;
                height: 320px !important
            }
        }

        @media (max-width: 1200px) {
            main .imglink {
                width: 256px !important;
                height: 256px !important
            }
        }

        @media (max-width: 1000px) {
            main .imglink {
                width: 224px !important;
                height: 224px !important
            }

            main .imglink h1 {
                font-size: 24px !important
            }
        }

        @media (max-width: 900px) {
            main {
                grid-template-columns:1fr !important;
                gap: 16px !important
            }
        }

        h1, h2, h3, p {
            font-family: "Quicksand", sans-serif;
            color: #fff;
            text-shadow: 2px 2px 5px #000
        }

        h1 {
            font-size: 30px;
            font-weight: 900
        }

        h2 {
            font-size: 24px;
            font-weight: 500
        }

        h3 {
            font-size: 20px;
            font-weight: 500
        }

        p {
            font-size: 18px;
            font-weight: 400
        }

        a {
            text-decoration: none
        }


        .imglink img {
            border-radius: 16px;
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /*# sourceMappingURL=hub.css.map */
    </style>
</head>
<body>
<header>
    <h1>Airsane Hub</h1>
    <div class="date_time">
    </div>
</header>
<main>
    <?php
    generateFolderView($folders);
    ?>
</main>
</body>
</html>
