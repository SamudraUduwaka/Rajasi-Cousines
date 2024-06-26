function changeImgemp() {
    var image1 = document.getElementById("imguploader1");
    var view1 = document.getElementById("prev1");

    image1.onchange = function() {
        var file1 = this.files[0];
        var url1 = window.URL.createObjectURL(file1);

        view1.src = url1;
    }

}

function viewmanageusers(pg) {
    var viewResults = document.getElementById("viewResults");

    if (pg == null) {

        pg = 1;

    }

    var f = new FormData();

    f.append("pg", pg);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // document.getElementById("manageuserbtn").className = "d-none";
            viewResults.innerHTML = t;

        }
    };

    r.open("POST", "mageuserprocess.php", true);
    r.send(f);
}

function viewmanageproducts(pg1) {
    var viewResults = document.getElementById("viewResultspro");

    if (pg1 == null) {

        pg1 = 1;

    }

    var f = new FormData();

    f.append("pg", pg1);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // document.getElementById("manageuserbtn").className = "d-none";
            viewResults.innerHTML = t;

        }
    };

    r.open("POST", "manageproductsprocess.php", true);
    r.send(f);
}

function changeImgcat() {
    var image5 = document.getElementById("imguploader5");
    var view5 = document.getElementById("prev5");

    image5.onchange = function() {
        var file5 = this.files[0];
        var url5 = window.URL.createObjectURL(file5);

        view5.src = url5;
    }

}

function addCat() {
    var cat = document.getElementById("categoryfield");
    var image5 = document.getElementById("imguploader5");

    var f = new FormData();
    f.append("cat", cat.value);
    f.append("img", image5.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "admindashboard.php";
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: t,
                })
            }
        }
    };

    r.open("POST", "addcategoryprocess.php", true);
    r.send(f);
}

function addEmp() {
    var fn = document.getElementById("fnamee");
    var l = document.getElementById("lname");
    var e = document.getElementById("mail");
    var m = document.getElementById("mobile");
    var no = document.getElementById("no");
    var s = document.getElementById("street");
    var g = document.getElementById("gender");
    var c = document.getElementById("city");
    var image1 = document.getElementById("imguploader1");

    var f = new FormData();

    f.append("f", fn.value);
    f.append("l", l.value);
    f.append("e", e.value);
    f.append("m", m.value);
    f.append("no", no.value);
    f.append("s", s.value);
    f.append("g", g.value);
    f.append("c", c.value);
    f.append("img", image1.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "admindashboard.php";
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: t,
                })
            }
        }
    };

    r.open("POST", "addempprocess.php", true);
    r.send(f);

}

function viewmanageemp(pg2) {
    var viewResults = document.getElementById("viewResultsproemp");

    if (pg2 == null) {

        pg2 = 1;

    }

    var f = new FormData();

    f.append("pg", pg2);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // document.getElementById("manageuserbtn").className = "d-none";
            viewResults.innerHTML = t;

        }
    };

    r.open("POST", "manageempprocess.php", true);
    r.send(f);
}

function adminverification() {
    var e = document.getElementById("email").value;

    var r = new XMLHttpRequest();

    var f = new FormData();
    f.append("e", e);

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                var verificationModal = document.getElementById("verificationModal");
                k = new bootstrap.Modal(verificationModal);

                k.show();

            } else {
                // alert(t);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: t,
                })
            }
        }
    };

    r.open("POST", "adminverificationprocess.php", true);
    r.send(f);
}

function verify() {
    var verificationcode = document.getElementById("v").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                k.hide();
                window.location = "admindashboard.php";
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: t,
                })
            }
        }
    };

    r.open("GET", "verifyProcess.php?v=" + verificationcode, true);
    r.send();

}

function blockuser(email) {
    var mail = email;

    var blockbtn = document.getElementById("blockbtn" + mail);

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock";
            } else if (t == "2") {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block";
            }
        }
    };

    r.open("POST", "adminmanageuserblockprocess.php", true);
    r.send(f);
}

function blockproduct(id) {
    var id = id;

    var blockbtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock";
            } else if (t == "2") {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block";
            }
        }
    };

    r.open("POST", "adminmanageproductblockprocess.php", true);
    r.send(f);
}

function banemployee(id) {
    var id = id;

    var blockbtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Take";
            } else if (t == "2") {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Ban";
            }
        }
    };

    r.open("POST", "adminmanageempbanprocess.php", true);
    r.send(f);
}