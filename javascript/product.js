let _button1 = document.getElementById("add_to_kart1");
let _button2 = document.getElementById("add_to_kart2");
let _button3 = document.getElementById("add_to_kart3");
let _button4 = document.getElementById("add_to_kart4");
let _button5 = document.getElementById("add_to_kart5");
let _button6 = document.getElementById("add_to_kart6");
let _button7 = document.getElementById("add_to_kart7");
let _button8 = document.getElementById("add_to_kart8");
let _button9 = document.getElementById("add_to_kart9");
var names = [];
var prices = [];
var descriptions = [];
var images = [];
console.log();
for (i = 1; i <= 9; i++) {
  let p = document.getElementById("product" + i + "_name").innerHTML;
  names.push(p);
  let c = document.getElementById("product" + i + "_price").innerHTML;
  prices.push(c);
  let k = document.getElementById("product" + i + "_description").innerHTML;
  descriptions.push(k);
  let l = document.getElementById("product" + i + "_img").src;
  console.log(l)
  images.push(l);
}
_button1.addEventListener("click", function () {
  all_products = window.open("specific_product.html");

  all_products.onload = function () {
    let c = all_products.document.getElementById("name");
    c.innerHTML = names[0];
    let k = all_products.document.getElementById("price");
    k.innerHTML = prices[0];
    let b = all_products.document.getElementById("p_img");
    b.src= images[0];
    let a = all_products.document.getElementById("description");
    a.innerHTML = descriptions[0];

    let add=all_products.document.getElementById('add');
    let save=all_products.document.getElementById('save');
    add.addEventListener('click',function(){
        all_products.alert("you have added this item to your kart");
        
    })
  
    save.addEventListener('click',function(){
        all_products.alert("you have added this item to your savings");

    })

};
});


  _button2.addEventListener("click", function () {
    all_products = window.open("specific_product.html");
  
    all_products.onload = function () {
      let c = all_products.document.getElementById("name");
      c.innerHTML = names[1];
      let k = all_products.document.getElementById("price");
      k.innerHTML = prices[1];
      let b = all_products.document.getElementById("p_img");
      b.src= images[1];
      let a = all_products.document.getElementById("description");
      a.innerHTML = descriptions[1];
  
      let add=all_products.document.getElementById('add');
      let save=all_products.document.getElementById('save');
      add.addEventListener('click',function(){
          all_products.alert("you have added this item to your kart");
          
      })
    
      save.addEventListener('click',function(){
          all_products.alert("you have added this item to your savings");
  
      })
  
  };
  });

  _button3.addEventListener("click", function () {
    all_products = window.open("specific_product.html");
  
    all_products.onload = function () {
      let c = all_products.document.getElementById("name");
      c.innerHTML = names[2];
      let k = all_products.document.getElementById("price");
      k.innerHTML = prices[2];
      let b = all_products.document.getElementById("p_img");
      b.src= images[2];
      let a = all_products.document.getElementById("description");
      a.innerHTML = descriptions[2];
  
      let add=all_products.document.getElementById('add');
      let save=all_products.document.getElementById('save');
      add.addEventListener('click',function(){
          all_products.alert("you have added this item to your kart");
          
      })
    
      save.addEventListener('click',function(){
          all_products.alert("you have added this item to your savings");
  
      })
  
  };
  });

  _button4.addEventListener("click", function () {
    all_products = window.open("specific_product.html");
  
    all_products.onload = function () {
      let c = all_products.document.getElementById("name");
      c.innerHTML = names[3];
      let k = all_products.document.getElementById("price");
      k.innerHTML = prices[3];
      let b = all_products.document.getElementById("p_img");
      b.src= images[3];
      let a = all_products.document.getElementById("description");
      a.innerHTML = descriptions[3];
  
      let add=all_products.document.getElementById('add');
      let save=all_products.document.getElementById('save');
      add.addEventListener('click',function(){
          all_products.alert("you have added this item to your kart");
          
      })
    
      save.addEventListener('click',function(){
          all_products.alert("you have added this item to your savings");
  
      })
  
  };
  });

  _button5.addEventListener("click", function () {
    all_products = window.open("specific_product.html");
  
    all_products.onload = function () {
      let c = all_products.document.getElementById("name");
      c.innerHTML = names[4];
      let k = all_products.document.getElementById("price");
      k.innerHTML = prices[4];
      let b = all_products.document.getElementById("p_img");
      b.src= images[4];
      let a = all_products.document.getElementById("description");
      a.innerHTML = descriptions[4];
  
      let add=all_products.document.getElementById('add');
      let save=all_products.document.getElementById('save');
      add.addEventListener('click',function(){
          all_products.alert("you have added this item to your kart");
          
      })
    
      save.addEventListener('click',function(){
          all_products.alert("you have added this item to your savings");
  
      })
  
  };
  });

  _button6.addEventListener("click", function () {
    all_products = window.open("specific_product.html");
  
    all_products.onload = function () {
      let c = all_products.document.getElementById("name");
      c.innerHTML = names[5];
      let k = all_products.document.getElementById("price");
      k.innerHTML = prices[5];
      let b = all_products.document.getElementById("p_img");
      b.src= images[5];
      let a = all_products.document.getElementById("description");
      a.innerHTML = descriptions[5];
  
      let add=all_products.document.getElementById('add');
      let save=all_products.document.getElementById('save');
      add.addEventListener('click',function(){
          all_products.alert("you have added this item to your kart");
          
      })
    
      save.addEventListener('click',function(){
          all_products.alert("you have added this item to your savings");
  
      })
  
  };
  });

  _button7.addEventListener("click", function () {
    all_products = window.open("specific_product.html");
  
    all_products.onload = function () {
      let c = all_products.document.getElementById("name");
      c.innerHTML = names[6];
      let k = all_products.document.getElementById("price");
      k.innerHTML = prices[6];
      let b = all_products.document.getElementById("p_img");
      b.src= images[6];
      let a = all_products.document.getElementById("description");
      a.innerHTML = descriptions[6];
  
      let add=all_products.document.getElementById('add');
      let save=all_products.document.getElementById('save');
      add.addEventListener('click',function(){
          all_products.alert("you have added this item to your kart");
          
      })
    
      save.addEventListener('click',function(){
          all_products.alert("you have added this item to your savings");
  
      })
  
  };
  });

  _button8.addEventListener("click", function () {
    all_products = window.open("specific_product.html");
  
    all_products.onload = function () {
      let c = all_products.document.getElementById("name");
      c.innerHTML = names[7];
      let k = all_products.document.getElementById("price");
      k.innerHTML = prices[7];
      let b = all_products.document.getElementById("p_img");
      b.src= images[7];
      let a = all_products.document.getElementById("description");
      a.innerHTML = descriptions[7];
  
      let add=all_products.document.getElementById('add');
      let save=all_products.document.getElementById('save');
      add.addEventListener('click',function(){
          all_products.alert("you have added this item to your kart");
          
      })
    
      save.addEventListener('click',function(){
          all_products.alert("you have added this item to your savings");
  
      })
  
  };
  });

  _button9.addEventListener("click", function () {
    all_products = window.open("specific_product.html");
  
    all_products.onload = function () {
      let c = all_products.document.getElementById("name");
      c.innerHTML = names[8];
      let k = all_products.document.getElementById("price");
      k.innerHTML = prices[8];
      let b = all_products.document.getElementById("p_img");
      b.src= images[8];
      let a = all_products.document.getElementById("description");
      a.innerHTML = descriptions[8];
  
      let add=all_products.document.getElementById('add');
      let save=all_products.document.getElementById('save');
      add.addEventListener('click',function(){
          all_products.alert("you have added this item to your kart");
          
      })
    
      save.addEventListener('click',function(){
          all_products.alert("you have added this item to your savings");
  
      })
  
  };
  });
