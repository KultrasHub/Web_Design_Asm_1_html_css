//javascript of new05 adding by Kent//
  function inputBox() {
   var password= new RegExp ('password')
   if (password.test(Password)) {
      return true
   }
   else {
      alert("Incorrect Password or Username")
   }
   var emailUser= new RegExp (/^[A-Za-z0-9_.]{2,100}+@[A-Za-z0-9.-]{2,100}+\.[A-Za-z]{2,100}$/)
   if (emailUser.test(User Email)) {
      return true
   }
   else {
      alert("Incorrect Password or Username")
   }
}
