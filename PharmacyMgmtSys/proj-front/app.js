let bodybtn = document.getElementById("body");
let closebtn = document.querySelector(".close");
let listCartHTML = document.querySelector(".list-item");
let iconCartSpan = document.querySelector(".add-to-cart span:nth-child(2)")
let carts = [];
let listProducts =[];

function togglecart(){
    bodybtn.classList.toggle('showcart');
}

closebtn.addEventListener('click', () => {
    bodybtn.classList.toggle('showcart');
});

const initApp = () => {
    fetch('products.json')
    .then(Response => Response.json())
    .then(data => {
        listProducts = data;
    })
}
initApp();

function addtocart(num){
    let position = carts.findIndex((value) => value.product_id == num);
    if(carts.length <= 0){
        carts = [{
            product_id: num,
            quantity: 1
        }]
    }else if(position < 0){
        carts.push({
            product_id: num,
            quantity: 1
        })
    }else{
        carts[position].quantity = carts[position].quantity + 1;
    }
    addCartToHTML();
}

const addCartToHTML = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;

    if(carts.length > 0){
        carts.forEach(cart => {
            totalQuantity = totalQuantity + cart.quantity
            let newCart = document.createElement('div');
            newCart.classList.add('item');
            newCart.dataset.id = cart.product_id;
            newCart.innerHTML = `
                <div class="image">
                    <img src="image/medicine.jpg" alt="product">
                </div>
                <div class="name">
                    NAME
                </div>
                <div class="price">
                    Price
                </div>
                <div class="quantity">
                    <span class="minus"><</span>
                    <span>${cart.quantity}</span>
                    <span class="plus">></span>
                </div>
            `;
        listCartHTML.appendChild(newCart);
        })
    }
    iconCartSpan.innerHTML = totalQuantity;
}

listCartHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if(positionClick.classList.contains('minus') || positionClick.classList.contains('plus')){
        let product_id = positionClick.parentElement.parentElement.dataset.id;
        let type = 'minus';
        if(positionClick.classList.contains('plus')){
            type ='plus';
        }
        changeQuantity(product_id, type);
    }
})

const changeQuantity = (product_id, type) => {
    let positionItemInCart = carts.findIndex((value) => value.product_id == product_id);
    if(positionItemInCart >= 0){
        switch (type) {
            case 'plus':
                carts[positionItemInCart].quantity = carts[positionItemInCart].quantity + 1;
                break;
        
            default:
                let valuechange = carts[positionItemInCart].quantity - 1;
                if(valuechange > 0){
                    carts[positionItemInCart].quantity = valuechange;
                }else{
                    carts.splice(positionItemInCart, 1);
                }
                break;
        }
    }
    addCartToHTML();
}