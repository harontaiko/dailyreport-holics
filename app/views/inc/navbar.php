<nav class="site-nav">

    <div class="name">
        <a id="home-" href="<?php echo URLROOT; ?>/pages/index">Daily Report </a>
        <i class="fas fa-chart-area fa-2x">
            <?php if (strpos($_SERVER['REQUEST_URI'], "pages/index") !== false) :  ?>
            <i class="fas fa-star star_active"></i>
            <?php endif; ?>
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
                        placeholder="Filter (name/creator/no.)" />
                    <section class="table-box">
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Item No.</th>
                                    <th>Quantity</th>
                                    <th>model</th>
                                    <th>In Stock</th>
                                    <th>Sold</th>
                                    <th>Created on</th>
                                    <th>Creator</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                    <th>view</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($inventory = $data['inventory']->fetch_assoc()) : 
                                    $instock = $inventory['item_quantity'];
                                    $sold = getItemSoldCountInventory($inventory['item_name'],$data['db']);
                                    ?>
                                <tr>
                                    <td><?php echo isset($inventory['item_name']) ? $inventory['item_name']: ''; ?></td>
                                    <td>DR0<?php echo isset($inventory['item_id']) ? $inventory['item_id']: ''; ?>
                                    </td>
                                    <td class="quantity">
                                        <?php echo isset($inventory['item_quantity']) ? $inventory['item_quantity']: ''; ?>
                                    </td>
                                    <td><?php echo isset($inventory['item_model']) ? $inventory['item_model']: '';; ?>
                                    </td>
                                    <td class="instock"><?php echo ($instock - $sold); ?>
                                    </td>
                                    <td class="sold"><?php echo $sold ?>
                                    </td>
                                    <td> <?php echo date(
                                  'jS M Y',
                                  strtotime(
                                    htmlspecialchars($inventory["date_created"])
                                  )
                                ); ?> at <?php echo date(
                                    'h:iA',
                                    strtotime(
                                      htmlspecialchars($inventory["time_created"])
                                    )
                                  ); ?></td>
                                    <td><?php echo isset($inventory['created_by']) ? $inventory['created_by']: ''; ?>
                                    </td>
                                    <td><a
                                            href="<?php echo URLROOT; ?>/pages/editInventory/<?php echo isset($inventory['item_id']) ? $inventory['item_id']: ''; ?>">edit</a>
                                    </td>
                                    <td><a
                                            href="<?php echo URLROOT; ?>/pages/removeItem/<?php echo isset($inventory['item_id']) ? $inventory['item_id']: ''; ?>">remove</a>
                                    </td>
                                    <td><a
                                            href="<?php echo URLROOT; ?>/pages/viewItem/<?php echo isset($inventory['item_id']) ? $inventory['item_id']: ''; ?>">view</a>
                                    </td>
                                </tr>
                                <?php endwhile ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td id="qt-out"></td>
                                    <td></td>
                                    <td id="instock-out"></td>
                                    <td id="sold-out"></td>
                                </tr>
                            </tbody>
                        </table>
                    </section>

                </div>

            </div>
            </div>
            <ul>
                <li><a href="<?php echo URLROOT; ?>/pages/movieShop">Movie shop
                        <?php if (strpos($_SERVER['REQUEST_URI'], "pages/movieShop") !== false) :  ?>
                        <i class="fas fa-star star_active"></i>
                        <?php endif; ?></a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/cyber">Cyber
                        <?php if (strpos($_SERVER['REQUEST_URI'], "pages/cyber") !== false) :  ?>
                        <i class="fas fa-star star_active"></i>
                        <?php endif; ?></a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/playstation">Playstation
                        <?php if (strpos($_SERVER['REQUEST_URI'], "pages/playstation") !== false) :  ?>
                        <i class="fas fa-star star_active"></i>
                        <?php endif; ?>
                    </a></li>
            </ul>
        </li>
        <li><a href="<?php echo URLROOT; ?>/pages/add">Add sale
            </a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/addItem">Add item to inventory
                <?php if (strpos($_SERVER['REQUEST_URI'], "pages/addItem") !== false) :  ?>
                <i class="fas fa-star star_active"></i>
                <?php endif; ?>
            </a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/sales">Items Sold
                <?php if (strpos($_SERVER['REQUEST_URI'], "pages/sales") !== false) :  ?>
                <i class="fas fa-star star_active"></i>
                <?php endif; ?>
            </a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/expenses">Expenses
                <?php if (strpos($_SERVER['REQUEST_URI'], "pages/expenses") !== false) :  ?>
                <i class="fas fa-star star_active"></i>
                <?php endif; ?>
            </a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/total">Total
                <?php if (strpos($_SERVER['REQUEST_URI'], "pages/total") !== false) :  ?>
                <i class="fas fa-star star_active"></i>
                <?php endif; ?>
            </a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/activity">Admins
                <?php if (strpos($_SERVER['REQUEST_URI'], "pages/activity") !== false) :  ?>
                <i class="fas fa-star star_active"></i>
                <?php endif; ?>
            </a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/trends">Trends
                <?php if (strpos($_SERVER['REQUEST_URI'], "pages/trends") !== false) :  ?>
                <i class="fas fa-star star_active"></i>
                <?php endif; ?>
                <!-- <span class="coming_soon">coming soon</span> -->
            </a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/cashOut">Cash Out
                <?php if (strpos($_SERVER['REQUEST_URI'], "pages/cashOut") !== false) :  ?>
                <i class="fas fa-star star_active"></i>
                <?php endif; ?>
                <!-- <span class="coming_soon">coming soon</span> -->
            </a>
        </li>
        <li><a href="<?php echo URLROOT; ?>/pages/cashOuts">Receipts
                <?php if (strpos($_SERVER['REQUEST_URI'], "pages/cashOuts") !== false) :  ?>
                <i class="fas fa-star star_active"></i>
                <?php endif; ?>
                <!-- <span class="coming_soon">coming soon</span> -->
            </a>
        </li>
        <?php if (strpos($_SERVER['REQUEST_URI'], "pages/index") !== false) :  ?>
        <?php else: ?>
        <a href="<?php echo URLROOT; ?>/users/logout"><button id="add-record" title="logout"><i title="logout"
                    class="fas fa-sign-out-alt"></i></button>
        </a>
        <?php endif; ?>
    </ul>

    <div class="note">
        <h3>Daily, Annual & Monthly Report</h3>
        <i>Simplicity is the Ultimate Sophistication</i>
    </div>

</nav>

<script>
//sum sold & instock, store in localstorage
var instock = document
    .querySelector(".order-table")
    .getElementsByTagName("td");
var sum = 0;
for (var i = 0; i < instock.length; i++) {
    if (instock[i].className == "instock") {
        sum += isNaN(instock[i].innerHTML) ? 0 : parseInt(instock[i].innerHTML);
    }
}
document.getElementById("instock-out").innerHTML = sum + " items in stock";

var sold = document.querySelector(".order-table").getElementsByTagName("td");
var sumsold = 0;
for (var i = 0; i < sold.length; i++) {
    if (sold[i].className == "sold") {
        sumsold += isNaN(sold[i].innerHTML) ? 0 : parseInt(sold[i].innerHTML);
    }
}
document.getElementById("sold-out").innerHTML = sumsold + " items sold";

var quantity = document.querySelector(".order-table").getElementsByTagName("td");
var qty = 0;
for (var i = 0; i < quantity.length; i++) {
    if (quantity[i].className == "quantity") {
        qty += isNaN(quantity[i].innerHTML) ? 0 : parseInt(quantity[i].innerHTML);
    }
}
document.getElementById("qt-out").innerHTML = qty + " items sold";

//push in stock to array
var instockCol = document.querySelectorAll('.instock');
var instockArr = [];
instockCol.forEach(function(singleCell) {
    instockArr.push(singleCell.innerText);
});
//count elements with the value zero, the count==out of stock values
var numberOfZeros = function(arry) {
    var i = 0;
    arry.forEach(function(v) {
        if (v === 0) i++;
    });
    return i;
}
instockArrNum = instockArr.map(Number);
outStock = numberOfZeros(instockArrNum);

//xhr to put in stock & out of stock
$.ajax({
    url: `<?php echo URLROOT; ?>/pages/saveStock`,
    type: "POST",
    data: {
        in: sum,
        out: outStock,
    },
    dataType: "json",
    success: function(dataResult) {
        console.log(dataResult.statusCode);
    }
})
</script>