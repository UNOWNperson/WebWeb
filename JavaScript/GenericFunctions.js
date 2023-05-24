function ChangeText(IDorClass, element, text)
{
    if(IDorClass.toString("class"))
    {
        document.getElementsByClassName(element).innerText = text;
    }
    if(IDorClass.toString("id"))
    {
        document.getElementById(element).innerText = text;
    }
}

window.onload = function() {

    setTimeout(GXFix, 500);
}
function GXFix()
{
    if (document.getElementById("detach-button-host") != null) {
        document.getElementById("detach-button-host").setAttribute("class", "hidden");
    }
}