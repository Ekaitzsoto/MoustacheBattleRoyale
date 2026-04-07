@extends("layouts.base", ['hideFooter' => true])

@section("contenido")
<style>
    
    .fisico {
        position: absolute;
        cursor: grab;
        user-select: none;
        touch-action: none;
        z-index: 100;
        will-change: transform, left, top;
    }

    .fisico:active {
        cursor: grabbing;
    }

    .titulo-contenedor {
        display: inline-block;
        text-align: center;
        pointer-events: auto;
    }

    @keyframes heartbeat {
        0%, 45%, 100% { transform: scale(0.75); }
        10% { transform: scale(0.95); }
        20% { transform: scale(0.80); }
        30% { transform: scale(1); }
    }

    .titulo-presentacion-zoom {
        font-size: 200%;
        font-family: 'Press Start 2P';
        color: #00f7ff !important;
        text-align: center;
        text-transform: uppercase;
        animation: heartbeat 1s ease-in-out infinite;
        margin: 0;
    }
</style>

<div id="titulo" class="fisico titulo-contenedor">
    <h1 class="titulo-presentacion-zoom">
        MOUSTACHE<br>BATTLE ROYALE
    </h1>
</div>

<script>
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
</script>
@endsection