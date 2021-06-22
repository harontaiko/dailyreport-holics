<?php require(APPROOT . '/views/inc/header.php'); ?>

<body class="date __date ">
    <?php if($data['shopname'] =="movie"): ?>
    <?php include_once APPROOT .'/views/datesfilter/MovieShopReport.php'; ?>
    <?php elseif($data['shopname'] == "cyber"): ?>
    <?php include_once APPROOT .'/views/datesfilter/CyberReport.php'; ?>
    <?php elseif($data['shopname'] == "ps"): ?>
    <?php include_once APPROOT .'/views/datesfilter/PsReport.php'; ?>
    <?php elseif($data['shopname'] == "total"): ?>
    <?php include_once APPROOT .'/views/datesfilter/NetReport.php'; ?>
    <?php elseif($data['shopname'] == "expense"): ?>
    <?php include_once APPROOT .'/views/datesfilter/ExpenseReport.php'; ?>
    <?php elseif($data['shopname'] == "sales"): ?>
    <?php include_once APPROOT .'/views/datesfilter/SalesReport.php'; ?>
    <?php endif ?>
</body>
<?php require(APPROOT . '/views/inc/footer.php'); ?>

</html>