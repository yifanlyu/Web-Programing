// Create two list of indices
var imgarray = ["1","2","3"]
var slicearray = ["1","2","3","4","5","6","7","8","9","10","11","12"]

// Function to generate random number
function getRandomArbitrary(n) {
    return Math.floor(Math.random() * (n));
}


// function to shuffle array

function shuffle(a) {
    for (let i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
}

// function to generte image
var imgnum=imgarray[getRandomArbitrary(3)];
var slicenum=shuffle(slicearray).pop();
$( ".line1" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: -410px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line1" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: -305px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line1" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: -200px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line1" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: -95px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line2" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: 10px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line2" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: 115px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line2" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: 220px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line2" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: 325px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line3" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: 430px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line3" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: 535px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line3" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: 640px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line3" ).append('<img id='+slicenum +' onmousedown = "grabber(event);" style = "position: absolute; top: 435px; left: 745px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');

// *******************************************************

/*
 Define variables for the values computed by the grabber event
 handler but needed by mover event handler
*/
var diffX, diffY, theElement;


// The event handler function for grabbing the word
function grabber(event) {

// Set the global variable for the element to be moved

  theElement = event.currentTarget;

// Determine the position of the word to be grabbed,
//  first removing the units from left and top

  var posX = parseInt(theElement.style.left);
  var posY = parseInt(theElement.style.top);

// Compute the difference between where it is and
// where the mouse click occurred

  diffX = event.clientX - posX;
  diffY = event.clientY - posY;

// Now register the event handlers for moving and
// dropping the word

  document.addEventListener("mousemove", mover, true);
  document.addEventListener("mouseup", dropper, true);

// Stop propagation of the event and stop any default
// browser action

  event.stopPropagation();
  event.preventDefault();

}  //** end of grabber

// *******************************************************

// The event handler function for moving the word

function mover(event) {
// Compute the new position, add the units, and move the word
  if (event.clientX - diffX>=0 && event.clientX - diffX<=400 && event.clientY - diffY>=0 && event.clientY - diffY<=300) {
    theElement.style.left = Math.round((event.clientX - diffX)/100)*100 + "px";
  } else {
    theElement.style.left = (event.clientX - diffX) + "px";
  }

  if (Math.round((event.clientY- diffY)/100)*100>=0 && Math.round((event.clientY- diffY)/100)*100<=700) {
    if (event.clientX - diffX>=0 && event.clientX - diffX<=400 && event.clientY - diffY>=0 && event.clientY - diffY<=300) {
        theElement.style.top = Math.round((event.clientY- diffY)/100)*100 + "px";
    }else {
        theElement.style.top = (event.clientY - diffY) + "px";
    }
  }

// Prevent propagation of the event

  event.stopPropagation();
}  //** end of mover

// *********************************************************
// The event handler function for dropping the word

function dropper(event) {

// Unregister the event handlers for mouseup and mousemove

  document.removeEventListener("mouseup", dropper, true);
  document.removeEventListener("mousemove", mover, true);

// Prevent propagation of the event

  event.stopPropagation();
}  //** end of dropper




// *******************************************************
// function of the timer

var hours=0;
var minutes=0;
var seconds=0;

// get cuurent time and define variables
var startTime = Date.now();
var second = 1000;
var minute = second * 60;
var hour = minute * 60;
var container = document.getElementById('timer');

function stopTimer() {
    clearInterval(timer);
}

function pad(n){
  return ('00' + n).slice(-2);
}

//calculate the time
var timer = setInterval(function(){
  var currentTime = Date.now();
  var difference = currentTime - startTime;

  var hours = pad((difference / hour) | 0);
  var minutes = pad(((difference % hour) / minute) | 0);
  var seconds = pad(((difference % minute) / second) | 0);

  container.innerHTML = hours + ':' + minutes + ':' + seconds;

// This only represents time between renders. Actual time rendered is based
// on the elapsed time calculated above.
}, 250);


// *******************************************************
// function to verify all positions of the puzzle pieces
function Done() {
    for (var k = 1; k < 13; k++) {
        right=true;
        theElement1=document.getElementById(k);
        var posX1 = parseInt(theElement1.style.left);
        var posY1 = parseInt(theElement1.style.top);

        if (k==1 && posX1==0 && posY1==0) {
        } else if (k==2 && posX1==100 &&posY1==0) {
        } else if (k==3 && posX1==200 && posY1==0) {
        } else if (k==4 && posX1==300 && posY1==0) {
        } else if (k==5 && posX1==0 && posY1==100) {
        } else if (k==6 && posX1==100 && posY1==100) {
        } else if (k==7 && posX1==200 && posY1==100) {
        } else if (k==8 && posX1==300 && posY1==100) {
        } else if (k==9 && posX1==0 && posY1==200) {
        } else if (k==10 && posX1==100 && posY1==200) {
        } else if (k==11 && posX1==200 && posY1==200) {
        } else if (k==12 && posX1==300 && posY1==200) {
        } else {
            right=false;
        }
    }

    var container = document.getElementById('finished');

    if (right==false) {
        // window.alert("Better luck next time ");
        container.innerHTML = "Better luck next time ";
    } else {
        // window.alert("Congratulations! You got it. Right time:"+hours + ':' + minutes + ':' + seconds);
        container.innerHTML = 'Congratulations! You got it. Check your time above.'
    }

}
