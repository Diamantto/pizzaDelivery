function getAllAddresses() {
    let a = axios.get('http://pizza.apeps.pp.ua/addresses');
    let mas = [];
    a.then(data => {
        let length = data.data.length;
        for (let i = 0; i < length; i++) {
            mas.push(data.data[i].addr);
        }
    });
    return mas;
}

function getAllIng() {
    let a = axios.get('http://pizza.apeps.pp.ua/ing');
    return a.then((data) => {
        return data.data;
    })
}

function getAllItems() {
    let a = axios.get('http://pizza.apeps.pp.ua/item');
    return a.then((data) => {
        return data.data;
    });
}
