import './bootstrap';
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

document.addEventListener('gesturestart', function (e) {
    e.preventDefault();
    document.body.style.zoom = 1;
});
