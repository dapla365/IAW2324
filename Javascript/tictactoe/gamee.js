/*Create the array with the forms*/

var form=[];
let maximo = 9;
let verde = '90FF80'
/*Create the players with default values*/

var player1={
  figure: "X",
  turn: true
};
var player2={
  figure: "O",
  turn: false
};


/*Start the game*/

create_board();
check_turn();

function create_board(){ /*This function creates the board*/
  for(var i=0;i<9;i++){
    $('#game').append("<div class='box center' id='box_position"+i+
    "' onclick='fill_box(box_position"+i+",player1,"+i+")'></div>");
  }
}

function fill_box(a,b,c){ /*This function fills the divs and call the check_win functions*/
  maximo--;
  $(a).removeAttr('onclick');

  check_draw();

  if(b.turn==true){

    /*Add the X to the board */
    $(a).html("X");
    $(a).addClass("player1_class");

    /*Add the figure X to the "form" array*/
    form[c]=b.figure;

    /*Check if X win horizontal*/
    check_win_h(c,b.figure);
  }
  else{
    
    /*Add the X to the board */
    $(a).html("O");
    $(a).addClass("player2_class");

    /*Add the figure O to the "form" array*/
    form[c]=player2.figure;

    /*Check if O win horizontal*/
    check_win_h(c,player2.figure);
  }
}

function check_turn(){ /*This function checks who has the turn*/
  if(player1.turn==true){
    $('#player_turn').html("X turn");
  }
  else{
    $('#player_turn').html("O turn");
  }
}

function change_turn(){ /*This function change the turn when we checked the possible wins*/
  if(player1.turn==true){
    player1.turn=false;
    player2.turn=true;
    check_turn();
  }
  else{
    player1.turn=true;
    player2.turn=false;
    check_turn();
  }
}

function check_win_h(c,figure){ /*This function checks the possible horizontal wins*/
  if(c<3){ //ROW 1
    if(form[0]==figure && form[1]==figure && form[2]==figure){
      document.getElementById("box_position0").style.backgroundColor = '#70FF60';
      document.getElementById("box_position1").style.backgroundColor = '#70FF60';
      document.getElementById("box_position2").style.backgroundColor = '#70FF60';
      show_end(figure);
    }
    else {check_win_v(c,figure);}
  }
  else{
    if(c>=3 && c<=5){ //ROW 2
      if(form[3]==figure && form[4]==figure && form[5]==figure){
        document.getElementById("box_position3").style.backgroundColor = '#70FF60';
        document.getElementById("box_position4").style.backgroundColor = '#70FF60';
        document.getElementById("box_position5").style.backgroundColor = '#70FF60';
        show_end(figure);
      }
      else {check_win_v(c,figure);}
    }
    else{
      if(c>5){ //ROW 3
        if(form[6]==figure && form[7]==figure && form[8]==figure){
          document.getElementById("box_position6").style.backgroundColor = '#70FF60';
          document.getElementById("box_position7").style.backgroundColor = '#70FF60';
          document.getElementById("box_position8").style.backgroundColor = '#70FF60';
          show_end(figure);
        }
        else {check_win_v(c,figure);}
      }
    }
  }
}

function check_win_v(c,figure){ /*This function checks the possible vertical wins*/
  if(c==0 || c==3 || c==6){ //COLUMN 1
    if(form[0]==figure && form[3]==figure && form[6]==figure){
      document.getElementById("box_position0").style.backgroundColor = '#70FF60';
      document.getElementById("box_position3").style.backgroundColor = '#70FF60';
      document.getElementById("box_position6").style.backgroundColor = '#70FF60';
      show_end(figure);
    }
    else {check_win_d(c,figure);}
  }
  else{
    if(c==1 || c==4 || c==7){ //COLUMN 2
      if(form[1]==figure && form[4]==figure && form[7]==figure){
        document.getElementById("box_position1").style.backgroundColor = '#70FF60';
        document.getElementById("box_position4").style.backgroundColor = '#70FF60';
        document.getElementById("box_position7").style.backgroundColor = '#70FF60';
        show_end(figure);
      }
      else {check_win_d(c,figure);}
    }
    else{
      if(c==2 || c==5 || c==8){ //COLUMN 3
        if(form[2]==figure && form[5]==figure && form[8]==figure){
          document.getElementById("box_position2").style.backgroundColor = '#70FF60';
          document.getElementById("box_position5").style.backgroundColor = '#70FF60';
          document.getElementById("box_position8").style.backgroundColor = '#70FF60';
          show_end(figure);
        }
        else {check_win_d(c,figure);}
      }
    }
  }
}

function check_win_d(c,figure){ /*This function checks the possible diagonal wins*/
  if(c==0 || c==4 || c==8){ //DIAGONAL 1
    if(form[0]==figure && form[4]==figure && form[8]==figure){
      document.getElementById("box_position0").style.backgroundColor = '#70FF60';
      document.getElementById("box_position4").style.backgroundColor = '#70FF60';
      document.getElementById("box_position8").style.backgroundColor = '#70FF60';
      show_end(figure);
    }
    else {change_turn();}
  }
  else{
    if(c==2 || c==4 || c==6){ //DIAGONAL 2
      if(form[2]==figure && form[4]==figure && form[6]==figure){
        document.getElementById("box_position2").style.backgroundColor = '#70FF60';
        document.getElementById("box_position4").style.backgroundColor = '#70FF60';
        document.getElementById("box_position6").style.backgroundColor = '#70FF60';
        show_end(figure);
      }
      else {change_turn();
      }
    }
    else{
      change_turn();
    }
  }
}

function show_end(a){ /*This function shows the winner and the end div*/
  //$('#game').empty()
  //$('#game').css({"display":"none"});
  $('#player_turn').css({"display":"none"});
  $('#end_game').css({"display":"flex"});
  $('#winner').css({"display":"block"});
  if(a == null){
    $('#winner').css({"display":"none"});
    $('#child_winner').css({"display":"block"}).text("TIE");
  }else{
    $('#child_winner').css({"display":"block"}).text(a);
  }
}

function restart(){
  $('#game').empty()
  form=[];
  player1.turn=true;
  player2.turn=false;

  $('#game').css({"display":"grid"});
  $('#player_turn').css({"display":"block"});
  $('#winner').css({"display":"none"});
  $('#child_winner').css({"display":"none"});
  $('#end_game').css({"display":"none"});
  maximo = 9;

  create_board();
  check_turn();
}

function check_draw(){
    if (maximo == 0) {
      show_end(null);
    }
}

