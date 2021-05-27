function goto(type, id) {
    document.location.href = 'http://pizza.apeps.pp.ua/delivery/' + type + '/' + id;
}

let id = 0;
let item = 0;
let weight = 0;
let price = 0;
let wp = [];

let add = document.querySelector('.btn1');
add.addEventListener('click', () => {
    let tempPrice = item.price;
    let ingredient = [];
    for (let i = 0; i < items.length; i++) {
        let e = items[i];
        if (e.classList.contains('active')) {
            tempPrice += wp[i].price;
            ingredient.push(i + 1);
        }
    }
    if (JSON.parse(getCookie('order')) === null) {
        let order = {
            count: 1,
            data: [
                {
                    id: id,
                    price: tempPrice,
                    count: 1,
                    ingredient: ingredient
                }
            ]
        }
        setCookie('order', JSON.stringify(order), 60);
    }
    else {
        let a = JSON.parse(getCookie('order'));
        let i = 0;
        for (; i < a.count; i++) {
            if (a.data[i].id === id) {
                let res = true;
                if (a.data[i].ingredient.length === ingredient.length) {
                    for (let j = 0; j < ingredient.length; j++) {
                        if (a.data[i].ingredient[j] !== ingredient[j]) {
                            res = false;
                            break;
                        }
                    }
                } else res = false;

                if (res === true) {
                    a.data[i].count = a.data[i].count + 1;
                    break;
                }
            }
        }

        if (i === a.count) {
            a.data.push({
                id: id,
                price: tempPrice,
                count: 1,
                ingredient: ingredient
            });
            a.count += 1;
        }

        setCookie('order', JSON.stringify(a), 60);
    }

    let html = 'Корзина';
    if(getCookie('order') !== ""){
        html += ' (' + JSON.parse(getCookie('order')).count + ')';
    }
    document.querySelector('.box').innerHTML = html;
})

let ing = document.querySelector('.btn2');
if (ing != null) ing.addEventListener('click', () => {
    if (ing.classList.contains('clicked')) {
        document.querySelector('.ing').style.display = 'none';
        ing.classList.remove('clicked');
        ing.style.color = '#ffb718';
        ing.style.backgroundColor = 'transparent';
    }
    else {
        document.querySelector('.ing').style.display = 'block';
        ing.classList.add('clicked');
        ing.style.color = 'black';
        ing.style.backgroundColor = '#ffb718';
    }
});


function set(w, p) {
    weight = w;
    price = p;
}

function setId(amm) {
    id = amm;
    getAllItems().then((data) => {
        item = data[id - 1];
        weight = item.weight;
        price = item.price;
    });
}

getAllIng().then((data) => {
    wp = data;
});

t = document.querySelector('.postheader').querySelectorAll('.nav');
let t1 = ['pizza', 'snack', 'salad', 'main', 'dessert', 'drink'];

for (let i = 0; i < t.length; i++) {
    t[i].addEventListener('click', () => {
        document.location.href = "http://pizza.apeps.pp.ua/delivery/" + t1[i];
    })
}

let items = document.querySelectorAll('.item');
for (let i = 0; i < items.length; i++) {
    items[i].addEventListener('click', () => {
        if (items[i].classList.contains('active')) {
            price -= wp[i].price;
            weight -= wp[i].weight;
            document.querySelector('.t1').innerHTML = price + " грн";
            document.querySelector('.t3').innerHTML = "Загальна вага - " + weight + " г";
        } else {
            price += wp[i].price;
            weight += wp[i].weight;
            document.querySelector('.t1').innerHTML = price + " грн";
            document.querySelector('.t3').innerHTML = "Загальна вага - " + weight + " г";
        }
        items[i].classList.toggle('active');
    })
}

function initSlider() {
    let slides = document.querySelector('.wrap').querySelectorAll('.slide');
    let wrap = document.querySelector('.wrap');

    let timeout = 0.2;
    let trans = -1268;
    let slide_len = 317 * (slides.length + 8) - 72;

    let interval = setInterval(() => {
        document.querySelector('.slide-next').click();
    }, timeout * 30000);

    generate();

    function generate() {
        let html = ''
        for (let i = slides.length - 4; i < slides.length; i++) {
            html += slides[i].outerHTML;
        }
        for (let i = 0; i < slides.length; i++) html += slides[i].outerHTML;
        for (let i = 0; i < 4; i++) {
            html += slides[i].outerHTML;
        }

        wrap.innerHTML = html;

        wrap.style.transition = timeout + 's ease-in-out';

        document.querySelector('.slider-nav').querySelector('.slide-prev').addEventListener('click',
            () => {
                if (trans === -317) {
                    trans += 317;
                    wrap.style.transform = 'translateX(' + trans + 'px)';
                    sleep(200).then(() => {
                        trans = -(slide_len - 1200 - (317 * 4) + 4);
                        wrap.style.transition = 'none';
                        wrap.style.transform = 'translateX(' + trans + 'px)';
                        sleep(timeout * 1000).then(() => {
                            wrap.style.transition = timeout + 's ease-in-out';
                        });
                    });
                } else {
                    trans += 317;
                    wrap.style.transform = 'translateX(' + trans + 'px)'
                }
            });

        document.querySelector('.slider-nav').querySelector('.slide-next').addEventListener('click',
            () => {
                if (trans === -(slide_len - 1517 + 4)) {
                    trans -= 317;
                    wrap.style.transform = 'translateX(' + trans + 'px)';
                    sleep(200).then(() => {
                        trans = -1268;
                        wrap.style.transition = 'none';
                        wrap.style.transform = 'translateX(' + trans + 'px)';
                        sleep(timeout * 1000).then(() => {
                            wrap.style.transition = timeout + 's ease-in-out';
                        })
                    });
                } else {
                    trans -= 317;
                    wrap.style.transform = 'translateX(' + trans + 'px)'
                }
            });


        let s = document.querySelectorAll('.slide');
        for (let i = 0; i < s.length; i++) {
            s[i].addEventListener('mouseenter', () => {
                s[i].querySelector('.btn3').style.backgroundColor = '#ffb718';
                s[i].querySelector('.btn3').style.color = 'black';
            });
            s[i].addEventListener('mouseleave', () => {
                s[i].querySelector('.btn3').style.backgroundColor = 'transparent';
                s[i].querySelector('.btn3').style.color = '#ffb718';
            });
        }
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
}

initSlider();
