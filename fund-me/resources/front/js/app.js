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

if (document.querySelector('.--tags')) {
    document.querySelectorAll('.--add--new')
        .forEach(i => {
        i.addEventListener('input', e => {
            axios.get(e.target.dataset.url + '?t=' + e.target.value)
                .then(res => {
                    i.closest('.--add').querySelector('.--tags--list').innerHTML = res.data.tags;
                    initTagList(i.closest('.--add').querySelector('.--tags--list')); 
                });
            });
            i.addEventListener('focus', e => {
                i.closest('.--add').querySelector('.--tags--list').style.display = 'block';
            });
            i.addEventListener('blur', e => {
                setTimeout(() => {
                e.target.value = '';
                i.closest('.--add').querySelector('.--tags--list').innerHTML = '';
                i.closest('.--add').querySelector('.--tags--list').style.display = 'none';
                }, 200);
            })
        })
}

const initTagList = tagList => {
    tagList.querySelectorAll('.--list-tag')
    .forEach(t => {
        t.addEventListener('click', _ => {
            axios.put(tagList.dataset.url, {tag: t.dataset.id})
            .then(res => {
                console.log(res.data)
            });
        });
    });
}