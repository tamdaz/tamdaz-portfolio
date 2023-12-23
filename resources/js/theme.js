let changeThemeHeader = document.getElementById('changeThemeHeader');
let changeThemeFooter = document.getElementById('changeThemeFooter');

function changeTheme() {
    if (localStorage.getItem('theme') === "light") {
        localStorage.setItem('theme', 'dark')
        changeThemeHeader.checked = true;
        changeThemeFooter.checked = true;

        document.documentElement.classList.add("dark")
    } else {
        localStorage.setItem('theme', 'light')
        changeThemeHeader.checked = false;
        changeThemeFooter.checked = false;

        document.documentElement.classList.remove("dark")
    }
}

changeThemeHeader.addEventListener('change', changeTheme);
changeThemeFooter.addEventListener('change', changeTheme);