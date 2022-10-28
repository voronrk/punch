'use strict';

const viewMoreToggle = document.querySelectorAll('.field-view-more');
const form = document.querySelector('#filter');
const allInputs = form.querySelectorAll('input');

let arFilter = {};
let arData = [];

viewMoreToggle.forEach(element => {
    element.addEventListener('click', () => {
        element.parentNode.children[1].classList.toggle('field-wrapper-small');
        element.parentNode.children[1].classList.toggle('field-wrapper-full');
        element.innerHTML=='Показать еще' ? element.innerHTML='Скрыть' : element.innerHTML='Показать еще';
    });
});

allInputs.forEach(element => {
    if (element.type=='checkbox') {
        element.addEventListener('change', () => {
            if (element.checked) {
                if (arFilter[element.parentNode.parentNode.parentNode.id]) {
                    arFilter[element.parentNode.parentNode.parentNode.id].push(element.id);
                } else {
                    arFilter[element.parentNode.parentNode.parentNode.id] = [element.id];
                };
            } else {
                arFilter[element.parentNode.parentNode.parentNode.id].splice(arFilter[element.parentNode.parentNode.parentNode.id].indexOf(element.id),1);
                if (arFilter[element.parentNode.parentNode.parentNode.id].length==0) {
                    delete arFilter[element.parentNode.parentNode.parentNode.id];
                };
            };
            console.log(arFilter);
        });
    };
    // if ((element.type=='text') || (element.type=='number')) {
    //     element.addEventListener('input', () => {
    //         if ((element.value=='') || (element.value==0)) {
    //             delete arFilter[element.id];
    //         } else {
    //             if (element.type=='text') {
    //                 arFilter[element.id] = [element.value];
    //             } else {
    //                 arFilter[element.id] = [+element.value];
    //             };
    //         };
    //         console.log(arFilter);
    //     });
    // };
});

