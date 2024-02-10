var data;

function cleanIt(obj) {
    var cleaned = JSON.stringify(obj, null, 2);

    return cleaned.replace(/^[\t ]*"[^:\n\r]+(?<!\\)":/gm, function (match) {
        return match.replace(/"/g, "");
    });
}

function populateData() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         data = JSON.parse(this.responseText);

		 displayProducts(data);
		 setCategories();
		 setPrices();
      }
    };
    xmlhttp.open("GET", "getProductDataController.php", true);
    xmlhttp.send();
  
}

const productsContainer = document.querySelector(".products");
const categoryList = document.querySelector(".category-list");


//code ref: https://www.tutorjoes.in/JS_tutorial/ecommerce_product_filter_in_javascript


function displayProducts(products) {
  if (products.length > 0) {
    const product_details = products
      .map(
        (product) => `
  <div onClick="document.location.href='details.php?productId=${product.id}&product_price=${product.amt}'"  class="product">
  <div class="img">
    <img src="uploads/${product.img}" alt="${product.name}" />
  </div>
  <div class="product-details">
    <span class="name">${product.name}</span>
    <span class="amt">${product.amt}£</span>
    <span class="seller">${product.seller}</span>
  </div>
</div>`
      )
      .join("");

    productsContainer.innerHTML = product_details;
  } else {
    productsContainer.innerHTML = "<h3>No Products Available</h3>";
  }
}

function setCategories() {
	

  const allCategories = data.map((product) => product.catagory);
  //console.log(allCategories);
  const catagories = [
    "All",
    ...allCategories.filter((product, index) => {
      return allCategories.indexOf(product) === index;
    }),
  ];
  //console.log(catagories);
  categoryList.innerHTML = catagories.map((catagory) => `<li>${catagory}</li>`).join("");

  categoryList.addEventListener("click", (e) => {
    const selectedCatagory = e.target.textContent;
    selectedCatagory === "All" ? displayProducts(data) : displayProducts(data.filter((product) => product.catagory == selectedCatagory));
  });
}
const priceRange = document.querySelector("#priceRange");
const priceValue = document.querySelector(".priceValue");

function setPrices() {
  const priceList = data.map((product) => product.amt);
  const minPrice = Math.min(...priceList);
  const maxPrice = Math.max(...priceList);
  priceRange.min = minPrice;
  priceRange.max = maxPrice;
  priceValue.textContent =   maxPrice+"£";

  priceRange.addEventListener("input", (e) => {
    priceValue.textContent =   e.target.value+"£";
    displayProducts(data.filter((product) => product.amt <= e.target.value));
  });
}

const txtSearch = document.querySelector("#txtSearch");
txtSearch.addEventListener("keyup", (e) => {
  const value = e.target.value.toLowerCase().trim();
  if (value) {
    displayProducts(data.filter((product) => product.name.toLowerCase().indexOf(value) !== -1));
  } else {
    displayProducts(data);
  }
});

populateData();

