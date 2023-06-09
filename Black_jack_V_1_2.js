// ///////////////
// black jack v1.2
// author: Arwain Davies
// date: 12/01/23      

var decksize = 52                                                                   // global variables set
var player_score =0
var dealer_score =0
player_hand_size = 0
dealer_hand_size = 0
win_condition = "Game in progress"
cardArray = ['1s','2s','3s','4s','5s','6s','7s','8s','9s','10s','js','qs','ks',
            '1h','2h','3h','4h','5h','6h','7h','8h','9h','10h','jh','qh','kh',
            '1d','2d','3d','4d','5d','6d','7d','8d','9d','10d','jd','qd','kd',
            '1c','2c','3c','4c','5c','6c','7c','8c','9c','10c','jc','qc','kc'];
playerArray = []
dealerArray = []                    

window.onload = function(){

    document.getElementById("btn_deal").disabled = false;
    document.getElementById("btn_twist").disabled = true;
    document.getElementById("btn_stick").disabled = true;
    document.getElementById("btn_reset").disabled = false;
    document.getElementById('span_output_dealer_score').style.visibility = 'visible';
    document.getElementById('span_output_dealer_hand').style.visibility = 'visible';
    document.getElementById('span_output_dealer_cards').style.visibility = 'visible';

    document.querySelector('#btn_deal').addEventListener('click',function(){
    deal(),
    document.getElementById("btn_deal").disabled = true,
    document.getElementById("btn_twist").disabled = false,
    document.getElementById("btn_stick").disabled = false,
    refresh();
})
    document.querySelector('#btn_twist').addEventListener('click',function(){
        twist();
    })
    document.querySelector('#btn_stick').addEventListener('click',function(){
        stick();
    })
    document.querySelector('#btn_reset').addEventListener('click',function(){
        reset();
    })



} // close onload function

function refresh(){                                                                 //function updates user interface
  
    document.querySelector('#span_output_deck'). innerHTML = 'Deck: ' + decksize + ' ';
    document.querySelector('#span_output_player_score'). innerHTML = 'Player Score:' + player_score;
    document.querySelector('#span_output_player'). innerHTML = playerArray + ' '; 
    document.querySelector('#span_output_dealer_score'). innerHTML = 'dealer Score:' + dealer_score;
    document.querySelector('#span_output_win'). innerHTML = 'winner?';
    return;
}
function refresh_lose(){                                                                 //function updates user interface
    document.getElementById("btn_deal").disabled = true;
    document.getElementById("btn_twist").disabled = true;
    document.getElementById("btn_stick").disabled = true;
    document.getElementById("btn_reset").disabled = false;
    document.getElementById('span_output_dealer_score').style.visibility = 'visable';
    document.getElementById('span_output_dealer_hand').style.visibility = 'visable';
    document.getElementById('span_output_dealer_cards').style.visibility = 'visable';

    document.querySelector('#span_output_deck'). innerHTML = 'Deck: ' + decksize + ' ';
    document.querySelector('#span_output_player_score'). innerHTML = 'Player Score:' + player_score;
    document.querySelector('#span_output_player'). innerHTML = playerArray + ' '; 
    document.querySelector('#span_output_dealer_score'). innerHTML = 'dealer Score:' + dealer_score;
    document.querySelector('#span_output_win'). innerHTML = 'You Lost';
}function refresh_win(){                                                                 //function updates user interface
    
    document.getElementById("btn_deal").disabled = true;
    document.getElementById("btn_twist").disabled = true;
    document.getElementById("btn_stick").disabled = true;
    document.getElementById("btn_reset").disabled = false;
    document.getElementById('span_output_dealer_score').style.visibility = 'visable';
    document.getElementById('span_output_dealer_hand').style.visibility = 'visable';
    document.getElementById('span_output_dealer_cards').style.visibility = 'visable';
document.querySelector('#span_output_deck'). innerHTML = 'Deck: ' + decksize + ' ';
    document.querySelector('#span_output_player_score'). innerHTML = 'Player Score:' + player_score;
    document.querySelector('#span_output_player'). innerHTML = playerArray + ' '; 
    document.querySelector('#span_output_dealer'). innerHTML = dealerArray + ' ';
    document.querySelector('#span_output_dealer_score'). innerHTML = 'dealer Score:' + dealer_score;
    document.querySelector('#span_output_win'). innerHTML = 'You Win?';
}
function refresh_tie(){                                                                 //function updates user interface
    document.getElementById("btn_deal").disabled = true;
    document.getElementById("btn_twist").disabled = true;
    document.getElementById("btn_stick").disabled = true;
    document.getElementById("btn_reset").disabled = false;
    document.getElementById('span_output_dealer_score').style.visibility = 'visable';
    document.getElementById('span_output_dealer_hand').style.visibility = 'visable';
    document.getElementById('span_output_dealer_cards').style.visibility = 'visable';

    document.querySelector('#span_output_deck'). innerHTML = 'Deck: ' + decksize + ' ';
    document.querySelector('#span_output_player_score'). innerHTML = 'Player Score:' + player_score;
    document.querySelector('#span_output_player'). innerHTML = playerArray + ' '; 
    document.querySelector('#span_output_dealer_score'). innerHTML = 'dealer Score:' + dealer_score;
    document.querySelector('#span_output_win'). innerHTML = 'It`s a draw';
}                                                              
function deal(){
    for(i = 0; i <= 1 ; i++) {
        randomcard = randNo = Math.floor(Math.random()*(decksize)),
        playerArray.push(cardArray[(randomcard)]),
        cardArray.splice(randomcard,1),
        decksize --,
     pl_score(),
     player_hand_size++;
}   }

function twist(){
    randomcard = randNo = Math.floor(Math.random()*(decksize)),
    playerArray.push(cardArray[(randomcard)]),
    cardArray.splice(randomcard,1),
    decksize --,
    pl_score(),
    player_hand_size++,
    refresh(),
    check_bust(),
    check_hand_size();
}

function stick(){
    debugger
    randomcard = randNo = Math.floor(Math.random()*(decksize)),
    dealerArray.push(cardArray[(randomcard)]),
    cardArray.splice(randomcard,1),
    decksize --,
    dl_score(),
    dealer_hand_size++,
    refresh(),
    check_bust_dealer(),
    dealer_draw_check();
}

function check_bust(){
    if (player_score >= 22){
        refresh_lose();
    }
    else {
    }
    return;
}
function check_hand_size(){
    if(player_hand_size == 5){
        stick();
    }
    else{
    }
    return;
}
function check_bust_dealer(){
    if(dealer_score> 21){
        refresh_win()
    }
    else{

    }
    return;
}
function dealer_draw_check(){
    if (dealer_hand_size == 5){
        compare_scores();
    }
    else if (dealer_score > 21){
        compare_scores();
    }
    else if(dealer_score < player_score){
        stick();
    }
    else{
        compare_scores();
    }
    return;
}


function compare_scores(){
    debugger
    document.getElementById("btn_twist").disabled = true;
    document.getElementById("btn_stick").disabled = true;
    if(player_hand_size == 5 && dealer_hand_size == 5){
        refresh_tie()
    }
    else if(player_hand_size ==5 && dealer_hand_size != 5){
        refresh_win()
    }
    else if(dealer_hand_size==5 && player_hand_size != 5){
        refresh_lose()

    }
    else if(dealer_score > 21){
        refresh_win();
    }
    else if(dealer_score > player_score && dealer_score <=21){
        refresh_lose();
    }
    else{
        document.querySelector('#span_output_win'). innerHTML = 'error?';
    }
    return;
}

function reset(){
    debugger
    var decksize = 52                                                                   // global variables set
    var player_score =0
    var dealer_score =0
    player_hand_size = 0
    dealer_hand_size = 0
    win_condition = "Game in progress"
    cardArray = ['1s','2s','3s','4s','5s','6s','7s','8s','9s','10s','js','qs','ks',
                '1h','2h','3h','4h','5h','6h','7h','8h','9h','10h','jh','qh','kh',
                '1d','2d','3d','4d','5d','6d','7d','8d','9d','10d','jd','qd','kd',
                '1c','2c','3c','4c','5c','6c','7c','8c','9c','10c','jc','qc','kc'];
    playerArray = []
    dealerArray = []            

        document.getElementById("btn_deal").disabled = false;
        document.getElementById("btn_twist").disabled = true;
        document.getElementById("btn_stick").disabled = true;
        document.getElementById("btn_reset").disabled = false;
        document.querySelector('#span_output_deck'). innerHTML = 'Deck: ' + decksize + ' ';
        document.querySelector('#span_output_player_score'). innerHTML = 'Player Score:' + player_score;
        document.querySelector('#span_output_player'). innerHTML = playerArray + ' '; 
        document.querySelector('#span_output_dealer_score'). innerHTML = 'dealer Score:' + dealer_score;
        document.querySelector('#span_output_win'). innerHTML = 'winner?';
        refresh();
}

function pl_score(){

    switch(playerArray[player_hand_size]){ 
        case "1s":
            player_score +=1 ;
            break;
            
        case "2s":
            player_score +=2 ;
            break;
        
        case "3s":
            player_score +=3 ;
            break;
        
        case "4s":
            player_score +=4 ;
            break;
        
        case "5s":
            player_score +=5 ;
            break;
        
        case "6s":
            player_score +=6 ;
            break;
        
        case "7s":
            player_score +=7 ;
            break;
        
        case "8s":
            player_score +=8 ;
            break;
        
        case "9s":
            player_score +=9 ;
            break;
        
        case "10s":
            player_score +=10 ;
            break;
        
        case "js":
            player_score +=10 ;
            break;
        
        case "qs":
            player_score +=10 ;
            break;
        
        case "ks":
            player_score +=10 ;
            break;
            
        case "1h":
            player_score +=1 ;
            break;
            
        case "2h":
            player_score +=2 ;
            break;
        
        case "3h":
            player_score +=3 ;
            break;
        
        case "4h":
            player_score +=4 ;
            break;
        
        case "5h":
            player_score +=5 ;
            break;
        
        case "6h":
            player_score +=6 ;
            break;
        
        case "7h":
            player_score +=7 ;
            break;
        
        case "8h":
            player_score +=8 ;
            break;
        
        case "9h":
            player_score +=9 ;
            break;
        
        case "10h":
            player_score +=10 ;
            break;
        
        case "jh":
            player_score +=10 ;
            break;
        
        case "qh":
            player_score +=10 ;
            break;
        
        case "kh":
            player_score +=10 ;
            break;
 
        case "1c":
            player_score +=1 ;
            break;
            
        case "2c":
            player_score +=2 ;
            break;
        
        case "3c":
            player_score +=3 ;
            break;
        
        case "4c":
            player_score +=4 ;
            break;
        
        case "5c":
            player_score +=5 ;
            break;
        
        case "6c":
            player_score +=6 ;
            break;
        
        case "7c":
            player_score +=7 ;
            break;
        
        case "8c":
            player_score +=8 ;
            break;
        
        case "9c":
            player_score +=9 ;
            break;
        
        case "10c":
            player_score +=10 ;
            break;
        
        case "jc":
            player_score +=10 ;
            break;
        
        case "qc":
            player_score +=10 ;
            break;
        
        case "kc":
            player_score +=10 ;
            break;

        case "1d":
            player_score +=1 ;
            break;
            
        case "2d":
            player_score +=2 ;
            break;
        
        case "3d":
            player_score +=3 ;
            break;
        
        case "4d":
            player_score +=4 ;
            break;
        
        case "5d":
            player_score +=5 ;
            break;
        
        case "6d":
            player_score +=6 ;
            break;
        
        case "7d":
            player_score +=7 ;
            break;
        
        case "8d":
            player_score +=8 ;
            break;
        
        case "9d":
            player_score +=9 ;
            break;
        
        case "10d":
            player_score +=10 ;
            break;
        
        case "jd":
            player_score +=10 ;
            break;
        
        case "qd":
            player_score +=10 ;
            break;
        
        case "kd":
            player_score +=10 ;
            break;
   return player_score         

}
}
function dl_score(){
switch(dealerArray[dealer_hand_size]){ 
    case "1s":
        dealer_score +=1 ;
        break;
        
    case "2s":
        dealer_score +=2 ;
        break;
    
    case "3s":
        dealer_score +=3 ;
        break;
    
    case "4s":
        dealer_score +=4 ;
        break;
    
    case "5s":
        dealer_score +=5 ;
        break;
    
    case "6s":
        dealer_score +=6 ;
        break;
    
    case "7s":
        dealer_score +=7 ;
        break;
    
    case "8s":
        dealer_score +=8 ;
        break;
    
    case "9s":
        dealer_score +=9 ;
        break;
    
    case "10s":
        dealer_score +=10 ;
        break;
    
    case "js":
        dealer_score +=10 ;
        break;
    
    case "qs":
        dealer_score +=10 ;
        break;
    
    case "ks":
        dealer_score +=10 ;
        break;
        
    case "1h":
        dealer_score +=1 ;
        break;
        
    case "2h":
        player_score +=2 ;
        break;
    
    case "3h":
        dealer_score +=3 ;
        break;
    
    case "4h":
        dealer_score +=4 ;
        break;
    
    case "5h":
        dealer_score +=5 ;
        break;
    
    case "6h":
        dealer_score +=6 ;
        break;
    
    case "7h":
        dealer_score +=7 ;
        break;
    
    case "8h":
        dealer_score +=8 ;
        break;
    
    case "9h":
        dealer_score +=9 ;
        break;
    
    case "10h":
        dealer_score +=10 ;
        break;
    
    case "jh":
        dealer_score +=10 ;
        break;
    
    case "qh":
        dealer_score +=10 ;
        break;
    
    case "kh":
        dealer_score +=10 ;
        break;

    case "1c":
        dealer_score +=1 ;
        break;
        
    case "2c":
        dealer_score +=2 ;
        break;
    
    case "3c":
        dealer_score +=3 ;
        break;
    
    case "4c":
        dealer_score +=4 ;
        break;
    
    case "5c":
        dealer_score +=5 ;
        break;
    
    case "6c":
        dealer_score +=6 ;
        break;
    
    case "7c":
        dealer_score +=7 ;
        break;
    
    case "8c":
        dealer_score +=8 ;
        break;
    
    case "9c":
        dealer_score +=9 ;
        break;
    
    case "10c":
        dealer_score +=10 ;
        break;
    
    case "jc":
        dealer_score +=10 ;
        break;
    
    case "qc":
        dealer_score +=10 ;
        break;
    
    case "kc":
        dealer_score +=10 ;
        break;

    case "1d":
        dealer_score +=1 ;
        break;
        
    case "2d":
        dealer_score +=2 ;
        break;
    
    case "3d":
        dealer_score +=3 ;
        break;
    
    case "4d":
        dealer_score +=4 ;
        break;
    
    case "5d":
        dealer_score +=5 ;
        break;
    
    case "6d":
        dealer_score +=6 ;
        break;
    
    case "7d":
        dealer_score +=7 ;
        break;
    
    case "8d":
        dealer_score +=8 ;
        break;
    
    case "9d":
        dealer_score +=9 ;
        break;
    
    case "10d":
        dealer_score +=10 ;
        break;
    
    case "jd":
        dealer_score +=10 ;
        break;
    
    case "qd":
        dealer_score +=10 ;
        break;
    
    case "kd":
        dealer_score +=10 ;
        break;
    return dealer_score

}
}