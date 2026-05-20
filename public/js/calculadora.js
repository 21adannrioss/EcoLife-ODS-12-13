const kg_co2_per_km_cotxe = 0.192 // 1 km en cotxe = 0,192 kg CO₂
const kg_co2_per_km_bus = 0.029 // 1 km en bus = 0,029 kg CO₂
const kg_co2_vol_internacional = 1200 // 1 vol int. = 1.200 kg CO₂
const kg_co2_per_kwh = 0.18 // 1 kWh electr. = 0,18 kg CO₂
const kg_co2_gas_per_mes = 120 // 1 mes de gas = 120 kg CO₂
const kg_co2_carn_per_dia = 3.3 // 1 dia amb carn = 3,3 kg CO₂
const kg_co2_vegetaria_per_dia = 1.7 // 1 dia sense = 1,7 kg CO₂

document.getElementById('formulari-calc').addEventListener('submit', function (event) {
    event.preventDefault()

    // Neteja els errors anteriors
    document.getElementById('carn').classList.remove('camp-error')
    document.getElementById('error-carn').classList.remove('visible')

    // Lectura dels camps
    const kmCotxe = parseFloat(document.getElementById('cotxe').value) || 0
    const kmBus = parseFloat(document.getElementById('trans-pub').value) || 0
    const vols = parseFloat(document.getElementById('vols').value) || 0
    const electricitat = parseFloat(document.getElementById('electricitat').value) || 0
    const gas = parseFloat(document.getElementById('gas').value) || 0

    // El camp "carn" no utilitzarà 0 perquè hem de detectar si és buit
    const diesCarn = parseFloat(document.getElementById('carn').value)

    if(isNaN(diesCarn) || diesCarn < 0 || diesCarn > 7) {
        document.getElementById('carn').classList.add('camp-error') // Es posa la vora vermella
        document.getElementById('error-carn').classList.add('visible') // Es mostra el text d'error
        return
    }

    // Càlculs
    // Transport: multiplicar km/dia × factor × 365 dies/any
    const co2Cotxe = kmCotxe * kg_co2_per_km_cotxe * 365
    const co2Bus = kmBus * kg_co2_per_km_bus * 365

    // Vols: És un valor anual, només multiplicar pel factor
    const co2Vols = vols * kg_co2_vol_internacional

    // Electricitat: Es demana kWh/mes = multiplicar per 12 mesos
    const co2Electricitat = electricitat * kg_co2_per_kwh * 12

    // Gas: Es demana mesos/any = multiplicar per l'emissió mensual
    const co2Gas = gas * kg_co2_gas_per_mes

    // Alimentació: dies sense carn = 7 - dies amb carn, multiplicar per 52 setmanes per obtenir el total anual
    const diesVegetaria = 7 - diesCarn
    const co2Alimentacio = (diesCarn * kg_co2_carn_per_dia + diesVegetaria * kg_co2_vegetaria_per_dia) * 52

    // Total: suma de totes les categories
    const totalKg = co2Cotxe + co2Bus + co2Vols + co2Electricitat + co2Gas + co2Alimentacio
    const totalTones = totalKg / 1000


    // Es compara el total i s'assigna un nivell, un color i un consell personalitzat.
    let nivell
    let colorNivell
    let consell
    if(totalKg < 2500) {
        nivell = 'Molt baix'
        colorNivell = '#2e7d32'
        consell = "Excel·lent! La teva petjada és molt baixa. Segueix així!"
    } else if(totalKg < 5000) {
        nivell = 'Baix'
        colorNivell = '#388e3c'
        consell = "Bon resultat! Petits canvis en el transport o l'alimentació ho millorarien encara més."
    } else if(totalKg < 8000) {
        nivell = 'Moderat'
        colorNivell = '#e65100'
        consell = "Estàs per sobre de l'objectiu de 2,3 t/any. Reduir l'ús del cotxe ajudaria molt."
    } else {
        nivell = 'Alt'
        colorNivell = '#c62828'
        consell = "La teva petjada és molt elevada. Revisar el transport i l'alimentació és clau per millorar."
    }


    // Construcció del html
    let html = '<div class="targeta">'

    html += '<div style="text-align:center; margin-bottom:20px;">'
    html += '<p style="font-size:48px; font-weight:bold; color:' + colorNivell + ';">'
    html += totalTones.toFixed(2) + ' t' // 2 decimals
    html += '</p>'
    html += '<p style="color:#555; font-size:14px;">CO₂ equivalent per any</p>'
    html += '<p style="font-weight:bold; color:' + colorNivell + '; margin-top:8px;">' + nivell + '</p>'
    html += '<p style="font-size:14px; color:#555; margin-top:8px;">' + consell + '</p>'
    html += '</div>'

    // Desglossament per categories
    html += '<h4 style="margin-bottom:10px; color:#2e7d32;">Desglossament:</h4>'


    const categories = [
        ['Cotxe', co2Cotxe],
        ['Transport públic', co2Bus],
        ['Vols', co2Vols],
        ['Electricitat', co2Electricitat],
        ['Gas', co2Gas],
        ['Alimentació', co2Alimentacio]
    ]
    for(let i = 0; i < categories.length; i++) {
        let nomCategoria = categories[i][0] // text de l'etiqueta
        let valorCategoria = categories[i][1] // kg CO₂ calculats

        html += '<div style="display:flex; justify-content:space-between; padding:6px 0; border-bottom:1px solid #ffffff; font-size:14px;">'
        html += '<span>' + nomCategoria + '</span>'
        html += '<strong style="color:#2e7d32;">' + (valorCategoria / 1000).toFixed(2) + ' t</strong>'
        html += '</div>'
    }

    // Nota informativa sobre l'objectiu ODS 13
    html += '<div class="bloc-info" style="margin-top:14px; font-size:13px;">'
    html += "<strong>Objectiu global (ODS 13):</strong> 2,3 t de CO₂ per persona i any per limitar l'escalfament a 1,5°C."
    html += "</div>"

    html += "</div>"

    // Injectar el HTML construït dins l'element <div id="zona-resultat">
    document.getElementById('zona-resultat').innerHTML = html
})