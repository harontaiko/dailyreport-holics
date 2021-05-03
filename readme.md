### dailyreport base for holics ENT

### cloudflare for DDOS

### change htps in all js

### change htacces in public, adjust timezone when day comes

### all static js fetched thru jsdeliver,

### daily report

```html template

<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="home __home site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
    </main>
</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/javascript/main.min.js"></script>

</html>

        <?php
        $mail = $data['mail'];
        $verify =  password_verify(hex2bin($data['token']), $data['mail']['reset_link']);

        if ($verify == false) : ?>

```
