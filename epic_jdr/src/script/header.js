// Dropdown menu créer et gérer

//Dropdown créer et gérer

//créer

const dropdownMenuCreer= document.getElementById("dropdownMenuCreer");
const showMenuCreer= document.getElementById("showMenuCreer");

dropdownMenuCreer.onmouseenter=(function(){mouseEnterCreer()});
dropdownMenuCreer.onmouseleave=(function(){mouseLeaveCreer()});

function mouseEnterCreer(){
    showMenuCreer.classList.remove("menuCache");
}
function mouseLeaveCreer(){
    showMenuCreer.classList.add("menuCache")
    // showMenuCreer.classList.add("menuCache");
}
        //gérer

const dropdownMenuGerer= document.getElementById("dropdownMenuGerer");
const showMenuGerer= document.getElementById("showMenuGerer");

dropdownMenuGerer.onmouseenter=(function(){mouseEnterGerer()});
dropdownMenuGerer.onmouseleave=(function(){mouseLeaveGerer()});

function mouseEnterGerer(){
    showMenuGerer.classList.remove("menuCache");
}
function mouseLeaveGerer(){
    showMenuGerer.classList.add("menuCache")
    // showMenuGerer.classList.add("menuCache");
}