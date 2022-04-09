let loginButton = document.querySelector("#loginButton")
let signUpButton = document.querySelector("#signUpButton")

let loginForm = document.querySelector("#loginForm")
let signUpForm = document.querySelector("#signUpForm")

loginButton.addEventListener("click", function(){
	loginForm.style.display = "flex"
	signUpForm.style.display = "none"
})

signUpButton.addEventListener("click", function(){
	loginForm.style.display = "none"
	signUpForm.style.display = "flex"
})