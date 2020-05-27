import Map from './classes/Map';

const form = document.querySelector('#municipality-form');
const latInput = document.querySelector('#lat');
const longInput = document.querySelector('#long');
const zoomInput = document.querySelector('#zoom');
const map = new Map('map', latInput.value || 52.1667267, longInput.value || 5.4247104, zoomInput.value || 7.2);


form.onsubmit = e => {
    const coords = ol.proj.transform(map.map.getView().getCenter(), 'EPSG:3857', 'EPSG:4326');

    latInput.value = coords[1];
    longInput.value = coords[0];
    zoomInput.value = map.map.getView().getZoom();

    return true;
}