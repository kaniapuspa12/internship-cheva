//dom selection
//document.getElementbyId() mengembalikan elemen
const judul = document.getElementById('judul');
judul.style.color='black';
judul.style.backgroundColor='salmon';
judul.innerHTML='Kania Puspa H.';

//document.getElementbytagname() -> HTML Collection


const h1 = document.getElementsByTagName('h1')[0];
h1.style.fontSize= '50px';

//document.getelementbyclassname() -> HTML Collection
const p1 = document.getElementsByClassName('p1')[0];


//document.queryselector() -> element




//document.querySelectorAll()


//dom manipulation
//BUAT ELEMEN BARU
const pBaru = document.createElement('p');
const teksPbaru = document.createTextNode('Paragraf Baru');
//simpan tulisan ke dalam paragraf
pBaru.appendChild(teksPbaru);
//simpan pbaru diakhir section a
const sectionA = document.getElementById('a');
sectionA.appendChild(pBaru);

const liBaru = document.createElement('li');
const liTeksBaru = document.createTextNode('Item Baru');
liBaru.appendChild(liTeksBaru);
const ul = document.querySelector('section#b ul');
const li2 = ul.querySelector('li:nth-child(2)');
ul.insertBefore(liBaru, li2);

const link = document.getElementsByTagName('a')[0];
sectionA.removeChild(link);
const sectionB = document.getElementById('b');
const p4 = sectionB.querySelector('p');
const h2Baru = document.createElement('h2');
const teksh2Baru = document.createTextNode('New Title');
h2Baru.appendChild(teksh2Baru);
sectionB.replaceChild(h2Baru,p4);

const p3 = document.querySelector('.p3');
p3.addEventListener('mouseenter',function() {
    p3.style.backgroundColor='yellow';

})

p3.addEventListener('mouseleave',function() {
    p3.style.backgroundColor='lightgreen';

})

const p2 = document.querySelector('.p2');
p2.addEventListener('click', function() {
    alert('ok')
});

const tUbahWarna = document.getElementById('tUbahWarna');
tUbahWarna.onclick = function() {
    document.body.classList.toggle('biru-muda');
}
const tAcakwarna = document.createElement('button');
const teksAcak = document.createTextNode('Acak Warna');
tAcakwarna.appendChild(teksAcak);
tAcakwarna.setAttribute('type','button');
tUbahWarna.after(tAcakwarna);


tAcakwarna.addEventListener('click', function() {
    const r = Math.round(  Math.random()*255+1);
    const g = Math.round(  Math.random()*255+1);
    const b = Math.round(  Math.random()*255+1);
   
    document.body.style.backgroundColor='rgb('+r+','+g+' ,'+b+')';
})







