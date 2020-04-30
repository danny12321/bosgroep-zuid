export default class Answer {
    constructor(element, layerModel) {
        this.element = element || this.createElement();
        this.selectedLayers = [];
        this.layersList = this.element.querySelector('.m-question--edit__answers__layers');

        this.layerModel = layerModel;
        this.input = this.element.querySelector('input');
        this.openLayers = this.element.querySelector('button');
        this.answer = this.input.value

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
        const container = document.querySelector('.m-question--edit__answers');
        const row = document.createElement('div');
        row.classList.add('row');

        row.insertAdjacentHTML('beforeend', `
                <div class= "col-md-10">
                    <input type="text" class="form-control" placeholder="Antwoord">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info">Selecteer lagen</button>
                </div>
                <div class="col-md-12">

                    <ul class="m-question--edit__answers__layers">
                    </ul>
                </div>
            `)

        container.appendChild(row);

        return row;
    }
}