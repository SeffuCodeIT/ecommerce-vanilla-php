const App = {};

App.init = () => {
    App.updateCartButton()
}

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
        name: "Nike air Black Suede",
        desc: "Thiis is a sample product thats awesome. Makes you want to buy it.",
        price: 18.0,
        image: "product5.png",
      }
      
]

App.addToCart = (e, id) => {
    e.preventDefault()

    // find product with id supplied
    const product = App.products.find((product) => product.id === id)

    // our cart 
    // we using localstorage
    let cart = JSON.parse(localStorage.getItem("cart"))

    if(cart === null) {
        cart = []
    } 
    
    // if we already had the product in the cart.
    let item = cart.find((item) => item.id === id)

    if(item) {
        item.qty++
    } else {    
        // add the product to cart
        product.qty = 1
        cart.push(product)
    }

    localStorage.setItem("cart", JSON.stringify(cart))

    console.log(`product ${product.name} has been added to cart`)
    App.updateCartButton()
}

App.updateCartButton = () => {
    const cartBtn = document.getElementById("cartValue"),
    cartItems = JSON.parse(localStorage.getItem("cart"))

    let total = 0

    if(cartItems !== null){
        cartItems.forEach((item) => {
            total += item.price * item.qty
        })
    }

    cartBtn.innerHTML = total

    if(document.getElementById("cartTotal")) {
        document.getElementById("cartTotal").innerHTML = total
    }
}


App.updateQty = (e, price, id) => {
    const qty = e.target.value
    $("#" + id).text(qty * price)

    let cart = JSON.parse(localStorage.getItem("cart"))

    cart.forEach((item) => {
        if(item.id == id){
            item.qty = qty
        }

        if(item.qty <= 0) {
            cart = cart.filter((item) => item.id !== id)
            $("." +id).remove()
        }
    })

    localStorage.setItem("cart", JSON.stringify(cart))
    App.updateCartButton()
}


$(() => {

    App.init()
    App.products.forEach((product) => {
        // load our products
       
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


    $("#cartModal").on('show.bs.modal', () => {
        const cart = JSON.parse(localStorage.getItem("cart"))

        let itemRows = ""

        if(cart !== null) {
            cart.forEach((item, index) => {
                itemRows += `
                    <tr class="${item.id}">
                        <td>${index+1}</td>
                        <td col-span-2>${item.name}</td>
                        <td onchange="App.updateQty(event, ${item.price}, ${item.id})">
                            <input name="qty" value="${item.qty}" type="number" />
                        </td>
                        <td>${item.price}</td>
                        <td id="${item.id}" col-span-2>${ item.qty * item.price }</td>
                    </tr>
                `
            })
        }

        $("#cartItems").html(itemRows)
    })

    $("#paynow").on('click', async (e) => {
        e.preventDefault()

        let phone = $("#phone").val()

        // if(phone.length < 10 || phone.length !== 12){
        //     $("#phone").addClass("is-invalid")
        //     return
        // }

        const cart = JSON.parse(localStorage.getItem("cart"))

        // total
        let _total = 0
        cart.forEach((item) => {
            _total += parseInt(item.price) + parseInt(item.qty)
        })

        let order = {
            order: cart,
            total: _total,
            phone,
        }

        const _response = await fetch("api/stk.php", {
            method: 'post',
            headers: { 'content-type': 'application/json', 'accept': 'application/json'},
            body: JSON.stringify(order)
        })

        if(_response.status === 200) {
            const res = await _response.json()

            var interval;

            let startTime = new Date().getTime()
            let stopTime = new Date().getTime() + 25000;
            let orderid = res.orderid
            let stkreqres = res.stkreqres.CheckoutRequestID


            const callback = async () => {
                let now = new Date().getTime()

                if(now > stopTime){
                    clearInterval(interval)
                    alert("Your payment session has timed out")
                    return
                }

                // method 1
                 const poll = await fetch('api/orders/' + orderid + '-payment.json')

                 if(poll.status == 200) {
                     const _poll = await poll.json()
                     const { Body } = _poll

                     if(Body.stkCallback.ResultCode !== 0){
                     alert(Body.stkCallback.ResultDesc)
                 }
                     if(Body.stkCallback.ResultCode === 0){
                         alert(Body.stkCallback.ResultDesc)
                        window.location.reload()
                     }
                     clearInterval(interval)
                 } 

                };
/*
                // method 2
                const _poll = await fetch('api/polling.php?id=' + stkreqres)

                if(_poll.status === 200) {
                    const _res = await _poll.json()

                    if(_res.errorCode){}
                    else if(_res.ResultCode && _res.ResultCode == 0) {
                        clearInterval(interval)
                        alert(_res.ResultDesc)
                        window.location.reload()
                    } else if(_res.ResultCode && _res.ResultCode != 0) {
                        clearInterval(interval)
                        alert(_res.ResultDesc)
                    }
                    console.log(_res)
                }

                if(_poll.status >= 500) {
                    clearInterval(interval)
                    alert("Sorry we encountered an error")
                }
            }

            interval = setInterval(callback, 2000)

        } else {
            $("#err").html(`<p class="alert alert-danger">${_response.statusText}</p>`)
        }

    })


})  */
