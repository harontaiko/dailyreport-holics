<nav class="site-nav">

    <div class="name">
        <a id="home-" href="<?php echo URLROOT; ?>/pages/index">Daily Report</a>
        <i class="fas fa-chart-area fa-2x">
        </i>
    </div>

    <ul>
        <li class="active">
            <a href="#open-modal">Inventory</a>
            <div id="open-modal" class="modal-window">
                <div>
                    <a href="#" title="Close" class="modal-close">Close</a>
                    <h1 class="inventory-title">Inventory</h1>
                    <input type="search" class="light-table-filter dr_input" data-table="order-table"
                        placeholder="Filter" />
                    <section class="table-box">
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Bought(Ksh)</th>
                                    <th>Sold(Ksh)</th>
                                    <th>In Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>San disk</td>
                                    <td>1500</td>
                                    <td>1700</td>
                                    <td>9</td>
                                </tr>
                                <tr>
                                    <td>San disk</td>
                                    <td>1500</td>
                                    <td><i class="fas fa-times"></i></td>
                                    <td>9</td>
                                </tr>
                                <tr>
                                    <td>San disk</td>
                                    <td>1500</td>
                                    <td><i class="fas fa-times"></i></td>
                                    <td>9</td>
                                </tr>

                            </tbody>
                        </table>
                    </section>

                </div>

            </div>
            </div>
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