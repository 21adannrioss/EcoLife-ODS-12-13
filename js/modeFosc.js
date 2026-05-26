// En carregar la pàgina, es comprova si l'usuari ja té el mode fosc activat
if(localStorage.getItem('darkMode') === 'actiu') {
    document.body.classList.add('dark')
}


// Quan l'usuari fa click al botó, activa o desactiva el mode fosc
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('btn-dark')

    // Emoji segons l'estat actual
    if(document.body.classList.contains('dark')) {
        btn.textContent = '☀️'
    } else{
        btn.textContent = '🌙'
    }

    btn.addEventListener('click', function() {
        // Afegeix o treu la classe 'dark' del body
        document.body.classList.toggle('dark')

        // Es guarda la preferència perquè es mantingui en recarregar la pàgina
        if(document.body.classList.contains('dark')) {
            localStorage.setItem('darkMode', 'actiu')
            btn.textContent = '☀️'
        } else{
            localStorage.setItem('darkMode', 'inactiu')
            btn.textContent = '🌙'
        }
    })
})