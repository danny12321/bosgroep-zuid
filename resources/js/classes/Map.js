import LayerContainer from './Layer';

export default class Map {
    constructor(targetElement, lat, long) {
        this.lat = lat;
        this.long = long;
        this.targetElement = targetElement
        this.layers = [];
        this.map = this.createMap();

        this.inputs = document.querySelectorAll(".m-map--container__selections input");

        this.fillLayersFromHtml();
        this.setEventListeners();
        this.setInitalLayers();
    }

    setInitalLayers() {
        this.inputs.forEach(i => {
            //let checkboxes = document.getElementsByName(i.name);
            if(i.checked){
                this.map.addLayer(this.findLayer(i.value).layer)
            }
        });
            
    }

    setEventListeners() {
        this.inputs.forEach(i => {
            i.addEventListener('change', e => {

                if (e.target.checked) {
                    let checkboxes = document.getElementsByName(i.name);

                    for (let j = 0; j < checkboxes.length; ++j) {
                        checkboxes[j].checked = true;
                    }

                    this.map.addLayer(this.findLayer(i.value).layer)
                } else {
                    let checkboxes = document.getElementsByName(i.name);

                    for (let j = 0; j < checkboxes.length; ++j) {
                        checkboxes[j].checked = false;
                    }

                    this.map.removeLayer(this.findLayer(i.value).layer)
                }

            })
        })
    }

    fillLayersFromHtml() {
        this.inputs.forEach(i => {
            this.addLayer(i.value, 0.3);
        })
    }

    findLayer(layerName) {

        for (let i = 0; i < this.layers.length; i++) {
            if (this.layers[i].layerName == layerName) return this.layers[i];
        }
    }

    addLayer(layerName, opacity) {
        let layerContainer = new LayerContainer(layerName, opacity);
        this.layers.push(layerContainer);
    }

    createMap() {
        return new ol.Map({
            target: this.targetElement,
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([this.long, this.lat]),
                zoom: 10
            })
        });
    }
}