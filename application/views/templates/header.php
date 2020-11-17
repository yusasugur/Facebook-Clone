<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<style>
    .form-control::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: grey;
        opacity: 1;
        /* Firefox */
    }

    .circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .vertical-center {
        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    #marg {
        margin-top: 0.5em;
        color: whitesmoke;
    }
</style>

<head>
    <title>Facebook</title>
</head>


<div class="collapse" id="navbarToggleExternalContent">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand">Welcome</a>

        <?php if ($this->session->userdata('logged_in')) : ?>
            <div class="navbar-nav">
                <a class="nav-link <?php if ($page == 'feed') {
                                        echo "active";
                                    } ?> " href="<?php echo base_url(); ?>feeds">Home </a>
                <a class="nav-link  <?php if ($page == 'profile') {
                                        echo "active";
                                    } ?> " href="<?php echo base_url(); ?>my/profile">My Profile</a>
                <a class="nav-link  " href="<?php echo base_url(); ?>my/logout">Log Out</a>

            </div>
        <?php endif; ?>
        <?php if (!$this->session->userdata('logged_in')) : ?>
            <div class="navbar-nav">
                <a class="nav-link <?php if ($page == 'login') {
                                        echo "active";
                                    } ?> " href="<?php echo base_url(); ?>users/login">Login <span class="sr-only">(current)</span></a>
                <a class="nav-link  <?php if ($page == 'register') {
                                        echo "active";
                                    } ?> " href="<?php echo base_url(); ?>users/register">Register</a>
            </div>
        <?php endif; ?>

    </nav>


</div>
<nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>


<body>
    <div>