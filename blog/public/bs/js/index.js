// adver section js
document.getElementById("prev").onclick = prev
document.getElementById("next").onclick = next
setInterval(next,1000);
let number = 1

function prev(){
    document.getElementById("box" + number).style.display =  "none"
        number--
        if(number < 1){
            number = 5
            document.getElementById("box"+number).style.display ="block"
        }else{
            document.getElementById("box"+number).style.display = "block"
        }

}

function next(){
    document.getElementById("box"+number).style.display = "none";
    number ++

    if(number > 5){
        number =1
        document.getElementById("box"+number).style.display ="block"
    }else{
        document.getElementById("box"+number).style.display = "block"
    }
}
// adver section js end
