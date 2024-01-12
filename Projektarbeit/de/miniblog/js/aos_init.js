/* Back to top Button ab Scrollposition 400px einblenden */
document.addEventListener("scroll", function () {
    const bttb = document.querySelector("#backtotop");

    if (window.scrollY > 400) {
        bttb.style.opacity = "1";
    } else {
        bttb.style.opacity = "0";
    }
});
/* Animate On Scroll initialisieren */
AOS.init({
    duration: 1200,
    offset: 600,
    easing: 'ease-in-out',
    disable: 'mobile',
});
