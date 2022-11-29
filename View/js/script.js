var click, clickCad, clickConfirm, fav, playbtn, audio, pausebtn, createFav;

//playbtn = document.querySelector(".playbtn0");
//pausebtn = document.querySelector(".pausebtn0");

audio = document.querySelector(".audio");


for (i=0;i<=20;i++) {
    document.querySelector(".playbtn" + i).addEventListener("click", function () {
        console.log("play");
        audio.play();
    });

    document.querySelector(".pausebtn" + i).addEventListener("click", function () {
        console.log("pausou");
        audio.pause();
    });
}

/*pausebtn.addEventListener("click", function () {
    console.log("pausou");
    audio.pause();
});

playbtn.addEventListener("click", function () {
    console.log("play");

    audio.play();
    audio.volume = 0.2;
    //this.style.display = "none";
});*/



//createFav = document.querySelector("#createFav");
//createFav.addEventListener("click", function () {
//alert("Favoritas criada com sucesso!")
//});

//fav = document.querySelector(".favButton");

//console.log(fav);

//fav.addEventListener("click", function () {
//console.log("clicou");
//console.log(this);
//alert("Música adicionada aos favoritos 🤩");

//this.src = "./img/icons/heart-fill.png";

//});

function loginsenha() {
    if (click == 1) {
        document.getElementById('loginSenha').type = 'password';
        document.getElementById('pass-icon').src = './img/icons/invisible.png';

        click = 0;

    }
    else {
        document.getElementById('loginSenha').type = 'text';
        document.getElementById('pass-icon').src = './img/icons/visible.png';

        click = 1;
    }
}

function senhacad() {
    if (clickCad == 1) {
        document.getElementById('senhaCad').type = 'password';
        document.getElementById('pass-icon2').src = './img/icons/invisible.png';

        clickCad = 0;
    }
    else {
        document.getElementById('senhaCad').type = 'text';
        document.getElementById('pass-icon2').src = './img/icons/visible.png';

        clickCad = 1;
    }
}

function senhaconfirm() {
    if (clickConfirm == 1) {
        document.getElementById('senhaConfirm').type = 'password';
        document.getElementById('pass-icon3').src = './img/icons/invisible.png';

        clickConfirm = 0;

    } else {
        document.getElementById('senhaConfirm').type = 'text';
        document.getElementById('pass-icon3').src = './img/icons/visible.png';

        clickConfirm = 1;
    }
}