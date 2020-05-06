import Answer from "./classes/Answer";
import SelectLayerModel from "./classes/SelectLayerModel";

let answers = [];
const answersInput = document.querySelector('#answers');
const form = document.querySelector('#question_form')
const layerModel = new SelectLayerModel();
const addAnswerButton = document.querySelector('#addAnswer');

document.querySelectorAll('.m-question--edit__answers .row').forEach(answer => {
    answers.push(
        new Answer(answer, layerModel)
    );
});

addAnswerButton.addEventListener('click', e => {
    e.preventDefault();
    answers.push(new Answer(null, layerModel));
});

form.onsubmit = (e) => {
    const data = [...answers.map(answer => answer.getData())];
    answersInput.value = JSON.stringify(data);
    return true;
}
