'use strict';

let pics = document.querySelectorAll('#pic');

pics.forEach((pic) => {
    pic.addEventListener('click', (e) => {
        let nextIndex;
        let pictures = e.target.parentNode.querySelectorAll('img');
        for(let i=0; i<pictures.length; i++) {
            if (i < pictures.length-1) {
                nextIndex = i+1;
            } else {
                nextIndex = 0;
            };
            if (!(pictures[i].classList.contains('is-hidden'))) {
                pictures[i].classList.add('is-hidden');
                pictures[nextIndex].classList.remove('is-hidden');
                break;
            }
        }
    });
});