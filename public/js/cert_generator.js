const nameInput = document.getElementById('name');
const courseInput = document.getElementById('course');
const download_btn=document.getElementById('download-btn');
const draw_btn=document.getElementById('draw-btn');
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
// const showCertBtn= document.getElementById('show-cert-btn');

var today = new Date();
var date = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();

download_btn.addEventListener("click", download);
draw_btn.addEventListener("click", draw);
nameInput.addEventListener('input',draw);
// showCertBtn.addEventListener('click',draw);
// courseInput.addEventListener('input',draw);

function draw() 
{   
    //image initialization shouldbe outside function to reduce server load
    //tried puting  it outside but for some reason its not working
    const image = new Image();
    image.src = '/img/cert.png';
    image.onload = function () 
    {
        // ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
        ctx.font = ' bold 21px Lato';
        ctx.fillStyle = '#000033';
        ctx.textAlign = "left";
        ctx.fillText(date, 220, 425);
        ctx.textAlign = "center";
        ctx.fillText("Techno Brain BPO "+courseInput.value+" Course", 370, 400);
        ctx.fillStyle = '#de5602';
        ctx.textAlign = "center";
        ctx.font = '60px monotype corsiva';
        ctx.fillText(nameInput.value, 370, 315);
    };
}
function download() 
{
    const image = canvas.toDataURL();
    const link = document.createElement("a");
    link.href = image;
    link.download = "image.png";
    link.click();
}