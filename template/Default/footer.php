<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://<?php echo $siteDomain; ?>">
                        <?php echo $lang["home"] ?>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="social-area pull-right">
            <a href="https://facebook.com/<?php echo $facebookUsername; ?>" class="btn btn-social btn-facebook btn-simple">
                <i class="fa fa-facebook-square"></i>
            </a>
            <a href="https://twitter.com/" class="btn btn-social btn-twitter btn-simple">
                <i class="fa fa-twitter<?php echo $twitterUsername; ?>"></i>
            </a>
            <a href="https://insatagram.com/" class="btn btn-social btn-pinterest btn-simple">
                <i class="fa fa-instagram<?php echo $instagramUsername; ?>"></i>
            </a>
        </div>
        <div class="copyright">
            <?php echo $lang["footer"] ?>
        </div>
    </div>
</footer>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#submit").click(function () {
            $('#loading').append('<p><?php echo $lang["loading"] ?></p><img class="img-responsive" src="<?php echo "template/" . $themeName . "/" ?>loading.gif">');
        });
    });
</script>
</body>
</html>