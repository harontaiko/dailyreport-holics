<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="add __add site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <h2 id="add-title">New Record</h2>
        <form action="" method="POST" id="form-add">
            <input required type="datetime" name="date" id="date"
                value="<?php echo isset($data['date']) ? $data['date'] : ''; ?>" readonly>
            <input required type="submit" class="save-record" value="create record">
            <div class="inner_grid">
                <div class="income">
                    <h3>Income</h3>
                    <hr>
                    <div class="cyber-record">
                        <p>Cyber <i class="fas fa-tv"></i></p>
                        <input required type="number" name="cyber-cash" id="cyber-cash" placeholder="cash"
                            class="income-calc dr_input">
                        <input required type="number" name="cyber-till" id="cyber-till" placeholder="till/other"
                            class="income-calc-till dr_input">
                    </div>
                    <div class="ps-record">
                        <p>Playstation <i class="fab fa-playstation"></i></p>
                        <input required type="number" name="ps-cash" id="ps-cash" placeholder="cash"
                            class="income-calc dr_input">
                        <input required type="number" name="ps-till" id="ps-till" placeholder="till/other"
                            class="income-calc-till dr_input">
                    </div>
                    <div class="movie-record">
                        <p>Movie Shop<i class="fas fa-compact-disc"></i></p>
                        <input required type="number" name="movie-cash" id="movie-cash" placeholder="cash"
                            class="income-calc dr_input">
                        <input required type="number" name="movie-till" id="movie-till" placeholder="till/other"
                            class="income-calc-till dr_input">
                    </div>
                </div>
                <div class="total">
                    <h3>Total (Income)</h3>
                    <hr>
                    <div class="total-record">
                        <p>Net total(excluding sales and expenses)<i class="fas fa-layer-group"></i></p>
                        <input required type="number" readonly name="total-cash" placeholder="Total cash"
                            class="dr_input" id="total-cash">
                        <input required type="number" readonly name="total-till" placeholder="till/other"
                            class="dr_input" id="total-till">
                        <p id="total-sales-out-cash"></p>
                        <p id="total-sales-out-till"></p>
                    </div>
                </div>
                <div class="sales">
                    <h3>Sales</h3>
                    <hr>
                    <div class="sales-record">
                        <p>Product Sales <i class="fas fa-cash-register"></i></p>
                        <select name="product" id="product" class="dr_input">
                            <option value="pr-1">san disk usb 25gb</option>
                            <option value="pr-1">san disk usb 4gb</option>
                            <option value="pr-1">san disk flash 25gb</option>
                            <option value="pr-1">boost 25gb</option>
                            <option value="pr-1">san disk usb 25gb</option>
                        </select>
                        <input required type="number" name="bought-price" id="bought-price" placeholder="Buying(ksh)"
                            class="dr_input">
                        <input required autocomplete="off" type="number" name="sales-cash" id="sales-cash"
                            placeholder="sell..cash" class="dr_input">
                        <input required autocomplete="off" type="number" name="sales-till" id="sales-till"
                            placeholder="sell..till/other" class="dr_input">
                        <input required type="number" name="sales-profit" id="sales-profit" placeholder="profit"
                            class="dr_input">
                        <button class="add-product" type="button">Add</button>
                    </div>
                </div>
                <div class="expenses">
                    <h3>Expenses</h3>
                    <hr>
                    <div class="expenses-record">
                        <p>Expenses <i class="fas fa-money-bill-alt"></i></p>
                        <input required type="text" placeholder="expense (short description)" name="expense-name"
                            class="dr_input">
                        <input required type="number" name="expense-value" id="expense-value" placeholder="used(ksh)"
                            class="dr_input">
                        <button class="add-expense" type="button">Add</button>
                    </div>
                </div>
            </div>
        </form>

    </main>

</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/javascript/main.min.js"></script>

</html>