let temp = document.getElementsByClassName('item');

for (let i = 0; i < temp.length; i++) {
    temp[i].addEventListener('mouseenter', () => {
        temp[i].querySelector('.btn').style.backgroundColor = '#ffb718';
        temp[i].querySelector('.btn').style.color = 'black';
        temp[i].querySelector('.desc').style.opacity = '1';
        temp[i].querySelector('.desc').style.backdropFilter = 'blur(10px)';
    });

    temp[i].addEventListener('mouseleave', () => {
        temp[i].querySelector('.btn').style.backgroundColor = 'transparent';
        temp[i].querySelector('.btn').style.color = '#ffb718';
        // temp[i].querySelector('.desc').style.transform = 'translateY(100%)';
        temp[i].querySelector('.desc').style.opacity = '0';
        temp[i].querySelector('.desc').style.backdropFilter = 'none';
    });
}

function goto(type, id) {
    document.location.href = "http://pizza.apeps.pp.ua/delivery/" + type + '/' + id;
}

let t = document.querySelector('.postheader').querySelectorAll('.nav');
let cont = [document.querySelector('.pizza'), document.querySelector('.snack'),
    document.querySelector('.salad'), document.querySelector('.main'),
    document.querySelector('.dessert'), document.querySelector('.drink')];

for (let i = 0; i < t.length; i++) {
    t[i].addEventListener('click', () => {
        for (let j = 0; j < cont.length; j++){
            if(j !== i) cont[j].style.display = 'none';
            else cont[j].style.display = 'grid';
        }
    })
}
