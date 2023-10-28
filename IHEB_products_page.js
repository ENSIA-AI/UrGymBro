var my_products = [
  {
    product_name: "5kg dumbells",
    product_type: "equipment",
    product_price: "12000",
    product_description:
      "11qqq1qqq1qqq 1qqq1qqq  1qqq1qqq1qqq1 qqq1qqq1q qq1qqq1q q q 1qqq1qqq1qqq1 qqq1qqq1qqq 1qqq1qqq1qqq1qqq 1qqq1qqq1qqq1q qq1qqq1qqq1qqq1 qqq1qqq",
    product_img: "/images/5kg dumbells.jpg",
    product_link: '"',
  },
  {
    product_name: "12kg kettelbel",
    product_type: "equipment",
    product_price: "14000",
    product_description: "qqq",
    product_img: "/images/12kg kettelbel.jpg",
    product_link: '"',
  },
  {
    product_name: "bench",
    product_type: "equipment",
    product_price: "16000",
    product_description: "qqq",
    product_img: "/images/bench.jpg",
    product_link: '"',
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
    product_description: "qqq",
    product_img: "/images/deadlift bar.jpg",
    product_link: '"',
  },
  {
    product_name: "creatine mono",
    product_type: "suplement",
    product_price: "540000",
    product_description: "qqq",
    product_img: "/images/creatine monohydrate.jpg",
    product_link: '"',
  },
  {
    product_name: "gold standard whey",
    product_type: "suplement",
    product_price: "82000",
    product_description: "qqq",
    product_img: "/images/whey.jpg",
    product_link: '"',
  },
  {
    product_name: "micronised creatine",
    product_type: "suplement",
    product_price: "12200",
    product_description: "qqq",
    product_img: "/images/micronised creatine powder.jpg",
    product_link: "",
  },

  {
    product_name: "whey",
    product_type: "suplement",
    product_price: "500",
    product_description: "qqq",
    product_img: "/images/whey.jpg",
    product_link: "",
  },
  {
    product_name: "treadmill",
    product_type: "equipment",
    product_price: "120000",
    product_description: "qqq",
    product_img: "/images/treadmill.jpg",
    product_link: '"',
  },
  {
    product_name: "pull up bar",
    product_type: "equipment",
    product_price: "120000",
    product_description: "qqq",
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
var eq = e_cheap.concat(e_average).concat(e_expensive);
var e = [eq, e_cheap, e_average, e_expensive];
var sq = s_cheap.concat(s_average).concat(s_expensive);
var s = [sq, s_cheap, s_average, s_expensive];
var a = [my_products, cheap, average, expensive];
var array = [my_products, a, eq, e, sq, s];
console.log(eq);
function update_display(my_products, page) {
  console.log(my_products);
  if (my_products.length >= 9 * page) {
    i = 9 * (page - 1);

    while (i < 9 * page) {
      let pn = document.getElementById("product" + (i + 1) + "_name");
      pn.innerHTML = my_products[i].product_name;

      let pp = document.getElementById("product" + (i + 1) + "_price");
      pp.innerHTML = "PRICE: " + my_products[i].product_price;

      let pi = document.getElementById("product" + (i + 1) + "_img");
      pi.src = my_products[i].product_img;

      let pd = document.getElementById("product" + (i + 1) + "_description");
      pd.innerHTML = "Description: " + my_products[i].product_description;
      i++;
    }
  } else {
    i = 9 * (page - 1);
    while (i < my_products.length) {
      let pd = document.getElementById(
        "product" + ((i % 9) + 1) + "_description"
      );
      pd.innerHTML = my_products[i].product_description;

      let pn = document.getElementById("product" + ((i % 9) + 1) + "_name");
      pn.innerHTML = my_products[i].product_name;

      let pp = document.getElementById("product" + ((i % 9) + 1) + "_price");
      pp.innerHTML = "PRICE: " + my_products[i].product_price;

      let pi = document.getElementById("product" + ((i % 9) + 1) + "_img");
      pi.src = my_products[i].product_img;
      i++;
    }
  }
  hide_text();
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

function hide_text() {
  i = 0;
  while (i < 9) {
    let pd = document.getElementById("product" + (i + 1) + "_description");
    pd.innerHTML = pd.innerHTML.substring(0, 100);
    let link = document.createElement("a");
    let text = document.createTextNode(" ...see more here");
    link.href = "specific_product_page.html";
    link.appendChild(text);

    pd.appendChild(link);
    link.setAttribute("id", "see_more");
    link.style.textDecoration = "none";
    link.style.color = "#1B1A1A";
    link.style;

    i++;
  }
}
