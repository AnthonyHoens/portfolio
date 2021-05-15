export default class Rect {
    constructor(animation) {
        this.animation = animation
        this.lifetime = this.animation.canvas.width / 2.4
        this.width = 200 + Math.random() * 200
        this.height = 10 + Math.random() * 20
        this.angle = -30
        this.speed = this.width / this.animation.canvas.width * 20
        this.opacity = 0.6
        this.maxOpacity = 1 - this.opacity
        this.x = -this.width
        this.y = this.height + Math.random() * (this.animation.canvas.height * 2.3)
        this.colors = [
            'rgba(27, 130, 132,' + (this.opacity + Math.random() * this.maxOpacity)  + ')',
            'rgba(255, 255, 255,' + (this.opacity + Math.random() * this.maxOpacity)  + ')',
            'rgba(179, 254, 255,' + (this.opacity + Math.random() * this.maxOpacity)  + ')',
        ];
        this.color = this.colors.sort(() => 0.5 - Math.random())[0]
    }

    roundRect(x, y, w, h, radius) {
        const r = x + w;
        const b = y + h;
        this.animation.ctx.beginPath();
        this.animation.ctx.shadowColor = this.color;
        this.animation.ctx.shadowOffsetX = 0;
        this.animation.ctx.shadowOffsetY = 0;
        this.animation.ctx.shadowBlur = 10;
        this.animation.ctx.fillStyle = this.color;
        this.animation.ctx.moveTo(x+radius, y);
        this.animation.ctx.lineTo(r-radius, y);
        this.animation.ctx.quadraticCurveTo(r, y, r, y+radius);
        this.animation.ctx.lineTo(r, y+h-radius);
        this.animation.ctx.quadraticCurveTo(r, b, r-radius, b);
        this.animation.ctx.lineTo(x+radius, b);
        this.animation.ctx.quadraticCurveTo(x, b, x, b-radius);
        this.animation.ctx.lineTo(x, y+radius);
        this.animation.ctx.quadraticCurveTo(x, y, x+radius, y);
        this.animation.ctx.fill();
    }


    render() {
        this.animation.ctx.save()
        this.animation.ctx.translate(this.x, this.y)
        this.animation.ctx.rotate(this.angle * Math.PI / 180)

        this.roundRect(0,0, this.width, this.height, 5)
        this.animation.ctx.restore()
    }

    update() {
        this.x += this.speed
        this.y += -this.speed * (-this.angle / 45)
        this.lifetime--

        this.render()
    }

    die() {
        if(this.lifetime < 0) {
            return true
        } else {
            return false
        }
    }
}