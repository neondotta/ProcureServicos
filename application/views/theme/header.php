<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Procure Servicos</title>

    <link rel="stylesheet" href="<?= base_url('public/css/materialize.min.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('public/css/costumize.css')?>" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="<?= base_url('public/js/jquery-3.2.1.min.js')?>"></script>
    <script src="<?= base_url('public/js/materialize.min.js')?>"></script>

</head>
<body class="l12 s12 m12">
<ul id="dropdown1" class="dropdown-content">
    <?php
        if ($this->session->userdata('login')['user_professional'] != TRUE)  {
    ?>
            <li><a href="<?= base_url('ProfessionalController/openForm')?>">Vire um Profissional</a></li>
    <?php
        } else {
    ?>
            <li><a href="<?= base_url('ProfessionalController/profile')?>">Perfil Profissional</a></li>
    <?php
        }
    ?>
    <li><a href="<?= base_url('LoginController/logout')?>">Logout</a></li>
</ul>
<nav>
    <div class="nav-wrapper teal">
        <a href="<?= base_url()?>" class="brand-logo">Logo</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php if($this->session->has_userdata('login')) { ?>
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?=$this->session->userdata('login')['name']; ?>
                        <i class="material-icons right">arrow_drop_down</i></a></li>
            <?php } else { ?>
                <li><a href="<?= base_url('LoginController')?>">Login</a></li>
                <li><a href="<?= base_url('UserController/openForm')?>">Cadastrar</a></li>
            <?php } ?>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <?php if($this->session->userdata('login')) { ?>
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img class="sidebar-background" src="<?=base_url('public/images/default-sidebar2.jpg')?>">
                        </div>
                        <a href="#!user"><img class="circle" src="<?=
                                $this->session->userdata('login')['address_picture'] .
                                $this->session->userdata('login')['name_picture']
                            ?>"></a>
                        <a href="#!"><span class="name white-text">
                                        <?=$this->session->userdata('login')['name']; ?>
                                    </span></a>
                            <a href="#!email"><span class="email white-text">
                                        <?=$this->session->userdata('login')['email']; ?>
                                    </span></a>
                    </div>
                </li>
                    <?php
                    if ($this->session->userdata('login')['user_professional'] != TRUE)  {
                        ?>
                        <li><a href="<?= base_url('ProfessionalController/openForm')?>">Vire um Profissional</a></li>
                        <?php
                    } else {
                        ?>
                        <li><a href="<?= base_url('ProfessionalController/profile')?>">Perfil Profissional</a></li>
                        <?php
                    }
                    ?>
                <li><a href="<?= base_url('LoginController/logout')?>">Logout</a></li>
            <?php } else { ?>
                <?=$_SERVER['DOCUMENT_ROOT']."./bah";?>
                <li><a href="<?= base_url('LoginController')?>">Login</a></li>
                <li><a href="<?= base_url('UserController/openForm')?>">Cadastrar</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>

<?php
if ($this->session->flashdata('error')) {
    ?>
    <div id="card-alert" class="card red col s12 m12 l10">
        <div class="card-content white-text">
            <p class="alert alert-success"><?= $this->session->flashdata('error'); ?></p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php
}
if ($this->session->flashdata('success')) {
?>
    <div id="card-alert" class="card green lighten-2 col s12 m12 l10">
            <div class="card-content white-text">
            <p class="alert alert-success"><?= $this->session->flashdata('success'); ?></p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php
}
?>
