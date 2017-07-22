function reposElements() {
    
    // Nav-bar personalization
    var itemsBackup = ["Home", "Ao vivo", "Fale conosco", "Sobre nós", ""];
    var items = document.getElementsByClassName("nav-bar-items");
    if(items[4].id == "menu-item-conta") {
        itemsBackup[4] = "Minha conta";
    } else {
        itemsBackup[4] = "Login";
    }
    if(window.innerWidth < 645) {
        for(var c = 0; c < items.length; c++) {
            items[c].innerHTML = "";
        }
    } else {
        for(var c = 0; c < items.length; c++) {
            items[c].innerHTML = itemsBackup[c];
        }
    }
    // -- //
    
    // Repos menu minha conta
    var menu = document.getElementById("menu-conta");
    var navBar = document.getElementById("nav-bar");
    var itemMenuConta = document.getElementById("menu-item-conta");
    if(window.innerWidth > 644) {
        if(navBar.offsetTop == 60) {
            var yPos = 60;
        } else {
            var yPos = 0;
        }
        if(menu != null) {
            var menuHeight = menu.offsetHeight;
            var posTop = menuHeight + yPos;
            menu.style.right = 0;
            menu.style.top = "-" + posTop + "px";
            itemMenuConta.classList.remove("menuToggled");
            itemMenuConta.classList.add("menuHidden");
        }        
    } else {
        if(menu != null) {
            var menuWidth = menu.offsetWidth;
            menu.style.animation = "";
            menu.style.transition = "right .4s";
            menu.style.top = 50 + "px";
            menu.style.right = "-" + menuWidth + "px";
            itemMenuConta.classList.remove("menuToggled");
            itemMenuConta.classList.add("menuHidden");
        }
    }
    // -- //
    
    // Repos menu
    var menu = document.getElementById("nav-menu");
    var menuHeight = menu.offsetHeight;
    var btnMenu = document.getElementById("btn-menu-toggle");
    var btnMenuDivs = btnMenu.getElementsByTagName("div");
    menu.style.top = "-" + menuHeight + "px";
    btnMenuDivs[2].style.display = "block";
    btnMenuDivs[0].style.transform = "rotate(0deg)";
    btnMenuDivs[1].style.transform = "rotate(0deg)";
    btnMenuDivs[0].style.position = "static";
    btnMenuDivs[1].style.position = "static";
    // -- //
    
    // Repos section versiculo
    var navBarYPos = document.getElementById("nav-bar").offsetTop;
    if(location.href.split('/').pop() == "index.php" || location.href.split('/').pop() == "index.php#" || location.href.split('/').pop() == "" || location.href.split('/').pop() == "#") {
        if(navBarYPos == 60) {
            document.getElementById("vers").style.marginTop = navBarYPos + 50 + "px";
        } else {
            document.getElementById("vers").style.marginTop = navBarYPos + 60 + "px";
        }
    }
    // -- //
    
    // Main section
    var mainSec = document.getElementById("main-sec");
    if(location.href.split('/').pop() != "index.php" && location.href.split('/').pop() != "index.php#" && location.href.split('/').pop() != "" && location.href.split('/').pop() != "#") {
        if(navBarYPos == 60) {
            mainSec.style.marginTop = navBarYPos + 70 + "px";
        } else {
            mainSec.style.marginTop = navBarYPos + 80 + "px";        
        }
    }
    // -- //
    
    // Repos footer
    var footer = document.getElementsByTagName('footer')[0];
    footer.style.position = 'relative';
    footer.style.marginTop = '20px';
    var scrollMax = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    if (scrollMax <= 0) {
        footer.style.position = 'absolute';
        footer.style.bottom = '0';
        footer.style.marginTop = '0';
    }
    // -- //
}

window.addEventListener('resize', reposElements);
window.addEventListener('load', reposElements);