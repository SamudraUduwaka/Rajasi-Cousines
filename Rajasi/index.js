function changeclasspassword1() {
    var pbtn1 = document.getElementById("pbtn1");
    var password = document.getElementById("password");

    if (pbtn1.innerHTML == 'See <i class="bi bi-eye-slash-fill"></i>') {
        password.type = "text";
        pbtn1.innerHTML = "Hide <i class='bi bi-eye-fill'></i>";
    } else {
        password.type = "password";
        pbtn1.innerHTML = "See <i class='bi bi-eye-slash-fill'></i>";
    }

}

function changeclasspassword2() {

    var pbtn2 = document.getElementById("pbtn2");
    var rpassword = document.getElementById("rpassword");

    if (pbtn2.innerHTML == 'See <i class="bi bi-eye-slash-fill"></i>') {
        rpassword.type = "text";
        pbtn2.innerHTML = "Hide <i class='bi bi-eye-fill'></i>";
    } else {
        rpassword.type = "password";
        pbtn2.innerHTML = "See <i class='bi bi-eye-slash-fill'></i>";
    }

}

function changeclasspassword3() {

    var pbtn3 = document.getElementById("pbtn3");
    var spassword = document.getElementById("spassword");

    if (pbtn3.innerHTML == 'See <i class="bi bi-eye-slash-fill"></i>') {
        spassword.type = "text";
        pbtn3.innerHTML = "Hide <i class='bi bi-eye-fill'></i>";
    } else {
        spassword.type = "password";
        pbtn3.innerHTML = "See <i class='bi bi-eye-slash-fill'></i>";
    }

}

function signUp() {

    var fn = document.getElementById("fn");
    var ln = document.getElementById("ln");
    var email = document.getElementById("e");
    var m = document.getElementById("m");
    var no = document.getElementById("no");
    var street = document.getElementById("st");
    var city = document.getElementById("city");
    var g = document.getElementById("g");
    var password = document.getElementById("password");
    var rpassword = document.getElementById("rpassword");

    var f = new FormData();

    f.append("fn", fn.value);
    f.append("ln", ln.value);
    f.append("email", email.value);
    f.append("m", m.value);
    f.append("no", no.value);
    f.append("street", street.value);
    f.append("city", city.value);
    f.append("gender", g.value);
    f.append("p", password.value);
    f.append("rp", rpassword.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "done") {

                document.getElementById("msg").innerHTML = "";

                changeView();
            } else {
                document.getElementById("msg").innerHTML = text;
            }
        }
    };

    r.open("POST", "signupprocess.php", true);
    r.send(f);

}

function changeView() {
    var signUpBox = document.getElementById("signupcontent");
    var signInBox = document.getElementById("signincontent");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function signIn() {

    var email = document.getElementById("se");
    var password = document.getElementById("spassword");
    var remember = document.getElementById("remember");

    var f = new FormData();

    f.append("e", email.value);
    f.append("p", password.value);
    f.append("remember", remember.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "1") {

                window.location = "home.php";

            } else if (text == "2") {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!  Your account has been blocked by the admin',
                    footer: '<a href="blockedaccounts.php">Why do I have this issue?</a>'
                })
            } else {
                document.getElementById("smsg").innerHTML = text;
            }
        }
    };

    r.open("POST", "signinprocess.php", true);
    r.send(f);

}

var bm;

function forgotPassword() {
    var emails = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Success") {
                alert("Verification email sent. Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                var bm = new bootstrap.Modal(m);

                bm.show();
            } else {
                alert(text);
            }
        }
    };
    r.open("GET", "forgotPasswordProcess.php?e=" + emails.value, true);
    r.send();
}

function showPassword() {
    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (npb.innerHTML == "Show") {
        np.type = "text";
        npb.innerHTML = "Hide";
    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }
}

function showPassword2() {
    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnpb.innerHTML == "Show") {
        rnp.type = "text";
        rnpb.innerHTML = "Hide";
    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }
}

function resetPassword() {
    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var formData = new FormData();

    formData.append("e", e.value);
    formData.append("np", np.value);
    formData.append("rnp", rnp.value);
    formData.append("vc", vc.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Success") {
                alert("Password Reset Success");
                bm.hide();
            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "resetPassword.php", true);
    r.send(formData);


}