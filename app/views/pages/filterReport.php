<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="filterReport __filterReport site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <?php flash('add-error'); ?>
        <h2 class="movie-title">Generate Reports <i class="fas fa-chart-pie fa-2x"></i></h2>
        <select name="filter-filterReport" id="filter-filterReport" class="dr_input">
            <option value="default">Generate Report</option>
            <option value="daily">Daily</option>
            <option value="this-month">Monthly</option>
            <option value="yearly">Annual</option>
        </select>

    </main>

</body>

<noscript>
    <div id="no_script">This site requires and runs entirely on javascript, please Ensure Javascript
        is enabled
        on your browser for smooth & better experience</div>
</noscript>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/javascript/main.min.js"></script>

</html>