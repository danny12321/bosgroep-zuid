import Map from './classes/Map';

let lat = document.querySelector(".m-php__lat").innerHTML;
let long = document.querySelector(".m-php__long").innerHTML;
let measures = JSON.parse(document.querySelector(".m-php__measures").innerHTML);
let allLayers = JSON.parse(document.querySelector(".m-php__layers").innerHTML);
new Map('map', lat, long, measures, allLayers);