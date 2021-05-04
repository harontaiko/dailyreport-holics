<nav class="site-nav">

    <div class="name">
        <a id="home-" href="<?php echo URLROOT; ?>/pages/index">Daily Report</a>
        <i class="fas fa-chart-area fa-2x">
        </i>
    </div>

    <ul>
        <li class="active"><a href="<?php echo URLROOT; ?>/pages/inventory">Inventory</a>
            <ul>
                <li><a href="<?php echo URLROOT; ?>/pages/movieShop">Movie shop</a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/cyber">Cyber</a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/playstation">Playstation</a></li>
            </ul>
        </li>
        <li><a href="<?php echo URLROOT; ?>/pages/add">Add record</a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/filterReport">Filter Reports</a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/addItem">Add item to inventory</a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/sales">Items Sold</a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/expenses">Expenses</a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/total">Total</a></li>
        <?php if (strpos($_SERVER['REQUEST_URI'], "pages/index") !== false) :  ?>
        <?php else: ?>
        <form action="<?php echo URLROOT; ?>/users/logout" method="POST">
            <button id="add-record" type="submit" name="logout" title="logout"><i title="logout"
                    class="fas fa-sign-out-alt"></i></button>
        </form>
        <?php endif; ?>
    </ul>

    <div class="note">
        <h3>Daily, Annual & Monthly Report</h3>
        <p>Reports from different stations @holics</p>
    </div>

</nav>