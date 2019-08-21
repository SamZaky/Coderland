/*CUBE*/

let transform = 20;
const cube = document.querySelector('.cube');

cube.addEventListener('click' , e=>{
    transform +=90;
    cube.style.transform=`rotateY(-${transform}deg) rotateX(20deg)`;
});
/*CUBE*/