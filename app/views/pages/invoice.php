<?php require(APPROOT . '/views/inc/header.php'); ?>

<body class="invoice __invoice ">
    <?php if($data['invoiceItem'] =="sale"): ?>
    <?php include_once APPROOT .'/views/invoice/saleInvoice.php'; ?>
    <?php elseif($data['invoiceItem'] == "movie"): ?>
    <?php include_once APPROOT .'/views/datesfilter/CyberReport.php'; ?>
    <?php elseif($data['invoiceItem'] == "ps"): ?>
    <?php include_once APPROOT .'/views/datesfilter/PsReport.php'; ?>
    <?php elseif($data['invoiceItem'] == "cyber"): ?>
    <?php include_once APPROOT .'/views/datesfilter/PsReport.php'; ?>
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