let a = document.querySelectorAll('.btn')[1];
if (a != null) a.addEventListener('click', () => {
    document.location.href = 'http://pizza.apeps.pp.ua/login';
})

let addresses = getAllAddresses();

document.getElementById('add').addEventListener('click', () => {
    document.querySelector('.ad').innerHTML = '<input class="a" type="text" name="street" placeholder="Вулиця" required>' +
        '<input type="text" name="house" placeholder="Будинок" required>' +
        '<input type="text" name="entrance" placeholder="Під\'їзд" required>' +
        '<input type="text" name="flat" placeholder="Квартира" required>' +
        '<input type="text" name="floor" placeholder="Поверх" required>';
});

document.getElementById('self').addEventListener('click', () => {
    let html = '<select class="b" name="address" id="address">';
    html += '<option selected value="' + 1 + '">' + addresses[0] + '</option>';
    for (let i = 1; i < addresses.length; i++) {
        html += '<option value="' + (i + 1) + '">' + addresses[i] + '</option>'
    }
    html += '</select>';
    document.querySelector('.ad').innerHTML = html;
});

