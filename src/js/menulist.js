// Yellow sticky note generation

const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];
let currentDate = new Date();
let dateString = `${currentDate.getDate()}`;
let monthString = `${months[currentDate.getMonth()]}`;

document.getElementById("morf-date").textContent = dateString;
document.getElementById("morf-month").textContent = monthString;

// Simultaneous request [promises]

const categories = [
  { name: "Cold dishes", container: "menuContainerCold" },
  { name: "First courses", container: "menuContainerFirst" },
  { name: "Second courses", container: "menuContainerSecond" },
  { name: "Side dishes", container: "menuContainerSide" },
  { name: "Drinks", container: "menuContainerDrinks" },
  { name: "Bakery", container: "menuContainerBakery" },
];

const requests = categories.map(({ name, container }) =>
  fetch(`app/extractor.php?category=${encodeURIComponent(name)}`)
    .then((response) => response.json())
    .then((data) => ({ container, data }))
);

Promise.all(requests).then((results) => {
  results.forEach(({ container, data }) => {
    renderMenu(container, data);
  });
});

function renderMenu(containerId, data) {
  const container = document.getElementById(containerId);

  data.forEach((item) => {
    let menuItem = `
            <div class="menu-item">                  
                <div class="menu-info">
                    <div class="menu-title">${item.title}</div> 
                    <div class="menu-description">${item.description}</div> 
                </div>
                <div class="menu-weight">${item.weight} g</div> 
                <div class="menu-price">${item.price} $</div>                         
            </div>
        `;

    container.innerHTML += menuItem;
  });
}

//- Temp stuff

//- fetch('app/core2.php?category=Cold dishes')
//-     .then(response => response.json())
//-     .then(data => {
//-         renderMenu('menuContainer', data);

//-     })

//- const item = { category: 'Second courses' };
//- const categoryElement = document.getElementById('category');
//- categoryElement.innerHTML = `<div class="menu-category">${item.category}</div>`;
