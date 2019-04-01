
var imgarray = ["crab_nebula","galaxy_1","galaxy_2","galaxy_cluster","jupiter","m31","nebula_1","saturn","crab_nebula","galaxy_1","galaxy_2","galaxy_cluster","jupiter","m31","nebula_1","saturn"];


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

// randomly fill the images
var slicenum=shuffle(imgarray).pop();
$("#back1").append('<img id='+slicenum+'_a src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back2").append('<img id='+slicenum+'_a src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back3").append('<img id='+slicenum+'_a src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back4").append('<img id='+slicenum+'_a src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back5").append('<img id='+slicenum+'_a src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back6").append('<img id='+slicenum+'_a src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back7").append('<img id='+slicenum+'_a src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back8").append('<img id='+slicenum+'_a src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back9").append('<img id='+slicenum+'_b src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back10").append('<img id='+slicenum+'_b src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back11").append('<img id='+slicenum+'_b src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back12").append('<img id='+slicenum+'_b src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back13").append('<img id='+slicenum+'_b src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back14").append('<img id='+slicenum+'_b src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back15").append('<img id='+slicenum+'_b src="./img/'+slicenum+'.jpg">')
var slicenum=shuffle(imgarray).pop();
$("#back16").append('<img id='+slicenum+'_b src="./img/'+slicenum+'.jpg">')




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



// onclick="this.classList.toggle('flipped')"
const cards = document.querySelectorAll('.flipper');

var ntry=0;
var id1;
var id2;
var clicked=false;
var disable=false;
var correctarray=[]


function flipCard() {
    if (disable==false && correctarray.indexOf(this.getElementsByTagName("img")[0].src)==-1) {
        console.log('wqeq')
        this.classList.add('flipped');
        if (!clicked) {
            ntry+=1
            $('#numberoftry').text('Number of try: '+ntry);
            clicked=true;
            id1=this;
            threesectime = setTimeout(function(){
                id1.classList.remove('flipped')
                clicked=false
            }
            ,2000
            )
        } else if (clicked && this!=id1) {
            clearTimeout(threesectime);
            clicked=false;
            disable=true;
            id2=this;
            checksame(id1,id2);
            threesectime1 = setTimeout(function(){
                disable=false
            }
            ,2000
            )
        }

    }
}

function checksame(id1,id2){
    if (id1.getElementsByTagName("img")[0].src==id2.getElementsByTagName("img")[0].src) {
        console.log(id1.getElementsByTagName("img")[0].src,id2.getElementsByTagName("img")[0].src)
        correctarray.push(id1.getElementsByTagName("img")[0].src)
        if (correctarray.length==8) {
            stopTimer()
            setTimeout(function(){
                window.alert ("Finished! Number of tries: "+ntry);
            }
            ,1000
            )
        }
        return;
    }
    setTimeout(function(){
        id1.classList.remove('flipped')
        id2.classList.remove('flipped')
    }
    ,2000
    )
}

cards.forEach(card => card.addEventListener('click', flipCard));
