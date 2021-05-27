export default class ImgEffect {
    constructor(animation, left, top, width, height) {
        this.animation = animation
        this.ctx = this.animation.ctx
        this.width = 4
        this.height = 4
        this.x = left + (width / 2)
        this.y = top + (height / 2)
    }

    color(opacity) {
        return "rgba(179, 254, 255, " + opacity + ")"
    }

    render() {
        this.ctx.shadowColor = this.color(0.25)
        this.ctx.shadowOffsetX = 0;
        this.ctx.shadowOffsetY = 0;
        this.ctx.shadowBlur = 2;
        this.ctx.fillStyle = this.color(1)
        this.ctx.rect(this.x, this.y, this.width, this.height)
        this.ctx.fill()
    }

    update() {
        this.render()
    }
}