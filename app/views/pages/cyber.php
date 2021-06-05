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
            <?php while ($cyber = $data['cyber']->fetch_assoc()) :  ?>
            <tr>
                <td data-th="date-movie"><?php echo date('jS F Y', strtotime($cyber['date_created'])); ?></td>
                <td data-th="cash-movie"><?php echo number_format($cyber['cash']); ?></td>
                <td data-th="till-movie"><?php echo number_format($cyber['till']); ?></td>
                <td data-th="net-movie">
                    <?php echo number_format(getCybershopTotal($cyber['date_created'], $data['db'])) . '/='; ?></td>
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