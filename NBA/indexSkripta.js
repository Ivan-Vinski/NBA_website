var boolDarkMode = false;

function omover(_img){
    _img.style.padding = "0px";
    _img.style.width = "204px";
    _img.style.height = "104px";
}

function omout(_img){
    _img.style.width = "200px";
    _img.style.height = "100px";
    _img.style.padding = "2px"; 
}

function darkMode(){
    var toolbarContainer = document.getElementById("toolbarContainer");
    var darkModeIcon = document.getElementById("darkModeIcon");
    if (!boolDarkMode){
        document.body.style.backgroundImage = "url(./Rescources/nba_bc.jpg)";
        darkModeIcon.src = "./Rescources/turnOffDarkModeIconOrange.png";
        document.getElementById("settingsIcon").src = "./Rescources/settingsDMIconOrange.png";
        document.getElementById("homeButtonImg").src = "./Rescources/homeButtonOrange.png";
        boolDarkMode = true;
        
    }

    else if (boolDarkMode){
        document.body.style.backgroundImage = "url(./Rescources/nba_bc1.jpg)";
        document.body.style.backgroundRepeat = "no-repeat";
        document.body.style.backgroundSize = "100%";
        darkModeIcon.src = "./Rescources/turnOnDarkModeIcon.png";
        document.getElementById("settingsIcon").src = "./Rescources/settingsIcon.png";
        document.getElementById("homeButtonImg").src = "./Rescources/homeButton.png";
        boolDarkMode = false;
    }
    
}
