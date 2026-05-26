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

// Menú desplegable
document.getElementById('btn-menu').addEventListener('click', function() {
    const menu = document.getElementById('nav-menu')
    const obert = menu.classList.toggle('obert')
    this.setAttribute('aria-expanded', obert)
    this.textContent = obert ? '✕' : '☰'
})

// Tancar el menú en fer click a un enllaç
document.querySelectorAll('#nav-menu a').forEach(function(link) {
    link.addEventListener('click', function() {
        document.getElementById('nav-menu').classList.remove('obert')
        document.getElementById('btn-menu').textContent = '☰'
    })
})