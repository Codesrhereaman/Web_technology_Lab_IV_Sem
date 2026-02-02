function display(name,callme){
    console.log("Hello " + name);
    callme();
}
function callme(){
    console.log("i am call back function");
}
display("Aditya",callme);