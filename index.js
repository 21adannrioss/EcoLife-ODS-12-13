// Dependència per la base de dades: npm install better-sqlite3
// Per arrencar: npm run dev
// php -S localhost:8000 -t public

import express from 'express'
import Database from 'better-sqlite3'

const app = express()
const port = 3000
const db = new Database('dataBase/ecoLifeDB.db')

// Per utilitzar php i js a la vegada
app.use(function(req, res, next) {
    res.setHeader('Access-Control-Allow-Origin', 'http://localhost:8000')
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type')
    next()
})

app.use(express.json())
app.use(express.static('public'))


// GET: obté tots els hàbits
app.get('/api/habits', function (req, res) {
    const habits = db.prepare('SELECT * FROM habits ORDER BY id ASC').all()
    res.json(habits)
})


// POST: crea un nou hàbit
app.post('/api/habits', function (req, res) {
    const nom = req.body.nom
    const categoria = req.body.categoria
    const co2 = req.body.co2

    if(!nom || !categoria) {
        return res.status(400).json({ error: 'El nom i la categoria son obligatoris' })
    }

    // Obté la data actual en format YYYY-MM-DD.
    const data = new Date().toISOString().split('T')[0]

    const stmt = db.prepare('INSERT INTO habits (nom, categoria, co2, data) VALUES (?, ?, ?, ?)')
    const info = stmt.run(nom, categoria, parseFloat(co2) || 0, data)

    const nouHabit = db.prepare('SELECT * FROM habits WHERE id = ?').get(info.lastInsertRowid)
    res.status(201).json(nouHabit)
})


// PUT: edita un hàbit existent
app.put('/api/habits/:id', function (req, res) {
    const id = parseInt(req.params.id)

    const habitActual = db.prepare('SELECT * FROM habits WHERE id = ?').get(id)
    if(!habitActual) {
        return res.status(404).json({ error: 'Habit no trobat' })
    }

    const nom = req.body.nom || habitActual.nom
    const categoria = req.body.categoria || habitActual.categoria
    const co2 = parseFloat(req.body.co2) || habitActual.co2

    db.prepare('UPDATE habits SET nom = ?, categoria = ?, co2 = ? WHERE id = ?').run(nom, categoria, co2, id)

    const habitActualitzat = db.prepare('SELECT * FROM habits WHERE id = ?').get(id)
    res.json(habitActualitzat)
})


// DELETE: elimina un hàbit
app.delete('/api/habits/:id', function (req, res) {
    const id = parseInt(req.params.id)
    const info = db.prepare('DELETE FROM habits WHERE id = ?').run(id)

    if(info.changes === 0) {
        return res.status(404).json({ error: 'Hàbit no trobat' })
    }

    res.json({ missatge: 'Hàbit eliminat' })
})


// Iniciar el servidor
app.listen(port, function () {
    console.log('Servidor funcionant a http://localhost:' + port)
})