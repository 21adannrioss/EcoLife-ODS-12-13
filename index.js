// npm install
// Per arrencar: npm run dev

import express from 'express'
import fs from 'fs'

// Crear l'aplicació express
const app = express()
const port = 3000

// Permet que express llegeixi dades JSON
app.use(express.json())

// Serveix els fitxers de la carpeta public
app.use(express.static('public'))


// Llegeix el fitxer db.json i retorna les dades
function llegirDades() {
    const text = fs.readFileSync('dataBase/db.json', 'utf-8')
    return JSON.parse(text)
}

// Guardar les dades al fitxer db.json
function guardarDades(dades) {
    fs.writeFileSync('dataBase/db.json', JSON.stringify(dades, null, 2))
}


// ENDPOINT GET: Obtenir tots els hàbits
app.get('/api/habits', function (req, res) {
    const dades = llegirDades()
    res.json(dades.habits)
})


// ENDPOINT POST: Crear un nou hàbit
app.post('/api/habits', function (req, res) {
    // Llegir les dades que arriben del formulari
    const nom = req.body.nom
    const categoria = req.body.categoria
    const co2 = req.body.co2

    // Comprovar que el nom i la categoria no estiguin buits
    if(!nom || !categoria) {
        return res.status(400).json({ error: 'El nom i la categoria son obligatoris' })
    }

    const dades = llegirDades()

    // Crear un nou hàbit
    const nouHabit = {
        id: dades.habits.length + 1,
        nom: nom,
        categoria: categoria,
        co2: parseFloat(co2) || 0,
        data: new Date().toISOString().split('T')[0]
    }

    // Afegir a la llista
    dades.habits.push(nouHabit)
    guardarDades(dades)

    // Retornar el nou hàbit creat
    res.status(201).json(nouHabit)
})


// ENDPOINT PUT: Editar un hàbit existent
app.put('/api/habits/:id', function (req, res) {
    const id = parseInt(req.params.id)
    const dades = llegirDades()

    // Busquem el hàbit amb aquest id
    let habitTrobat = null
    let posicio = -1

    for(let i = 0; i < dades.habits.length; i++) {
        if(dades.habits[i].id === id) {
            habitTrobat = dades.habits[i]
            posicio = i
            break
        }
    }

    // Si no existeix, retornem error
    if(posicio === -1) {
        return res.status(404).json({ error: 'Habit no trobat' })
    }

    // Actualitzar els camps
    dades.habits[posicio].nom = req.body.nom || habitTrobat.nom
    dades.habits[posicio].categoria = req.body.categoria || habitTrobat.categoria
    dades.habits[posicio].co2 = parseFloat(req.body.co2) || habitTrobat.co2

    guardarDades(dades)
    res.json(dades.habits[posicio])
})


// ENDPOINT DELETE: Eliminar un hàbit
app.delete('/api/habits/:id', function (req, res) {
    const id = parseInt(req.params.id)
    const dades = llegirDades()

    // Buscar el hàbit
    const posicio = dades.habits.findIndex(function (h) {
        return h.id === id
    })

    if(posicio === -1) {
        return res.status(404).json({ error: 'Habit no trobat' })
    }

    dades.habits.splice(posicio, 1)
    guardarDades(dades)

    res.json({ missatge: 'Habit eliminat' })
})


// Iniciar el servidor
app.listen(port, function () {
    console.log('Servidor funcionant a http://localhost:' + port)
})