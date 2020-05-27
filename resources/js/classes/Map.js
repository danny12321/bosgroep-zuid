import LayerContainer from './Layer';

export default class Map {
    constructor(targetElement, lat, long, zoom, measures, allLayers) {
        this.lat = lat;
        this.long = long;
        this.measures = measures;
        this.targetElement = targetElement
        this.layers = [];
        this.map = this.createMap(zoom);
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
            if (i.checked) {
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
        let measureBox = document.getElementsByClassName("m-map--container__measures").item(0);
        measureBox.innerHTML = "";
        let checklist = [];
        console.log(checklist)
        for(let i = 0; i < this.inputs.length; i++){
            if(this.inputs[i].checked == true){
                for(let j = 0; j< this.allLayers.length; j++){
                    if(this.inputs[i].name == this.allLayers[j].name){   
                        checklist.push(this.allLayers[j]);
                    }
                }
            }
        }
        let measurelist = [];
        for(let i =0; i< this.measures.length; i++){
            for(let j = 0; j< checklist.length; j++){
                if(this.measures[i].guidespecie_id == checklist[j].guidespecie_id && this.measures[i].guidespecie_id != null){
                    measurelist.push(this.measures[i]);
                }
                else if(this.measures[i].problem_id == checklist[j].problem_id && this.measures[i].problem_id != null){
                    measurelist.push(this.measures[i]);
                }
            }
            
        }
        let sortedMesures = new Set(measurelist);          
        const nextMeasure = sortedMesures.values()
        for(let i = 0; i < sortedMesures.size; i++){
            let measure = document.createElement("label");
            const measureLabel = nextMeasure.next();
            measure.innerText = " " + measureLabel.value.name + " - " + measureLabel.value.description + " "; 
            console.log(measureBox)         
            measureBox.appendChild(measure); 
        }

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

    createMap(zoom) {
        return new ol.Map({
            target: this.targetElement,
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([this.long, this.lat]),
                zoom
            })
        });
    }
}