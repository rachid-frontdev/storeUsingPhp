<?php 
//declare(strict_types = 1);
//error_reporting(-1);

?>
<head>
<style>
    .main{
            display: grid;
grid-template-columns: repeat(4,1fr);
grid-gap: 1em;
    }
    img {
        width: 200px;
height: 133px;
    }
    </style>
</head>
<h1>Charge $55 with Stripe</h1>

<!-- display errors returned by createToken -->
<span class="payment-errors"></span>

<!-- stripe payment form -->
<form action="submit.php" method="POST" id="paymentFrm">
    <p>
        <label>Name</label>
        <input type="text" name="name" size="50" />
    </p>
    <p>
        <label>Email</label>
        <input type="text" name="email" size="50" />
    </p>
    <p>
        <label>Card Number</label>
        <input type="text" name="card_num" size="20" autocomplete="off" 
class="card-number" />
    </p>
    <p>
        <label>CVC</label>
        <input type="text" name="cvc" size="4" autocomplete="off" class="card-cvc" />
    </p>
    <p>
        <label>Expiration (MM/YYYY)</label>
        <input type="text" name="exp_month" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_year" size="4" class="card-expiry-year"/>
    </p>
    <button type="submit" id="payBtn">Submit Payment</button>
</form>
<div class="main">
<article class="items">
<div class="img-container">
    <img style='width:200px;' src="product.jpg" alt="">
    <button class="bag_btn">add to bag</button>

</div>
    <h3 class="item_price">$ <span class="price">22.15</span></h3>
    <h5 class="item_title">Dressers</h5>
    </article>
    </div>
    <img src="hoz.jpg" name="titlef" onload='setTimeout(titleAnimate,animspeed)'>

<script>
let now = [...document.forms.paymentFrm.elements]
.filter(ele =>{ 
    return ele.getAttribute('name')

}).forEach(ele => {
    return ele.onpaste = e => e.preventDefault();
});


let vla = document.getElementById('paymentFrm').name;
    vla.onchange = function() {
        if (this.value == 'rachid' || this.value == 'mani'){
        return console.log(this.value);
    } else {
        alert('error');
        this.value = '';
        return this.focus();
    }
    }
    class Product {
          async getProduct() {
       try{
        let search =  await fetch('searchspring.json');
        let data = await search.json();
        let product = data.map(item => {
            const {title,price,description,filename} = item
               return {
               title,
                price,
                description,
                filename
               }
           })
           return product;
       } catch(err) {
           console.log(err)
       }
    }
    }
    new Product().getProduct()
    .then(data => {
//        let eleDOM = document.querySelector('article');
//          for (let inc=0; inc< data.length;inc+=1){
//            
//            text += `<article class="items${inc +1}">
//<div class="img-container">
//    <img style="width:200px;" src="product.jpg" alt="">
//    <button class="bag_btn">add to bag</button>
//
//</div>
//    <h3 class="item_price">$ <span class="price">${data[inc].price}</span></h3>
//    <h5 class="item_title">${data[inc].title}</h5>
//    </article>`;
//        }
//            eleDOM.outerHTML = text
         let text = '';
        let eleDOM = document.querySelector('.main')
 for (let product=0; product< data.length;product+=1){
            text += `<article class="items">
<div class="img-container">
    <img src="${data[product].filename}" alt="">
    <button class="bag_btn">add to bag</button>

</div>
    <h3 class="item_price">$ <span class="price">${data[product].price}</span></h3>
    <h5 class="item_title">${data[product].title}</h5>
    </article>`;
        }
            eleDOM.innerHTML = text
    });

// practicingFrames
    let frames = [],
        numFrames = 4,
        current = 1,
        animspeed = 1000,
        domImage = document.titlef;
    console.log(domImage.src)
    for(let i =0;i < numFrames; i+=1) {
        frames[i] = new Image();
        frames[i].src = 'image/'+i+ '.jpg';
        function titleAnimate() {
            if(frames[numFrames - 1].complete) {
                domImage.src = frames[current++].src;
            } 
            
            if (current == numFrames) {
                current = 0;
            } else {
                        setTimeout(titleAnimate,animspeed)
            }
        }
    }
            console.log(frames)
           
        
</script>