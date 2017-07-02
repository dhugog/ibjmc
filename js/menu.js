function toggleMenu() {
    var menu = document.getElementById("nav-menu");
    var menuHeight = menu.offsetHeight;
    var btnMenu = document.getElementById("btn-menu-toggle");
    var btnMenuDivs = btnMenu.getElementsByTagName("div");

    if (menu.style.top == "60px") {
        menu.style.top = "-" + menuHeight + "px";
        btnMenuDivs[2].style.display = "block";
        btnMenuDivs[0].style.transform = "rotate(0deg)";
        btnMenuDivs[1].style.transform = "rotate(0deg)";
        btnMenuDivs[0].style.position = "static";
        btnMenuDivs[1].style.position = "static";
    } else {
        menu.style.top = "60px";
        btnMenuDivs[2].style.display = "none";
        btnMenuDivs[0].style.transform = "rotate(45deg)";
        btnMenuDivs[1].style.transform = "rotate(-45deg)";
        btnMenuDivs[0].style.position = "absolute";
        btnMenuDivs[1].style.position = "absolute";
    }
}