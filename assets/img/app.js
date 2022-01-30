const App = {};

App.init = function () {
  App.updateCartButton(localStorage.getItem("cart"));
};

App.products = [
    {
        id: 1,
        name: "Jordan air",
        desc: "Thizs is nike air force.",
        price: 1.0,
        image: "product1.png",
      },
      {
        id: 2,
        name: "Nike air Crimson",
        desc: "Thiis is a sample product thats awesome. Makes you want to buy it.",
        price: 7.5,
        image: "product2.png",
      },
      {
        id: 3,
        name: "Nike white Ghost",
        desc: "Thiis is a sample product thats awesome. Makes you want to buy it.",
        price: 18.0,
        image: "product3.png",
      },
      {
        id: 4,
        name: "Nike Air Blue Shell",
        desc: "Thiis is a sample product thats awesome. Makes you want to buy it.",
        price: 18.0,
        image: "product4.png",
      },
      {
        id: 5,
        name: "Nike air Black",
        desc: "Thiis is a sample product thats awesome. Makes you want to buy it.",
        price: 18.0,
        image: "product5.png",
      },
];

App.addToCart = function (event, id) {
  event.preventDefault();

  const product = App.products.find((product) => product.id === id);
  let cart = JSON.parse(localStorage.getItem("cart"));

  if (cart === null) {
    cart = [];
  }
  const item = cart.find((item) => item.id === id);
  if (item) {
    item.qty++;
  } else {
    cart.push({
      id: id,
      name: product.name,
      price: product.price,
      qty: 1,
    });
  }
  localStorage.setItem("cart", JSON.stringify(cart));
  App.updateCartButton(localStorage.getItem("cart"));
  console.log("Added " + product.name + " to cart");
};

App.updateCartButton = function (cart) {
  // calculate total items in cart
  const cartButton = document.getElementById("cartValue");
  const cartTotal = document.getElementById("cartTotal");
  const cartItems = JSON.parse(cart);

  // find total price
  let totalPrice = 0;
  if (cartItems !== null) {
    cartItems.forEach((item) => {
      totalPrice += item.price * item.qty;
    });
  } else {
    cartButton.style.display = "none";
  }
  cartButton.innerHTML = totalPrice;
  cartTotal.innerHTML = totalPrice;
};
App.floatingCartButton = function () {
  // // Create a floating cart button
  // const cartButton = document.createElement("button");
  // cartButton.classList.add("floating-cart-button");
  // cartButton.innerHTML = '<i class="fas fa-shopping-cart"></i>';
  // cartButton.addEventListener("click", function () {
  //     // Open the cart
  //     App.openCart();
  // });
  // document.body.appendChild(cartButton);
};
App.updateQty = function (event, price, id) {
  let qty = event.target.value;
  console.log(qty * price);
  $("#" + id).text(qty * price);

  // Update the cart item where id = id with the new qty
  let cart = JSON.parse(localStorage.getItem("cart"));
  cart.forEach((item) => {
    if (item.id === id) {
      item.qty = qty;
    }
  });
  cart.forEach((item) => {
    if (item.qty === 0 || item.qty === "" || item.qty <= 0) {
      cart = cart.filter((item) => item.id !== id);
      // remove item id from the modal
      $("." + id)
        .fadeOut("slow")
        .remove();
    }
  });
  localStorage.setItem("cart", JSON.stringify(cart));
  App.updateCartButton(localStorage.getItem("cart"));
};

$(document).ready(function () {
  App.init();
  App.products.forEach((product) => {
    $("#products").append(`
      
 

    <article class="products__card">
    <img src="assets/img/${product.image}" alt="" class="products__img">

    <h3 class="products__title">${product.name}</h3>
    <span class="products__price"> KSH  ${product.price}</span>

    <button class="products__button" onclick="App.addToCart(event, ${product.id})" >
        <i class='bx bx-shopping-bag'></i>
    </button>
</article>




`)
})

  $("#cartModal").on("show.bs.modal", function (event) {
    const cart = JSON.parse(localStorage.getItem("cart"));
    let cartItems = "";
    if (cart !== null) {
      cart.forEach((item, index) => {
        cartItems += `
                <tr class="${item.id}">
                    <td>${index + 1}</td>
                    <td colspan-3>${item.name}</td>
                    <td onchange="App.updateQty(event, ${item.price}, ${
          item.id
        })" colspan-1><input class="form-control col-sm-2" name="qty" type="number" value="${
          item.qty
        }" /></td>
                    <td col-span-1 id="${item.id}">${item.price * item.qty}</td>
                </tr>
                `;
      });
    }
    $("#cartItems").html(cartItems);
  });

  $("#paynow").on("click", async (e) => {
    e.preventDefault();
    // hide cartModal
    const phone = $("#phone").val();

    if (phone.length < 10) {
      $("#phone").addClass("is-invalid");
      $("#phoneErr").html(
        "<small class='text-danger'>Please enter a valid phone number</small>"
      );
      return;
    }
    const cart = JSON.parse(localStorage.getItem("cart"));
    const cartItems = JSON.parse(localStorage.getItem("cart"));

    // // find cart total

    let totalPrice = 0;
    if (cartItems !== null) {
      cartItems.forEach((item) => {
        totalPrice += item.price * item.qty;
      });
    }

    // create order
    const order = {
      phone: phone,
      cart: cart,
      totalPrice: totalPrice,
    };

    // // send order to server
    const response = await fetch("api.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(order),
    });

    // show mpesa modal
    const _response = await response.json();
    if (response.status === 200) {
      $("#cartModal").modal("hide");
      console.log(_response.resp);

      if (_response.resp.ResponseCode == "0") {
        $("#mpesaModal").modal("show");
        const data = response.resp;

        var interval;

        // time to star polling
        let startTime = new Date().getTime();
        // set time to stop polling
        var stopTime = new Date().getTime() + 25000;

        const validate = async () => {
          // get current time
          let now = new Date().getTime();
          // check if time is up
          if (now >= stopTime) {
            clearInterval(interval);
            $("#mpesaModal").modal("hide");
            alert("Sorry, your payment has timed out. Please try again");
          }

          // 1. Method 1
          // - Use the m-pesa endpoint
          // - Use the transaction/order data

          let order = _response.order;

          //   try {
          //     const result = await fetch("orders/" + order + "-payment.json");
          //     const data = await result.json();

          //     if (data) {
          //       clearInterval(interval);
          //       const { Resultcode, ResultDesc } = data.Body.stkCallback;

          //       if (Resultcode == 0) {
          //         alert("Payment Successful");
          //         window.location.href = "index.php";
          //       } else {
          //         alert(ResultDesc);
          //       }
          //       console.log(data);
          //     }
          //   } catch (err) {
          //     console.log(err);
          //   }

          // method 2

          // - Use the m-pesa endpoint
          // - Use the transaction/order data
          try {
            const _result = await fetch("./polling.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({
                order: order,
                MerchantRequestID: _response.resp.MerchantRequestID,
                CheckoutRequestID: _response.resp.CheckoutRequestID,
              }),
            });

            if (_result.status === 200) {
              const _data = await _result.json();
              if (_data) {
                if (
                  _data.errorMessage == "The transaction is being processed"
                ) {
                }
                if (_data.ResponseCode == 0) {
                  clearInterval(interval);

                  if (_data.ResultDesc == "Request cancelled by user") {
                    alert("Payment Cancelled");
                    window.location.href = "index.php";
                  }
                  if (
                    _data.ResultDesc ==
                    "The service request is processed successfully."
                  ) {
                    alert("Payment Successful");
                    window.location.href = "index.php";
                  }
                  // /alert(_data.ResultDesc)
                }
                // console.log(_data);
              } else {
                console.log("error");
              }
            }
          } catch (err) {
            console.log(err);
            clearInterval(interval);

            alert(err.message);
          }
        };

        interval = setInterval(validate, 2000);
      }
    } else {
      alert("An error occured while processing your order");
    }
  });
});
