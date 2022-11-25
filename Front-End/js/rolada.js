const button = document.querySelector(".seta")

button.addEventListener('click', () => {
    window.scroll({top: window.innerHeight, behavior: "smooth"})
    button.style.display = 'none'
})