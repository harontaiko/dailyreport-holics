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