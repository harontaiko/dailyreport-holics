/**
 * @author [harontaiko]
 * @email [harontaiko@gmail.com]
 * @create date 2021-04-30 04:18:24
 * @modify date 2021-04-30 04:18:24
 * @desc [MARKUP BASED JAVASCRIPT, BASED ON PAUL IRISH'S DOM INTRUBUSIVE JS]
 */
/**MARKUP BASED JAVASCRIPT, BASED ON PAUL IRISH'S DOM INTRUBUSIVE JS */
UTIL = {
  fire: function (func, funcname, args) {
    var namespace = dailyreport;

    funcname = funcname === undefined ? "init" : funcname;
    if (
      func !== "" &&
      namespace[func] &&
      typeof namespace[func][funcname] == "function"
    ) {
      namespace[func][funcname](args);
    }
  },

  loadEvents: function () {
    var bodyId = document.body.id;

    // hit up common first.
    UTIL.fire("common");

    // do all the classes too.
    $.each(document.body.className.split(/\s+/), function (i, classnm) {
      UTIL.fire(classnm);
      UTIL.fire(classnm, bodyId);
    });

    UTIL.fire("common", "finalize");
  },
};

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#product-avatar").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function sleep(time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

function FilterInventory() {
  //JS table filter
  (function (document) {
    "use strict";

    var LightTableFilter = (function (Arr) {
      var _input;

      function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(
          _input.getAttribute("data-table")
        );
        Arr.forEach.call(tables, function (table) {
          Arr.forEach.call(table.tBodies, function (tbody) {
            Arr.forEach.call(tbody.rows, _filter);
          });
        });
      }

      function _filter(row) {
        var text = row.textContent.toLowerCase(),
          val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? "none" : "table-row";
      }

      return {
        init: function () {
          var inputs = document.getElementsByClassName("light-table-filter");
          Arr.forEach.call(inputs, function (input) {
            input.oninput = _onInputEvent;
          });
        },
      };
    })(Array.prototype);

    document.addEventListener("readystatechange", function () {
      if (document.readyState === "complete") {
        LightTableFilter.init();
      }
    });
  })(document);
  //Filter Table
}

// kick it all off here
$(document).ready(UTIL.loadEvents);

//BEGIN EXECUTION HERE BASED ON PAGE
dailyreport = {
  __home: {
    init: function _homepage() {
      FilterInventory();
      //main page js
      $("#toggler").click(function () {
        $("#vertical-navigation").toggleClass("v-nav-expand");
      });

      const navTabs = document.querySelectorAll("#nav-tabs > a");
      navTabs.forEach((tab) => {
        tab.addEventListener("click", () => {
          navTabs.forEach((tab) => {
            tab.classList.remove("active");
          });
          tab.classList.add("active");
        });
      });
    },
  },
  __login: {
    init: function _login() {
      //disable password pasting
      const pasteBox = document.getElementById("login-pwd");
      pasteBox.onpaste = (e) => {
        e.preventDefault();
        return false;
      };
      $(".message a").click(function () {
        $("form").animate({ height: "toggle", opacity: "toggle" }, "slow");
      });
    },
  },
  __add: {
    init: function _add() {
      FilterInventory();
      const cyberCash = document.getElementById("cyber-cash");
      const cyberTill = document.getElementById("cyber-till");
      const psCash = document.getElementById("ps-cash");
      const psTill = document.getElementById("ps-till");
      const movieCash = document.getElementById("movie-cash");
      const movieTill = document.getElementById("movie-till");
      const salesCash = document.getElementById("sales-cash");
      const salesTill = document.getElementById("sales-till");
      const boughtPrice = document.getElementById("bought-price");
      const salesProfit = document.getElementById("sales-profit");
      const expensesValue = document.getElementById("expense-value");

      //calculate pofit
      salesCash.addEventListener("input", function () {
        //check if till has a value and forbid
        if (salesTill.value !== "") {
          salesTill.style.border = "2px solid red";
          salesTill.style.outline = "none";
          //error
          document.getElementsByName("sales-till")[0].placeholder =
            "fill one only";
          sleep(1000).then(() => {
            document.getElementsByName("sales-till")[0].placeholder =
              "sell..till/other";
            salesTill.style.border = "";
            salesTill.style.outline = "";
            salesTill.value = "";
          });
        } else {
          if (salesCash.value == "") {
            salesProfit.value = 0;
          } else {
            salesProfit.value = salesCash.value - boughtPrice.value;
          }
        }
      });
      salesTill.addEventListener("input", function () {
        //check if till has a value and forbid
        if (salesCash.value !== "") {
          salesCash.style.border = "2px solid red";
          salesCash.style.outline = "none";
          //error
          document.getElementsByName("sales-cash")[0].placeholder =
            "fill one only";
          sleep(1000).then(() => {
            document.getElementsByName("sales-till")[0].placeholder =
              "sell..cash";
            salesCash.style.border = "";
            salesCash.style.outline = "";
            salesCash.value = "";
          });
        } else {
          if (salesTill.value == "") {
            salesProfit.value = 0;
          } else {
            salesProfit.value = salesTill.value - boughtPrice.value;
          }
        }
      });
      //get all values and sum in total input
      let incomeRecords = [
        cyberCash,
        cyberTill,
        psCash,
        psTill,
        movieCash,
        movieTill,
        salesProfit,
        expensesValue,
      ];

      //real time income total(ksh)
      $(document).on("input", ".income-calc", function () {
        var sum = 0;
        $(".income-calc").each(function () {
          sum += +$(this).val();
        });
        $("#total-cash").val(sum);
        var totalCash = $("#total-cash").val(sum);
        document.getElementById(
          "total-sales-out-cash"
        ).innerHTML = `cash total: ${sum}`;
      });

      //real time income total(till)
      $(document).on("input", ".income-calc-till", function () {
        var sum = 0;
        $(".income-calc-till").each(function () {
          sum += +$(this).val();
        });
        $("#total-till").val(sum);
        var totalTill = $("#total-till").val(sum);
        document.getElementById(
          "total-sales-out-till"
        ).innerHTML = `till total: ${sum}`;
      });
    },
  },
  __verify: {
    init: function _verify() {
      document
        .getElementById("passwordnew")
        .addEventListener("input", validatepassword);
      function validatepassword() {
        const pwd = document.getElementById("passwordnew");
        const output_pwd_err = document.querySelector("#passwordnew-err");
        const reg_valid_pwd =
          /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/; //1 num, 1 ucase char, 1 Lcase char and atleast 8 chars
        //create an illusion when the only thing being done, is checking char length
        if (pwd.value.length < 8) {
          pwd.style.border = "2px solid red";
          pwd.style.outline = "none";

          output_pwd_err.style.display = "block";
          output_pwd_err.innerHTML =
            "password must contain at least 8 characters   1 lowercase character 1 upercase character and  1 numeric value";
          sleep(7500).then(() => {
            output_pwd_err.style.display = "none";
          });
        } else {
          output_pwd_err.style.display = "none";
          pwd.style.border = "";
        }
      }

      document
        .getElementById("passwordnew-c")
        .addEventListener("input", validatepassword2);
      function validatepassword2() {
        const pwd_ = document.getElementById("passwordnew-c");
        const pwd2 = document.getElementById("passwordnew");
        const output_pwd_err2 = document.querySelector("#passwordnew-err-c");
        //create an illusion when the only thing being done, is checking char length
        if (pwd_.value !== pwd2.value) {
          pwd_.style.border = "2px solid red";
          pwd_.style.outline = "none";

          output_pwd_err2.style.display = "block";
          output_pwd_err2.innerHTML = "password do not match";
          sleep(7500).then(() => {
            output_pwd_err2.style.display = "none";
          });
        } else {
          output_pwd_err2.style.display = "none";
          pwd_.style.border = "";
        }
      }
    },
  },
  __plastation: {
    init: function _ps() {
      FilterInventory();
    },
  },
  __cyber: {
    init: function _ps() {
      FilterInventory();
    },
  },
  __addItem: {
    init: function _ps() {
      FilterInventory();

      //save item to inventory
      $(document).ready(function () {
        $("form").on("submit", function (e) {
          e.preventDefault();
          //get values including file if exists
          var itemName = document.querySelector("#item-name");
          var itemQt = document.querySelector("#item-quantity");
          var itemBp = document.querySelector("#item-bp");
          var itemModel = document.querySelector("#model");
          itemImage = document.querySelector("#product-image");

          /*           var check = [itemName, itemQt, itemBp, itemModel].forEach((item) => {
            if (item.value == "") {
              item.style.border = "1.2px solid red";
              sleep(3500).then(() => {
                item.style.border = "";
              });
            }
            return false;
          }); */

          //product image
          var fd = new FormData();
          var files = $("#product-image")[0].files[0];
          fd.append("product-image", files);

          $.ajax({
            url: "http://localhost/dailyreport-holics/pages/saveInventory",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (dataResult) {
              if (dataResult.statusCode == 200) {
                //remove alerts
                document.querySelector(".alert_success").style.display = "none";
                document.getElementsByClassName("loader")[0].style.display =
                  "block";

                sleep(2100).then(() => {
                  document.getElementsByClassName("loader")[0].style.display =
                    "none";
                  document.querySelector(".alert").style.display = "block";
                  document.getElementById("inventory-alert").style.display =
                    "block";
                  document.getElementById("inventory-alert").style.color =
                    "#fff";
                  document.getElementById("inventory-alert").innerHTML =
                    "item added successfully!";

                  //clear all inputs
                  [itemName, itemQt, itemBp, itemModel, itemImage].forEach(
                    (item) => {
                      item.value = "";
                    }
                  );

                  $("#product-avatar").attr(
                    "src",
                    "http://localhost/dailyreport-holics/public/images/images/open-box.png"
                  );
                  document.getElementById("product-image").value = "";
                  sleep(3500).then(() => {
                    document.querySelector(".alert_success").style.display =
                      "none";
                    document.getElementById("inventory-alert").innerHTML = "";
                  });
                });
              } else if (dataResult.statusCode == 201) {
                document.querySelector(".alert").style.display = "block";
                document.getElementById("inventory-alert").style.color =
                  "#f85f5f";
                $("#inventory-alert").html(
                  "invalid file or missing field, please try again"
                );

                sleep(1500).then(() => {
                  document.querySelector(".alert_success").style.display =
                    "none";
                  document.getElementById("inventory-alert").innerHTML = "";
                });
              } else if (dataResult.statusCode == 417) {
                document.querySelector(".alert").style.display = "block";
                document.getElementById("inventory-alert").style.color =
                  "#f85f5f";
                $("#inventory-alert").html(
                  "request could not be completed, check your connection"
                );

                sleep(1500).then(() => {
                  document.querySelector(".alert_success").style.display =
                    "none";
                  document.getElementById("inventory-alert").innerHTML = "";
                });
              }
            },
          });
        });
      });
    },
  },
  __expense: {
    init: function _ps() {
      FilterInventory();
    },
  },
  __filterReport: {
    init: function _ps() {
      FilterInventory();
    },
  },
  __movieshop: {
    init: function _ps() {
      FilterInventory();
    },
  },
  __sales: {
    init: function _ps() {
      FilterInventory();
    },
  },
  __total: {
    init: function _ps() {
      FilterInventory();
    },
  },
};
