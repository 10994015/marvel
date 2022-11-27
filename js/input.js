const student = document.getElementById('student');
const finish = document.getElementById('finish');
const name = document.getElementById('name');
const study = document.getElementsByClassName('study');
let studyChk = false;
student.addEventListener("keyup",()=>{
    chkFn();
});
name.addEventListener("keyup",()=>{
    chkFn();
});

for(let i=0;i<study.length;i++){
    study[i].addEventListener('change', chkStudy)
}


function chkStudy(){
    studyChk = false;
    for(let i=0;i<study.length;i++){
        if(study[i].checked){
            studyChk = true;
            console.log(true);
        }
    }
    chkFn();
}
function chkFn(){
    if(student.value!=="" && name.value!=="" && studyChk){
        finish.disabled  =false;
        finish.style.background = "#BF3434";
    }else{
        finish.disabled  =true;
        finish.style.background = "#ccc";
    }
}