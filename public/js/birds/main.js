jQuery(document).ready(function () {
    /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
    particlesJS.load('container', 'config.json', function() {
        console.log('callback - particles.js config loaded');
    });
});