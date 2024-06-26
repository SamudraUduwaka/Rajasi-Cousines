function changemeal() {

    var c = document.getElementById("change").value;
    var mealbox = document.getElementById("meal");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            mealbox.innerHTML = t;
        }
    };

    r.open("GET", "customizemealprocess.php?id=" + c, true);
    r.send();

}