const sample = document.getElementsByClassName('sample');
const addSemple = document.getElementById('addSemple');
const lotteryBtn = document.getElementById('lotteryBtn');
let sampleArr = [];
let lotteryNum = 0;
let winner = [];
const lotterySelect = document.getElementById('lotterySelect');
let randomNum = 0;
let winnerHtml = '';
const winnerList = document.getElementById('winnerList');
addSemple.addEventListener('click', ()=>{
    addSemple.classList.remove('btn-success');
    addSemple.classList.add('btn-secondary');
    addSemple.innerText = '重新加入';
    for(let i=0;i<sample.length;i++){
        sampleArr.push(sample[i].innerText);
    }
})

lotterySelect.addEventListener('change', ()=>{
    lotteryNum = lotterySelect.value;
})

lotteryBtn.addEventListener('click', ()=>{
    if (sampleArr.length == 0) return alert('人數不足，請加入樣本!');
    if (sampleArr.length < lotterySelect.value) return alert('人數不足!');
    for(let i=1;i<=lotteryNum;i++){
        randomNum =  getRandom(Number(sampleArr.length));
        winner.push(sampleArr[randomNum]);
        winnerHtml += `<div class="item"><b>${sampleArr[randomNum]}</b></div>`;
        sampleArr.splice(randomNum, 1);
    }
    winnerList.innerHTML = winnerHtml;
})

function getRandom(x){
    return Math.floor(Math.random()*x);
};
