<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="cyber __cyber site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <h2 class="movie-title">Cyber <i class="fas fa-tv fa-2x"></i></h2>
        <select name="filter-cyber" id="filter-cyber" class="dr_input">
            <option value="default">Filter</option>
            <option value="today">Today</option>
            <option value="this-month">This month</option>
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
                <th>Cash</th>
                <th>Till/other</th>
                <th>Net Total</th>
            </tr>
            <tr>
                <td data-th="date-movie">5th March 2021</td>
                <td data-th="date-movie">222</td>
                <td data-th="date-movie">1977</td>
                <td data-th="date-movie">3500</td>
            </tr>
            <tr>
                <td data-th="cash-movie">20th June 2019</td>
                <td data-th="cash-movie">190</td>
                <td data-th="cash-movie">710</td>
                <td data-th="cash-movie">4135</td>
            </tr>
            <td data-th="till-movie">1997</td>
            <td data-th="till-movie">1900</td>
            <td data-th="till-movie">7100</td>
            <td data-th="till-movie">4135</td>
            </tr>
            <tr>
                <td data-th="movie-net">5th April 2021</td>
                <td data-th="movie-net">3100</td>
                <td data-th="movie-net">452</td>
                <td data-th="movie-net">489</td>
            </tr>
        </table>

        <p>&larr; Total up to <?php echo isset($data['date']) ? $data['date']: ''; ?>
            <span class="login-err">=25000</span> &rarr;
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