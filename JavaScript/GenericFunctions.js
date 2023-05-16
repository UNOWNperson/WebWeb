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