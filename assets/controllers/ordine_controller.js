import { Controller } from '@hotwired/stimulus';

let customerSelect;

export default class extends Controller {
    static targets = ["customer"];

    connect() {
        // this.element.textContent = 'Hello Stimulus! Edit me in assets/controllers/ordine_controller.js';

        document.addEventListener("DOMContentLoaded", (e) => {
            customerSelect = this.customerTarget.tomselect;
            // const myModal = new bootstrap.Modal('#modal-insert-item',{});
            customerSelect.settings.create = true;
            customerSelect.settings.createOnBlur = true;
            customerSelect.on("option_add", (value, data) => {
                console.log(value, data);
                // myModal.toggle();
            });
        });
    }
}
