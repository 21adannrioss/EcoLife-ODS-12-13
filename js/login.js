document.querySelector('.login-form').addEventListener('submit', function(e) {
    const nom = document.getElementById('usu_nom').value.trim()
    const pass = document.getElementById('usu_pass').value.trim()

    if(nom.length < 3) {
        e.preventDefault()
        document.getElementById('usu_nom').classList.add('camp-error')
    } else {
        document.getElementById('usu_nom').classList.remove('camp-error')
    }

    if(pass.length < 6) {
        e.preventDefault()
        document.getElementById('usu_pass').classList.add('camp-error')
    } else {
        document.getElementById('usu_pass').classList.remove('camp-error')
    }
})