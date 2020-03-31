import Map from './classes/Map';

let lat = document.querySelector(".m-php__lat").innerHTML;
let long = document.querySelector(".m-php__long").innerHTML;

const map = new Map('map', lat, long);

// map.addLayer('biodiversiteithorst:Schimmels_std', 0.3)
// map.addLayer('biodiversiteithorst:Reptielen_std', 0.3)