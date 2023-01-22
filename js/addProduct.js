var loadFile = function (event) {
    const lavel__image = document.querySelector(".lavel__image");
    const lavel__icons = document.querySelector(".lavel__icons");
    lavel__image.src = URL.createObjectURL(event.target.files[0]);
    lavel__image.onload = function () {
        URL.revokeObjectURL(lavel__image.src) // free memory
        lavel__image.style.display = 'block';
        lavel__icons.style.display = 'none';
    }
};

const background = document.getElementById("upload");
const selected__color = document.querySelector('.picker__selector:checked');
const color__input = document.getElementById("color__input");
const color__picker = document.querySelectorAll(".picker__radio");
color__input.value = selected__color.value;
background.style.backgroundColor = color__input.value;

const log = document.getElementById('values');

color__input.addEventListener('input', updateValue);

function updateValue(e) {
    // log.textContent = e.target.value;
    background.style.backgroundColor = e.target.value;
    console.log(e.target.value)
}

let colors = document.add_product_form.color;
let color__value = null;
for (var i = 0; i < colors.length; i++) {
    colors[i].addEventListener('change', function () {
        if (this !== color__value) {
            color__value = this;
        }
        color__input.value = this.value;
        background.style.backgroundColor = color__input.value;
    });
}