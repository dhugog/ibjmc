function reposFooter() {
    var footer = document.getElementsByTagName('footer')[0];
    footer.style.position = 'relative';
    footer.style.marginTop = '20px';
    var scrollMax = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    if (scrollMax == 0) {
        footer.style.position = 'absolute';
        footer.style.bottom = '0';
        footer.style.marginTop = '0';
    }
}

window.addEventListener('resize', reposFooter);
window.addEventListener('load', reposFooter);