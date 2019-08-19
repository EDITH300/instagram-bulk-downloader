<?php
function forceDownload($fileName, $siteDomain)
{
    $fileUrl = "http://" . $siteDomain . "/system/" . $fileName;
    header('Location: ' . $fileUrl);
    die();
}

if (@$_POST) {
    forceDownload($_GET["link"], $siteDomain);
}
?>
<div class="container">

    <br>
    <?php include 'navigation.php'; ?>

    <div class="jumbotron">
        <h1><?php echo $lang["title"] ?></h1>
        <p><?php echo $lang["info"] ?></p>
        <p class="alert alert-success"><?php echo $lang["download"] ?></p>
        <br>
        <form method="post">
            <input name="downloadLink" type="hidden">
            <button type="submit" class="btn btn-block btn-lg btn-fill btn-primary"><i
                        class="fa fa-cloud-download"></i> <?php echo $lang["button"] ?></button>
        </form>
    </div>
    <div class="social-line text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-3">
                    <div class="col-md-2">
                        <a rel="nofolollow" target="_blank"
                           href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $siteDomain; ?>"
                           class="btn btn-round btn-fill btn-social btn-facebook">
                            <i class="fa fa-facebook-square"></i> <?php echo $lang["share"] ?>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a rel="nofolollow" target="_blank"
                           href="https://twitter.com/home?status=I%20can%20download%20my%20Instagram%20pictures%20easily%20SEE%3A%20<?php echo $siteDomain; ?>"
                           class="btn btn-round btn-fill btn-social btn-twitter">
                            <i class="fa fa-twitter"></i> <?php echo $lang["tweet"] ?>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a rel="nofolollow" target="_blank"
                           href="https://plus.google.com/share?url=<?php echo $siteDomain; ?>"
                           class="btn btn-round btn-fill btn-social btn-google">
                            <i class="fa fa-google-plus-square"></i> <?php echo $lang["share"] ?>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a rel="nofolollow" target="_blank"
                           href="https://pinterest.com/pin/create/button/?url=<?php echo $siteDomain; ?>&media=&description=I%20can%20download%20my%20Instagram%20pictures%20easily"
                           class="btn btn-round btn-social  btn-fill btn-youtube">
                            <i class="fa fa-pinterest"></i> <?php echo $lang["pin_it"] ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>