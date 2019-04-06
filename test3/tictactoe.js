let nc=0;
let flag=false;
let score=[]

const buttons = document.querySelectorAll('.xo');

// <tr>
//     <td style="height:20px">1</td>
//     <td style="height:20px"></td>
// </tr>

function showxo(){
    if (nc<=8 && !this.classList.contains("x") && !this.classList.contains("o") && flag==false) {
        if (nc%2==0) {
            this.classList.add("x")
            nc++;
            setTimeout(function(){
                check();
            }
            ,100
            )

        } else if (nc%2==1) {
            this.classList.add("o")
            nc++;
            setTimeout(function(){
                check();
            }
            ,100
            )
        }
    }
}

function replay(){
    nc=0;
    flag=false;
    buttons.forEach(button => button.classList.remove('x'));
    buttons.forEach(button => button.classList.remove('o'));
    scores='<tr><th style="height:20px; width:100px">Round</th><th style="height:20px; width:100px">Winner</th></tr>';
    for (var i = 0; i < score.length; i++) {
        k=i+1
        scores+='<tr><td style="height:20px">'+k+'</td><td style="height:20px">'+score[i]+'</td></tr>'
    }
    console.log(scores);
    $( "#scoretable" ).empty()
    $( "#scoretable" ).append(scores);
}


function check(){
    bt11=document.getElementById("bt11")
    bt12=document.getElementById("bt12")
    bt13=document.getElementById("bt13")
    bt21=document.getElementById("bt21")
    bt22=document.getElementById("bt22")
    bt23=document.getElementById("bt23")
    bt31=document.getElementById("bt31")
    bt32=document.getElementById("bt32")
    bt33=document.getElementById("bt33")

    var barray=[bt11,bt12,bt13,bt21,bt22,bt23,bt31,bt32,bt33];

    for (var i = 0; i < barray.length; i++) {
        if (barray[i].classList.contains("x")) {
            barray[i]="x"
        } else if (barray[i].classList.contains("o")) {
            barray[i]="o"
        }else {
            barray[i]=""
        }
    }


    if (barray[0]==barray[4] && barray[4]==barray[8]!="" && barray[0]!="") {
        window.alert ("Congratulations! "+barray[0]+" won the game");
        flag=true
        score.push(barray[0]);

    }else if (barray[6]==barray[4] && barray[4]==barray[2]!="" && barray[2]!="") {
        window.alert ("Congratulations! "+barray[2]+" won the game");
        flag=true
        score.push(barray[2]);

    }else if (barray[0]==barray[1] && barray[1]==barray[2]!="" && barray[0]!="") {
        window.alert ("Congratulations! "+barray[0]+" won the game");
        flag=true
        score.push(barray[0]);


    }else if (barray[3]==barray[4] && barray[4]==barray[5]!="" && barray[3]!="") {
        window.alert ("Congratulations! "+barray[3]+" won the game");
        flag=true
        score.push(barray[3]);


    }else if (barray[6]==barray[7] && barray[7]==barray[8]!="" && barray[8]!="") {
        window.alert ("Congratulations! "+barray[8]+" won the game");
        flag=true
        score.push(barray[8]);


    }else if (barray[0]==barray[3] && barray[3]==barray[6]!="" && barray[0]!="") {
        window.alert ("Congratulations! "+barray[0]+" won the game");
        flag=true
        score.push(barray[0]);


    }else if (barray[1]==barray[4] && barray[4]==barray[7]!="" && barray[7]!="") {
        window.alert ("Congratulations! "+barray[7]+" won the game");
        flag=true
        score.push(barray[7]);

    }else if (barray[2]==barray[5] && barray[5]==barray[8]!="" && barray[8]!="") {
        window.alert ("Congratulations! "+barray[8]+" won the game");
        flag=true
        score.push(barray[8]);
    }
    console.log(score)

}

buttons.forEach(button => button.addEventListener('click', showxo));
