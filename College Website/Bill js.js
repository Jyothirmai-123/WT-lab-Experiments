    var  ms = 40;
    var  ic = 50;
    var  mt = 80;
    var cc= 30;
    var  ts= 65;
    var  ss= 45;
    var total = 0;
    var check = 1;
    var gw;
    var sfruit;
    var item;
    var adder = document.querySelector("#getme");
    adder.addEventListener("click", getMe);
    var by = document.querySelector("#out");
    by.addEventListener("click", checkOut);
    var cme = document.querySelector("#clr");
    cme.addEventListener("click", clearMe);

    function getMe() {
      sfruit = document.querySelector("#sf").value;
      item = parseFloat(document.querySelector("#entrybox").value);
      gw = document.querySelector("#writeme");
      if (Number.isNaN(item) === true) {
        alert("Only Numbers !!! Or The Field is Empty");
        check = 0;
      }
      else if (item<0) {
        alert("Negative value!! @stupid");
        check = 0;
      }
      else{
        check = 1;
      }
      if (check == 1) {
     
        switch (sfruit) {
          case "Milk Shake":
            var st = ms * item;
            gw.value += "Milk Shake   " + item + " item/s = " + st + " rs\r";
            total += st;
            item.value = "";
            break;
          case "Ice Cream":
            var at = ic * item;
            gw.value += "Ice Cream   " + item + " item/s = " + at + " rs\r";
            total += at;
            item.value = "";
            break;
          case "Mocktail":
            var gr = mt * item;
            gw.value += "Mocktail   " + item + " item/s  = " + gr + " rs\r";
            total += gr;
            item.value = "";
            break;
          case "Cold Coffee":
            var ga = cc * item;
            gw.value += "Cold Coffee   " + item + " item/s  = " + ga + " RS\r";
            total += ga;
            item.value = "";
            break;
          case "Thick Shake":
            var pomy = ts * item;
            gw.value += "Thick Shake   " + item + " item/s  = " + pomy + " rs\r";
            total += pomy;
            item.value = "";
            break;
          case "Smoothies":
            var smo = ss * item;
            gw.value += "Smoothies   " + item + " item/s  = " + smo + " rs\r";
            total += smo;
            item.value = "";
            break;
        }

      }
    }

    function checkOut() {
      gw.value += "--------------------------------------------------------------\r";
      gw.value += "Your Total Bill Is = " + total + " rs Thanks For Shopping! :)\r";
      gw.value += "--------------------------------------------------------------\r";
      total = 0;
    }
    function clearMe () {
      gw.value = "";
    }
