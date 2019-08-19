<?php
/**
 * Created by Ahmet Hakan Beşel
 * Contact: ahmethakan.besel@gmail.com
 */

include_once '../config.php';

function filePrepend($string, $filename)
{
    $fileContent = file_get_contents($filename);
    file_put_contents($filename, $string . "\n" . $fileContent);
}

function forceDownload($file)
{
    if ((isset($file)) && (file_exists($file))) {
        header("Content-length: " . filesize($file));
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        readfile("$file");
    } else {
        echo "No file selected";
    }
}

function deleteOldFiles()
{
    $dir = "";
    foreach (glob($dir."*.zip") as $file) {
        if(time() - filectime($file) > 86400){
            unlink($file);
        }
    }
}

function generateRandomString($length = 15)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if ($_POST["url"] != '') {
    $arr = preg_split('/\r\n|\r|\n/', $_POST["url"]);
    $arr = array_unique($arr);
    $zipName = generateRandomString() . '.zip';
    $zip = new ZipArchive;
    $zip->open($zipName, ZipArchive::CREATE);
    $zip->addFromString('README.TXT', $readmeText);
    foreach ($arr as $link) {
        $domain = str_ireplace('www.', '', parse_url($link, PHP_URL_HOST));
        if ($domain = "instagram.com") {
            $regex = '@<meta property="og:type" content="(.*?)" />@si';
            $scrape = file_get_contents($link);
            preg_match_all($regex, $scrape, $type);
            switch ($type[1][0]) {
                case 'video':
                $VideoURL = '@<meta property="og:video" content="(.*?)" />@si';
                $scrape = file_get_contents($link);
                preg_match_all($VideoURL, $scrape, $VideoURL);
                $videoFile = $VideoURL[1][0];
                $videoName = generateRandomString() . '.mp4';
                    /*
                     * If you want keep log for downloaded images uncomment bottom line
                     */
                    // filePrepend("$videoFile", 'downloaded-videos.txt');
                    $zip->addFromString($videoName, file_get_contents($videoFile));
                    break;
                    case 'instapp:photo':
                    $ImageURL = '@<meta property="og:image" content="(.*?)" />@si';
                    $scrape = file_get_contents($link);
                    preg_match_all($ImageURL, $scrape, $ImageURL);
                    $image = $ImageURL[1][0];
                    $imageName = generateRandomString() . '.jpg';
                    /*
                     * If you want keep log for downloaded videos uncomment bottom line
                     */
                    // filePrepend("$image", 'downloaded.txt');
                    $zip->addFromString($imageName, file_get_contents($image));
                    break;
                    default:
                    echo 'Error, please try again!';
                    break;
                }
            } else {

            }
        }
        $zip->close();
        deleteOldFiles();
        header('Location: ' . "http://" . $siteDomain . "/download.php?link=" . $zipName);
        die();
    } else {
        deleteOldFiles();
        $redirectURL = "http://" . $siteDomain;
        header('Location: ' . $redirectURL);
        die();
    }