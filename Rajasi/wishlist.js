function deletefromwatchlist(id) {

    var wid = id;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var t = request.responseText;
            if (t == "success") {

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Removed from wishlist',
                    showConfirmButton: false,
                    timer: 2500
                })

                goTowatchlist();
            }
        }
    };

    request.open("GET", "removewatchlistitmprocess.php?id=" + wid, true);
    request.send();

}

function goTowatchlist() {

    setTimeout(function() {

        window.location = "wishlist.php";

    }, 1000);
}

function addToCart(id) {
    var qtytxt = "1";
    var pid = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "cart.php";
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: t,
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        }
    };

    r.open("GET", "addToCartProcess.php?id=" + pid + "&qty=" + qtytxt, true);
    r.send();
}