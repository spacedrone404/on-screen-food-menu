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

// Subsequent request

const categories = [
  // { name: "Cold dishes", container: "menuContainerCold" },
  // { name: "First courses", container: "menuContainerFirst" },
  // { name: "Second courses", container: "menuContainerSecond" },
  { name: "Side dishes", container: "menuContainerSide" },
  { name: "Drinks", container: "menuContainerDrinks" },
  { name: "Bakery", container: "menuContainerBakery" },
];

categories.forEach(({ name, container }) => {
  fetch(`app/extractor.php?category=${encodeURIComponent(name)}`)
    .then((response) => response.json())
    .then((data) => {
      renderMenu(container, data);
    });
});

function renderMenu(containerId, data) {
  const container = document.getElementById(containerId);

  data.forEach((item) => {
    let menuItem = `
            <div class="menu-item">
                <div class="menu-weight">${item.weight} г</div>
                <div class="menu-info">
                    <div class="menu-title">${item.title}</div>
                    <div class="menu-description">${item.description}</div>
                </div>
                <div class="menu-price">${item.price} р</div>
            </div>
        `;

    container.innerHTML += menuItem;
  });
}
