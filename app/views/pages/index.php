<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="home __home site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <a id="add-record" title="add record" href="<?php echo URLROOT; ?>/pages/add"><i class="fas fa-plus"></i></a>
        <header>
            <h1 class="title">Pipeline

            </h1>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th colspan="6">INCOME</th>
                        <th colspan="4">SALES</th>
                        <th>PROFIT</th>
                        <th>EXPENSES(ksh)</th>
                        <th colspan="2">TOTAL</th>
                        <th colspan="2">VIEW</th>
                    </tr>
                    <thead>
                    <tbody>
                        <tr>
                            <td style="background-color: #ffed86;">N/A</td>
                            <td span="col" colspan="2">movie shop</td>
                            <td span="col" colspan="2">playstation</td>
                            <td span="col" colspan="2">cyber</td>
                            <td style="background-color: #ffed86;">N/A</td>
                            <td style="background-color: #ffed86;">N/A</td>
                            <td style="background-color: #ffed86;" colspan="2">Sold(ksh)</td>
                            <td style="background-color: #ffed86;">N/A</td>
                            <td style="background-color: #ffed86;">N/A</td>
                            <td style="background-color: #ffed86;">N/A</td>
                            <td style="background-color: #ffed86;">N/A</td>
                            <td style="background-color: #ffed86;">VIEW</td>
                        </tr>
                        <tr>
                            <td style="background-color: #89909f; color:#fff;">N/A</td>
                            <td style="background-color: #89909f; color:#fff;">cash</td>
                            <td style="background-color: #89909f; color:#fff;">till/other</td>
                            <td style="background-color: #89909f; color:#fff;">cash</td>
                            <td style="background-color: #89909f; color:#fff;">till/other</td>
                            <td style="background-color: #89909f; color:#fff;">cash</td>
                            <td style="background-color: #89909f; color:#fff;">till/other</td>
                            <td style="background-color: #89909f; color:#fff;">product</td>
                            <td style="background-color: #89909f; color:#fff;">bought(ksh)</td>
                            <td style="background-color: #89909f; color:#fff;">cash</td>
                            <td style="background-color: #89909f; color:#fff;">till/other</td>
                            <td style="background-color: #89909f; color:#fff;">N/A</td>
                            <td style=" background-color: #89909f; color:#fff;">N/A</td>
                            <td style="background-color: #89909f; color:#fff;">cash</td>
                            <td style="background-color: #89909f; color:#fff;">till/other</td>
                            <td style="background-color: #89909f; color:#fff;">SEE</td>
                        </tr>
                        <tr id="latest-record" style="background: chartreuse; opacity: 0.8; width: 100vw;">
                            <td>5th may 2019 5pm</td>
                            <td>500</td>
                            <td>1500</td>
                            <td>500</td>
                            <td>2500</td>
                            <td>520</td>
                            <td>150</td>
                            <!--list group-->
                            <td>
                                <select name="products" id="products-sold">
                                    <option value="total">2 -total(1500)</option>
                                    <option value="usb">san disk 4gb 750</option>
                                    <option value="mem">san disk 2gb 750</option>
                                </select>
                            </td>
                            <td>600</td>
                            <td>700</td>
                            <td></td>
                            <td>100</td>
                            <!--list group-->
                            <td>
                                <select name="expenses" id="expenses-">
                                    <option value="total">2 -total(350)</option>
                                    <option value="usb">mathe 150</option>
                                    <option value="mem">drinks 200</option>
                                </select>
                            </td>
                            <td>500</td>
                            <td>500</td>
                            <td><a href=""><i class="fas fa-eye"></i></a></td>
                        </tr>
                        <tr>
                            <td>5th may 2019 5pm</td>
                            <td>500</td>
                            <td>1500</td>
                            <td>500</td>
                            <td>2500</td>
                            <td>520</td>
                            <td>150</td>
                            <!--list group-->
                            <td>
                                <select name="products" id="products-sold">
                                    <option value="total">2 -total(1500)</option>
                                    <option value="usb">san disk 4gb 750</option>
                                    <option value="mem">san disk 2gb 750</option>
                                </select>
                            </td>
                            <td>600</td>
                            <td></td>
                            <td>800</td>
                            <td>200</td>
                            <!--list group-->
                            <td>
                                <select name="expenses" id="expenses-">
                                    <option value="total">2 -total(350)</option>
                                    <option value="usb">tokens
                                        150</option>
                                    <option value="mem">food 200</option>
                                </select>
                            </td>
                            <td>500</td>
                            <td>500</td>
                            <td><a href=""><i class="fas fa-eye"></i></a></td>
                        </tr>
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