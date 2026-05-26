const urlApi = '../api/mercatApi.php'
let articles = []


// Carrega tots els articles de l'API PHP en iniciar la pàgina
const carregarArticles = async () => {
    try{
        const res = await fetch(urlApi)
        articles = await res.json()
        mostrarArticles()
    } catch(error){
        document.getElementById('llista-articles').innerHTML = "<div class='avis avis-error'>No es pot connectar amb l'API.</div>"
    }
}


// Reconstrueix tot el bloc d'articles a partir de l'array
const mostrarArticles = () => {
    const contenidor = document.getElementById('llista-articles')

    if(articles.length === 0) {
        contenidor.innerHTML = '<p>Encara no hi ha articles.</p>'
        return
    }

    let html = '<div class="graella-2">'

    // Articles un a un
    for(let i = 0; i < articles.length; i++) {
        let emoji = ''
        if(articles[i].tipus === 'intercanvi') emoji = '🔄'
        if(articles[i].tipus === 'regal') emoji = '🎁'
        if(articles[i].tipus === 'préstec') emoji = '🤝'

        html += '<div class="targeta" id="article-' + articles[i].id + '">'
        html += '<p style="font-size:13px; color:#2e7d32; font-weight:bold;">' + emoji + ' ' + articles[i].tipus.toUpperCase() + '</p>'
        html += '<h3 style="margin:6px 0;">' + articles[i].titol + '</h3>'
        html += '<p style="font-size:14px; color:#555; margin-bottom:8px;">' + articles[i].descripcio + '</p>'
        html += '<p style="font-size:13px; color:#777;">' + articles[i].contacte + '</p>'
        html += '<p style="font-size:12px; color:#aaa; margin-top:4px;">' + articles[i].data + '</p>'
        html += '<div style="margin-top:10px;">'
        html += '<button class="boto boto-perill" onclick="eliminarArticle(' + articles[i].id + ')">Eliminar</button>'
        html += '</div>'
        html += '</div>'
    }
    html += '</div>'
    contenidor.innerHTML = html
}


// Comprova que cap camp obligatori estigui buit
const validarFormulariMercat = () => {
    let esValid = true

    const campsAValidar = ['titol', 'tipus', 'descripcio', 'contacte']
    for(let i = 0; i < campsAValidar.length; i++) {
        document.getElementById('camp-' + campsAValidar[i]).classList.remove('camp-error')
        document.getElementById('error-' + campsAValidar[i]).classList.remove('visible')
    }

    if(!document.getElementById('camp-titol').value.trim()) {
        document.getElementById('camp-titol').classList.add('camp-error')
        document.getElementById('error-titol').classList.add('visible')
        esValid = false
    }

    if(!document.getElementById('camp-tipus').value) {
        document.getElementById('camp-tipus').classList.add('camp-error')
        document.getElementById('error-tipus').classList.add('visible')
        esValid = false
    }

    if(!document.getElementById('camp-descripcio').value.trim()) {
        document.getElementById('camp-descripcio').classList.add('camp-error')
        document.getElementById('error-descripcio').classList.add('visible')
        esValid = false
    }

    if(!document.getElementById('camp-contacte').value.trim()) {
        document.getElementById('camp-contacte').classList.add('camp-error')
        document.getElementById('error-contacte').classList.add('visible')
        esValid = false
    }

    return esValid
}


// Publica un article nou fent un POST a l'API
document.getElementById('formulari-mercat').addEventListener('submit', async function(e) {
    e.preventDefault()

    if(!validarFormulariMercat()) return

    const nouArticle = {
        titol:      document.getElementById('camp-titol').value.trim(),
        tipus:      document.getElementById('camp-tipus').value,
        descripcio: document.getElementById('camp-descripcio').value.trim(),
        contacte:   document.getElementById('camp-contacte').value.trim()
    }

    try {
        const res = await fetch(urlApi, {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(nouArticle)
        })

        if(!res.ok) {
            throw new Error('Error del servidor')
        }

        // Neteja el formulari i recarrega la llista des de la BD
        document.getElementById('formulari-mercat').reset()
        await carregarArticles()

    } catch(error) {
        alert("Error en publicar l'article. Intenta-ho de nou.")
    }
})


// Elimina un article fent un DELETE a l'API
const eliminarArticle = async (id) => {
    const confirmat = confirm('Vols eliminar aquest article?')
    if(!confirmat) return

    try {
        const res = await fetch(urlApi + '?id=' + id, {
            method: 'DELETE'
        })

        if(res.status === 401) {
            alert('Cal iniciar sessió per eliminar articles.')
            return
        }

        if(!res.ok) {
            throw new Error('Error del servidor')
        }

        await carregarArticles()

    } catch(error) {
        alert("Error en eliminar l'article. Intenta-ho de nou.")
    }
}


document.addEventListener('DOMContentLoaded', carregarArticles)
