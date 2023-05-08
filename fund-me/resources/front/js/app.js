import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


document.querySelectorAll('.--donate').forEach(section => {
    section.querySelector('button').addEventListener('click', _ => {
        const data = {};
        section.querySelectorAll('input').forEach(input => {
            data[input.getAttribute('name')] = input.value;
        });

        axios.put(section.dataset.url, data)
        .then(res => {
            console.log(res.data);
            document.querySelector('.--sum').innerText = res.data.sum;
            document.querySelector('.--total').innerText = res.data.total.toFixed(2);
        });
        
                
    });
});