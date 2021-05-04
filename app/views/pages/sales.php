<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="sales __sales site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <h2 class="movie-title">Sales <i class="fas fa-shopping-cart fa-2x"></i></h2>
        <select name="filter-sales" id="filter-sales" class="dr_input">
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
                <th>Item(name)</th>
                <th>Bought(ksh)</th>
                <th>Sold(ksh)</th>
                <th>Net profit</th>
            </tr>
            <tr>
                <td data-th="date-movie">5th March 2021</td>
                <td data-th="item-name">san disk cruzer</td>
                <td data-th="date-movie">500</td>
                <td data-th="date-movie">1977</td>
                <td data-th="date-movie">3500</td>
            </tr>
            <tr>
                <td data-th="cash-movie">20th June 2019</td>
                <td data-th="item-name">san mem card</td>
                <td data-th="cash-movie">190</td>
                <td data-th="cash-movie">710</td>
                <td data-th="cash-movie">4135</td>
            </tr>
            <td data-th="till-movie">1997</td>
            <td data-th="item-name">boost usb</td>
            <td data-th="till-movie">1900</td>
            <td data-th="till-movie">7100</td>
            <td data-th="till-movie">4135</td>
            </tr>
            <tr>
                <td data-th="movie-net">5th April 2021</td>
                <td data-th="item-name">mouse dell</td>
                <td data-th="movie-net">450</td>
                <td data-th="movie-net">3100</td>
                <td data-th="movie-net">489</td>
            </tr>
        </table>

        <p>&larr; Sold a total of <span class="login-err">15</span> items up to
            <?php echo isset($data['date']) ? $data['date']: ''; ?> For a total of <span
                class="login-err">15,000</span>&rarr;
        </p>
    </main>

</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/javascript/main.min.js"></script>

</html>