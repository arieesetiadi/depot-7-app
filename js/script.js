let linkMakanan = document.getElementById('linkMakanan');
let linkMinuman = document.getElementById('linkMinuman');

let boxMakanan = document.getElementById('boxMakanan');
let boxMinuman = document.getElementById('boxMinuman');

linkMakanan.onclick = function(){
    boxMinuman.classList.add('display-none');
    boxMakanan.classList.remove('display-none');
};

linkMinuman.onclick = function(){
    boxMakanan.classList.add('display-none');
    boxMinuman.classList.remove('display-none');
};