let articles = [
    {id: 1, titol: 'Bicicleta de muntanya', tipus: 'intercanvi', descripcio: 'Bon estat, talla M. Busco patinet elèctric o similar.', contacte: 'Pere S.'},
    {id: 2, titol: 'Llibres de Batxillerat', tipus: 'regal', descripcio: 'Pack de ciències de 2n de Batx. Quasi sense ús.', contacte: 'Laura T.'},
    {id: 3, titol: 'Roba de bebè 0-6 mesos', tipus: 'regal', descripcio: 'Lot de roba en perfecte estat. Molts colors.', contacte: 'Elena V.'}
]

// Comptador per garantir que cada article nou té un id únic.
let seguentId = 4


// Reconstrueix tot el bloc d'articles a partir de l'array.
function mostrarArticles() {
    const contenidor = document.getElementById('llista-articles')

    if(articles.length === 0) {
        contenidor.innerHTML = '<p>Encara no hi ha articles.</p>'
        return
    }

    let html = '<div class="graella-2">'

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

        html += '<div style="margin-top:10px;">'
        html += '<button class="boto boto-perill" onclick="eliminarArticle(' + articles[i].id + ')">Eliminar</button>'
        html += '</div>'

        html += '</div>'
    }
    html += '</div>'
    contenidor.innerHTML = html
}


// Comprovar que cap camp obligatori estigui buit.
function validarFormulariMercat() {
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


// Publicació
document.getElementById('formulari-mercat').addEventListener('submit', function (e) {
    e.preventDefault()

    if(!validarFormulariMercat()) return

    const nouArticle = {
        id: seguentId,
        titol: document.getElementById('camp-titol').value.trim(),
        tipus: document.getElementById('camp-tipus').value,
        descripcio: document.getElementById('camp-descripcio').value.trim(),
        contacte: document.getElementById('camp-contacte').value.trim()
    }

    seguentId = seguentId + 1

    articles.push(nouArticle)

    document.getElementById('formulari-mercat').reset()

    mostrarArticles()
})


function eliminarArticle(id) {
    const confirmat = confirm('Vols eliminar aquest article?')
    if(!confirmat) return

    const nouArray = []
    for(let i = 0; i < articles.length; i++) {
        if(articles[i].id !== id) {
            nouArray.push(articles[i])
        }
    }
    articles = nouArray

    mostrarArticles()
}


document.addEventListener('DOMContentLoaded', mostrarArticles)