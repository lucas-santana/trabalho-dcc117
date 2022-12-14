const button = document.querySelector(".seta")
var caption = document.querySelector(".carousel-caption")

button.addEventListener('click', () => {
    window.scroll({top: window.innerHeight, behavior: "smooth"})
    button.style.display = 'none'
    caption.style.padding = "100px"
})