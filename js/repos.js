function reposElements() {
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
    if(location.href.split('/').pop() == "index.php" || location.href.split('/').pop() == "") {
        if(navBarYPos == 60) {
            document.getElementById("vers").style.marginTop = navBarYPos + 50 + "px";
        } else {
            document.getElementById("vers").style.marginTop = navBarYPos + 60 + "px";
        }
    }
    // -- //
    
    // Main section
    var mainSec = document.getElementById("main-sec");
    if(location.href.split('/').pop() != "index.php" && location.href.split('/').pop() != "") {
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