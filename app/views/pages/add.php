<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="add __add site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <?php if(checkForSaleDataToday($data['today'], $data['db'])): ?>
    <?php include_once APPROOT .'/views/internal/noneditableSale.php'; ?>
    <?php else: ?>
    <?php include_once APPROOT .'/views/internal/editableSale.php'; ?>
    <?php endif ?>

</body>

<?php require(APPROOT . '/views/inc/footer.php'); ?>

</html>