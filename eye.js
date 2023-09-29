let pass = document.querySelector("#pass");
let eyeicon = document.querySelector("#eyeicon");

eyeicon.onclick = function()
{
    if (password.type == "password")
    {
        password.type = "text";
        eyeicon.src = "icofont/eye-open-4-32.png";
    
    } else {
         password.type = "password";
         eyeicon.src = "icofont/eye-close-4-32.png";
     }
}