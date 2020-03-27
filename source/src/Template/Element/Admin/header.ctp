<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Website</b> ban hang</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <img src="/img/avatar-backend.png" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?= $this->request->session()->read('Auth.User.username');?></span>
                    </a>
                    <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">

                         <img src="/img/avatar-backend.png" class="img-circle" alt="User Image"/>
                    
                     <p>
                        <?= $this->request->session()->read('Auth.User.username');?>
                       
                     </p>
                    </li>         

                    <?php 
                        $link_home = $this->Url->build([
                        'controller' => 'Users',
                        'action' => 'index',
                        'prefix' => 'admin',
                        ]);

                         $link_profile = $this->Url->build([
                        'controller' => 'Users',
                        'action' => 'view',
                        'prefix' => 'admin',
                        ]);

                        $link_logout = $this->Url->build([
                        'controller' => 'Users',
                        'action' => 'logout',
                        'prefix' => 'admin',
                        ]);
                    ?>
                    <li class="user-footer">
                     <div class="pull-left">
                         <a href="<?= $link_home; ?>" class="btn btn-default btn-flat">Home</a>
                     </div>
                     <div class="pull-right">
                        <a href="<?= $link_logout; ?>" class="btn btn-default btn-flat">Logout</a>
                     </div>
                    </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>