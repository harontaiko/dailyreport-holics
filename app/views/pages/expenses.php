<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="expense __expense site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
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
            <tr>
                <td data-th="date-movie">5th March 2021</td>
                <td data-th="item-name">food</td>
                <td data-th="date-movie">500</td>
                <td data-th="date-movie">500</td>
                <td data-th="see"><i class="fas fa-eye"></i></td>
            </tr>
            <tr>
                <td data-th="cash-movie">20th June 2019</td>
                <td data-th="item-name">other..</td>
                <td data-th="cash-movie">1290</td>
                <td data-th="cash-movie">1290</td>
                <td data-th="see"><i class="fas fa-eye"></i></td>
            </tr>
            <td data-th="till-movie">1997</td>
            <td data-th="item-name">mathe/td>
            <td data-th="till-movie">1900</td>
            <td data-th="till-movie">1900</td>
            <td data-th="see"><i class="fas fa-eye"></i></td>
            </tr>
            <tr>
                <td data-th="movie-net">5th April 2021</td>
                <td data-th="item-name">token</td>
                <td data-th="movie-net">450</td>
                <td data-th="movie-net">450</td>
                <td data-th="see"><i class="fas fa-eye"></i></td>
            </tr>
        </table>

        <p>&larr; Total expenses up to
            <?php echo isset($data['date']) ? $data['date']: ''; ?> is a total of <span
                class="login-err">15,000</span>&rarr;
        </p>
    </main>

</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/javascript/main.min.js"></script>

</html>