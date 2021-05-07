//defaultValue
var defaultSubTotal = 9.49;
var defaultShipping=2;
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
function CalculateInvoice(subtotal,shipping,voucher)
{
    let subtotalBox=document.getElementById("subtotal");
    let shippingBox=document.getElementById("shipping");
    let voucherBox=document.getElementById("voucherBox");
    let totalBox=document.getElementById("totalBox");
    subtotalBox.innerHTML=subtotal.toString();
    shippingBox.innerHTML=shipping.toString();
    let product=subtotal*voucher;
    let result =product/100;
    let voucherAmount= result.toFixed(2);
    let totalAmount=  parseFloat(subtotal)+ parseFloat( shipping)- parseFloat(voucherAmount);
    totalAmount=totalAmount.toFixed(2);
    voucherBox.innerHTML=voucherAmount.toString();
    totalBox.innerHTML=totalAmount.toString();

}
//apply voucher
//get the value then compare it with each voucher if match return the value of the voucher
//if find no match value =0 and send an error message
function ApplyVoucher() {
    let voucherBoxvalue = document.getElementById('voucher');
    function CheckVoucher(value)
    {
        for(let v of vouchers)
        {
            if(value==v.code){
                //voucher match
                return v.value;
            }
        }
        return 0;
    }
    let finalValue=CheckVoucher(voucherBoxvalue.value);
    if(finalValue==0)
    {
        //display
        let discountAmount=document.getElementById("discountAmount");
        let voucherAmount=document.getElementById("voucherAmount");
        discountAmount.style.display="none";
        voucherAmount.innerHTML="0";
        //voucher error...
        //send a message
        alert("voucher is wrong");
        return 0;
    }
    else{
        //display
        let discountAmount=document.getElementById("discountAmount");
        let voucherAmount=document.getElementById("voucherAmount");
        discountAmount.style.display="block";
        discountAmount.innerHTML=finalValue.toString();
        voucherAmount.innerHTML=finalValue.toString();
        CalculateInvoice(defaultSubTotal,defaultShipping,finalValue);
    }
}