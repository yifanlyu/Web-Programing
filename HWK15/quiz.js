document.getElementById("textForm").onsubmit = validate;
function validate ()
{
  var elt = document.getElementById("quiz");
  if (elt.q1.value == "" || elt.q2.value == "" || (elt.q31.checked =="false" && elt.q32.checked =="false" && elt.q33.checked =="false" && elt.q34.checked =="false" ) || (elt.q41.checked =="false" && elt.q42.checked =="false" && elt.q43.checked =="false" && elt.q44.checked =="false" )  || elt.q5.value == "" || elt.q6.value == "")
  {
    window.alert ("Please finish all 6 questions then submit!");
    return false;
  }

  var right=0;

  if (elt.q1.value == "False") {
      right++;
  }

  if (elt.q2.value == "True") {
      right++;
  }

  if (elt.q31.checked ==0 && elt.q32.checked ==1 && elt.q33.checked ==0 && elt.q34.checked ==0) {
      right++;
  }

  if (elt.q41.checked ==0 && elt.q42.checked ==0 && elt.q43.checked ==0 && elt.q44.checked ==1) {
      right++;
  }

  var re1=/^galaxy$/i
  var re2=/^age$/i

  if (re1.test(elt.q5.value)) {
      right++;
  }

  if (re2.test(elt.q6.value)) {
      right++;
  }


  window.alert ("Your grade is "+right+"/6");


}
