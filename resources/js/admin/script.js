
//Zoom out Menu Admin
// document.addEventListener('DOMContentLoaded', function () {
const btnZoomOut = document.querySelector('#active-zoom-out');
const menuAdmin = document.querySelector('#menu-admin');
if (btnZoomOut && menuAdmin) {
    if (localStorage.getItem('checkMenuZoomOut') === 'true') {
        menuAdmin.classList.add('zoom-out');
    }
    //
    // menuAdmin.classList.add('ready');

    btnZoomOut.addEventListener('click', function () {
        menuAdmin.classList.toggle('zoom-out');
        const checkZoomOut = menuAdmin.classList.contains('zoom-out');
        localStorage.setItem('checkMenuZoomOut', checkZoomOut);
    });
}
// });

document.addEventListener('DOMContentLoaded', function () {
    const darkModeToggle = document.querySelector('.active-dark-mode');
    const body = document.body;
    const contentAdmin = document.querySelector('#show-content-admin');
    const asideTopMain = document.querySelectorAll('.aside-top-main span')
    if (localStorage.getItem('darkMode') === 'true') {
        body.classList.add('dark');
        contentAdmin.classList.add('dark');
        asideTopMain.forEach(element => {
            element.classList.add('dark');
        });
    }
    darkModeToggle.addEventListener('click', function () {
        body.classList.toggle('dark');
        contentAdmin.classList.toggle('dark');
        asideTopMain.forEach(element => {
            element.classList.toggle('dark');
        });
        const isDarkMode = body.classList.contains('dark');
        localStorage.setItem('darkMode', isDarkMode);
    });
});
