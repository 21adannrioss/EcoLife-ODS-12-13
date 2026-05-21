async function carregarEstadistiques() {
    try{
        const resposta = await fetch('http://localhost:3000/api/habits')
        const habits = await resposta.json()

        let totalCO2 = 0
        for(let i = 0; i < habits.length; i++) {
            totalCO2 = totalCO2 + habits[i].co2
        }

        // Construcció de les 3 targetes de resum i les injectem al DOM
        document.getElementById('estadistiques').innerHTML =
            '<div class="targeta xifra-gran">' +
                '<span>' + habits.length + '</span>' +
                '<p>Hàbits registrats</p>' +
            '</div>' +
            '<div class="targeta xifra-gran">' +
                '<span>' + totalCO2.toFixed(1) + ' kg</span>' +
                '<p>CO₂ estalviat</p>' +
            '</div>' +
            '<div class="targeta xifra-gran">' +
                '<span>2</span>' +
                '<p>ODS treballats</p>' +
            '</div>'

    } catch(error){
        document.getElementById('estadistiques').innerHTML =
            '<div class="avis avis-error" style="grid-column:1/-1;">' +
                'Inicia el servidor per veure les dades: <code>npm run dev</code>' +
            '</div>'
    }
}


// Punt d'entrada
document.addEventListener('DOMContentLoaded', carregarEstadistiques)