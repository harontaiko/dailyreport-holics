<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="add __add site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <?php if(checkForSaleDataToday($data['today'], $data['db'])): ?>
    <?php include_once APPROOT .'/views/internal/noneditableSale.php'; ?>
    <?php else: ?>
    <?php include_once APPROOT .'/views/internal/editableSale.php'; ?>
    <?php endif ?>

</body>

<noscript>
    <div id="no_script">This site requires and runs entirely on javascript, please Ensure Javascript
        is enabled
        on your browser for smooth & better experience</div>
</noscript>
<script src="<?php echo URLROOT; ?>/public/javascript/main.min.js"></script>

</html>