<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="addItem __addItem site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <main>
        <div class="payment-title">
            <h1>Add to inventory <i class="fas fa-truck-loading fa-2x"></i></h1>
        </div>
        <div class="form-container">
            <div class="field-container">
                <label for="name">Item Name</label>
                <input required id="item-name" maxlength="20" type="text">
            </div>
            <div class="field-container">
                <label for="name">Quantity</label>
                <input required id="item-quantity" type="number" max="10" inputmode="numeric">
            </div>
            <div class="field-container">
                <label for="expirationdate">Buying (Ksh)</label>
                <input required id="item-bp" type="number" inputmode="numeric">
            </div>
            <div class="field-container">
                <label for="model">Model/Manufacturer</label>
                <input required id="model" type="text">
            </div>
            <div class="field-container">
                <img src="<?php echo URLROOT; ?>/public/images/images/open-box.png" alt="product-avatar"
                    id="product-avatar">
                <p class="product-label">Product Image</p>
            </div>
            <div class="field-container">
                <label for="blank">leave blank if not available</label>
                <input type="file" name="product-image" id="product-image">
            </div>
        </div>
        <div class="fiel-container">
            <button id="add-record" class="add-inventory" type="button">Add</button>
        </div>

    </main>

</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/javascript/main.min.js"></script>

</html>