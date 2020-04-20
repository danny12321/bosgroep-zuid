import Map from './classes/Map';

let lat = document.querySelector(".m-php__lat").innerHTML;
let long = document.querySelector(".m-php__long").innerHTML;

new Map('map', lat, long);