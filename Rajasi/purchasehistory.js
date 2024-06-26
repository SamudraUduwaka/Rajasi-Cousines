function addFeedback(id) {
    var feedmodal = document.getElementById("feedmodal" + id);
    k = new bootstrap.Modal(feedmodal);

    k.show();

}

function saveFeedback(id) {

    var pid = id;
    var feedtxt = document.getElementById("feedtxt");

    var f = new FormData();

    f.append("id", pid);
    f.append("ftxt", feedtxt.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                k.hide();
            }
        }
    };

    r.open("POST", "savefeedbackprocess.php", true);
    r.send(f);

}

function deletefrom(id) {
    var id = id;

    var f = new FormData();

    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "1") {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Successfully deleted',
                    showConfirmButton: false,
                    timer: 1500
                })
                goTopurchasehistory();
            }
        }
    };

    r.open("POST", "deletefromPurchaseHistory.php", true);
    r.send(f);
}

function goTopurchasehistory() {

    setTimeout(function() {

        window.location = "purchasehistory.php";

    }, 1000);
}

function clearAll() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "1") {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Successfully deleted all',
                    showConfirmButton: false,
                    timer: 1500
                })
                goTopurchasehistory();
            }
        }
    };

    r.open("GET", "purchaseclearallprocess.php", true);
    r.send();
}