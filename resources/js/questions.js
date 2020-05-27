import Answer from "./classes/Answer";
import SelectLayerModel from "./classes/SelectLayerModel";

let answers = [];
const answersInput = document.querySelector('#answers');
const form = document.querySelector('#question_form')
const layerModel = new SelectLayerModel();
const addAnswerButton = document.querySelector('#addAnswer');

const remove = answer => {
    const index = answers.findIndex(a => a === answer);

    if (index > -1) {
        answers.splice(index, 1);
    }
}

document.querySelectorAll('.m-question__edit__answers .row').forEach(answer => {
    answers.push(
        new Answer(answer, layerModel, remove)
    );
});

addAnswerButton.addEventListener('click', e => {
    e.preventDefault();
    answers.push(new Answer(null, layerModel, remove));
});

form.onsubmit = (e) => {
    const data = [...answers.map(answer => answer.getData())];
    answersInput.value = JSON.stringify(data);
    return true;
}
