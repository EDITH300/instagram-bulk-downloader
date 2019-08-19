<nav class="navbar navbar-default" role="navigation-demo">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="http://<?php echo $siteDomain; ?>">
                <img alt="Brand" src="http://<?php echo $siteDomain; ?>/template/Default/logo.png"
                     style="margin-top: -20%;">
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-default2">
                <span class="sr-only"><?php echo $lang["toggle"] ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://<?php echo $siteDomain; ?>"><?php echo $siteName; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-default2">
            <ul class="nav navbar-nav">
                <li class=""><a href="http://<?php echo $siteDomain; ?>"><?php echo $lang["home"] ?></a></li>
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>