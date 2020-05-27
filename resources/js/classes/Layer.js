export default class LayerContainer {
    constructor(layerName, opacity, url_geoserver) {
        this.layerName = layerName;
        this.opacity = opacity;
        this.url_geoserver = url_geoserver;
        this.layer = this.createLayer();
        this.layer.setOpacity(this.opacity)
    }

    createLayer() {
        return new ol.layer.Image({
            source: new ol.source.ImageWMS({
                url: `${this.url_geoserver}`,
                params: {
                    'LAYERS': this.layerName 
                },
                serverType: 'geoserver'
            })
        })
    }
}