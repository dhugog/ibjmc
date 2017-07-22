function toggleMenu() {
    var menu = document.getElementById("nav-menu");
    var menuHeight = menu.offsetHeight;
    var navBar = document.getElementById('nav-bar');
    if(navBar.offsetTop == 60) {
        var yPos = 110;
    } else {
        var yPos = 60;
    }
    var btnMenu = document.getElementById("btn-menu-toggle");
    var btnMenuDivs = btnMenu.getElementsByTagName("div");

    
    if (menu.offsetTop == yPos) {
        menu.style.top = "-" + menuHeight + "px";
        btnMenuDivs[2].style.display = "block";
        btnMenuDivs[0].style.transform = "rotate(0deg)";
        btnMenuDivs[1].style.transform = "rotate(0deg)";
        btnMenuDivs[0].style.position = "relative";
        btnMenuDivs[1].style.position = "relative";
    } else {
        menu.style.top = yPos + "px";
        btnMenuDivs[2].style.display = "none";
        btnMenuDivs[0].style.transform = "rotate(45deg)";
        btnMenuDivs[1].style.transform = "rotate(-45deg)";
        btnMenuDivs[0].style.position = "absolute";
        btnMenuDivs[1].style.position = "absolute";
    }
}

function toggleMenuConta() {
    var menu = document.getElementById("menu-conta");
    var menuHeight = menu.offsetHeight;
    var navBar = document.getElementById("nav-bar");
    var menuItems = menu.getElementsByTagName("li");
    var itemMenuConta = document.getElementById("menu-item-conta");
    
    
    if(window.innerWidth > 644) {
        if(navBar.offsetTop == 60) {
            var yPos = 50;
        } else {
            var yPos = 60;
        }

        if(menu.offsetTop == yPos) {
            for(var c = 0; c < menuItems.length; c++) {
                menuItems[c].style.opacity = "0";
            }
            itemMenuConta.classList.remove("menuToggled");
            itemMenuConta.classList.add("menuHidden");
            menu.style.animation = "hideMenuConta .4s";
            setTimeout(function() {menu.style.top = "-" + menuHeight + "px";}, "0400");
        } else {
            for(var c = 0; c < menuItems.length; c++) {
                menuItems[c].style.opacity = "1";
            }
            itemMenuConta.classList.remove("menuHidden");
            itemMenuConta.classList.add("menuToggled");
            menu.style.animation = "toggleMenuConta .4s";
            menu.style.top = yPos + "px";
        }  
    } else {
        var menuWidth = menu.offsetWidth;
        if(menu.style.right == "0px") {
            for(var c = 0; c < menuItems.length; c++) {
                menuItems[c].style.opacity = "0";
            }
            itemMenuConta.classList.remove("menuToggled");
            itemMenuConta.classList.add("menuHidden");
            menu.style.right = "-" + menuWidth + "px";
        } else {
            for(var c = 0; c < menuItems.length; c++) {
                menuItems[c].style.opacity = "1";
            }
            itemMenuConta.classList.remove("menuHidden");
            itemMenuConta.classList.add("menuToggled");
            menu.style.right = "0px";
        }
    }
}