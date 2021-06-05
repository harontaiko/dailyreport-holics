<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="home __home site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <a id="add-record" title="add sale" href="<?php echo URLROOT; ?>/pages/add"><i class="fas fa-plus"></i></a>
        <header>
            <h1 class="title">Pipeline
            </h1>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th colspan="6">INCOME</th>
                        <th colspan="4">SALES</th>
                        <th>SALE PROFIT</th>
                        <th>EXPENSES(ksh)</th>
                        <th colspan="2">TOTAL INCOME</th>
                        <th colspan="2">VIEW</th>
                    </tr>
                    <thead>
                    <tbody>
                        <tr>
                            <td style="background-color: #ffed86;">Date</td>
                            <td span="col" colspan="2">movie shop</td>
                            <td span="col" colspan="2">playstation</td>
                            <td span="col" colspan="2">cyber</td>
                            <td style="background-color: #ffed86;">All products</td>
                            <td style="background-color: #ffed86;">Buying</td>
                            <td style="background-color: #ffed86;" colspan="1">Sold(ksh)</td>
                            <td style="background-color: #111;"></td>
                            <td style="background-color: #ffed86;">Profit</td>
                            <td style="background-color: #ffed86;">Expenses</td>
                            <td style="background-color: #ffed86;">N/A</td>
                            <td style="background-color: #ffed86;">N/A</td>
                            <td style="background-color: #ffed86;">NET TOTAL</td>
                            <td style="background-color: #ffed86;">VIEW</td>
                        </tr>
                        <tr>
                            <td style="background-color: #89909f; color:#fff;">Date</td>
                            <td style="background-color: #89909f; color:#fff;">cash</td>
                            <td style="background-color: #89909f; color:#fff;">till</td>
                            <td style="background-color: #89909f; color:#fff;">cash</td>
                            <td style="background-color: #89909f; color:#fff;">till</td>
                            <td style="background-color: #89909f; color:#fff;">cash</td>
                            <td style="background-color: #89909f; color:#fff;">till</td>
                            <td style="background-color: #89909f; color:#fff;">products</td>
                            <td style="background-color: #89909f; color:#fff;">bought(all))</td>
                            <td style="background-color: #89909f; color:#fff;">till+cash</td>
                            <td style=" background-color: #111;"></td>
                            <td style=" background-color: #89909f; color:#fff;">profit</td>
                            <td style=" background-color: #89909f; color:#fff;">expenses</td>
                            <td style="background-color: #89909f; color:#fff;">cash</td>
                            <td style="background-color: #89909f; color:#fff;">till</td>
                            <td style="background-color: #89909f; color:#fff;">GROSS</td>
                            <td style="background-color: #89909f; color:#fff;">SEE</td>
                        </tr>
                        <?php while ($net = $data['net']->fetch_assoc()) :  ?>
                        <tr id="latest-record" style="background: chartreuse; opacity: 0.8; width: 100vw;">
                            <td><?php echo date('jS F Y', strtotime($net['date_created'])); ?>
                            </td>
                            <td>
                                <?php 
                            $shopcash =  getMovieshopDate($net['date_created'], $data['db']); 
                            echo isset($shopcash['cash']) ? number_format($shopcash['cash']) : '';
                            ?>
                            </td>
                            <td> <?php 
                            $shopcash =  getMovieshopDate($net['date_created'], $data['db']); 
                            echo isset($shopcash['till']) ? number_format($shopcash['till']) : '';
                            ?></td>
                            <td> <?php 
                            $pscash =  getPsDate($net['date_created'], $data['db']); 
                            echo isset($pscash['cash']) ? number_format($pscash['cash']) : '';
                            ?></td>
                            <td> <?php 
                            $pscash =  getPsDate($net['date_created'], $data['db']); 
                            echo isset($pscash['till']) ? number_format($pscash['till']) : '';
                            ?></td>
                            <td> <?php 
                            $cybershop =  getCyberDate($net['date_created'], $data['db']); 
                            echo isset($cybershop['cash']) ? number_format($cybershop['cash']) : '';
                            ?></td>
                            <td> <?php 
                            $cybershop =  getCyberDate($net['date_created'], $data['db']); 
                            echo isset($cybershop['till']) ? number_format($cybershop['till']) : '';
                            ?></td>
                            <!--list group-->
                            <td>
                                <select name="products" id="products-sold">
                                    <option value="total">
                                        <?php echo getSalesTotalCount($net['date_created'], $data['db']); ?>
                                        -total(<?php echo number_format(getSaleTotal($net['date_created'], $data['db'])); ?>)
                                    </option>
                                    <?php 
                                    $sale = getNetSales($net['date_created'], $data['db']);
                                     while ($sl = $sale->fetch_assoc()) :  
                                     ?>
                                    <option value="<?php echo $sl['sales_item'] ?>"><?php echo $sl['sales_item'] ?>
                                        <?php echo number_format($sl['selling_price']) ?></option>
                                    <?php endwhile ?>
                                </select>
                            </td>
                            <td><?php echo number_format(getBuyingTotal($net['date_created'], $data['db'])); ?></td>
                            <td><?php echo number_format(getSaleTotal($net['date_created'], $data['db'])); ?></td>
                            <td style="background-color: #111;"></td>
                            <td><?php echo number_format(getNetProfit($net['date_created'], $data['db'])); ?></td>
                            <!--list group-->
                            <td>
                                <select name="expenses" id="expenses-">
                                    <option value="total">
                                        <?php echo getExpenseTotalCount($net['date_created'], $data['db']); ?>
                                        -total(<?php echo number_format(getExpenseTotal($net['date_created'], $data['db'])); ?>)
                                    </option>
                                    <?php 
                                    $expense = getNetExpenses($net['date_created'], $data['db']);
                                     while ($exp = $expense->fetch_assoc()) :  
                                     ?>
                                    <option value="<?php echo $exp['expense_item'] ?>">
                                        <?php echo $exp['expense_item'] ?> @
                                        <?php echo number_format($exp['expense_cost']); ?></option>
                                    <?php endwhile ?>
                                </select>
                            </td>
                            <td><?php echo number_format($net['cash_sales']); ?></td>
                            <td><?php echo number_format($net['till_sales']); ?></td>
                            <td><a href=""><?php echo number_format(($net['cash_sales'] + $net['till_sales'] + getSaleTotal($net['date_created'], $data['db'])) - (getExpenseTotal($net['date_created'], $data['db']))) . '/=';?>
                            </td>
                            <td><a href=""><i class="fas fa-eye"></i></a></td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                    <table />

                    <blockquote> Daily Report @holics </blockquote>
        </header>
    </main>
    <form action="<?php echo URLROOT; ?>/users/logout" method="POST">
        <button id="add-record" type="submit" name="logout" title="logout"><i title="logout"
                class="fas fa-sign-out-alt"></i></button>
    </form>
</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/javascript/main.min.js"></script>

</html>
<!--
    NET TOTAL = (totalcash + totaltill + totalsales) - total expenses
-->