<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Cache-control" content="public">
    <meta http-equiv="Cache-control" content="private">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache-control" content="no-store">
    <link rel="host" href="<?php echo URLROOT; ?>">
    <link rel="canonical" href="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta name="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/stylesheets/css/style.css" />
    <script src="<?php echo URLROOT; ?>/public/javascript/jquery.min.js"></script>
    <link rel="icon" href="<?php echo URLROOT; ?>/public/images/images/dailyhackstore.ico" type="image/ico" />
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/public/images/images/dailyhackstore.ico" type="image/ico" />
    <title><?php echo $data['title']; ?></title>
</head>