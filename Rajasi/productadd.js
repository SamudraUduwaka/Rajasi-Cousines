function changeImg() {
    var image1 = document.getElementById("imguploader1");
    var view1 = document.getElementById("prev1");

    image1.onchange = function() {
        var file1 = this.files[0];
        var url1 = window.URL.createObjectURL(file1);

        view1.src = url1;
    }

    var image2 = document.getElementById("imguploader2");
    var view2 = document.getElementById("prev2");

    image2.onchange = function() {
        var file2 = this.files[0];
        var url2 = window.URL.createObjectURL(file2);

        view2.src = url2;
    }

    var image3 = document.getElementById("imguploader3");
    var view3 = document.getElementById("prev3");

    image3.onchange = function() {
        var file3 = this.files[0];
        var url3 = window.URL.createObjectURL(file3);

        view3.src = url3;
    }
}

function addProduct() {
    var category = document.getElementById("cat");

    var title = document.getElementById("ti");

    var qty = document.getElementById("qty");
    var price = document.getElementById("price");
    var delivery_within_colombo = document.getElementById("dwc");
    var delivery_outof_colombo = document.getElementById("doc");
    var description = document.getElementById("desc");
    var image1 = document.getElementById("imguploader1");
    var image2 = document.getElementById("imguploader2");
    var image3 = document.getElementById("imguploader3");

    var form = new FormData();

    form.append("c", category.value);
    form.append("t", title.value);
    form.append("qty", qty.value);
    form.append("p", price.value);
    form.append("dwc", delivery_within_colombo.value);
    form.append("doc", delivery_outof_colombo.value);
    form.append("desc", description.value);
    form.append("img1", image1.files[0]);
    form.append("img2", image2.files[0]);
    form.append("img3", image3.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var text = r.responseText;
            if (text == "1") {
                window.location = "productadd.php";
            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: text,
                })
            }

        }
    };

    r.open("POST", "addProductProcess.php", true);
    r.send(form);

}