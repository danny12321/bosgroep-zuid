import LayerContainer from './Layer';

export default class Map {
    constructor(targetElement, lat, long) {
        this.lat = lat;
        this.long = long;
        this.targetElement = targetElement
		this.layers = [];
        this.map = this.createMap();
    }

    addLayer(layerName, opacity) {
        let layerContainer = new LayerContainer(layerName, opacity);
        this.layers.push(layerContainer);
        this.map.addLayer(layerContainer.layer)
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