<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="playstation __playstation site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <?php flash('add-error'); ?>
        <h2 class="movie-title">Playstation <i class="fab fa-playstation fa-2x"></i></h2>
        <select name="filter-playstation" id="filter-playstation" class="dr_input">
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
            <?php while ($ps = $data['ps']->fetch_assoc()) :  ?>
            <tr>
                <td data-th="date-movie"><?php echo date('jS F Y', strtotime($ps['date_created'])); ?></td>
                <td data-th="cash-movie"><?php echo number_format($ps['cash']); ?></td>
                <td data-th="till-movie"><?php echo number_format($ps['till']); ?></td>
                <td data-th="net-movie">
                    <?php echo number_format(getPsTotal($ps['date_created'], $data['db'])) . '/='; ?></td>
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