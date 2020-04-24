export default class MunicipalitySearchAutocomplete {
    constructor(input, itemsElement, municipalities) {
        this.input = input;
        this.itemsElement = itemsElement;
        this.municipalities = municipalities;

        this.maxShowingItems = 5;
        this.showingList = this.filterShowingList();
        this.activeItem = -1;

        this.input.addEventListener("focus", this.inputActive.bind(this));
        this.input.addEventListener("focusout", this.inputNotActive.bind(this));
        this.input.addEventListener("input", this.filterOnInput.bind(this));
        this.input.addEventListener("keydown", (e) => this.keyDown(e));

        this.itemsElement.addEventListener("mouseenter", () => {
            let old = this.activeItem;
            this.activeItem = -1;
            this.makeItemActive(old);
        })
    }

    filterShowingList() {
        let items = this.municipalities.slice(0, this.maxShowingItems);
        return items;
    }

    inputActive() {
        if(this.input.value) {
            this.filterOnInput();
        } else {
            this.input.classList.add("has-items");
            this.showItems(this.showingList);
        }
    }

    inputNotActive() {
        this.input.classList.remove("has-items");
        this.deleteItems();
    }

    showItems(items) {
        this.deleteItems();

        if(items.length) {
            this.input.classList.add("has-items");
            items.forEach(item => {
                this.itemsElement.insertAdjacentHTML('beforeend', 
                    `<a href="/gemeentes/${item.slug}">
                        <div class="l-home__header__filter__search__items__item">
                            <i class="fas fa-seedling"></i>
                            <h3>${item.name}</h3>
                        </div>
                    </a>`
                );
            });

            // This is here because <a> tags are on mouse up and they are deleted on mouse down
            [...this.itemsElement.children].forEach(i => {
                i.addEventListener("mousedown", () => {
                    window.location.href = i.href;
                })
            })
        } else {
            this.input.classList.remove("has-items");
        }
    }
    
    deleteItems() {
        this.itemsElement.innerHTML = "";
    }

    filterOnInput() {
        this.activeItem = -1;
        let input = this.input.value.toUpperCase();
        let items = this.municipalities.filter(m => m.name.toUpperCase().includes(input));
        this.showItems(items);
    }

    keyDown(e) {
        let items = this.itemsElement.children.length;
        switch (e.key) {
            case "ArrowDown":
                if(this.activeItem < items - 1) {
                    this.activeItem++;
                    this.makeItemActive(this.activeItem - 1);
                }
                break;
            case "ArrowUp":
                if(this.activeItem > 0) {
                    this.activeItem--;
                    this.makeItemActive(this.activeItem + 1);
                }
                break;
            case "Enter":
                window.location.href = this.itemsElement.children[this.activeItem].href;
                break;
        
            default:
                break;
        }
    }

    makeItemActive(old) {
        if(old >= 0) {
            this.itemsElement.children[old].querySelector("div").classList.remove("active");
        }
        if(this.activeItem >= 0) {
            this.itemsElement.children[this.activeItem].querySelector("div").classList.add("active");
        }
    }
}