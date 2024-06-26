function changeImg() {
    var image1 = document.getElementById("imguploader1");
    var view1 = document.getElementById("prev1");

    image1.onchange = function() {
        var file1 = this.files[0];
        var url1 = window.URL.createObjectURL(file1);

        view1.src = url1;
    }

}

function saveimg() {
    var img = document.getElementById("imguploader1");

    var f = new FormData();

    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Success") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your profile image has been updated',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    };

    r.open("POST", "saveuserimgprocess.php", true);
    r.send(f);
}

function saveprofileprocess() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var f = new FormData();

    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("m", mobile.value);
    f.append("g", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your profile details has been updated',
                    showConfirmButton: false,
                    timer: 1500
                })

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: t + '!',
                })
            }
        }
    };

    r.open("POST", "saveprofileprocess.php", true);
    r.send(f);

}

function saveaddressprocess() {
    var no = document.getElementById("no");
    var street = document.getElementById("street");
    var city = document.getElementById("city");

    var f = new FormData();

    f.append("n", no.value);
    f.append("s", street.value);
    f.append("c", city.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your address details has been updated',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: t + '!',
                })
            }

        }
    };

    r.open("POST", "saveaddressprocess.php", true);
    r.send(f);

}