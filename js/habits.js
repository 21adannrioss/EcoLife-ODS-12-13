const urlApi = 'http://localhost:3000/api/habits'
let llistaHabits = []
let idActual = null

const carregarHabits = async () => {
    try{
        const res = await fetch(urlApi)
        llistaHabits = await res.json()

        mostrarHabits()
    } catch(error){
        document.getElementById('llista-habits').innerHTML = "<div class='avis avis-error'>No es pot connectar amb l'API.</div>"
    }
}


// Construeix una taula HTML a partir de llistaHabits i la injecta al DOM
const mostrarHabits = () => {
    if(llistaHabits.length === 0) {
        document.getElementById('llista-habits').innerHTML = '<p>Encara no hi ha hàbits.</p>'
        return
    }

    let html = '<table>'
    html += '<div><tr>'
    html += '<th>Nom</th><th>Categoria</th><th>CO₂ estalviat</th><th>Data</th><th>Accions</th>'
    html += '</tr></div>'
    html += '<div>'

    // Una fila per cada hàbit de l'array
    for(let i = 0; i < llistaHabits.length; i++) {
        html += '<tr>'
        html += '<td><strong>' + llistaHabits[i].nom + '</strong></td>'
        html += '<td>' + llistaHabits[i].categoria + '</td>'

        html += '<td>' + (llistaHabits[i].co2 > 0 ? llistaHabits[i].co2 + ' kg' : '-') + '</td>'

        html += '<td>' + (llistaHabits[i].data || '-') + '</td>'

        html += '<td>'
        html += '<button class="boto boto-editar" onclick="obrirModal(' + llistaHabits[i].id + ')">Editar</button> '
        html += '<button class="boto boto-perill" onclick="eliminarHabit(' + llistaHabits[i].id + ')">Eliminar</button>'
        html += '</td>'

        html += '</tr>'
    }

    html += '</div></table>'
    document.getElementById('llista-habits').innerHTML = html
}


const validarFormulari = () => {
    let esValid = true

    // Neteja dels errors d'un enviament anterior
    document.getElementById('camp-nom').classList.remove('camp-error')
    document.getElementById('camp-categoria').classList.remove('camp-error')
    document.getElementById('camp-co2').classList.remove('camp-error')
    document.getElementById('error-nom').classList.remove('visible')
    document.getElementById('error-categoria').classList.remove('visible')
    document.getElementById('error-co2').classList.remove('visible')

    const nom = document.getElementById('camp-nom').value.trim()
    if(nom.length < 3) {
        document.getElementById('camp-nom').classList.add('camp-error')
        document.getElementById('error-nom').classList.add('visible')
        esValid = false
    }

    const categoria = document.getElementById('camp-categoria').value
    if(categoria === '') {
        document.getElementById('camp-categoria').classList.add('camp-error')
        document.getElementById('error-categoria').classList.add('visible')
        esValid = false
    }

    // "Opcional" ha de ser un número entre 0 i 100
    const co2Text = document.getElementById('camp-co2').value
    if(co2Text !== '') {
        const co2 = parseFloat(co2Text)
        if(isNaN(co2) || co2 < 0 || co2 > 100) {
            document.getElementById('camp-co2').classList.add('camp-error')
            document.getElementById('error-co2').classList.add('visible')
            esValid = false
        }
    }
    return esValid
}


// Formulari d'afegir
document.getElementById('formulari-habit').addEventListener('submit', async function (event) {
    event.preventDefault()

    if(!validarFormulari()) return

    const dades = {
        nom: document.getElementById('camp-nom').value.trim(),
        categoria: document.getElementById('camp-categoria').value,
        co2: parseFloat(document.getElementById('camp-co2').value) || 0
    }

    try{
        const resposta = await fetch(urlApi, {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(dades)
        })

        if(!resposta.ok) {
            throw new Error('El servidor ha retornat un error')
        }

        // Neteja del formulari per deixar-lo llest per a un nou hàbit
        document.getElementById('formulari-habit').reset()

        mostrarAvis('Hàbit afegit correctament!', 'ok')

        await carregarHabits()
    } catch (error) {
        mostrarAvis("Error en afegir l'hàbit. Intenta-ho de nou.", 'error')
    }
})

// Permís per editar
const obrirModal = (id) => {
    let habit = null
    for(let i = 0; i < llistaHabits.length; i++) {
        if(llistaHabits[i].id === id) {
            habit = llistaHabits[i]
            break
        }
    }

    if(!habit) return

    idActual = id

    document.getElementById('edit-nom').value = habit.nom
    document.getElementById('edit-categoria').value = habit.categoria
    document.getElementById('edit-co2').value = habit.co2 || 0

    document.getElementById('modal-editar').classList.add('obert')
}


// Tanca el modal i neteja l'id que estàvem editant
const tancarModal = () => {
    document.getElementById('modal-editar').classList.remove('obert')
    idActual = null
}

// Tancar el modal si l'usuari fa click fora del requadre
document.getElementById('modal-editar').addEventListener('click', function (e) {
    if(e.target === this) {
        tancarModal()
    }
})


document.getElementById('formulari-editar').addEventListener('submit', async function (e) {
    e.preventDefault()

    if(!idActual) return

    // Validacions
     let esValid = true

    // Netejar missatges d'error
    document.getElementById('edit-nom').classList.remove('camp-error')
    document.getElementById('edit-co2').classList.remove('camp-error')
    document.getElementById('error-edit-nom').classList.remove('visible')
    document.getElementById('error-edit-co2').classList.remove('visible')

    const nom = document.getElementById('edit-nom').value.trim()
    if(nom.length < 3) {
        document.getElementById('edit-nom').classList.add('camp-error')
        document.getElementById('error-edit-nom').classList.add('visible')
        esValid = false
    }

    const co2Text = document.getElementById('edit-co2').value
    if(co2Text !== '') {
        const co2 = parseFloat(co2Text)
        if(isNaN(co2) || co2 < 0 || co2 > 100) {
            document.getElementById('edit-co2').classList.add('camp-error')
            document.getElementById('error-edit-nom').classList.add('visible')
            esValid = false
        }
    }

    if(!esValid) return

    const dades = {
        nom: document.getElementById('edit-nom').value.trim(),
        categoria: document.getElementById('edit-categoria').value,
        co2: parseFloat(document.getElementById('edit-co2').value) || 0
    }

    try {
        const resposta = await fetch(urlApi + '/' + idActual, {
            method: 'PUT',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(dades)
        })

        if(!resposta.ok) {
            throw new Error('Error al servidor')
        }

        tancarModal()
        mostrarAvis('Hàbit actualitzat correctament!', 'ok')
        await carregarHabits()

    } catch (error) {
        mostrarAvis("Error en actualitzar l'hàbit.", 'error')
    }
})


const eliminarHabit = async (id) => {
    const confirmat = confirm('Estàs segur que vols eliminar aquest hàbit?')
    if(!confirmat) return

    try {
        const resposta = await fetch(urlApi + '/' + id, {
            method: 'DELETE'
        })

        if(!resposta.ok) {
            throw new Error('Error al servidor')
        }

        mostrarAvis('Hàbit eliminat.', 'info')
        await carregarHabits()

    } catch (error) {
        mostrarAvis("Error en eliminar l'hàbit.", 'error')
    }
}


// Mostra un missatge temporal de feedback a l'usuari
const mostrarAvis = (missatge, tipus) => {
    const zona = document.getElementById('zona-avis')
    zona.innerHTML = '<div class="avis avis-' + tipus + '">' + missatge + '</div>'

    // Passada l'espera, buida la zona perquè l'avís desaparegui
    setTimeout(() => {
        zona.innerHTML = ''
    }, 3000)
}

// Punt d'entrada
document.addEventListener('DOMContentLoaded', carregarHabits)