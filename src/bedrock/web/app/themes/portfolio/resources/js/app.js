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