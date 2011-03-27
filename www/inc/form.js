function notEmpty(elem)  {
    if (elem.value.length == 0) {
        elem.focus();
        return false;
    } else {
        return true;
    }
}

function isAlphanumeric(elem) {
    var alphaExp = /^[a-zA-Z0-9]+$/;
    
    if (elem.value.match(alphaExp)) {
        return true;
    } else {
        elem.focus();
        return false;
    }
}

function doesMatch(elem1,elem2) {
    if (elem1.value == elem2.value) {
        return true;
    } else {
        elem2.focus();
        return false;
    }
}

function checkLength(elem,min,max) {
    var uInput = elem.value;
    
    if (uInput.length >= min && uInput.length <= max) {
        return true;
    } else {
        elem.focus();
        return false;
    }
}

function emailValidator(elem) {
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9+.\-]+\.[a-zA-Z0-9]{2,4}$/;
    
    if (elem.value.match(emailExp)) {
        return true;
    } else {
        elem.focus();
        return false;
    }
}

function validateForm() {
    var nick = document.getElementById('newNick');
    var pass = document.getElementById('newPassword');
    var rePass = document.getElementById('rePassword');
    var email = document.getElementById('email');
    var capital = document.getElementById('capital');
    
    var errors = document.getElementsByClassName('error');

    var i = 0;
    
    if (!notEmpty(nick)) {
        errors[0].innerHTML = "Anna k&auml;ytt&auml;j&auml;nimi!";
        i++;
    } else {
        if (!checkLength(nick,3,15)) {
            errors[0].innerHTML = "K&auml;ytt&auml;j&auml;nimen tulee olla 3-15 merkki&auml;!";
            i++;
        } else {
            if (!isAlphanumeric(nick)) {
                errors[0].innerHTML = "K&auml;ytt&auml;j&auml;nimi saa sis&auml;lt&auml;&auml; vain numeroita ja kirjaimia Aa-Zz!";
                i++;
            } else {
                errors[0].innerHTML = "";
            }
        }
    }
    
    if (!notEmpty(pass)) {
        errors[1].innerHTML = "Anna salasana!";
        i++;
    } else {
        errors[1].innerHTML = "";
    }
    
    if (!doesMatch(pass,rePass)) {
        errors[2].innerHTML = "Salasanat eiv&auml;t t&auml;sm&auml;&auml;!";
        i++;
    } else {
        errors[2].innerHTML = "";
    }
    
    if (!emailValidator(email)) {
        errors[3].innerHTML = "Anna kelvollinen s&auml;hk&ouml;postiosoite!";
        i++;
    } else {
        errors[3].innerHTML = "";
    }
    
    if (!notEmpty(capital)) {
        errors[4].innerHTML = "Anna p&auml;&auml;kaupunki!";
        i++;
    } else {
        if (!(capital.value.toLowerCase() == "helsinki")) {
            errors[4].innerHTML = "Kaupunki ei ole oikein!";
            i++;
        } else {
            errors[4].innerHTML = "";
        }
    }
    
    if (i == 0) {
        return true;
    } else {
        return false;
    }

}

function checkLogin() {
    var nick = document.getElementById('nick');
    var pass = document.getElementById('password');
    
    if (!notEmpty(nick,"Anna nimerkki.")) {
        return false;
    }
    
    if (!notEmpty(pass,"Anna salasana.")) {
        return false;
    }
    
    return true;
}

function validateCInput() {    
    var name = document.getElementById('cName');
    var desc = document.getElementById('description');
    var code = document.getElementById('code');
    
    if (!notEmpty(name,"Anna koodille nimi!")) return false;
    if (!notEmpty(desc,"Anna koodille kuvaus!")) return false;
    if (!notEmpty(code,"Sy&ouml;t&auml; koodi")) return false;
    
    return true;
}
    
function selectCode(a) {
  // Get ID of code block
  var e = a.nextSibling.getElementsByTagName('PRE')[0];
  // Not IE
  if (window.getSelection) {
    var s = window.getSelection();
    // Safari
    if (s.setBaseAndExtent) {
      s.setBaseAndExtent(e, 0, e, e.innerText.length - 1);
    }
    // Firefox and Opera
    else {
      var r = document.createRange();
      r.selectNodeContents(e);
      s.removeAllRanges();
      s.addRange(r);
    }
  }
  // Some older browsers
  else if (document.getSelection) {
    var s = document.getSelection();
    var r = document.createRange();
    r.selectNodeContents(e);
    s.removeAllRanges();
    s.addRange(r);
  }
  // IE
  else if (document.selection) {
    var r = document.body.createTextRange();
    r.moveToElementText(e);
    r.select();
  }
}
    