<?php  while ($latest = $data['latest']->fetch_assoc()) :   ?>
<p id="total-sales-out-cash"><?php echo $latest['sales_item'];?><span title="delete item" style="cursor: pointer;"
        class="closebtn-clipboard" onclick="this.parentElement.style.display='none';">&times;</span></p>
<?php  endwhile   ?>