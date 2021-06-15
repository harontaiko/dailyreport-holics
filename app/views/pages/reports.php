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
    <?php endif ?>
    <?php elseif($data['reportdate'] == "week"): ?>
    <?php if($data['shopname'] =="movie"): ?>
    <?php include_once APPROOT .'/views/reports/weeklyMovieShopReport.php'; ?>
    <?php elseif($data['shopname'] == "cyber"): ?>
    <?php include_once APPROOT .'/views/reports/weeklyCyberReport.php'; ?>
    <?php elseif($data['shopname'] == "ps"): ?>
    <?php include_once APPROOT .'/views/reports/weeklyPsReport.php'; ?>
    <?php endif ?>
    <?php elseif($data['reportdate'] == "month"): ?>
    <?php if($data['shopname'] =="movie"): ?>
    <?php include_once APPROOT .'/views/reports/monthlyMovieShopReport.php'; ?>
    <?php elseif($data['shopname'] == "cyber"): ?>
    <?php include_once APPROOT .'/views/reports/monthlyCyberReport.php'; ?>
    <?php elseif($data['shopname'] == "ps"): ?>
    <?php include_once APPROOT .'/views/reports/monthlyPsReport.php'; ?>
    <?php endif ?>
    <?php elseif($data['reportdate'] == "year"): ?>
    <?php if($data['shopname'] =="movie"): ?>
    <?php include_once APPROOT .'/views/reports/annualMovieShopReport.php'; ?>
    <?php elseif($data['shopname'] == "cyber"): ?>
    <?php include_once APPROOT .'/views/reports/annualCyberReport.php'; ?>
    <?php elseif($data['shopname'] == "ps"): ?>
    <?php include_once APPROOT .'/views/reports/annualPsReport.php'; ?>
    <?php endif ?>
    <?php elseif($data['reportdate'] == ""): ?>
    <?php endif ?>
</body>
<noscript>
    <div id="no_script">This site requires and runs entirely on javascript, please Ensure Javascript
        is enabled
        on your browser for smooth & better experience</div>
</noscript>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/javascript/main.min.js"></script>


</html>