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

var imgnum=imgarray[getRandomArbitrary(3)];
var slicenum=shuffle(slicearray).pop();
$( ".line1" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 0px; left: 0px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line1" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 0px; left: 100px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line1" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 0px; left: 200px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line1" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 0px; left: 300px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line2" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 100px; left: 0px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line2" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 100px; left: 100px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line2" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 100px; left: 200px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line2" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 100px; left: 300px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line3" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 200px; left: 0px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line3" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 200px; left: 100px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line3" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 200px; left: 200px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');
var slicenum=shuffle(slicearray).pop();
$( ".line3" ).append('<img id='+imgnum +' onmousedown = "grabber(event);" style = "position: absolute; top: 200px; left: 300px;" class="puzzlepiece" src="./img/img'+imgnum+'-'+slicenum+'.jpg" alt="" >');


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

  theElement.style.left = Math.round((event.clientX - diffX)/100)*100 + "px";
  if (Math.round((event.clientY- diffY)/100)*100>=0) {
      theElement.style.top = Math.round((event.clientY- diffY)/100)*100 + "px";
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
