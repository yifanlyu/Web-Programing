function main (){
        var a = [1,2,3,4,5,6,7,8,9,10];
        console.log(a);
        for (i = 0; i < a.length; i++) {
            var rand = Math.random();
            var rand1 = rand*a.length;
            var rand1 = Math.floor(rand1)
            var temp = 0
            temp = a[i]
            a[i]=a[rand1]
            a[rand1]=temp
        }
        console.log(a);
}       
