
function getRandomArbitrary() {
    return Math.floor(Math.random() * (6));
}

var namelist= ["Galaxy Cluster","Interacting Galaxies","M 51","M 104","NGC 1300","NGC 6217"]
var imglist = ["./img/GalaxyCluster.jpg","./img/InteractingGalaxies.jpg","./img/M51.jpg","./img/M104.jpg","./img/NGC1300.jpg","./img/NGC6217.jpg"]

var randomnum=getRandomArbitrary()
document.write('<img src='+imglist[randomnum]+' alt="m51">');
document.write('<p>'+namelist[randomnum]+ '</p>');
