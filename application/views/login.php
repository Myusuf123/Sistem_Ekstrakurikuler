<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMAN 1 Purbolinggo</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css3/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css3/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css3/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css3/style.css'); ?>">



    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

    <!-- Custom fonts for this template-->

    <link href="<?= base_url('assets/'); ?>img/smansa.png" rel="shortcut icon" type="image/png">
    <style>
        .act-btn {
            background: green;
            display: block;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            text-decoration: none;
            transition: ease all 0.3s;
            position: fixed;
            right: 30px;
            bottom: 30px;
            z-index: 100;
        }

        .act-btn:hover {
            background: blue
        }
    </style>
</head>

<body class="bg-light">


    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="<?= base_url('assets/'); ?>img/smansa.png" width="70" height="70"></div>
                                <p class="lead"><b>Login Sistem</b></p>
                                <?php if ($this->session->flashdata('info')) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata('info'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php echo form_open('login/auth') ?>

                            <div class="form-group">
                                <label for="signin-email" class="control-label sr-only">NIS/NIP</label>
                                <input type="text" class="form-control" id="signin-email" name="username" placeholder="NIS/NIP">
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">PASSWORD</label>
                                <input type="password" class="form-control" id="signin-password" name="password" placeholder="PASSWORD">
                            </div>

                            <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="LOGIN">

                            <?php echo form_close(); ?>
                            <br>


                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <br><br><br><br><br><br><br><br>
                            <h1 class="heading">SELAMAT DATANG</h1>
                            <hr>
                            <h1 class="heading">Sistem Informasi Ekstrakurikuler </h1>
                            <p>SMAN 1 Purbolinggo Kab. Lampung Timur</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->

</body>

</html>