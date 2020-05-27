import Map from './classes/Map';

let lat = document.querySelector(".m-php__lat").innerHTML;
let long = document.querySelector(".m-php__long").innerHTML;
let measures = JSON.parse(document.querySelector(".m-php__measures").innerHTML);
let allLayers = JSON.parse(document.querySelector(".m-php__layers").innerHTML);
const zoom = document.querySelector(".m-php__zoom").innerHTML;

new Map('map', lat, long, zoom, measures, allLayers);
