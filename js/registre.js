document.querySelector('.login-form').addEventListener('submit', function(e) {
    let esValid = true

    const nom = document.getElementById('usu_nom').value.trim()
    const pass = document.getElementById('usu_pass').value.trim()
    const confirm = document.getElementById('usu_pass_confirm').value.trim()

    document.getElementById('usu_nom').classList.remove('camp-error')
    document.getElementById('usu_pass').classList.remove('camp-error')
    document.getElementById('usu_pass_confirm').classList.remove('camp-error')

    if(nom.length < 3) {
        document.getElementById('usu_nom').classList.add('camp-error')
        esValid = false
    }

    if(pass.length < 6) {
        document.getElementById('usu_pass').classList.add('camp-error')
        esValid = false
    }

    if(confirm !== pass) {
        document.getElementById('usu_pass_confirm').classList.add('camp-error')
        esValid = false
    }

    if(!esValid) e.preventDefault()
})