// refresher

function refresher(email) {

    setInterval(refreshmsgare(email), 200);
    setInterval(refreshrecentarea(), 200);
}

// refres msg view area

function refreshmsgare(mail) {

    var chatrow = document.getElementById("chatrow");

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            chatrow.innerHTML = t;

        }
    }

    r.open("POST", "adminrefreshmsgarea.php", true);
    r.send(f);

}

// refreshrecentarea

function refreshrecentarea() {

    var rcv = document.getElementById("rcv");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rcv.innerHTML = t;
        }
    }

    r.open("POST", "adminrefreshrecentareaprocess.php", true);
    r.send();

}

function replace(email) {
    var mails = email;
    var row = document.getElementById("chatrow");

    var f = new FormData();
    f.append("mail", mails);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            row.innerHTML = t;

        }
    };

    r.open("POST", "msgreplaceprocess.php", true);
    r.send(f);
}

function sendmessage(email) {

    var mails = email;
    var msgtxt = document.getElementById("msgtxt").value;

    var f = new FormData();
    f.append("e", mails);
    f.append("t", msgtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                msgtxt = "Type a message";
                refresher(mails);

            } else {
                Swal.fire(
                    'Error',
                    'Type anything to send',
                    'error'
                )
            }
        }
    }

    r.open("POST", "adminsendmessageprocess.php", true);
    r.send(f);

}