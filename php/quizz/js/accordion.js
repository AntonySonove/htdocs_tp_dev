const accordionButton = document.querySelector("#accordion-button");
const accordionArrow = document.querySelector("#accordion-button span");
const bestScoresSection = document.querySelector("#best-scores");
const scoresContainer = document.querySelector("#scores-container");

console.log(accordionButton);
console.log(accordionArrow);
console.log(bestScoresSection);
console.log(scoresContainer);

accordionButton.addEventListener('click', () => {
    if (bestScoresSection.style.display == "none" || !bestScoresSection.style.display) {
        bestScoresSection.style.display = "grid";
        scoresContainer.style.padding = "0px 10px 10px 10px";
        accordionArrow.innerText = "keyboard_arrow_up";
    } else {
        bestScoresSection.style.display = 'none';
        accordionArrow.innerText = "keyboard_arrow_down";
        scoresContainer.style.padding = "0px 10px";
    }
});


