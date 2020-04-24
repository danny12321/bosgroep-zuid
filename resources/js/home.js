import MunicipalitySearchAutocomplete from './classes/MunicipalitySearchAutocomplete';

const municipalities = JSON.parse(document.querySelector(".m-php__municipalities").innerHTML);
const searchInput = document.querySelector(".l-home__header__filter__search__input");
const itemsElement = document.querySelector(".l-home__header__filter__search__items");

new MunicipalitySearchAutocomplete(searchInput, itemsElement, municipalities);