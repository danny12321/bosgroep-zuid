export default class LayerContainer {
    constructor(layerName, opacity) {
        this.layerName = layerName;
        this.opacity = opacity;
        this.layer = this.createLayer();
        this.layer.setOpacity(this.opacity)
    }

    createLayer() {
        return new ol.layer.Image({
            source: new ol.source.ImageWMS({
                url: 'http://gmd.has.nl:8080/geoserver/biodiversiteithorst/wms',
                params: {
                    'LAYERS': this.layerName 
                },
                serverType: 'geoserver'
            })
        })
    }
}