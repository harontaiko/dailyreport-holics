<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="expense __expense site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <?php flash('add-error'); ?>
        <h2 class="movie-title">Expenses <i class="fas fa-pen fa-2x"></i></h2>
        <select name="filter-expense" id="filter-expense" class="dr_input">
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
                <th>Expense(s)</th>
                <th>Spent(ksh)</th>
                <th>Total</th>
                <th>See</th>
            </tr>
            <?php while ($exp = $data['expenses']->fetch_assoc()) :  ?>
            <tr>
                <td data-th="date-expense"><?php echo date('jS F Y', strtotime($exp['date_created'])); ?></td>
                <td data-th="expense-item">
                    <select name="expenses" style="width: 100%; color:#111;">
                        <option value="total">
                            <?php echo getExpenseTotalCount($exp['date_created'], $data['db']); ?>
                            -total(<?php echo number_format(getExpenseTotal($exp['date_created'], $data['db'])); ?>)
                        </option>
                        <?php 
                                    $expense = getNetExpenses($exp['date_created'], $data['db']);
                                     while ($exp2 = $expense->fetch_assoc()) :  
                                     ?>
                        <option value="<?php echo $exp2['expense_item'] ?>">
                            <?php echo $exp2['expense_item'] ?> @
                            <?php echo number_format($exp2['expense_cost']); ?></option>
                        <?php endwhile ?>
                    </select>
                </td>
                <td data-th="expense-total">
                    <?php echo number_format(getExpenseTotal($exp['date_created'], $data['db'])); ?></td>
                <td data-th="expense-total">
                    <?php echo number_format(getExpenseTotal($exp['date_created'], $data['db'])).'/='; ?></td>
                <td data-th="see"><a style="color: #fff;"
                        href="<?php echo URLROOT; ?>/pages/viewExpense/<?php echo isset($exp['date_created']) ? $exp['date_created']: 'N/A' ?>"><i
                            class="fas fa-eye"></i></a></td>
            </tr>
            <?php endwhile ?>

        </table>

        <p>&larr; Net Expenses: <span class="login-err"><?php echo number_format($data['diff']) .'/='; ?></span>&rarr;
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