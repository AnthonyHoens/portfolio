const contactLink = document.querySelectorAll('.contact__form')
const contactContainer = document.querySelector('#contact');
const closeBtn =  document.querySelector('.contact__close');
const formInput = document.querySelectorAll('#contact input');
const formTextarea = document.querySelector('#contact textarea');
const btnPath = document.querySelector('#btnPath');

const siteUrl = window.location.protocol + '//' + window.location.hostname + window.location.pathname;
const contactUrl = siteUrl + '#contact';


function verifyField(input) {
    if(input.type == 'text') {
        if(!input.value) {

        }
    }
    if(input.type == 'email') {

    }
}


// Event

formInput.forEach(input => {
    input.addEventListener('focus', function () {
        if (window.location.href != contactUrl) {
            window.location.href = contactUrl
            input.focus()
        }
        input.addEventListener('keydown', function () {
            verifyField(input)
        })
    }, false)
})


closeBtn.addEventListener('focus', function () {
    btnPath.fill = '#1B8284';
    if (window.location.href != contactUrl) {
        window.location.href = contactUrl
        closeBtn.focus()
    }
})

formTextarea.addEventListener('focus', function () {
    if (window.location.href != contactUrl) {
        window.location.href = contactUrl
        formTextarea.focus()
    }
}, false)

document.addEventListener('click', function (event) {
    if (window.location.href == contactUrl) {
        if (event.clientX > contactContainer.offsetLeft && event.clientX < contactContainer.offsetLeft + contactContainer.offsetWidth && event.clientY > contactContainer.offsetTop && event.clientY < contactContainer.offsetTop + contactContainer.offsetHeight) {
        } else {
            window.location.href = siteUrl + '#';
        }
    }
})



