import '../main';

const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d');
const letters = 'ABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZ';
const lettersArr = letters.split('');
const fontSize = 10; 
const drops = [];

canvas.width  = window.innerWidth;
canvas.height = window.innerHeight;

const columns = canvas.width / fontSize;

for (let i = 0; i < columns; i++){
  drops[i] = 1;
}

const draw = () =>{
  ctx.fillStyle = 'rgba(0, 0, 0, .1)';
  ctx.fillRect(0, 0, canvas.width, canvas.height);

  for (let i = 0; i < drops.length; i++){
    const txt = lettersArr[Math.floor(Math.random() * lettersArr.length)];
    ctx.fillStyle = '#0f0';
    ctx.fillText(txt, i * fontSize, drops[i] * fontSize);
    drops[i]++;
    if(drops[i] * fontSize > canvas.height && Math.random() > .95){
      drops[i] = 0;
    }
  }
}

setInterval(draw, 50)