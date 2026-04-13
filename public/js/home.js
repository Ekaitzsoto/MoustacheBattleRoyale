const friccion = 0.98; //1 = eterno, 0.95 = frena rápido
const objetos = [];

function crearObjetoFisico(el) {
    const obj = {
        el: el,
        posX: Math.random() * (window.innerWidth - 200),
        posY: Math.random() * (window.innerHeight - 200),
        velX: Math.random() * 10 - 5,
        velY: Math.random() * 10 - 5,
        isDragging: false,
        lastX: 0,
        lastY: 0
    };

    el.addEventListener('pointerdown', (e) => {
        obj.isDragging = true;
        obj.lastX = e.clientX;
        obj.lastY = e.clientY;
        el.setPointerCapture(e.pointerId);
        obj.velX = 0; // Detener al agarrar
        obj.velY = 0;
    });

    window.addEventListener('pointermove', (e) => {
        if (!obj.isDragging) return;
        const deltaX = e.clientX - obj.lastX;
        const deltaY = e.clientY - obj.lastY;
        obj.posX += deltaX;
        obj.posY += deltaY;
        obj.velX = deltaX; // Inercia de lanzamiento
        obj.velY = deltaY;
        obj.lastX = e.clientX;
        obj.lastY = e.clientY;
        actualizarPosicion(obj);
    });

    window.addEventListener('pointerup', () => obj.isDragging = false);
    objetos.push(obj);
}

function actualizarPosicion(obj) {
    obj.el.style.left = obj.posX + 'px';
    obj.el.style.top = obj.posY + 'px';
}

function loop() {
    objetos.forEach(obj => {
        if (!obj.isDragging) {
            // Aplicar velocidad
            obj.posX += obj.velX;
            obj.posY += obj.velY;

            // Aplicar fricción (frenado progresivo)
            obj.velX *= friccion;
            obj.velY *= friccion;

            // Si la velocidad es ínfima, la detenemos
            if (Math.abs(obj.velX) < 0.1) obj.velX = 0;
            if (Math.abs(obj.velY) < 0.1) obj.velY = 0;

            // Rebote bordes
            const rect = obj.el.getBoundingClientRect();
            if (obj.posX <= 0 || obj.posX + rect.width >= window.innerWidth) {
                obj.velX *= -0.8; // Pierde energía al rebotar
                obj.posX = obj.posX <= 0 ? 0 : window.innerWidth - rect.width;
            }
            if (obj.posY <= 0 || obj.posY + rect.height >= window.innerHeight) {
                obj.velY *= -0.8; // Pierde energía al rebotar
                obj.posY = obj.posY <= 0 ? 0 : window.innerHeight - rect.height;
            }

            actualizarPosicion(obj);
        }
    });
    requestAnimationFrame(loop);
}

// Inicializar elementos
crearObjetoFisico(document.getElementById('titulo'));

loop();