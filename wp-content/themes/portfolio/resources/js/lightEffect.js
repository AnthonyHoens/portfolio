const torch = document.querySelector('.torch');
let torchWidth = torch.clientWidth;
let torchHeight = torch.clientHeight;
const torchLight = document.querySelector('.torch__light');
const torchHeader = document.querySelector('.torch__header');
const torchDiv = document.querySelector('.torch__img');

const range = document.querySelector('#circle_size');
const checkbox = document.querySelector('#light_activate');
const optionBtn = document.querySelector('#optionBtn');

const links = document.querySelectorAll('a');
const img = document.querySelector('.about__img_container');
const projectsSection = document.querySelectorAll('.project');

const imgClass = 'about__img_hover';
const projectClass = 'projects__project_hover';

const element = document.querySelectorAll(
        '.header h1,' +
                 '.header li a,' +
                 '.landing_page h1,' +
                 '.landing_page p,' +
                 '.landing_page a,' +
                 '.about h2 span,' +
                 '.about p span,' +
                 '.about img,' +
                 '.project__info_container,' +
                 '.project img,' +
                 '.footer a,' +
                 '.footer small');
let lightImg = [];

function createElementWhileLight(el) {
    const createElement = document.createElement('img');
    let widthHeight = null;
    createElement.style.position = 'absolute';
    createElement.style.zIndex = "10004";
    createElement.style.transition = 'opacity .3s ease';
    if (el.nodeName == 'IMG') {
        widthHeight = 40;
        createElement.style.width = widthHeight + 'px';
        createElement.style.height = widthHeight + 'px';
        createElement.src = 'https://anthony-hoens.be/wp-content/themes/portfolio/public/img/img_rect.svg'
    } else if (el.classList[0] == 'project__info_container') {
        widthHeight = 20;
        createElement.style.width = widthHeight + 'px';
        createElement.style.height = widthHeight + 'px';
        createElement.src = 'https://anthony-hoens.be/wp-content/themes/portfolio/public/img/rect.svg'
    } else {
        widthHeight = 10;
        createElement.style.width = widthHeight + 'px';
        createElement.style.height = widthHeight + 'px';
        createElement.src = 'https://anthony-hoens.be/wp-content/themes/portfolio/public/img/rect.svg'
    }
    createElement.style.top = getOffset(el).top + (el.offsetHeight/ 2) - (widthHeight / 2) + 'px';
    createElement.style.left = getOffset(el).left + (el.offsetWidth / 2) - (widthHeight / 2)  + 'px';


    torchDiv.appendChild(createElement)
    lightImg.push([createElement, el])
}

function changeElementWhileLightResize() {
    lightImg.forEach(img => {
        img[0].style.top = getOffset(img[1]).top + (img[1].offsetHeight/ 2) - (img[0].offsetHeight / 2) + 'px';
        img[0].style.left = getOffset(img[1]).left + (img[1].offsetWidth / 2) - (img[0].offsetWidth / 2) + 'px';
    })
}

function setSessionStorage() {
    sessionStorage.setItem('checked', checkbox.checked);
    sessionStorage.setItem('rangeCircle', range.value);
}

function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
        left: rect.left + window.scrollX,
        top: rect.top + window.scrollY
    };
}

function isCursorOnEl(e, el, radius = 0) {
    return e.pageX + (radius / 2) > getOffset(el).left && e.pageX - (radius / 2) < getOffset(el).left + el.offsetWidth && e.pageY + (radius / 2) > getOffset(el).top && e.pageY - (radius / 2) < getOffset(el).top + el.offsetHeight;
}

function handleLampMove (e) {
    const torchPosX = e.clientX - torchWidth;
    const torchPosY = e.clientY - torchHeight;

    torchLight.style.top = 0;
    torchLight.style.left = 0;
    torchLight.style.transform = `translate(${torchPosX}px, ${torchPosY}px)`;
};

function changeTorchSize() {
    torchLight.style.background = "radial-gradient(circle, rgba(255, 255, 255, 0) 0%, #000 " + range.value + "%)";
}


range.addEventListener("change", () => {
    setSessionStorage()
    changeTorchSize()
}, false);

checkbox.addEventListener('change', function() {
    setSessionStorage()
    if (torch.classList[1] == 'abs_no_torch') {
        torch.classList.remove('abs_no_torch')
    }
    if (this.checked) {
        element.forEach(el => {
            createElementWhileLight(el);
        })
        torch.classList.remove('no_torch')
    } else {
        lightImg.forEach(img => {
            img[0].remove()
        })
        lightImg = [];
        torch.classList.add('no_torch')
    }
}, false)



optionBtn.addEventListener('click', function () {
    if (torchHeader.classList[1] == 'torch__is_header') {
        torchHeader.classList.remove('torch__is_header');
    } else {
        torchHeader.classList.add('torch__is_header');
    }
})

document.addEventListener('click', function (e) {
    if (torchHeader.classList[1] == 'torch__is_header' && e.clientY > torchHeader.offsetTop + torchHeader.offsetHeight) {
        torchHeader.classList.remove('torch__is_header');
    }
})

torch.addEventListener('mousemove', function (e) {
    if (isCursorOnEl(e, img)) {
        img.classList.add(imgClass);
    } else {
        img.classList.remove(imgClass);
    }
    lightImg.forEach(img => {
        if (isCursorOnEl(e, img[0], (range.value * 30))) {
            img[0].style.opacity = '0';
        } else {
            img[0].style.opacity = '1';
        }
    })
    projectsSection.forEach(project => {
        if (isCursorOnEl(e, project)) {
            project.classList.add(projectClass);
        } else {
            project.classList.remove(projectClass);
        }
    })
    links.forEach(link => {
        if (isCursorOnEl(e, link)) {
            link.focus({preventScroll:true})
            torch.style.cursor = 'pointer';
        } else {
            link.blur()
            torch.style.cursor = 'default';
        }
    })
})

torch.addEventListener('click', function (e) {
    links.forEach(link => {
        if (isCursorOnEl(e, link)) {
            link.focus({preventScroll:true})
            window.location.href = link.href;
        }
    })
})

torch.addEventListener("mousemove", handleLampMove);
torch.addEventListener("touchstart", handleLampMove);
torch.addEventListener("touchend", handleLampMove);
torchHeader.addEventListener("mousemove", handleLampMove);
torchHeader.addEventListener("touchstart", handleLampMove);
torchHeader.addEventListener("touchend", handleLampMove);
optionBtn.addEventListener("mousemove", handleLampMove);
optionBtn.addEventListener("touchstart", handleLampMove);
optionBtn.addEventListener("touchend", handleLampMove);

window.addEventListener("resize", () => {
    changeElementWhileLightResize()
    torchWidth = torch.clientWidth;
    torchHeight = torch.clientHeight;
});

window.addEventListener('load', function(e) {
    let checkedValue = null;
    let rangeCircle = null;
    const sessionItemStorageChecked = JSON.parse(sessionStorage.getItem('checked'));
    const sessionItemStorageRange = JSON.parse(sessionStorage.getItem('rangeCircle'));

    if (sessionItemStorageChecked === true) {
        checkedValue = 'checked';
        rangeCircle = sessionItemStorageRange;
    } else {
        checkedValue = null;
        rangeCircle = sessionItemStorageRange;
    }

    checkbox.checked = checkedValue;
    range.value = rangeCircle;

    changeTorchSize()

    if (checkbox.checked) {
        element.forEach(el => {
            createElementWhileLight(el);
        })
        torch.classList.remove('abs_no_torch')
    } else {
        lightImg.forEach(img => {
            img[0].remove()
        })
        lightImg = [];
        torch.classList.add('abs_no_torch')
    }
}, false)
