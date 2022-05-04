
  function on() {
    console.log("okiii");
    document.getElementById("overlay").style.display = "block";
    document.getElementById("login").style.visibility = "visible";
    document.getElementById("login").style.zIndex = "2";
    document.getElementById("login").style.top = "200";
  }
  
  function off() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("login").style.visibility = "hidden";
    document.getElementById("login").style.zIndex = "-1";
    document.getElementById("login").style.top = "-200px";
  }
  