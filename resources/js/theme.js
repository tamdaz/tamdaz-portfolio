let slideon = new Slideon()
slideon.load()

let changeThemeHeader = document.getElementById('changeThemeHeader');
let changeThemeFooter = document.getElementById('changeThemeFooter');

function changeTheme() {
    if (localStorage.getItem('theme') === "light") {
        localStorage.setItem('theme', 'dark')
        changeThemeHeader.checked = true;
        changeThemeFooter.checked = true;
    } else {
        localStorage.setItem('theme', 'light')
        changeThemeHeader.checked = false;
        changeThemeFooter.checked = false;
    }

    document.documentElement.classList.toggle("dark")
}

changeThemeHeader.addEventListener('change', changeTheme);
changeThemeFooter.addEventListener('change', changeTheme);