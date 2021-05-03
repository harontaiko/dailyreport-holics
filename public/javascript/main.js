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
    var namespace = chuoni;

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

function sleep(time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

// kick it all off here
$(document).ready(UTIL.loadEvents);

//BEGIN EXECUTION HERE BASED ON PAGE
chuoni = {
  __home: {
    init: function _homepage() {
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
      $(".message a").click(function () {
        $("form").animate({ height: "toggle", opacity: "toggle" }, "slow");
      });
    },
  },
  __add: {
    init: function _add() {
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
          salesProfit.value = salesTill.value - boughtPrice.value;
        }
      });
      //get all values and sum in total input
      /*     [
        cyberCash.value,
        cyberTill.value,
        psCash.value,
        psTill.value,
        movieCash.value,
        movieTill.value,
        salesProfit.value,
        expensesValue.value,
      ].forEach((item) => {
        item.addEventListener("input", function () {
          //add values in total
          console.log(item++);
        });
      }); */
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
        const reg_valid_pwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/; //1 num, 1 ucase char, 1 Lcase char and atleast 8 chars
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
};
