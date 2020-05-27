export default class Answer {
    constructor(element, layerModel, remove) {
        this.remove = remove;
        this.element = element || this.createElement();
        this.selectedLayers = this.getSelectedLayers();
        this.layersList = this.element.querySelector('.m-question__edit__answers__layers');

        this.layerModel = layerModel;
        this.input = this.element.querySelector('input');
        this.openLayers = this.element.querySelector('#openLayers');
        this.removeAnswer = this.element.querySelector('#removeAnswer');

        this.answer = this.input.value

        
        this.removeAnswer.addEventListener('click', this.handleRemoveAnswer.bind(this));
        this.openLayers.addEventListener('click', this.handleOpenForm.bind(this));
        this.input.addEventListener('change', this.handleChangeAnswer.bind(this));
    }

    handleChangeAnswer(e) {
        this.answer = e.target.value;
    }

    handleOpenForm(e) {
        e.preventDefault()
        this.layerModel.open(this)
    }

    getData() {
        return {
            answer: this.answer,
            layers: this.selectedLayers
        }
    }

    getSelectedLayers() {
        const layers = [...[...this.element.querySelectorAll('.m-question__edit__answers__layers li')].map(layer => {
            return {
                id: layer.getAttribute('data-layer-id'),
            }
        })]

        return layers
    }

    handleRemoveAnswer(e) {
        e.preventDefault()

        this.element.remove()
        this.remove(this);
    }

    setLayers(layers) {
        this.selectedLayers = layers;

        while (this.layersList.lastElementChild) {
            this.layersList.removeChild(this.layersList.lastElementChild);
        }

        this.selectedLayers.forEach(layer => {
            this.layersList.insertAdjacentHTML('beforeend', `
                <li>
                    ${layer.name}
                </li>
            `)
        })
    }

    createElement() {
        const container = document.querySelector('.m-question__edit__answers');
        const row = document.createElement('div');
        row.classList.add('row');

        row.insertAdjacentHTML('beforeend', `
                <div class= "col-md-10">
                    <input type="text" class="form-control" placeholder="Antwoord">
                </div>
                <div class="col-md-2 flex">
                    <button id="openLayers" class="btn btn-info">Selecteer lagen</button>
                    <button id="removeAnswer" class="btn btn-danger">Verwijder</button>
                </div>
                <div class="col-md-12">

                    <ul class="m-question__edit__answers__layers">
                    </ul>
                </div>
            `)

        container.appendChild(row);

        return row;
    }
}