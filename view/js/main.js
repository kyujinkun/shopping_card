"use strict";
let add = document.querySelectorAll(".add");
let remove = document.querySelectorAll(".remove");
let product = document.querySelectorAll(".product");
let productPrice = document.querySelectorAll(".productPrice");
let totalPrice1 = document.querySelectorAll(".totalPrice")[0];
let totalPrice2 = document.querySelectorAll(".totalPrice")[1];

let productPrices = [2099, 149, 550, 350];
for (let i = 0; i < product.length; i++) {
  add[i].addEventListener("click", function () {
    product[i].value++;
    productPrice[i].innerText =
      Number(productPrice[i].innerText) + productPrices[i];
    totalPrice1.innerText = Number(totalPrice1.innerText) + productPrices[i];
    totalPrice2.innerText = Number(totalPrice2.innerText) + productPrices[i];
  });
  remove[i].addEventListener("click", function () {
    if (product[i].value == 0) {
      return;
    } else {
      product[i].value--;
      productPrice[i].innerText =
        Number(productPrice[i].innerText) - productPrices[i];
      totalPrice1.innerText = Number(totalPrice1.innerText) - productPrices[i];
      totalPrice2.innerText = Number(totalPrice2.innerText) - productPrices[i];
    }
  });
}
