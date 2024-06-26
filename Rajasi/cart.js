function deletefromcart(id) {

    var cid = id;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "cart.php";
            } else {
                alert(t);
            }
        }

    };

    r.open("GET", "deleteFromCartProcess.php?id=" + cid, true);
    r.send();
}

function goToSPV(id) {
    window.location = "singleproductview.php?id=" + id;
}


// function goToCheckout(g, t, n) {

//     var grand = g;
//     var total = t;
//     var num = n;

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {

//         if (r.readyState == 4) {
//             var t = r.responseText;
//             if (t == "success") {
//                 window.location = "checkout.php";
//             } else {
//                 alert(t);
//             }
//         }

//     };

//     r.open("GET", "goToCheckoutProcess.php?id=" + cid, true);
//     r.send();

// }