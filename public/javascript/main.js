/**
 * @author [harontaiko]
 * @email [harontaiko@gmail.com]
 * @create date 2021-04-30 04:18:24
 * @modify date 2021-04-30 04:18:24
 * @desc [MARKUP BASED JAVASCRIPT, BASED ON PAUL IRISH'S DOM INTRUBUSIVE JS]
 */
/**MARKUP BASED JAVASCRIPT, BASED ON PAUL IRISH'S DOM INTRUBUSIVE JS */
var hostUrl = document.querySelector("link[rel='host']").getAttribute("href");
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
    init: function _homepage() {},
  },
};
