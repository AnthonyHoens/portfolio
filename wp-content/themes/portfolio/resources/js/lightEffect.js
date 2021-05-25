const torch = document.getElementsByClassName("torch")[0];
let torchWidth = torch.clientWidth;
let torchHeight = torch.clientHeight;
const torchLight = document.getElementsByClassName("torch__light")[0];
const torchHeader = document.getElementsByClassName('torch__header')[0];

const range = document.querySelector('#circle_size');
const checkbox = document.querySelector('#light_activate');
const optionBtn = document.querySelector('#optionBtn');

const links = document.querySelectorAll('a');
const img = document.querySelector('.about__img_container');
const projectsSection = document.querySelectorAll('.project');

const imgClass = 'about__img_hover';
const projectClass = 'projects__project_hover';

function setSessionStorage() {
    sessionStorage.setItem('checked', checkbox.checked);
}

function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
        left: rect.left + window.scrollX,
        top: rect.top + window.scrollY
    };
}

function isCursorOnEl(e, el) {
    return e.pageX > getOffset(el).left && e.pageX < getOffset(el).left + el.offsetWidth && e.pageY > getOffset(el).top && e.pageY < getOffset(el).top + el.offsetHeight;
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


range.addEventListener("change", changeTorchSize, false);

checkbox.addEventListener('change', function(e) {
    setSessionStorage()
    if (torch.classList[1] == 'abs_no_torch') {
        torch.classList.remove('abs_no_torch')
    }
    if (this.checked) {
        torch.classList.remove('no_torch')
    } else {
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

window.addEventListener("resize", () => {
    torchWidth = torch.clientWidth;
    torchHeight = torch.clientHeight;
});

window.addEventListener('load', function(e) {
    let checkedValue = null;
    const sessionItemStorageChecked = JSON.parse(sessionStorage.getItem('checked'));

    if (sessionItemStorageChecked === true) {
        checkedValue = 'checked';
    } else {
        checkedValue = null;
    }

    checkbox.checked = checkedValue;

    if (checkbox.checked) {
        torch.classList.remove('abs_no_torch')
    } else {
        torch.classList.add('abs_no_torch')
    }
}, false)
