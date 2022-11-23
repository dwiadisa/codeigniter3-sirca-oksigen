<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets_dashboard/') ?>assets/img/logo.png" rel="icon">

    <link rel="stylesheet" href="<?= base_url('assets/assets_login/') ?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/assets_login/') ?>css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/assets_login/') ?>css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('assets/assets_login/') ?>css/style.css">
    <!-- JS CAPTCHA -->
    <?php
    echo  $this->recaptcha->getScriptTag();
    ?>

    <!-- JS CAPTCHA -->

    <title><?php echo $title; ?></title>
</head>