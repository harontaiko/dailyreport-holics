<?php require(APPROOT . '/views/inc/header.php'); ?>


<body class="viewItem __viewItem site-wrap">
    <?php require(APPROOT . '/views/inc/navbar.php'); ?>
    <?php if(getInventoryItemById($data['id'], $data['db'])): ?>
    <div class="wrapper">
        <h1><?php print_r($data['row']['0']['item_name']); ?> -
            <strong><?php echo number_format($data['row']['0']['item_buying']); ?>/=</strong>
        </h1>
        <p>
            <a class="g-hub" href="<?php echo URLROOT; ?>/pages/editInventory/<?php echo $data['id']; ?>"
                target="_blank">Edit this inventory item</a>
        </p>
        <?php if(empty($data['row']['0']['image'])): ?>
        <h2><strong>no image</strong></h2>
        <img style="display:none; width:60% !important; height:auto !important;"
            src="<?php echo URLROOT; ?>/public/images/images/no-image.svg" id="item-image"
            alt="no image for <?php print_r($data['row']['0']['item_name']); ?>">
        <?php else: ?>
        <img style="display:none;"
            src="<?php echo URLROOT; ?>/public/uploads/<?php print_r($data['row']['0']['image']); ?>" id="item-image"
            alt="<?php print_r($data['row']['0']['image']); ?>">
        <?php endif; ?>
        <div id="threesixty"
            style="background-size:contain;background-position:center;background-repeat: no-repeat; width:50% !important; height:50% !important;">
        </div>
        <div class="buttons-wrapper">
            <h2>In Stock:
                <?php
            $instock = $data['row']['0']['item_quantity'];
            $sold = getItemSoldCountInventory($data['row']['0']['item_name'],$data['db']);
            echo $instock - $sold;
            ?>
            </h2>
        </div>
    </div>
    <?php else: ?>
    <div class="box">
        <h1 class="title" id="h1-title">No item found in the records!</h1>
        <h1 class="title hidden" id="h1-title-cloudflare">The Internet on <span style="color:#EA4C98">1</span><span
                style="color:#BF3188">.</span><span style="color:#304599">1</span><span
                style="color:#05ADA5">.</span><span style="color:#05ADA5">1</span><span
                style="color:#FCB134">.</span><span style="color:#F96337">1</span></h1>
        <div class="cloud">
            <div class="cloud-copy" id="cloud-copy"></div>
            <div class="cloud-left" id="cloud-left"></div>
            <div class="cloud-right" id="cloud-right"></div>
            <div class="cloud-bottom" id="cloud-bottom"></div>
            <div class="eye-left">
                <div class="eyebrow-left invisible" id="eyebrow-left"></div>
                <div class="pupil"></div>
            </div>
            <div class="eye-right">
                <div class="eyebrow-right invisible" id="eyebrow-right"></div>
                <div class="pupil"></div>
            </div>
            <div class="frown" id="frown"></div>
            <div class="smile invisible" id="smile"></div>
            <div class="tear-left" id="tear-left"></div>
            <div class="tear-right" id="tear-right"></div>
            <div class="bolt-left invisible" id="bolt-left"></div>
            <div class="bolt-right invisible" id="bolt-right"></div>
            <div class="bolt-bottom invisible" id="bolt-bottom"></div>
        </div>
    </div>
    <?php endif; ?>
</body>
<noscript>
    <div id="no_script">This site requires and runs entirely on javascript, please Ensure Javascript
        is enabled
        on your browser for smooth & better experience</div>
</noscript>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/javascript/main.min.js"></script>

</html>