export default class SelectLayerModel {
    constructor() {
        this.activeAnswerClass = null;

        this.model = document.querySelector('.m-question__edit__layer--select');
        this.model.addEventListener('click', this.close.bind(this));

        this.layers = [...this.model.querySelectorAll('.m-question__edit__layer--select__form__selection input')];

        this.model.querySelector('#saveSelection').addEventListener('click', this.handleSubmit.bind(this));
    }

    handleSubmit() {
        let selectedLayers = [
            ...this.layers.filter(layer => layer.checked).map(layer => {
                return {
                    id: layer.id,
                    name: layer.value
                }
            })
        ]

        this.activeAnswerClass.setLayers(selectedLayers);
        this.close()
    }

    resetForm() {
        this.layers.forEach(layer => {
            layer.checked = false;
        });
    }

    open(AnswerClass) {
        this.layers.forEach(layer => {
            layer.checked = AnswerClass.selectedLayers.find(l => l.id === layer.id);
        });

        this.model.classList.add('active');
        this.activeAnswerClass = AnswerClass;
    }

    close(e) {
        if (!e || e.target === this.model) {
            this.model.classList.remove('active');
            this.resetForm();
            this.activeAnswerClass = null;
        }
    }
}