import Rect from './parts/Rect';


const animation = {
    canvas: null,
    ctx : null,
    rects: [],
    frameCounter: 0,
    frameInterval: 50,


    init() {
        this.canvas = document.querySelector('#animation');
        this.ctx = this.canvas.getContext('2d');
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;

        this.update();
    },

    background(color) {
        this.ctx.beginPath()
        this.ctx.rect(0,0, this.canvas.width, this.canvas.height);
        this.ctx.fillStyle = color
        this.ctx.fill()
    },

    draw() {
        this.background('#272727')
    },

    update() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height)
        this.draw()

        if (this.frameCounter++ > this.frameInterval) {
            this.rects.push(new Rect(this))
            this.frameCounter = 0
        }

        this.rects.forEach(rect => {
            rect.update()

            if (rect.die()) {
                this.rects.splice(0, 1)
            }
        })

        window.addEventListener('resize', ()=> {
            this.canvas.width = window.innerWidth;
            this.canvas.height = window.innerHeight;

            this.rects.forEach(rect => {
                rect.resetLifetime();
            })
        })

        window.requestAnimationFrame(() => {
            this.update()
        })

    },

}

animation.init();




const torch = document.getElementsByClassName("torch")[0];
let torchWidth = torch.clientWidth;
let torchHeight = torch.clientHeight;
const torchLight = document.getElementsByClassName("torch__light")[0];
const torchHeader = document.getElementsByClassName('torch__header')[0];


const handleLampMove = e => {
    const torchPosX = e.clientX - torchWidth;
    const torchPosY = e.clientY - torchHeight;

    torchLight.style.top = 0;
    torchLight.style.left = 0;
    torchLight.style.transform = `translate(${torchPosX}px, ${torchPosY}px)`;
};

torch.addEventListener("mousemove", handleLampMove);
torch.addEventListener("touchstart", handleLampMove);
torch.addEventListener("touchend", handleLampMove);

window.addEventListener("resize", () => {
    torchWidth = torch.clientWidth;
    torchHeight = torch.clientHeight;
});


const range = document.querySelector('#circle_size');
const checkbox = document.querySelector('#light_activate');
const optionBtn = document.querySelector('#optionBtn');

if (range.addEventListener) {
    range.addEventListener("click", testtest, false);
}
else if (range.attachEvent) {
    range.attachEvent('onclick', testtest);
}

function testtest(e) {
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