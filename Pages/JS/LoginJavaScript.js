// //javascript of new05 adding by Kent//
//   function validateEmail(password) {
//    var password = new RegExp ("^password$");
//    if (password.test(Password)) {
//       return true;
//    }
//    else {
//       alert("Incorrect Password or Username");
//    }}
//   function validateEmail(email) {
//    var emailUser= new RegExp (/^[A-Za-z0-9_.]{2,100}+@[A-Za-z0-9.-]{2,100}+\.[A-Za-z]{2,100}$/);
//    if (emailUser.test(User Email)) {
//       return true;
//    }
//    else {
//       alert("Incorrect Password or Username");
//    }
// }
// function validateEmail(password) {
//  var psword = /^password$/;
//  if (password.match(psword)) {
//     return true;s
//  }
//  else {
//     alert("Incorrect Password or Username");
//  }}
// function validateEmail(email) {
//  var emailUser= new RegExp (/?!^[.+&'_-]*@.*$)(^[_\w\d+&'-]+(\.[_\w\d+&'-]*)*@[\w\d-]+(\.[\w\d-]+)*\.(([\d]{1,3})|([\w]{2,}))$/);
//  if (emailUser.test(User Email)) {
//     return true;
//  }
//  else {
//     alert("Incorrect Password or Username");
//  }
// }
function validateEmail(){
  var password=("^password$/");
  var email=/?!^[.+&'_-]*@.*$)(^[_\w\d+&'-]+(\.[_\w\d+&'-]*)*@[\w\d-]+(\.[\w\d-]+)*\.(([\d]{1,3})|([\w]{2,}))$/;
  var psword = document.getElementById("pswordLogin").value;
  var uemail = document.getElementById("emailLogin").value;
  if (password.values.match(psword) == True) {
    return True;}
    else if (password != psword) {
      alert("Wrong password, please try again.");
      return false;
      reload(true);}
    }
