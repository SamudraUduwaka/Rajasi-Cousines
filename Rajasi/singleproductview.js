function loadmainimg(id) {

    var id = id;
    var img = document.getElementById("pimg" + id).src;
    var mainimg = document.getElementById("mainimg");

    mainimg.style.backgroundImage = "url(" + img + ")";

}

function qty_inc(qty) {

    var pqty = qty;

    var input = document.getElementById("qtyinput");

    if (input.value < pqty) {

        var newvalue = parseInt(input.value) + 1;

        input.value = newvalue.toString();


    } else {

        let timerInterval
        Swal.fire({
            title: 'Maximum product quantity has been acheived!',
            html: 'Will close in <b></b> milliseconds.',
            timer: 1500,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })


    }

}

function qty_dec() {
    var input = document.getElementById("qtyinput");

    if (input.value >= 2) {

        var newvalue = parseInt(input.value) - 1;

        input.value = newvalue.toString();

    } else {

        let timerInterval
        Swal.fire({
            title: 'Minimum quantity count has been achieved!',
            html: 'Will close in <b></b> milliseconds.',
            timer: 1500,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    }



}

function addToCart(id) {
    var qtytxt = document.getElementById("qtyinput").value;
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