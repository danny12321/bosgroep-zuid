import LayerContainer from './Layer';

export default class Map {
    constructor(targetElement, lat, long, measures, allLayers) {
        this.lat = lat;
        this.long = long;
        this.measures = measures;
        this.targetElement = targetElement
        this.layers = [];
        this.map = this.createMap();
        this.allLayers = allLayers;

        this.inputs = document.querySelectorAll(".m-map--container__selections input");
        this.fillLayersFromHtml();
        this.setEventListeners();
        this.setInitalLayers();
        this.addMeasures();

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
                    this.addMeasures();
                } else {
                    let checkboxes = document.getElementsByName(i.name);

                    for (let j = 0; j < checkboxes.length; ++j) {
                       checkboxes[j].checked = false;
                    }
                    this.addMeasures();
                    this.map.removeLayer(this.findLayer(i.value).layer)
                }
            })
        })
    }

    addMeasures(){
        let measuresHTMLElements = document.querySelectorAll(".m-map--container__measures__measure");
        let measureHeader = document.querySelector(".m-map--container__measures__head");

        // Display none all
        measureHeader.style.display = 'none'
        measuresHTMLElements.forEach(el => {
            el.style.display = 'none'
        })

        let checklist = [];
        let measurelist = [];

        for(let i = 0; i < this.inputs.length; i++){
            if(this.inputs[i].checked == true) {
                for(let j = 0; j< this.allLayers.length; j++) {
                    if(this.inputs[i].name == this.allLayers[j].name) {   
                        checklist.push(this.allLayers[j]);
                    }
                }
            }
        }

        for(let i = 0; i < this.measures.length; i++){
            for(let j = 0; j< checklist.length; j++){
                if(this.measures[i].guidespecie_id == checklist[j].guidespecie_id && this.measures[i].guidespecie_id != null){
                    measurelist.push(this.measures[i]);
                }
                else if(this.measures[i].problem_id == checklist[j].problem_id && this.measures[i].problem_id != null){
                    measurelist.push(this.measures[i]);
                }
            }
        }

        measurelist.map(measure => {
            return measure.id
        }).forEach(id => {
            measuresHTMLElements.forEach(el => {
                measureHeader.style.display = 'block'
                if(id == el.getAttribute('data-measure')) {
                    el.style.display = 'block'
                }
            });
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