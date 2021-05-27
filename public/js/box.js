let t = document.querySelector('.elem');

let initialized = false;

let data = null;
let count = 0;
if (getCookie('order') !== "" && getCookie('order') !== null) {
    data = JSON.parse(getCookie('order'));
    initialized = true;
}
let removeItems = [];
let removeIng = [];
let result_price = 0;

let all_items = null;
let all_ing = null;

getAllItems().then((items) => {
    all_items = items;
    getAllIng().then((ing) => {
        all_ing = ing;
        draw(items, ing);
    });
});

function draw(items, ing) {
    if (initialized) {
        for (let i = 0; i < data.count; i++) {
            removeIng.push([]);
        }
        removeItems = [];

        result_price = 0;
        count = data.count;

        for (let i = 0; i < data.count; i++) {
            let temp = data.data[i];

            let itm = document.createElement('div');
            itm.classList.add("item");

            let div = document.createElement('div');
            div.classList.add('desc');

            let item_img = document.createElement('img');
            item_img.classList.add('item-img');
            item_img.src = 'http://pizza.apeps.pp.ua/img/' + items[temp.id - 1].src + '.png';

            div.append(item_img);

            let desc = document.createElement('div');
            desc.classList.add('desc');

            let name = document.createElement('p');
            name.classList.add('name');
            name.innerHTML = items[temp.id - 1].name;

            let d = document.createElement('p');
            d.classList.add('d');
            d.innerHTML = items[temp.id - 1].desc;

            desc.append(name, d);

            let ul = document.createElement('ul');
            ul.classList.add('ing');

            let ing_list = temp.ingredient;
            if (ing_list.length > 0) {

                for (let j = 0; j < ing_list.length; j++) {
                    let li = document.createElement('li');
                    li.classList.add('ing-remove');

                    let img = document.createElement('img');
                    img.src = 'http://pizza.apeps.pp.ua/img/box/remove-ing.png';
                    img.classList.add('remove-ing');

                    li.append(img, ing[ing_list[j] - 1].name);

                    ul.append(li);
                }
            }

            desc.append(ul);

            result_price += data.data[i].count * data.data[i].price

            let count = document.createElement('div');
            count.classList.add('count');

            let decr = document.createElement('button');
            let incr = document.createElement('button');
            decr.classList.add('decr');
            decr.innerHTML = '-';
            incr.classList.add('incr');
            incr.innerHTML = '+';

            let pCount = document.createElement('p');
            pCount.classList.add('c');
            pCount.innerHTML = temp.count + '';

            count.append(decr, pCount, incr);

            let p = document.createElement('p');
            p.classList.add('el-price');
            p.innerHTML = (temp.count * temp.price) + ' грн';

            let remove = document.createElement('img');
            remove.src = 'http://pizza.apeps.pp.ua/img/box/remove.png';
            remove.classList.add('remove');

            count.append(p, remove);

            desc.append(count);

            itm.append(item_img, desc);

            let hr = document.createElement('hr');
            hr.classList.add('break');

            t.append(itm, hr);
        }

        let p = document.querySelector('.result-price');
        p.innerHTML = 'СУМА ДО СПЛАТИ — ' + result_price + ' ГРН (з ПДВ)';

        init_listener(p, ing);
    }
}

function init_listener(p, ing) {
    let decr = document.querySelectorAll('.decr');
    let incr = document.querySelectorAll('.incr');
    let c = document.querySelectorAll('.c');
    let elpr = document.querySelectorAll('.el-price');
    let ttt = document.querySelectorAll('.item');

    for (let i = 0; i < data.count; i++) {
        decr[i].addEventListener('click', () => {
            if (data.data[i].count > 1) {
                let t1 = data.data[i].count * data.data[i].price;
                data.data[i].count -= 1;
                elpr[i].innerHTML = data.data[i].price * data.data[i].count + ' грн';
                let t2 = data.data[i].price * data.data[i].count;
                c[i].innerHTML = data.data[i].count + '';
                result_price += t2 - t1;
                p.innerHTML = 'СУМА ДО СПЛАТИ — ' + result_price + ' ГРН (з ПДВ)';
            }
        });

        incr[i].addEventListener('click', () => {
            let t1 = data.data[i].count * data.data[i].price;
            data.data[i].count += 1;
            elpr[i].innerHTML = data.data[i].price * data.data[i].count + ' грн';
            let t2 = data.data[i].price * data.data[i].count;
            c[i].innerHTML = data.data[i].count + '';
            result_price += t2 - t1;
            p.innerHTML = 'СУМА ДО СПЛАТИ — ' + result_price + ' ГРН (з ПДВ)';
        });
    }

    for (let i = 0; i < ttt.length; i++) {
        let ing_remove = ttt[i].querySelectorAll('.remove-ing');
        let itm_remove = ttt[i].querySelector('.remove');
        for (let j = 0; j < ing_remove.length; j++) {
            ing_remove[j].addEventListener('click', () => {
                removeIng[i].push(j);
                result_price -= data.data[i].count * ing[data.data[i].ingredient[j] - 1].price;
                data.data[i].price -= ing[data.data[i].ingredient[j] - 1].price;
                ttt[i].querySelectorAll('.ing-remove')[j].style.display = 'none';
                elpr[i].innerHTML = data.data[i].price * data.data[i].count + ' грн';
                p.innerHTML = 'СУМА ДО СПЛАТИ — ' + result_price + ' ГРН (з ПДВ)';
            });
        }

        itm_remove.addEventListener('click', () => {
            document.querySelectorAll('.break')[i].style.display = 'none';
            ttt[i].style.display = 'none';
            removeItems.push(i);
            count--;
            result_price -= data.data[i].price * data.data[i].count;
            if (count > 0) document.querySelector('.box').innerHTML = 'Корзина (' + count + ')';
            else document.querySelector('.box').innerHTML = 'Корзина';
            p.innerHTML = 'СУМА ДО СПЛАТИ — ' + result_price + ' ГРН (з ПДВ)';
        });
    }
}

function remove() {
    for (let i = 0; i < removeIng.length; i++) {
        for (let j = 0; j < removeIng[i].length; j++) {
            data.data[i].ingredient
                .splice(data.data[i].ingredient.indexOf(removeIng[i][j]), 1);
        }
    }


    removeItems.sort().reverse();

    for (let i = 0; i < removeItems.length; i++) {
        data.data.splice(removeItems[i], 1);
        data.count--;
    }

    t.innerHTML = '';
    draw(all_items, all_ing);

}

let a = document.querySelector('.postheader').querySelectorAll('.nav');
let t1 = ['pizza', 'snack', 'salad', 'main', 'dessert', 'drink'];

for (let i = 0; i < a.length; i++) {
    a[i].addEventListener('click', () => {
        document.location.href = "http://pizza.apeps.pp.ua/delivery/" + t1[i];
    });
}

document.querySelector('.addOrder').addEventListener('click', () => {
    if (count > 0) document.location.href = 'http://pizza.apeps.pp.ua/delivery/del';
});

window.addEventListener('beforeunload', () => {
    remove();
    setCookie('order', JSON.stringify(data), 60);
});
