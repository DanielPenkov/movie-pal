<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('bootstrap') ?>
    <?= $this->Html->css('bootstrap-theme') ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('sweetalert') ?>
    <?= $this->Html->css('jquery.autocomplete') ?>

    <?= $this->Html->script('jquery-1.11.2') ?>
    <?= $this->Html->script('bootstrap') ?>
    <?= $this->Html->script('moviepal') ?>
    <?= $this->Html->script('sweetalert.min') ?>
    <?= $this->Html->script('sweetalert-dev') ?>
    <?= $this->Html->script('jquery.autocomplete') ?>
    <?= $this->Html->script('jquery.autocomplete.min') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-default ">
                 <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>  
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <span class='navbar-brand'>
                            <?php echo $this->Html->link('MoviePal', array('controller' => 'movies','action' => 'index'));?> 
                        </span>
            
                      <ul class="nav navbar-nav">
                        <li ><?php echo $this->Html->link('Movies', array('controller' => 'movies','action' => 'index'));?></li>

                        <?php if (isset($authUser)):?>
                            <li><?php echo $this->Html->link('My Profile', array('controller' => 'profile','action' => 'index'));?></li>
                            <li><?php echo $this->Html->link('All Users', array('controller' => 'users','action' => 'allusers'));?></li>
                            <li><?php echo $this->Html->link('Friends', array('controller' => 'users','action' => 'allFriends'));?></li>
                            <li id="notification-menu"><?php echo $this->Html->link('Notifications', array('controller' => 'notifications','action' => 'index',$authUser['id']));?></li>
                            <li id="badge"> <a id='badge-link'> <span class="badge">2</span></a></li>
                        <?php endif; ?>
                      </ul>

                     <ul class="nav navbar-nav" id="menu-login">
                        <?php if (isset($authUser)):?>
                            <li><?php echo $this->Html->link('Hello, '.$authUser['username'],  array('controller' => 'movies','action' => 'index'));?></li>
                            <li><?php echo $this->Html->link('Logout', array('controller' => 'users','action' => 'logout'));?></li>
                            
                        <?php else: ?>
                            <li><?php echo $this->Html->link('Login', array('controller' => 'users','action' => 'login'));?></li>
                            <li><?php echo $this->Html->link('Register', array('controller' => 'users','action' => 'register'));?></li>
                        <?php endif; ?>
                     </ul>   
                    </div>
                </div>
            </nav>
        </div>      
    </header>

    <div id="container">

        <div id="content">
            <?= $this->Flash->render() ?>

            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
        </footer>
    </div>
</body>
</html>
