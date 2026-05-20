const urlApi = 'http://localhost:3000/api/habits'

// ── FUNCIÓ PRINCIPAL ─────────────────────────────────────────
// S'executa quan la pàgina acaba de carregar (veure el final del fitxer).
// És "async" perquè fa await: espera la resposta de l'API sense bloquejar
// el navegador (comunicació asíncrona).

async function carregarEstadistiques() {
    try {
        const res = await fetch(urlApi)
        const habits = await res.json()

        mostrarXifresGenerals(habits)
        mostrarGraficaCategories(habits)
        mostrarTaula(habits)
    } catch (error) {
        document.getElementById('zona-avis-stats').innerHTML = "<div class='avis avis-error'>No es pot connectar amb l'API.</div>"

        // Buidar les zones que haurien mostrat dades
        document.getElementById('xifres-generals').innerHTML = '<div class="targeta" style="grid-column:1/-1;"><p>Dades no disponibles</p></div>'
        document.getElementById('grafica-categories').innerHTML = ''
        document.getElementById('taula-habits').innerHTML = ''
    }
}


// Total d'hàbits, CO₂ estalviat i nombre de categories actives.
function mostrarXifresGenerals(habits) {

    // Sumar el CO₂ de tots els hàbits
    let totalCO2 = 0
    for(let i = 0; i < habits.length; i++) {
        totalCO2 = totalCO2 + habits[i].co2
    }

    // Comptar les categories
    const categoriesVistes = []
    for(let i = 0; i < habits.length; i++) {
        const cat = habits[i].categoria
        if(categoriesVistes.indexOf(cat) === -1) {
            categoriesVistes.push(cat)
        }
    }

    // Construir les 3 targetes com a string HTML i s'injectan al DOM
    let html = ''
    html += '<div class="targeta xifra-gran"><span>' + habits.length + '</span><p>Hàbits registrats</p></div>'
    html += '<div class="targeta xifra-gran"><span>' + totalCO2.toFixed(1) + ' kg</span><p>CO₂ estalviat</p></div>'
    html += '<div class="targeta xifra-gran"><span>' + categoriesVistes.length + '</span><p>Categories actives</p></div>'

    document.getElementById('xifres-generals').innerHTML = html
}


// Per a cada categoria, dibuixa una barra proporcional al nombre d'hàbits
function mostrarGraficaCategories(habits) {

    // Comptar quants hàbits hi ha de cada categoria
    let comptador = {}
    for(let i = 0; i < habits.length; i++) {
        const cat = habits[i].categoria

        // Si la categoria no existeix encara al comptador, s'inicialitza a 0
        if(comptador[cat] === undefined) {
            comptador[cat] = 0
        }
        comptador[cat] = comptador[cat] + 1
    }

    // Convertir l'objecte en un array de parelles
    let parelles = []
    for(const cat in comptador) {
        parelles.push([cat, comptador[cat]])
    }

    // Ordenar de major a menor pel segon element de cada parella
    parelles.sort(function (a, b) { return b[1] - a[1] })

    // Si no hi ha dades, mostrar un missatge i sortir
    if(parelles.length === 0) {
        document.getElementById('grafica-categories').innerHTML = '<p>No hi ha dades per mostrar.</p>'
        return
    }


    const maxim = parelles[0][1]

    let html = '<div class="targeta">'

    for (let i = 0; i < parelles.length; i++) {
        const categoria = parelles[i][0]
        const total = parelles[i][1]

        const percentatge = (total / maxim) * 100

        // Etiqueta + barra de progrés
        html += '<div style="margin-bottom:14px;">'

        // Nom de categoria a l'esquerra, xifra a la dreta
        html += '<div style="display:flex; justify-content:space-between; font-size:14px; margin-bottom:4px;">'
        html += '<span>' + categoria + '</span>'
        html += '<strong style="color:#2e7d32;">' + total + ' hàbit' + (total !== 1? 's' : '') + '</strong>'
        html += '</div>'
        html += '<div class="barra-fons">'
        html += '<div class="barra-farciment" style="width:' + percentatge + '%;"></div>'
        html += '</div>'
        html += '</div>'
    }

    html += '</div>'
    document.getElementById('grafica-categories').innerHTML = html
}


// Generar una taula HTML amb una fila per cada hàbit de l'array

function mostrarTaula(habits) {
    if(habits.length === 0) {
        document.getElementById('taula-habits').innerHTML = '<p>Encara no hi ha hàbits registrats.</p>'
        return
    }

    let html = '<table>'
    html += '<thead><tr><th>Nom</th><th>Categoria</th><th>CO₂ estalviat</th><th>Data</th></tr></thead>'
    html += '<tbody>'

    // Una fila <tr> per cada hàbit de l'array
    for(let i = 0; i < habits.length; i++) {
        const h = habits[i]

        html += '<tr>'
        html += '<td>' + h.nom + '</td>'
        html += '<td>' + h.categoria + '</td>'
        // Si co2 és 0 o no hi ha valor, es mostra un guió en lloc de "0 kg"
        html += '<td style="color:#2e7d32; font-weight:bold;">' + (h.co2 > 0 ? h.co2 + ' kg' : '-') + '</td>'
        html += '<td style="color:#777;">' + (h.data || '-') + '</td>'
        html += '</tr>'
    }

    html += '</tbody></table>'
    document.getElementById('taula-habits').innerHTML = html
}

document.addEventListener('DOMContentLoaded', carregarEstadistiques)