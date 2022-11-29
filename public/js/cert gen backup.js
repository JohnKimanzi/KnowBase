
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
const imageLoader = document.getElementById("uploader");
const reader = new FileReader();
const img = new Image();
const nameInput = document.getElementById('name');
const courseInput = document.getElementById('course');
const download_btn=document.getElementById('download-btn');
const draw2_btn=document.getElementById('draw2-btn');

var today = new Date();
var date = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();

const uploadImage = (e) => 
{
    reader.onload = () => 
    {
        image.onload = function () {
            draw()
        }
        
        img.src = reader.result;
    };
    reader.readAsDataURL(e.target.files[0]);
};

imageLoader.addEventListener("change", uploadImage);

function download() 
{
    const image = canvas.toDataURL();
    const link = document.createElement("a");
    link.href = image;
    link.download = "image.png";
    link.click();
}

function drawwwwwwwwwwwwwww() 
{
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
    ctx.font = ' bold 21px Lato';
    ctx.fillStyle = '#000033';
    ctx.fillText(date, 220, 425);
    ctx.textAlign = "center";
    ctx.fillText("Techno Brain BPO "+courseInput+" Course", 370, 400);
    ctx.fillStyle = '#de5602';
    ctx.font = '60px monotype corsiva';
    ctx.fillText(nameInput.value, 370, 315);
}

download_btn.addEventListener("click", download);
draw2_btn.addEventListener("click", draw);
nameInput.addEventListener('input',draw);
courseInput.addEventListener('input',draw);

function draw() 
{
    // ctx.clearRect(0, 0, canvas.width, canvas.height);
    const canvas = document.getElementById("canvas");
    const ctx = canvas.getContext("2d");
    const nameInput = document.getElementById('name');
    const image = new Image();
    image.src = '/img/cert.png';
    image.onload = function () 
    {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
        ctx.font = ' bold 21px Lato';
        ctx.fillStyle = '#000033';
        ctx.fillText(date, 220, 425);
        ctx.textAlign = "center";
        ctx.fillText("Techno Brain BPO "+courseInput+" Course", 370, 400);
        ctx.fillStyle = '#de5602';
        ctx.font = '60px monotype corsiva';
        ctx.fillText(nameInput.value, 370, 315);
    };
}
