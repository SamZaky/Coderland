
console.log("hello");




/*RPS*/
let userScore = 0;
let iaScore = 0;
const userScore_span = document.getElementById("user-score");
const iaScore_span = document.getElementById("ia-score");
const scoreBoard_div = document.querySelector(".score-board");
const result_p = document.querySelector(".result >p");
const rock_div = document.getElementById("r");
const paper_div = document.getElementById("p");
const scissors_div = document.getElementById("s");

function getIaChoice() {
    const choices = ['r', 'p' ,'s'] ;
    const randomNumber = Math.floor(Math.random() *3);
    return choices[randomNumber];
}

function convertToWord(letter) {
    if (letter === "r") return "Rock";
    if (letter === "p") return "Paper";
    return "Scissors";
}

function win(userChoice, iaChoice) {
    const userChoice_div = document.getElementById(userChoice);
    userScore++;
    userScore_span.innerHTML = userScore;
    iaScore_span.innerHTML = iaScore;
    result_p.innerHTML = `${convertToWord(userChoice)} beats ${convertToWord(iaChoice)} . You Win!`;
    userChoice_div.classList.add('green-glow');
    setTimeout(function() { userChoice_div.classList.remove('green-glow') }, 500);
}


function lose(userChoice, iaChoice) {
    const userChoice_div = document.getElementById(userChoice);
    iaScore++;
    userScore_span.innerHTML = userScore;
    iaScore_span.innerHTML = iaScore;
    result_p.innerHTML = `${convertToWord(userChoice)} loses to ${convertToWord(iaChoice)} . You Lost!`;
    userChoice_div.classList.add('red-glow');
    setTimeout(function() { userChoice_div.classList.remove('red-glow') }, 500);

}

function draw(userChoice, iaChoice) {
    const userChoice_div = document.getElementById(userChoice);
    result_p.innerHTML = `${convertToWord(userChoice)} equals ${convertToWord(iaChoice)} . It's a draw!`;
    userChoice_div.classList.add('gray-glow');
    setTimeout(function() { userChoice_div.classList.remove('gray-glow') }, 500);
}

function game(userChoice) {
    const iaChoice = getIaChoice();
    switch(userChoice + iaChoice) {
        case"rs":
        case"pr":
        case"sp":
            win(userChoice, iaChoice)
            break;
        case"rp":
        case"ps":
        case"sr":
            lose(userChoice, iaChoice)
            break;
        case"rr":
        case"pp":
        case"ss":
            draw(userChoice, iaChoice)
            break;
    }

}

function main() {
    rock_div.addEventListener('click' , function(){
        game("r")
    })

    paper_div.addEventListener('click' , function(){
        game("p")
    })

    scissors_div.addEventListener('click' , function(){
        game("s")
    })
}

main();
/*RPS*/
