<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="total __total site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <?php flash('add-error'); ?>
        <h2 class="movie-title">Gross <i class="fas fa-plus-circle fa-2x"></i></h2>
        <select name="filter-total" id="filter-total" class="dr_input">
            <option value="default">Filter</option>
            <option value="today">Today</option>
            <option value="week">Weekly</option>
            <option value="month">Monthly</option>
            <option value="year">This year</option>
        </select>
        <section class="todo">
            <form id="filter-movie-date">
                <fieldset>
                    <label for="from">from</label>
                    <input type="date" id="date-1" name="nom" class="dr_input" placeholder="From">
                </fieldset>

                <fieldset>
                    <label for="to">to</label>
                    <input type="date" id="date-2" name="prenom" class="dr_input" placeholder="To">
                </fieldset>
                <button type="button" class="get-repo-btw" id="get-repo-btw">get</button>
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

<?php require(APPROOT . '/views/inc/footer.php'); ?>

</html>