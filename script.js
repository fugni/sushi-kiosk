var selectedCategory = "sushi";

function category(selectedCategory) {
    // clear container
    var container = document.querySelector(".container");
    container.innerHTML = "";

    var title = document.querySelector(".title");
    switch (selectedCategory) {
        case "sushi":
            title.innerHTML = "Sushi"
            break;
        case "voordeel":
            title.innerHTML = "Voordeel Boxen"
            break;
        case "pokebowl":
            title.innerHTML = "Pokebowls"
            break;
        case "dranken":
            title.innerHTML = "Dranken"
            break;    
    }

    fetch("https://u220722.gluwebsite.nl/products/" + selectedCategory)
        .then(response => response.json())
        .then(data => data.forEach(element => {
            newItem(element);
        }));

}

function newItem(element) {
    var container = document.querySelector(".container");
    var item = document.createElement("div");
    item.classList.add("item");

    var img = document.createElement("img");
    img.src = "/assets/img/sushi/" + element.Image;

    var name = document.createElement("p");
    name.innerHTML = element.Name;

    var amount = document.createElement("p");
    amount.innerHTML = element.Amount;

    switch (element.Type) {
        case "dranken":
            amount.innerHTML += "ml";
            break;
        default:
            amount.innerHTML += " stuks";
            break;
    }

    var price = document.createElement("p");
    price.innerHTML = "€" + element.Price;

    if (price.innerHTML.split(".")[1].length == 1) {
        price.innerHTML += "0";
    }


    var toevoegen = document.createElement("div");
    toevoegen.classList.add("toevoegen");
    toevoegen.innerHTML = "Toevoegen";

    item.appendChild(img);
    item.appendChild(name);
    item.appendChild(amount);
    item.appendChild(price);
    item.appendChild(toevoegen);
    container.appendChild(item);
}

category(selectedCategory);
