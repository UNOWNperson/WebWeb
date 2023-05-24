var debounce = false;

function HideShowFade(hide, show) {
    if (!debounce || hide == "particles-small") {
        debounce = true;
        var hideElem = document.getElementById(hide);
        var hideOpacity = 1;
        var hideLoop = setInterval(function () {
            hideOpacity -= 0.05;
            hideElem.style.opacity = hideOpacity;
            if (hideOpacity <= 0) {
                clearInterval(hideLoop);
                hideElem.setAttribute("class", "hidden");
                showElement(show);
            }
        }, 5);
    }
}

function showElement(id) {
    var elem = document.getElementById(id);
    if (elem.toString("particles-big")) {
        particlesJS("particles-big", particleConfigBig, "partiBig");
    }
    elem.style.opacity = 0;
    elem.removeAttribute("class", "hidden");
    var opacity = 0;
    var intervalOpacity = setInterval(function () {
        opacity += 0.05;
        elem.style.opacity = opacity;
        if (opacity >= 1) {
            clearInterval(intervalOpacity);
            debounce = false; // Reset debounce to false
        }
    }, 5);
}






