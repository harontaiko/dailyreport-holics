<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="total __total site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
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
                <th>Income(ksh)</th>
                <th>Total(ksh)</th>
                <th>See</th>
            </tr>
            <tr>
                <td data-th="date-movie">5th March 2021</td>
                <td data-th="item-name">3000</td>
                <td data-th="date-movie">500</td>
                <td data-th="date-movie">500</td>
                <td data-th="date-movie">500</td>
                <td data-th="see"><i class="fas fa-eye"></i></td>
            </tr>
            <tr>
                <td data-th="cash-movie">20th June 2019</td>
                <td data-th="item-name">3000</td>
                <td data-th="date-movie">500</td>
                <td data-th="date-movie">500</td>
                <td data-th="date-movie">500</td>
                <td data-th="see"><i class="fas fa-eye"></i></td>
            </tr>
            <td data-th="till-movie">1997</td>
            <td data-th="item-name">3000</td>
            <td data-th="date-movie">500</td>
            <td data-th="date-movie">500</td>
            <td data-th="date-movie">500</td>
            <td data-th="see"><i class="fas fa-eye"></i></td>
            </tr>
            <tr>
                <td data-th="movie-net">5th April 2021</td>
                <td data-th="item-name">3000</td>
                <td data-th="date-movie">500</td>
                <td data-th="date-movie">500</td>
                <td data-th="date-movie">500</td>
                <td data-th="see"><i class="fas fa-eye"></i></td>
            </tr>
        </table>

        <p>&larr; up to
            <?php echo isset($data['date']) ? $data['date']: ''; ?> net-income @holics exluding expenses is <span
                class="login-err">15,000</span>&rarr;
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