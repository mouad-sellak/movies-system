const VALIDERSTRING = (valeur, name)=> {
    let explication = document.querySelector(`#explication${name}`);
    let controle    = document.querySelector(`#controle${name}`);
    let regex = /[0-9._?!:;,]+/g;
    let verifString = regex.test(valeur.value);
    if(valeur.value.length < 3) {
        controle.innerHTML = '<i class="fas fa-exclamation-triangle"></i>';
        controle.classList.remove('vert');
        controle.classList.add('rouge');
        explication.innerText = "Le " +name.toLowerCase()+ " ne peut avoir moins de 3 caractères";
        explication.classList.add('rouge');
        valeur.classList.remove('bordureVert');
        valeur.classList.add('bordureRouge');
        return false;
    } else if(!verifString) {
        controle.innerHTML = '<i class="fas fa-check"></i>';
        controle.classList.remove('rouge');
        controle.classList.add('vert');
        explication.innerText = "";
        valeur.classList.remove('bordureRouge');
        valeur.classList.add('bordureVert');
        return true;
    } else {
        controle.innerHTML = '<i class="fas fa-exclamation-triangle"></i>';
        controle.classList.remove('vert');
        controle.classList.add('rouge');
        explication.innerText = "Le " +name.toLowerCase()+ " n'est pas correct";
        explication.classList.add('rouge');
        valeur.classList.remove('bordureVert');
        valeur.classList.add('bordureRouge');
        return false;
    }  
}

const VALIDERTEXT = (valeur, name)=> {
    let explication = document.querySelector(`#explication${name}`);
    let controle    = document.querySelector(`#controle${name}`);
    let regex = /[0-9._?!:;,]+/g;
    let verifString = regex.test(valeur.value);
    if(valeur.value.length < 10) {
        controle.innerHTML = '<i class="fas fa-exclamation-triangle"></i>';
        controle.classList.remove('vert');
        controle.classList.add('rouge');
        explication.innerText = "Le " +name.toLowerCase()+ " ne peut avoir moins de 10 caractères";
        explication.classList.add('rouge');
        valeur.classList.remove('bordureVert');
        valeur.classList.add('bordureRouge');
        return false;
    } else if(!verifString) {
        controle.innerHTML = '<i class="fas fa-check"></i>';
        controle.classList.remove('rouge');
        controle.classList.add('vert');
        explication.innerText = "";
        valeur.classList.remove('bordureRouge');
        valeur.classList.add('bordureVert');
        return true;
    } else {
        controle.innerHTML = '<i class="fas fa-exclamation-triangle"></i>';
        controle.classList.remove('vert');
        controle.classList.add('rouge');
        explication.innerText = "Le " +name.toLowerCase()+ " n'est pas correct";
        explication.classList.add('rouge');
        valeur.classList.remove('bordureVert');
        valeur.classList.add('bordureRouge');
        return false;
    }  
}

let form = document.querySelector('#box form');

form.nom.addEventListener('change', function() {
    VALIDERSTRING(this, 'Nom');
});
form.caracteristiques.addEventListener('change', function() {
    VALIDERTEXT(this,'Caracteristiques');
});
form.moteur.addEventListener('change', function() {
    VALIDERSTRING(this, 'Moteur');
});

form.addEventListener('change', function() {
    if(   VALIDERSTRING(form.nom, 'Nom') && VALIDERTEXT(form.caracteristiques, 'Caracteristiques') && VALIDERSTRING(form.moteur, 'Moteur') ) {
        let bouton = document.querySelector('#box button');
        bouton.removeAttribute('disabled');

    } 
});

