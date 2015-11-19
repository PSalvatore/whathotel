/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function setCookieValue(name, value, days) {
    var expires;
    alert("Adding (to cookie): " + name + " = " + value + "\n\n" + "will last " + days + " days");
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else
        expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookieValue(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0)
            return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookieValue(name) {
    setCookieValue(name, "", -1);
}

function showCookieValue(name) {
    var val = getCookieValue(name);
    if (val === null) {
        alert("There is no cookie value named '" + name + "'");
    }
    else {
        alert(name + " = " + val);
    }
}

function showWholeCookie() {
    alert("whole cookie is " + document.cookie);
}

function setTheme() {
    choice = getCookieValue("theme");
    if (choice !== null) {
        jQuery('#cssLinkID').attr('href', '/css/' + choice + '.css');
    }
}

function changeStyle(choice) {
    // choice is the select list, an object, which has a value property
    // alert ("user choice is " + choice.value);
    jQuery('#cssLinkID').attr('href', '/css/' + choice + '.css');
    jQuery('#bg_content_top').attr('src', '/images/' + 'BGtop' + choice + '.png');
    jQuery('#bg_content_left').attr('src', '/images/' + 'left' + choice + '.png');
    jQuery('#bg_content_right').attr('src', '/images/' + 'right' + choice + '.png');
    setCookieValue("theme", choice, 20);
}


$(document).ready(function() {
    $("#calendar").datepicker({});
} );

$(document).ready(function () {
       $('.icon.btnAnim').click(function () {
         var edit = $(this).siblings('.edit');
         var text = $(this).siblings('.text');
        if (edit.css("display") == "none") {
            edit.css({
              "display": "inline-table"
            });
            text.css({
              "display": "none"
            });
        } else {
            edit.css({
              "display": "none"
            });
            text.css({
              "display": "inline"
            });
        }
        return false;
      });
});

$('#isStudent').click(function() {
  $('#year')[this.checked ? "show" : "hide"]();
});

$("input[placeholder]").each(function () {
        $(this).attr('size', $(this).attr('placeholder').length);
});

$("#alert").show().delay(1500).fadeOut();

$('input').attr('autocomplete','off');

