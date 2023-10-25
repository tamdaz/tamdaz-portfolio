if (!localStorage.getItem('theme')) {
    localStorage.setItem('theme', 'dark')
} else {
    if (localStorage.getItem('theme') === "dark") {
        document.documentElement.classList.add("dark")
    }
}

document.querySelector('#changeTheme').addEventListener('click', () => {
    if (localStorage.getItem('theme') === "dark") {
        localStorage.setItem('theme', 'light')
    } else {
        localStorage.setItem('theme', 'dark')
    }

    document.documentElement.classList.toggle("dark")
})