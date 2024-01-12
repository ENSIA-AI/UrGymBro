var my_products = [
  {
    product_name: "5kg dumbells",
    product_type: "equipment",
    product_price: "12000",
    product_description:
      "WOW IM SURPRISED BY these high quality made BY proffesional artisans RUBBER COATED HEXAGON DUMBBELLS MADE FROM FRESH & FIRST QUALITY VIRGIN RUBBER TEAR PROOF SOUNDLESS BOUNCY EFFECT AVAILABLE IN PAIRS ONLY SIZES AVAILABLE - 2.5, 5, 7.5, 10, 12.5, 15, 17.5, 20, 22.5, 25, 27.5, 30 KG",
    product_img: "/images/5kg dumbells.jpg",
    product_link: '"',
  },
  {
    product_name: "12kg kettelbel",
    product_type: "equipment",
    product_price: "14000",
    product_description: "Made of solid cast iron and coated in protective vinyl, the kettlebell is a convenient and powerful workout tool. Available in a spectrum of colors and weights, you can choose the training path that is right for you. Available in weights of 10, 12, 15, 18, 20, 25, 30, 35, 40, 45, 50, 55, and 60 pounds.",
    product_img: "/images/12kg kettelbel.jpg",
    product_link: '"',
  },
  {
    product_name: "bench",
    product_type: "equipment",
    product_price: "16000",
    product_description: "York’s Pro Series Benches are a favorite among fitness studios and home fitness enthusiasts. The smaller size and lighter weight allow for easy movement during workouts, making it ideal for aerobic classes, residential, apartment and hotel usage. The sturdy construction combined with York’s standards of design give the benches a professional club feel in the comfort of your own home. Crafted from 13-gauge steel, this sturdy flat bench offers a thick pad for comfort and durability.\n Product Specifications:\nUnit Dimensions\nLength: \nWidth: 16 ½”\nHeight: 18.25”\nPad Dimensions\nLength: 43 ½”\nWidth: 11”",
    product_link:'"',
    product_img: "/images/bench.jpg"
  },
  {
    product_name: "home gym set",
    product_type: "equipment",
    product_price: "1800",
    product_description: "qqq",
    product_img: "/images/home gym set.jpg",
    product_link: '"',
  },
  {
    product_name: "deadlift bar",
    product_type: "equipment",
    product_price: "220000",
    product_description: "Parameters make the Deadlift bar unique\nThe smaller barbell diameter increases flexibility which helps you lift heavy weights. Also the total length of the barbell is 230 cm which is 10 cm longer than the standard Olympic barbell. The sleeves have 2 x 37.5 cm allowing you to load a lot of plates.",
    product_img: "/images/deadlift bar.jpg",
    product_link: '"',
  },
  {
    product_name: "creatine mono",
    product_type: "suplement",
    product_price: "540000",
    product_description: "Creatine Monohydrate is the monohydrate form of creatine similar or identical to endogenous creatine produced in the liver, kidneys, and pancreas. Creatine, in phosphate form, helps supply energy to muscle cells for contraction.",
    product_img: "/images/creatine monohydrate.jpg",
    product_link: '"',
  },
  {
    product_name: "gold standard whey",
    product_type: "suplement",
    product_price: "82000",
    product_description: "This unique blend helps bodybuilders, athletes or any sportsperson a better recovery of muscles. Hydrolysate Whey gives an immediate spike of amino acids in blood for immediate recovery after the workout or when your body requires amino acids immediately and Whey Protein Isolate, sourced from USA.",
    product_img: "/images/goldstandardwhey.jpg",
    product_link: '"',
  },
  {
    product_name: "micronized creatine",
    product_type: "suplement",
    product_price: "12200",
    product_description: "Helps support ATP recycling for explosive movements. Supports muscle building, recovery, performance, strength and power when used daily, over time and combined with exercise.",
    product_img: "/images/micronised creatine powder.jpg",
    product_link: "",
  },

  {
    product_name: "whey",
    product_type: "suplement",
    product_price: "500",
    product_description: " Whey protein is the protein from whey, the watery portion of milk that separates from the curds when making cheese. It is commonly used as a protein supplement. Whey protein might improve the nutrient content of the diet and also have effects on the immune system.",
    product_img: "/images/whey.jpg",
    product_link: "",
  },
  {
    product_name: "treadmill",
    product_type: "equipment",
    product_price: "120000",
    product_description: "Treadmill Model	STAR 100\nWeight Capacity	265 LBs\nItem Weight	160 LBs\nTread Belt	20'' x 57''\nProduct Dimensions (Unfold)	170 x 79 x 128 cm\nProduct Dimensions (Fold)	170 x 79 x 27 cm\nMaximum Speed	11.2 MP/H\nMaximum Incline	12%\nMaximum Horsepower	2.0 HP\nNumber of Programs	36",
    product_img: "/images/treadmill.jpg",
    product_link: '"',
  },
  {
    product_name: "pull up bar",
    product_type: "equipment",
    product_price: "120000",
    product_description: "The wall-mounted pull-up bar can be used both inside and outside to exercise the back, shoulders, chest, arms, triceps, biceps, strain, and front of the abdomen. Your hands are more comfortable on soft cushions, extending the duration of your workout.",
    product_img: "/images/pull up bar.jpg",
    product_link: '"',
  },
];
var cheap = [];
var average = [];
var expensive = [];

var e_cheap = [];
var e_average = [];
var e_expensive = [];
var s_cheap = [];
var s_average = [];
var s_expensive = [];
var i = 0;
while (i < my_products.length) {
  if (my_products[i].product_type == "equipment") {
    if (my_products[i].product_price <= 5000) {
      cheap.push(my_products[i]);
      e_cheap.push(my_products[i]);
      i++;
    } else if (my_products[i].product_price <= 10000) {
      e_average.push(my_products[i]);
      average.push(my_products[i]);
      i++;
    } else {
      e_expensive.push(my_products[i]);
      expensive.push(my_products[i]);
      i++;
    }
  } else {
    if (my_products[i].product_price <= 5000) {
      s_cheap.push(my_products[i]);
      cheap.push(my_products[i]);
      i++;
    } else if (my_products[i].product_price <= 10000) {
      s_average.push(my_products[i]);
      average.push(my_products[i]);
      i++;
    } else {
      s_expensive.push(my_products[i]);
      expensive.push(my_products[i]);
      i++;
    }
  }
}
window.onload = update_display(my_products, 1);
var eq = e_cheap.concat(e_average).concat(e_expensive);
var e = [eq, e_cheap, e_average, e_expensive];
var sq = s_cheap.concat(s_average).concat(s_expensive);
var s = [sq, s_cheap, s_average, s_expensive];
var a = [my_products, cheap, average, expensive];
var array = [a, e, s];
function update_display(my_products, page) {
  if (my_products.length >= 9 * page) {
    i = 9 * (page - 1);

    while (i < 9 * page) {
      let pn = document.getElementById("product" + (i + 1) + "_name");
      pn.innerHTML = my_products[i].product_name;

      let pp = document.getElementById("product" + (i + 1) + "_price");
      pp.innerHTML = "PRICE: " + my_products[i].product_price;

      let pi = document.getElementById("product" + (i + 1) + "_img");
      pi.src = my_products[i].product_img;
      let p = document.getElementById("product" + (i + 1));
      let pd = document.getElementById("product" + (i + 1) + "_description");
      pd.innerHTML = "Description: " + my_products[i].product_description;

      if (my_products[i].product_description.length >= 263) {
        p.addEventListener("mouseover", function () {
          pd.style.overflowY = "scroll";
          pd.style.overflowX = "hidden";
        });

        p.addEventListener("mouseleave", function () {
          pd.style.overflowY = "hidden";
          pd.style.overflowX = "hidden";
        });
      } else
        pd.removeEventListener("mouseover", function () {
          pd.style.overflowY = "scroll";
          pd.style.overflowX = "hidden";
        });
      i++;
    }
  } else {
    i = 9 * (page - 1);
    while (i < my_products.length) {
      let p = document.getElementById("product" + ((i % 9) + 1));
      let pd = document.getElementById(
        "product" + ((i % 9) + 1) + "_description"
      );
      pd.innerHTML = my_products[i].product_description;
      if (my_products[i].product_description.length >= 263) {
        p.addEventListener("mouseover", function () {
          pd.style.overflowY = "scroll";
          pd.style.overflowX = "hidden";
        });

        p.addEventListener("mouseleave", function () {
          pd.style.overflowY = "hidden";
          pd.style.overflowX = "hidden";
        });
      } else {
        pd.style.overflowY = "hidden";
        pd.style.overflowX = "hidden";
      }
      let pn = document.getElementById("product" + ((i % 9) + 1) + "_name");
      pn.innerHTML = my_products[i].product_name;

      let pp = document.getElementById("product" + ((i % 9) + 1) + "_price");
      pp.innerHTML = "PRICE: " + my_products[i].product_price;

      let pi = document.getElementById("product" + ((i % 9) + 1) + "_img");
      pi.src = my_products[i].product_img;
      i++;
    }
  }
}

function hide_display(my_products, page) {
  if (my_products.length < page * 9) {
    var k = my_products.length;

    while (k < 9 * page) {
      let product = document.getElementById("product" + ((k % 9) + 1));

      product.style.display = "none";
      k++;
    }
  }
}
function restore_display() {
  let count = 1;
  while (count < 10) {
    let product = document.getElementById("product" + count);

    product.style.display = "block";
    count++;
  }
}

price_ = document.getElementById("price_filters");
type_ = document.getElementById("type_filters");
type_.addEventListener("click", function () {
  restore_display();
  update_display(array[parseInt(type_.value)][eval(price_.value)], 1);
  hide_display(array[parseInt(type_.value)][eval(price_.value)], 1);
});
price_.addEventListener("click", function () {
  restore_display();
  update_display(array[parseInt(type_.value)][eval(price_.value)], 1);
  hide_display(array[parseInt(type_.value)][eval(price_.value)], 1);
});
price_ = document.getElementById("price_filters");
button1 = document.getElementById("nav1");
button2 = document.getElementById("nav2");
button3 = document.getElementById("nav3");
button1.addEventListener("click", function () {
  window.scrollTo(0, 0);
  updatebutton1();
});

button2.addEventListener("click", function () {
  updatebutton2();
  console.log(button2.value);
});
button3.addEventListener("click", function () {
  window.scrollTo(0, 0);
  restore_display();
  update_display(
    array[parseInt(type_.value)][eval(price_.value)],
    button3.value
  );
  hide_display(array[eval(type_.value)][eval(price_.value)], button3.value);
  updatebutton3();
});
var my_page = 1;
function updatebutton1() {
  window.scrollTo(0, 0);
  restore_display();
  update_display(
    array[parseInt(type_.value)][eval(price_.value)],
    button1.value
  );
  hide_display(array[eval(type_.value)][eval(price_.value)], button1.value);
  if (eval(button1.value) > 1) {
    button1.value = button1.value - 1;
    button2.value = button2.value - 1;
    button3.value = button3.value - 1;
  }
}
function updatebutton2() {
  if (eval(button1.value) == 1) {
    window.scrollTo(0, 0);
    restore_display();
    update_display(array[parseInt(type_.value)][eval(price_.value)], 2);
    hide_display(array[eval(type_.value)][eval(price_.value)], 2);
  } else return;
}
function updatebutton3() {
  button1.value = eval(button1.value) + 1;
  button2.value = eval(button2.value) + 1;
  button3.value = eval(button3.value) + 1;
}

a_button1 = document.getElementById("add_to_kart1");
a_button2 = document.getElementById("add_to_kart2");
a_button3 = document.getElementById("add_to_kart3");
a_button4 = document.getElementById("add_to_kart4");
a_button5 = document.getElementById("add_to_kart5");
a_button6 = document.getElementById("add_to_kart6");
a_button7 = document.getElementById("add_to_kart7");
a_button8 = document.getElementById("add_to_kart8");
a_button9 = document.getElementById("add_to_kart9");
names = [];
prices = [];
descriptions = [];
images = [];
for (i = 1; i <= 9; i++) {
  names.push(document.getElementById("product" + i + "_name"));
  prices.push(document.getElementById("product" + i + "_price"));
  descriptions.push(document.getElementById("product" + i + "_description"));
  images.push(document.getElementById("product" + i + "_image"));
}
var price, name_, description, img;
a_button1.addEventListener("click", function () {
  name_ = names[0];
  price = prices[0];
  description = descriptions[0];
  img = images[0];
});
