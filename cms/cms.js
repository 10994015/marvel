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
const score5View = document.getElementById('score5View');
const score4View = document.getElementById('score4View');
const score3View = document.getElementById('score3View');
const score2View = document.getElementById('score2View');
const score1View = document.getElementById('score1View');
const scoreModalback = document.getElementsByClassName('scoreModalback');
const colorArr = ['#aeb200', '#03b200', '#00b2b2', '#0300b2', '#ae00b2'];
let times = 1;
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
    winnerHtml += `<p>第${arabicToChinese(times)}次:</p>`;
    for(let i=1;i<=lotteryNum;i++){
        randomNum =  getRandom(Number(sampleArr.length));
        winner.push(sampleArr[randomNum]);
        winnerHtml += `<div class="item"><b style='color:${colorArr[times%5]}'>${sampleArr[randomNum]}</b></div>`;
        sampleArr.splice(randomNum, 1);
    }
    winnerList.innerHTML = winnerHtml;
    times ++;
})

function getRandom(x){
    return Math.floor(Math.random()*x);
};

score5View.addEventListener('click', viewScoreModalFn);
score4View.addEventListener('click', viewScoreModalFn);
score3View.addEventListener('click', viewScoreModalFn);
score2View.addEventListener('click', viewScoreModalFn);
score1View.addEventListener('click', viewScoreModalFn);

function viewScoreModalFn(e){
    let num = e.target.id.split('core')[1].split('V')[0];
    console.log(num);
    document.getElementById(`score${num}`).style.display = "flex";
}

for(let i=0;i<scoreModalback.length;i++){
    scoreModalback[i].addEventListener('click', closeScoreModal)
}
function closeScoreModal(e){
    e.target.parentNode.style.display = "none";
}

function arabicToChinese(number) {
    var chineseNumbers = ['零', '一', '二', '三', '四', '五', '六', '七', '八', '九'];
    var str = number.toString();
    var chineseStr = '';

    for (var i = 0; i < str.length; i++) {
        chineseStr += chineseNumbers[parseInt(str[i])];
    }

    return chineseStr;
}
