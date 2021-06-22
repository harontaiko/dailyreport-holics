<!--Daily, Monthly And Annual reports-->
<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="reports __reports ">
    <?php if($data['reportdate'] == "today"):  ?>
    <?php if($data['shopname'] =="movie"): ?>
    <?php include_once APPROOT .'/views/reports/dailyMovieShopReport.php'; ?>
    <?php elseif($data['shopname'] == "cyber"): ?>
    <?php include_once APPROOT .'/views/reports/dailyCyberReport.php'; ?>
    <?php elseif($data['shopname'] == "ps"): ?>
    <?php include_once APPROOT .'/views/reports/dailyPsReport.php'; ?>
    <?php elseif($data['shopname'] == "total"): ?>
    <?php include_once APPROOT .'/views/reports/dailyNetReport.php'; ?>
    <?php elseif($data['shopname'] == "expense"): ?>
    <?php include_once APPROOT .'/views/reports/dailyExpenseReport.php'; ?>
    <?php elseif($data['shopname'] == "sales"): ?>
    <?php include_once APPROOT .'/views/reports/dailySalesReport.php'; ?>
    <?php endif ?>
    <?php elseif($data['reportdate'] == "week"): ?>
    <?php if($data['shopname'] =="movie"): ?>
    <?php include_once APPROOT .'/views/reports/weeklyMovieShopReport.php'; ?>
    <?php elseif($data['shopname'] == "cyber"): ?>
    <?php include_once APPROOT .'/views/reports/weeklyCyberReport.php'; ?>
    <?php elseif($data['shopname'] == "ps"): ?>
    <?php include_once APPROOT .'/views/reports/weeklyPsReport.php'; ?>
    <?php elseif($data['shopname'] == "total"): ?>
    <?php include_once APPROOT .'/views/reports/weeklyNetReport.php'; ?>
    <?php elseif($data['shopname'] == "expense"): ?>
    <?php include_once APPROOT .'/views/reports/weeklyExpenseReport.php'; ?>
    <?php elseif($data['shopname'] == "sales"): ?>
    <?php include_once APPROOT .'/views/reports/weeklySalesReport.php'; ?>
    <?php endif ?>
    <?php elseif($data['reportdate'] == "month"): ?>
    <?php if($data['shopname'] =="movie"): ?>
    <?php include_once APPROOT .'/views/reports/monthlyMovieShopReport.php'; ?>
    <?php elseif($data['shopname'] == "cyber"): ?>
    <?php include_once APPROOT .'/views/reports/monthlyCyberReport.php'; ?>
    <?php elseif($data['shopname'] == "ps"): ?>
    <?php include_once APPROOT .'/views/reports/monthlyPsReport.php'; ?>
    <?php elseif($data['shopname'] == "total"): ?>
    <?php include_once APPROOT .'/views/reports/monthlyNetReport.php'; ?>
    <?php elseif($data['shopname'] == "expense"): ?>
    <?php include_once APPROOT .'/views/reports/monthlyExpenseReport.php'; ?>
    <?php elseif($data['shopname'] == "sales"): ?>
    <?php include_once APPROOT .'/views/reports/monthlySalesReport.php'; ?>
    <?php endif ?>
    <?php elseif($data['reportdate'] == "year"): ?>
    <?php if($data['shopname'] =="movie"): ?>
    <?php include_once APPROOT .'/views/reports/annualMovieShopReport.php'; ?>
    <?php elseif($data['shopname'] == "cyber"): ?>
    <?php include_once APPROOT .'/views/reports/annualCyberReport.php'; ?>
    <?php elseif($data['shopname'] == "ps"): ?>
    <?php include_once APPROOT .'/views/reports/annualPsReport.php'; ?>
    <?php elseif($data['shopname'] == "total"): ?>
    <?php include_once APPROOT .'/views/reports/annualNetReport.php'; ?>
    <?php elseif($data['shopname'] == "expense"): ?>
    <?php include_once APPROOT .'/views/reports/annualExpenseReport.php'; ?>
    <?php elseif($data['shopname'] == "sales"): ?>
    <?php include_once APPROOT .'/views/reports/annualSalesReport.php'; ?>
    <?php endif ?>
    <?php elseif($data['reportdate'] == ""): ?>
    <?php endif ?>
</body>
<?php require(APPROOT . '/views/inc/footer.php'); ?>

</html>