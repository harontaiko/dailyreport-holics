<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Cache-control" content="public">
    <meta http-equiv="Cache-control" content="private">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache-control" content="no-store">
    <link rel="canonical" href="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta name="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/stylesheets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/stylesheets/css/style.css" />
    <script src="<?php echo URLROOT; ?>/public/javascript/fontawesome.js"></script>
    <script src="<?php echo URLROOT; ?>/public/javascript/jquery.js"></script>
    <?php if (strpos($_SERVER['REQUEST_URI'], "pages/reports") !== false) :  ?>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
    <?php endif ?>
    <link rel="icon" href="<?php echo URLROOT; ?>/public/images/images/dailyhackstore.ico" type="image/ico" />
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/public/images/images/dailyhackstore.ico" type="image/ico" />
    <title><?php echo $data['title']; ?></title>
</head>