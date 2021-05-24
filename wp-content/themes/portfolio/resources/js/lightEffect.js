const torch = document.getElementsByClassName("torch")[0];
let torchWidth = torch.clientWidth;
let torchHeight = torch.clientHeight;
const torchLight = document.getElementsByClassName("torch__light")[0];
const torchHeader = document.getElementsByClassName('torch__header')[0];


function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
        left: rect.left + window.scrollX,
        top: rect.top + window.scrollY
    };
}

function handleLampMove (e) {
    const torchPosX = e.clientX - torchWidth;
    const torchPosY = e.clientY - torchHeight;

    torchLight.style.top = 0;
    torchLight.style.left = 0;
    torchLight.style.transform = `translate(${torchPosX}px, ${torchPosY}px)`;
};

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


const range = document.querySelector('#circle_size');
const checkbox = document.querySelector('#light_activate');
const optionBtn = document.querySelector('#optionBtn');

if (range.addEventListener) {
    range.addEventListener("click", changeTorchSize, false);
}
else if (range.attachEvent) {
    range.attachEvent('onclick', changeTorchSize);
}

function changeTorchSize() {
    torchLight.style.background = "radial-gradient(circle, rgba(255, 255, 255, 0) 0%, #000 " + range.value + "%)";
}

checkbox.addEventListener('change', function() {
    if (this.checked) {
        torch.classList.remove('no_torch');
    } else {
        torch.classList.add('no_torch');
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

const links = document.querySelectorAll('a');
let url = null;

torch.addEventListener('mousemove', function (e) {
    links.forEach(link => {
        if (e.pageX > getOffset(link).left && e.pageX < getOffset(link).left + link.offsetWidth && e.pageY > getOffset(link).top && e.pageY < getOffset(link).top + link.offsetHeight) {
            torch.style.cursor = 'pointer';
            link.focus()
        } else {
            link.blur()
            torch.style.cursor = 'default';
        }
    })
})

torch.addEventListener('click', function (e) {
    links.forEach(link => {
        if (e.pageX > getOffset(link).left && e.pageX < getOffset(link).left + link.offsetWidth && e.pageY > getOffset(link).top && e.pageY < getOffset(link).top + link.offsetHeight) {
            link.focus()
            window.location.href = link.href;
        }
    })
})
