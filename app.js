const cardArray = [
    {
        name: '1',
        img: 'images/1.jpg'
    },
    {
        name: '2',
        img: 'images/2.jpg'
    },
    {
        name: '3',
        img: 'images/3.jpg'
    },
    {
        name: '4',
        img: 'images/4.jpg'
    },
    {
        name: '5',
        img: 'images/5.jpg'
    },
    {
        name: '6',
        img: 'images/6.jpg'
    },
    {
        name: '7',
        img: 'images/7.jpg'
    },
    {
        name: '8',
        img: 'images/8.jpg'
    },
    {
        name: '9',
        img: 'images/9.jpg'
    },
    {
        name: '10',
        img: 'images/10.jpg'
    },
    {
        name: '11',
        img: 'images/11.jpg'
    },
    {
        name: '12',
        img: 'images/12.jpg'
    },
    {
        name: '13',
        img: 'images/13.jpg'
    },
    {
        name: '14',
        img: 'images/14.jpg'
    },
    {
        name: '15',
        img: 'images/15.jpg'
    },
    {
        name: '16',
        img: 'images/16.jpg'
    },
    {
        name: '17',
        img: 'images/17.jpg'
    },
    {
        name: '18',
        img: 'images/18.jpg'
    },
    {
        name: '1',
        img: 'images/1.jpg'
    },
    {
        name: '2',
        img: 'images/2.jpg'
    },
    {
        name: '3',
        img: 'images/3.jpg'
    },
    {
        name: '4',
        img: 'images/4.jpg'
    },
    {
        name: '5',
        img: 'images/5.jpg'
    },
    {
        name: '6',
        img: 'images/6.jpg'
    },
    {
        name: '7',
        img: 'images/7.jpg'
    },
    {
        name: '8',
        img: 'images/8.jpg'
    },
    {
        name: '9',
        img: 'images/9.jpg'
    },
    {
        name: '10',
        img: 'images/10.jpg'
    },
    {
        name: '11',
        img: 'images/11.jpg'
    },
    {
        name: '12',
        img: 'images/12.jpg'
    },
    {
        name: '13',
        img: 'images/13.jpg'
    },
    {
        name: '14',
        img: 'images/14.jpg'
    },
    {
        name: '15',
        img: 'images/15.jpg'
    },
    {
        name: '16',
        img: 'images/16.jpg'
    },
    {
        name: '17',
        img: 'images/17.jpg'
    },
    {
        name: '18',
        img: 'images/18.jpg'
    }

]
console.log(cardArray)

cardArray.sort(() => 0.5 - Math.random())       

const gridDisplay = document.querySelector('#grid')               
const resultDisplay = document.querySelector('#result')            



let cardsChosen = []           
let cardsChosenIds = []

const cardsWon = []

function createBoard () {
    for (let i = 0; i < cardArray.length; i++)
    {
       const card = document.createElement('img')
       card.setAttribute('src', 'images/back.jpg')
       card.setAttribute('data-id', i)
       card.classList.add("card");
       card.addEventListener('click', flipCard)
       gridDisplay.appendChild(card)
    }
}

createBoard();

function chechkMatch() {
    const cards = document.querySelectorAll('img')
    const optionOneId = cardsChosenIds[0]
    const optionTwoId = cardsChosenIds[1]

    if(optionOneId == optionTwoId) {

        cards[optionOneId].setAttribute('src', 'images/back.jpg')
        cards[optionTwoId].setAttribute('src', 'images/back.jpg')
        alert('neklikej na stejny obrazek dvakrat')
    } else if
        (cardsChosen[0] == cardsChosen[1]) {
        alert("našel jsi match")
        cards[optionOneId].setAttribute('src', 'images/goodJob.jpg')
        cards[optionTwoId].setAttribute('src', 'images/goodJob.jpg')
        cards[optionOneId].removeEventListener('click', flipCard)
        cards[optionTwoId].removeEventListener('click', flipCard)     
        cardsWon.push(cardsChosen)
    } else {
        cards[optionOneId].setAttribute('src', 'images/back.jpg')
        cards[optionTwoId].setAttribute('src', 'images/back.jpg')
        alert('zkus znovu')
    }
    resultDisplay.textContent = cardsWon.length

    
    $.ajax({
        url: "./server.php", 
        type: "POST",
        name: "savedata",
        data: {
          //user_id: 1,
            score: cardsWon.length
        },
        success: function (response) {
          console.log("Data byla úspěšně uložena");
        },
        error: function () {        
          console.log("Došlo k chybě při ukládání dat");
        },
      });

    cardsChosen = []
    cardsChosenIds = []

    if (cardsWon.length == (cardArray.length/2)) {
        resultDisplay.textContent = 'našel jsi vše!'

        }
    }


function flipCard() {
    const cardId = this.getAttribute('data-id')
    cardsChosen.push(cardArray[cardId].name)
    cardsChosenIds.push(cardId)
    this.setAttribute('src', cardArray[cardId].img)
    if (cardsChosen.length === 2) {
        setTimeout(chechkMatch, 500)
    }
}
