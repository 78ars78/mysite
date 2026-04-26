<style>

.block {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  gap: 50px;
  margin: 0 0 50px;
}

.block__item {
  display: flex;
  flex-direction: column;
  align-items: center;
  border: 1px solid rgba(0, 0, 0, 0.55);
  border-radius: 4px;
/*   box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.55);
 */  padding: 5px;
}

.block__title {
  font-size: 22px;
  color: #9c9c9c;
  margin: 0 0 40px;
}

.pagination {
  display: flex;
  align-items: center;
  justify-content: center;
}

.pagination__arrow_prev {
  position: relative;
  cursor: pointer;
}

.pagination__arrow_prev::before {
  content: "";
  position: absolute;
  top: -15px;
  left: -50px;
  height: 0;
  width: 0;
  border-width: 15px 30px 15px 0;
  border-color: transparent rgba(0, 0, 0, 0.55) transparent transparent;
  border-style: solid;
/*   filter: drop-shadow(10px 0px 5px rgba(0, 0, 0, 0.55));
 */}

.pagination__arrow_next {
  position: relative;
  cursor: pointer;
}

.pagination__arrow_next::before {
  position: absolute;
  content: "";
  top: -15px;
  right: -50px;
  width: 0;
  height: 0;
  border-width: 15px 0 15px 30px;
  border-color: transparent transparent transparent rgba(0, 0, 0, 0.55);
  border-style: solid;
/*   filter: drop-shadow(-10px 0px 5px rgba(0, 0, 0, 0.55));
 */}

.pagination__list {
  list-style: none;
  display: flex;
  gap: 0 20px;
  padding: 0;
}

.pagination__item {
  border: 1px solid rgba(0, 0, 0, 0.55);
  border-radius: 22px;
/*   box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.55);
 */}

._hide {
  position: relative;
  border: 1px solid rgba(0, 0, 0, 0);
/*   box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0);
 */}
._hide::after {
  content: "• • •";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: grid;
  place-items: center;
  border-radius: 22px;
  background-color: #fff;
}
._hide+._hide {
  display: none;
}

.pagination__item span {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  border-radius: 22px;
  cursor: pointer;
}

.pagination__item span._active {
  box-shadow: 0 0 10px 5px rgba(255, 0, 0, 0.55);
}

.pagination__link {
  font-size: 20px;
  color: #3b3b3b;
}
</style>


<div class="block" id="block"></div>
<div class="pagination" id="pagination">
  <div class="pagination__arrow pagination__arrow_prev"></div>
  <ul class="pagination__list"></ul>
  <div class="pagination__arrow pagination__arrow_next"></div>
</div>



<script>const items = [
  { title: "Pagination1",  img: "img/icons/loading.gif" },
  { title: "Pagination2",  img: "img/icons/loading.gif" },
  { title: "Pagination3",  img: "img/icons/loading.gif" },
  { title: "Pagination4",  img: "img/icons/loading.gif" },
  { title: "Pagination5",  img: "img/icons/loading.gif" },
  { title: "Pagination6",  img: "img/icons/loading.gif" },
  { title: "Pagination7",  img: "img/icons/loading.gif" },
  { title: "Pagination8",  img: "img/icons/loading.gif" },
  { title: "Pagination9",  img: "img/icons/loading.gif" },
  { title: "Pagination10", img: "img/icons/loading.gif" },
  { title: "Pagination11", img: "img/icons/loading.gif" },
  { title: "Pagination12", img: "img/icons/loading.gif" },
  { title: "Pagination13", img: "img/icons/loading.gif" },
  { title: "Pagination14", img: "img/icons/loading.gif" },
  { title: "Pagination15", img: "img/icons/loading.gif" },
  { title: "Pagination16", img: "img/icons/loading.gif" },
  { title: "Pagination17", img: "img/icons/loading.gif" },
  { title: "Pagination18", img: "img/icons/loading.gif" },
  { title: "Pagination19", img: "img/icons/loading.gif" },
  { title: "Pagination20", img: "img/icons/loading.gif" },
  { title: "Pagination21", img: "img/icons/loading.gif" },
  { title: "Pagination22", img: "img/icons/loading.gif" },
  { title: "Pagination23", img: "img/icons/loading.gif" },
  { title: "Pagination24", img: "img/icons/loading.gif" },
  { title: "Pagination25", img: "img/icons/loading.gif" },
  { title: "Pagination26", img: "img/icons/loading.gif" },
  { title: "Pagination27", img: "img/icons/loading.gif" },
  { title: "Pagination28", img: "img/icons/loading.gif" },
  { title: "Pagination29", img: "img/icons/loading.gif" },
  { title: "Pagination30", img: "img/icons/loading.gif" },
  { title: "Pagination31", img: "img/icons/loading.gif" },
  { title: "Pagination32", img: "img/icons/loading.gif" },
  { title: "Pagination33", img: "img/icons/loading.gif" },
  { title: "Pagination34", img: "img/icons/loading.gif" },
  { title: "Pagination35", img: "img/icons/loading.gif" },
  { title: "Pagination36", img: "img/icons/loading.gif" }
];
let block = document.querySelector("#block");
let pagination = document.querySelector(".pagination__list");
let prevPage = document.querySelector(".pagination__arrow_prev");
let nextPage = document.querySelector(".pagination__arrow_next");
let notesOnPage = 4;

let countOfItems = Math.ceil(items.length / notesOnPage);

let paginationItem = [];
for (let i = 1; i <= countOfItems; i++) {
  let li = document.createElement("li");
  li.classList.add("pagination__item");
  pagination.appendChild(li);
  let span = document.createElement("span");
  span.innerHTML = i;
  li.appendChild(span);
  paginationItem.push(span);
}
let active;
showPage(paginationItem[0]);
for (let item of paginationItem) {
  item.addEventListener("click", function() {
    showPage(this);
  });
}

function showPage(item) {
  if (active) {
    active.classList.remove("_active");
  }
  active = item;
  item.classList.add("_active");

  let pageNum = +item.innerHTML;

  let start = (pageNum - 1) * notesOnPage;
  let end = start + notesOnPage;
  let notes = items.slice(start, end);

  block.innerHTML = "";
  for (let note of notes) {
    block.insertAdjacentHTML("beforeend",
      `
    <div class="block__item">
      <h2 class="block__title">${note.title}</h2>
      <img class="block__img" src="${note.img}" alt="">
    </div>
    `
    );
  }
  hideOverPages();
}

prevPage.addEventListener("click", function() {
  if (active.parentElement.previousElementSibling) {
    showPage(active.parentElement.previousElementSibling.querySelector("span"));
  }
});
nextPage.addEventListener("click", function() {
  if (active.parentElement.nextElementSibling) {
    showPage(active.parentElement.nextElementSibling.querySelector("span"));
  }
});

/* Скрытие промежуточных номеров страниц */
function hideOverPages() {
  let items = [...pagination.children];
  if (items.length > 5) {
    items.forEach((item) => item.classList.add("_hide"));
    items[0].classList.remove("_hide");
    if (active.parentElement.previousElementSibling) {
      active.parentElement.previousElementSibling.classList.remove("_hide");
    }
    active.parentElement.classList.remove("_hide");
    if (active.parentElement.nextElementSibling) {
      active.parentElement.nextElementSibling.classList.remove("_hide");
    }
    items[items.length - 1].classList.remove("_hide");
  }
}
</script>






