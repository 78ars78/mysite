// Цена товара
const priceInput = document.querySelectorAll(".price-input input");

priceInput.forEach(input =>{
    input.addEventListener("input", () =>{
            setTimeout( change, 700 );
    });
});



// Строка - блок
let r=0;
let items=[], ites=[], ress=[], notesOnPage;

function myFunc1() {
document.querySelector('.block').style['display']='block';
document.getElementById('imj').setAttribute("style","border:1px solid white;");
document.getElementById('imj1').setAttribute("style","border:1px solid black;");
}
function myFunc() {
document.querySelector('.block').style['display']='flex';
document.getElementById('imj1').setAttribute("style","border:1px solid white;");
document.getElementById('imj').setAttribute("style","border:1px solid black;");
}



// Фильтрация
function change() { items=[]; ites=[]; ress=[];
        
   

        let results = Array.from(document.querySelectorAll('.result > div')),
            modelsChecked = document.querySelectorAll('.filter input.models:checked'),
            processorsChecked = document.querySelectorAll('.filter input.processors:checked'), 
			processors1Checked = document.querySelectorAll('.filter input.rad:checked'); 
			// Hide all results
           
        results.forEach(function(result) {
            result.style.display = 'none';
        });
        
        // Filter results to only those that meet ALL requirements:        
	    	if (processors1Checked.length != 0) {
            filterModelsOrProcessors(processors1Checked);
        } 

        if (modelsChecked.length != 0) {
            filterModelsOrProcessors(modelsChecked);
        } 

        if (processorsChecked.length != 0) {
            filterModelsOrProcessors(processorsChecked);
        } 

        function filterModelsOrProcessors(modelsOrProcessorsChecked) {
            results = Array.from(modelsOrProcessorsChecked).reduce(function(sum, input) {
                const attrib = input.getAttribute('rel');
                return sum.concat(results.filter(function(result) { 
                   return result.classList.contains(attrib); 
                }));
            }, []); 
        } 
        // Show those filtered results: 
			   let ite={}; 
        results.forEach(function(result) { 
    	 /*  result.style.display = 'inline-block'; */ 
		          
		  let res=result.querySelector('.itsme').innerText;
      let res1=result.querySelector('.itsme1').innerText;
      let res2=result.querySelector('.itsme2').innerText;
      let res3=result.querySelector('.itsme3').innerText;
      let res4=result.querySelector('.itsme4').innerText;
      let res5=result.querySelector('.itsme5').innerText;
      
  
     
  ite=
  {img:res, title:res1, marka:res2, price:res3, color:res4, brightness:res5};





  /* alert(priceInput[0].value); */

            if(res3>=parseInt(priceInput[0].value) && res3<=parseInt(priceInput[1].value)/*  && res3>parseInt(rangeInput[0].value) && res3<parseInt(rangeInput[1].value) */) {ites.push(ite);} 
         });
             
// убрать одинаковые
      ress=ites.filter((obj,idx,arr)=>idx===arr.findIndex((t)=>t.title===obj.title && t.color===obj.color && t.price===obj.price));
          

      
    if(ress.length==0) rrr=1; else rrr=ress.length;

    for(let y=0; y<rrr; y++) {
        items[y] = ress[y]; 
      }    
    

  



// Кол-во товаров
document.getElementById('quantity').innerText=ress.length;





// Сортировка
if (r==1) {items.sort((a,b)=>b.price-a.price);}
if (r==3) {items.sort((a,b)=>a.price-b.price);}
if (r==2) {items.sort(function(a,b){ if(a.color>b.color) {return 1;}
if(a.color<b.color) {return -1;} return 0; });}

      
sort1=document.getElementById('sort1');
sort1.onclick=function(){
    items.sort((a,b)=>b.price-a.price);
    sort1.style.color='#C15E5F';
    sort2.style.color='#2C7CE9';
    sort3.style.color='#2C7CE9';
       r=1;
 sh(); 
} 
sort3=document.getElementById('sort3');

sort3.onclick=function(){
    items.sort((a,b)=>a.price-b.price);
    sort3.style.color='#C15E5F';
    sort1.style.color='#2C7CE9';
    sort2.style.color='#2C7CE9';

       r=3;
 sh(); 
} 
sort2=document.getElementById('sort2');

sort2.onclick=function(){
    items.sort(function(a,b){ if(a.color>b.color) {return 1;}
      if(a.color<b.color) {return -1;} return 0; });
      sort2.style.color='#C15E5F';
      sort3.style.color='#2C7CE9';
      sort1.style.color='#2C7CE9';

       r=2;
 sh(); 
} 


sh();



}



change();


document.querySelector('.input-min').value=items[0].price;
document.querySelector('.input-max').value=items[items.length-1].price;



// Пагинация
function sh() {
    


document.querySelector(".pagination__arrow_p").classList.add("pagination__arrow_prev");
document.querySelector(".pagination__arrow_n").classList.add("pagination__arrow_next");


let block = document.querySelector("#block");
let pagination = document.querySelector(".pagination__list");
let prevPage = document.querySelector(".pagination__arrow_prev");
let nextPage = document.querySelector(".pagination__arrow_next");


notesOnPage=+document.getElementById('sel').value;




let countOfItems = Math.ceil(items.length / notesOnPage);

let paginationItem = [];
pagination.innerHTML=''; 
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

  block.innerHTML = ""; 
  
  let notes = items.slice(start, end);
  
  

 
if(ress.length==0) { pagination.innerHTML=''; 
document.querySelector(".pagination__arrow_p").classList.remove("pagination__arrow_prev");
document.querySelector(".pagination__arrow_n").classList.remove("pagination__arrow_next");
} 

/* alert(items); */
 for (let note of notes) {




  
    block.insertAdjacentHTML("beforeend",
      `    
<h2 class="block__title" ><img style="position:relative; z-index:2;" src="${note.img}" height=200px><center>${note.title} ${note.marka} ${note.price} ${note.color} ${note.brightness}</center></h2>      `
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

}