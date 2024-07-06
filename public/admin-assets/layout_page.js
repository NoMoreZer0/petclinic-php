var map = L.map('map').setView([40.712216, -74.22655], 20);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([51.5, -0.09]).addTo(map)
    .bindPopup('A pretty CSS popup.<br> Easily customizable.')
    .openPopup();
var imageUrl = 'http://www.lib.utexas.edu/maps/historical/newark_nj_1922.jpg',
    imageBounds = [[40.712216, -74.22655], [40.763941, -74.12544]];

L.imageOverlay(imageUrl, imageBounds).addTo(map);

map.addEventListener('click', function(event) {
    let popup = L.popup().setContent('<h1>You</h1> clicked the map at'+ event.latlng.toString())/*.openOn(map)*/;
    new L.Marker(event.latlng)
        .bindPopup(popup)
        .addTo(map)
        .openPopup()
})

$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]', html: true });
});
