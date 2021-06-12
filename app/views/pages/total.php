<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="total __total site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <?php flash('add-error'); ?>
        <h2 class="movie-title">Gross <i class="fas fa-plus-circle fa-2x"></i></h2>
        <select name="filter-total" id="filter-total" class="dr_input">
            <option value="default">Filter</option>
            <option value="today">Today</option>
            <option value="this-month">This month</option>
            <option value="this-year">This year</option>
        </select>
        <section class="todo">
            <form id="filter-movie-date">
                <fieldset>
                    <label for="from">from</label>
                    <input type="date" name="nom" class="dr_input" placeholder="From">
                </fieldset>

                <fieldset>
                    <label for="to">to</label>
                    <input type="date" name="prenom" class="dr_input" placeholder="To">
                </fieldset>
            </form>
        </section>
        <table class="rwd-table">
            <tr>
                <th>Date</th>
                <th>Expense(ksh)</th>
                <th>Sales(ksh)</th>
                <th>Income(cyber,ps,shop)</th>
                <th>Net Total(ksh)</th>
                <th>See</th>
            </tr>
            <?php while ($net = $data['net']->fetch_assoc()) :  ?>
            <tr>
                <td data-th="date-net"><?php echo date('jS F Y', strtotime($net['date_created'])); ?></td>
                <td data-th="expense-net"><?php echo number_format($net['totalexpense']); ?></td>
                <td data-th="sales-net"><?php echo number_format($net['total_sales']); ?></td>
                <td data-th="income-net"><?php echo number_format($net['totalincome']); ?></td>
                <td data-th="total-net">
                    <?php echo number_format($net['totalincome'] + $net['total_sales'] -($net['totalexpense'])).'/='; ?>
                </td>
                <td data-th="see"><i class="fas fa-eye"></i></td>
            </tr>
            <?php endwhile ?>

        </table>

        <p>&larr; All time Income: <span
                class="login-err"><?php echo number_format($data['sum'] - $data['diff']) . '/='; ?></span>&rarr;
        </p>
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