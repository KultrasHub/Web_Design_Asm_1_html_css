//defaultValue
var defaultSubTotal = 0;
var defaultShipping = 2;
var currentVoucher = 0;
//voucher
var vouchers = [
    {
        code: 'COSC2430-HD',
        value: '20'
    },
    {
        code: 'COSC2430-DI',
        value: '10'
    }];
//compute voucher and total amount 
//display all numbers
function CalculateInvoice(subtotal, shipping, voucher) {
    let subtotalBox = document.getElementById("subtotal");
    let shippingBox = document.getElementById("shipping");
    let voucherBox = document.getElementById("voucherBox");
    let totalBox = document.getElementById("totalBox");
    let subtotalFloat = parseFloat(subtotal).toFixed(2);
    subtotalBox.innerHTML = subtotalFloat.toString();
    shippingBox.innerHTML = shipping.toString();
    let product = subtotalFloat * voucher;
    let result = product / 100;
    let voucherAmount = result.toFixed(2);
    let totalAmount = parseFloat(subtotal) + parseFloat(shipping) - parseFloat(voucherAmount);
    totalAmount = totalAmount.toFixed(2);
    voucherBox.innerHTML = voucherAmount.toString();
    totalBox.innerHTML = totalAmount.toString();

}
//apply voucher
//get the value then compare it with each voucher if match return the value of the voucher
//if find no match value =0 and send an error message
function ApplyVoucher() {
    let voucherBoxvalue = document.getElementById('voucher');
    function CheckVoucher(value) {
        for (let v of vouchers) {
            if (value == v.code) {
                //voucher match
                return v.value;
            }
        }
        return 0;
    }
    let finalValue = CheckVoucher(voucherBoxvalue.value);
    currentVoucher = finalValue;
    if (finalValue == 0) {
        //display
        let discountAmount = document.getElementById("discountAmount");
        let voucherAmount = document.getElementById("voucherAmount");
        discountAmount.style.display = "none";
        voucherAmount.innerHTML = "0";
        //voucher error...
        //send a message
        alert("voucher is wrong");
        return 0;
    }
    else {
        //display
        let discountAmount = document.getElementById("discountAmount");
        let voucherAmount = document.getElementById("voucherAmount");
        discountAmount.style.display = "block";
        discountAmount.innerHTML = finalValue.toString();
        voucherAmount.innerHTML = finalValue.toString();
        CalculateInvoice(defaultSubTotal, defaultShipping, finalValue);
    }
}
//apply saved Product
//create a UI box and add it to cart UI
window.onload = function () {
    Analyze();
}
//filter any key that contain "productNo." and add a product box to cart
function Analyze() {
    let DefaultCode = "productNo.";
    let totalAmount = parseInt(localStorage.getItem('Count'));
    let productData = [];
    //extract and process data
    //cannot add box here as there could be 2 similar products
    for (let i = 1; i <= totalAmount; i++) {
        let completedCode = DefaultCode + i.toString();
        let productValue = localStorage.getItem(completedCode);
        let productComponents = productValue.split(';');
        productComponents.push(completedCode);
        productData.push(productComponents);
    }
    //check tag and merge the similar product
    var closeList = [];//close list contain the product that has been merged
    function BeNotInCloseList(x) {
        for (let i = 0; i < closeList.length; i++) {
            //console.log("oncheck:"+x+" "+i);
            if (x == closeList[i]) {

                return false;
            }
        }
        //console.log("passed:"+x);
        return true;
    }
    let passedBox = 1;//reduce Box
    for (let i = 0; i < productData.length; i++) {
        if (BeNotInCloseList(i)) {
            let proAmount = parseInt(productData[i][6]);
            for (let j = i + 1; j < productData.length; j++) {
                if (productData[i][1] == productData[j][1]) {
                    //matched
                    //merge amoutn
                    proAmount += parseInt(productData[j][6]);
                    closeList.push(j);
                    //delete on storage
                    console.log("compare:" + i + "deleted" + j);
                    localStorage.removeItem(productData[j][7]);
                    //also change count
                    let currentcount = localStorage.getItem("Count");
                    let currentcountValue = parseInt(currentcount);
                    currentcountValue -= 1;
                    localStorage.setItem("Count", currentcountValue.toString());
                }
            }

            //checking i complete
            //add box here      
            AddBox(productData[i][0], productData[i][2], productData[i][3], productData[i][4], productData[i][5], proAmount, productData[i][7]);
            //remove the current product in shop and save it to the new position
            localStorage.removeItem(productData[i][7]);
            //save to storage
            let stringValue = productData[i][0] + ";" + productData[i][1] + ";" + productData[i][2] + ";" + productData[i][3] + ";" + productData[i][4] + ";" + productData[i][5] + ";" + proAmount.toString();
            localStorage.setItem("productNo." + passedBox.toString(), stringValue);
            passedBox += 1;
        }
    }
    let mainAmount = document.getElementById("MainAmount");
    mainAmount.innerHTML = (passedBox - 1).toString() + " items";

}
function AddBox(name, author, price, photo, alt, amount, productKey) {
    let cart = document.getElementById("cart");
    let box = document.createElement('div');
    box.className = "box";
    cart.appendChild(box);
    //img
    let pic = document.createElement('img');
    pic.src = photo;
    pic.alt = alt;
    box.appendChild(pic);
    //left
    let left = document.createElement('div');
    left.className = "left";
    box.appendChild(left);
    //left-h4
    let pName = document.createElement('h4');
    pName.innerHTML = name;
    left.appendChild(pName);
    let pAuthor = document.createElement('h4');
    pAuthor.className = "AuthorName";
    pAuthor.innerHTML = author;
    left.appendChild(pAuthor);
    //left-input
    let pAmount = document.createElement('input');
    pAmount.type = "number";
    pAmount.value = amount;
    pAmount.required = 'required';
    left.appendChild(pAmount);
    //left-inputSecret
    let pinputSecret = document.createElement('span');
    pinputSecret.style.display = 'none';
    pinputSecret.innerHTML = price;
    pAmount.appendChild(pinputSecret);
    //right
    let right = document.createElement('div');
    right.className = "right";
    box.appendChild(right);
    //right-prices
    let pprice = document.createElement('span');
    pprice.className = "prices";
    pprice.id = "prices";
    //calculate the product of price and amount
    let totalPrice = parseFloat(price) * parseInt(amount);
    totalPrice = totalPrice.toFixed(2);
    //add total price to subtotal
    defaultSubTotal += parseFloat(totalPrice);
    defaultSubTotal.toFixed(2);
    CalculateInvoice(defaultSubTotal, defaultShipping, 0);
    pprice.innerHTML = totalPrice;
    right.appendChild(pprice);
    //right-remove
    let premove = document.createElement('span');
    premove.className = "remove";
    premove.innerHTML = "remove";
    premove.onclick = function () { DeleteBlock(this); }
    right.appendChild(premove);
    //hidden id
    let pHidden = document.createElement('span');
    pHidden.id = "hidden";
    pHidden.innerHTML = productKey;
    pHidden.style.display = 'none';
    premove.appendChild(pHidden);
    //add input on input
    pAmount.oninput = function () {
        UpdateAmount(this, pprice);
    }

}
function UpdateAmount(o, pBox) {
    //get the hidden price
    let hiddenPrice = o.children[0].innerHTML;
    let price = parseFloat(hiddenPrice);
    let value = parseInt(o.value);
    if (value != null && value != "" &&o.value.length!=0) {
        //compute the total price
        let result = price * parseInt(o.value);
        result = parseFloat(result).toFixed(2);
        //get the value and subtract it from subtotal
        let currentValue = parseFloat(pBox.innerHTML);
        defaultSubTotal =parseFloat(defaultSubTotal)- currentValue;
        defaultSubTotal += parseFloat(result);
        CalculateInvoice(defaultSubTotal, defaultShipping, currentVoucher);
        //display on the pbox
        pBox.innerHTML = result.toString();
    }
    else {
        let currentValue = parseFloat(pBox.innerHTML);
        defaultSubTotal-=parseFloat(currentValue);
        CalculateInvoice(defaultSubTotal, defaultShipping, currentVoucher);
        pBox.innerHTML = '0';
    }
    //update 
}
function DeleteBlock(o) {
    let hiddenData = o.children[0].innerHTML;
    let num = parseInt(hiddenData.match(/\d+/g));

    if (hiddenData != null) {
        let code = 'productNo.';
        //console.log("deleted:"+num);
        let currentcount = localStorage.getItem("Count");
        let currentcountValue = parseInt(currentcount);
        localStorage.removeItem(code + num.toString());
        //replace the n with n+1
        //first get item productNo.n+1 and save it as productNo.n
        for (var i = num + 1; i <= currentcountValue; i++) {
            let product = localStorage.getItem(code + i.toString());
            let smaller = i - 1;
            localStorage.setItem(code + smaller.toString(), product);
            //delete the old one
            localStorage.removeItem(code + i.toString());
        }
        //also change count
        currentcountValue -= 1;
        localStorage.setItem("Count", currentcountValue.toString());
        location.reload();
    }
    else {
        console.log('no hidden data found');
    }

}