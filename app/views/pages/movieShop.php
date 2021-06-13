<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="movieshop __movieshop site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <?php flash('add-error'); ?>
        <h2 class="movie-title">Movie Shop <i class="fas fa-film fa-2x"></i></h2>
        <select name="filter-movieshop" id="fiter-movieshop" class="dr_input">
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
                    <input type="date" name="nom" class="dr_input" id="date-1" placeholder="From">
                </fieldset>

                <fieldset>
                    <label for="to">to</label>
                    <input type="date" name="prenom" class="dr_input" id="date-2" placeholder="To">
                </fieldset>
                <button type="button" class="get-repo-btw" id="get-repo-btw">get</button>
            </form>
        </section>
        <table class="rwd-table">
            <tr>
                <th>Date</th>
                <th>Cash</th>
                <th>Till/other</th>
                <th>Net Total</th>
            </tr>
            <?php while ($mov = $data['movie']->fetch_assoc()) :  ?>
            <tr>
                <td data-th="date-movie"><?php echo date('jS F Y', strtotime($mov['date_created'])); ?></td>
                <td data-th="cash-movie"><?php echo number_format($mov['cash']); ?></td>
                <td data-th="till-movie"><?php echo number_format($mov['till']); ?></td>
                <td data-th="net-movie">
                    <?php echo number_format(getMovieshopTotal($mov['date_created'], $data['db'])) . '/='; ?></td>
            </tr>
            <?php endwhile ?>

        </table>

        <p>&larr; All Time Total:
            <span class="login-err"><?php echo number_format($data['total']); ?></span> &rarr;
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