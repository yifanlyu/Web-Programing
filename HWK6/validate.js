document.getElementById("Mortgage").Calculate.onclick = validate;
function validate ()
{
  var elt = document.getElementById("Mortgage");
  if (parseFloat(elt.p.value) < 0)
  {
    window.alert ("Principal amount cannot be negative");
    return false;
  }
  if (parseFloat(elt.r.value) < 0)
  {
    window.alert ("Interest rate amount cannot be negative");
    return false;
  }
  if (parseFloat(elt.n.value) < 0)
  {
    window.alert ("Loan term in months cannot be negative");
    return false;
  }

  return true;
}

document.getElementById("Mortgage").Calculate.onclick = Mortgagecal;
function Mortgagecal ()
{
  var mp = "";
  var sum = "";
  var ti = "";
  var elt = document.getElementById("Mortgage");
  var p = parseFloat (elt.p.value);
  var r = parseFloat ((elt.r.value)/12)/100;
  var n = parseFloat (elt.n.value);
  mp = p*r/(1-(1/Math.pow((1+r),n)));
  elt.mp.value = mp;
  sum=mp*n;
  elt.sum.value = sum;
  ti=sum-p;
  elt.ti.value = ti;
}
