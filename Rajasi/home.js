function addtowishlist(id) {
    var pid = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "successfully added") {
                window.location = "wishlist.php";
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: t,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    };

    r.open("GET", "addtowishlistprocess.php?id=" + pid, true);
    r.send();
}

// function qty_inc(qty, id) {

//     var pqty = qty;

//     var input = document.getElementById("qtyinput" + id);

//     if (input.value < pqty) {

//         var newvalue = parseInt(input.value) + 1;

//         input.value = newvalue.toString();

//     } else {

//         let timerInterval
//         Swal.fire({
//             title: 'Maximum product quantity has been acheived!',
//             html: 'Will close in <b></b> milliseconds.',
//             timer: 500,
//             timerProgressBar: true,
//             didOpen: () => {
//                 Swal.showLoading()
//                 const b = Swal.getHtmlContainer().querySelector('b')
//                 timerInterval = setInterval(() => {
//                     b.textContent = Swal.getTimerLeft()
//                 }, 100)
//             },
//             willClose: () => {
//                 clearInterval(timerInterval)
//             }
//         }).then((result) => {
//             /* Read more about handling dismissals below */
//             if (result.dismiss === Swal.DismissReason.timer) {
//                 console.log('I was closed by the timer')
//             }
//         })

//     }

// }

// function qty_dec() {
//     var input = document.getElementById("qtyinput");

//     if (input.value >= 2) {

//         var newvalue = parseInt(input.value) - 1;

//         input.value = newvalue.toString();

//     } else {
//         alert("Minimum quantity count has been achieved");
//     }



// }

function addToCart(id) {
    var qtytxt = document.getElementById("qtyinput" + id).value;
    var pid = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "cart.php";
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: t,
                    showConfirmButton: false,
                    timer: 1500
                })

            }
        }
    };

    r.open("GET", "addToCartProcess.php?id=" + pid + "&qty=" + qtytxt, true);
    r.send();
}

function rate() {

    var ratemodal = document.getElementById("rateusmodal");
    k = new bootstrap.Modal(ratemodal);

    k.show();

}

var id1 = "1";

function makerate(id) {
    id1 = id;
    var stars = document.getElementById("stars");

    var f = new FormData();
    f.append("id", id1);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            stars.innerHTML = t;

        }
    };

    r.open("POST", "makerateprocess.php", true);
    r.send(f);
}

function finalrate() {


    var ratebtn = document.getElementById("ratebtn" + id1).innerHTML;

    var f = new FormData();
    f.append("id", ratebtn);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Wow. You rated us ' + ratebtn,
                    text: 'Thank you for rating us',
                })
                k.hide();
            }
        }
    };

    r.open("POST", "finalrateprocess.php", true);
    r.send(f);
}