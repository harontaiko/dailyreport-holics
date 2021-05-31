<p id="sales-made-p">Sales made today</p>
<?php  while ($latest = $data['latest']->fetch_assoc()) :   ?>
<p id="<?php echo $latest['sales_id']; ?>" class="total-sales-out-cash"><?php echo $latest['sales_item'];?>
    <button class="close-sale" type="button">&times;</button>
</p>

<?php  endwhile   ?>
<script>
cancelSale = document.querySelectorAll(".close-sale");

for (var i = 0; i < cancelSale.length; i++) {
    cancelSale[i].addEventListener("click", function(event) {
        if (!confirm("Cancel this sale?")) {
            event.preventDefault();
        } else {
            //del from db
            currentId = this.parentNode.id;
            $.ajax({
                url: `http://localhost/dailyreport-holics/pages/DeleteSaleNow/${currentId}`,
                type: "POST",
                data: [],
                dataType: "json",
                success: function(dataResult) {
                    if (dataResult.statusCode == 200) {
                        //success, del element from DOM
                        this.parentElement.style.display = "none";
                    } else if (dataResult.statusCode == 317) {
                        document.querySelector(".alert").style.display = "block";
                        document.getElementById("add-alert").style.color = "#f85f5f";
                        $("#add-alert").html(
                            "connection error, check database or internet connection"
                        );

                        sleep(4700).then(() => {
                            document.querySelector(".alert_success").style.display =
                                "none";
                            document.getElementById("add-alert").innerHTML = "";
                        });
                    } else if (dataResult.statusCode == 318) {
                        document.querySelector(".alert").style.display = "block";
                        document.getElementById("add-alert").style.color = "#fff";
                        $("#add-alert").html(
                            "the sold item does not match any record, please refresh to update sales"
                        );

                        sleep(4700).then(() => {
                            document.querySelector(".alert_success").style.display =
                                "none";
                            document.getElementById("add-alert").innerHTML = "";
                        });
                    }
                },
            });
        }
    });
}
</script>