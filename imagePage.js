

function showNewImageForm() {

    if (document.getElementById('newImageForm').style.animationName == 'hideNewImageForm') {

        document.getElementById('newImageForm').style.animationName = 'showNewImageForm'
        document.getElementById('newImageForm').style.display = "block";

    }
    else if (document.getElementById('newImageForm').style.animationName == 'showNewImageForm') {

        document.getElementById('newImageForm').style.animationName = 'hideNewImageForm';
        window.setTimeout(hideNewImageForm, 800);

    }
}
function hideNewImageForm() {
    document.getElementById('newImageForm').style.display = "none";
    document.getElementById('newImageForm').style.animationName == 'none';
}



function expandImg(imgNum) {
    if (document.getElementById("image" + imgNum).style.animationName === 'none') {
        document.getElementById("image" + imgNum).style.animationName = 'imgGrow';
    }
    else if (document.getElementById("image" + imgNum).style.animationName === 'imgShrink') {
        document.getElementById("image" + imgNum).style.animationName = 'imgGrow';
    }
    else if (document.getElementById("image" + imgNum).style.animationName === 'imgGrow') {
        document.getElementById("image" + imgNum).style.animationName = 'imgShrink'
    }
}

function details() {

}



