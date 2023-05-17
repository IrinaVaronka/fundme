import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

if (document.querySelector('.--add--gallery')) {

    let g = 0;

document.querySelector('.--add--gallery')
.addEventListener('click', _ => {
   const input = document.querySelector('[data-gallery="0"]').cloneNode(true);
   g++;
   input.dataset.gallery = g;
   input.querySelector('input').setAttribute('name', 'gallery[]');
   input.querySelector('span')
    .addEventListener('click', e => {
        e.target.closest('.col-md-12').remove();
    });

   document.querySelector('.gallery-inputs').append(input);
})
}

document.querySelectorAll('.hearts input')
    .forEach(i => {
        i.addEventListener('change', _ => {
            const star = i.dataset.heart;
            const isChecking = i.checked;

            if (isChecking) {
                i.closest('.hearts').querySelectorAll('input')
                    .forEach(s => s.dataset.heart <= heart ? s.checked = true : s.checked = false);
            } else {
                i.closest('.hearts').querySelectorAll('input')
                    .forEach(s => s.dataset.heart >= heart ? s.checked = false : s.checked = true);
            }
            
        });
    });

