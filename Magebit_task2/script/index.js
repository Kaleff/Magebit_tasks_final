var checkboxCond = false;
var emailValid = false;
function EmailReplacer() {
    document.getElementById("email").setAttribute("style", "margin-right: 15px")
    document.getElementById("email").innerHTML = "e-mail  |";
    document.getElementById("input").setAttribute("style","border-color: #4066A5");
}
function EmailReplacer2() {
    document.getElementById("email2").setAttribute("style", "margin-right: 15px; width:60px;")
    document.getElementById("email2").innerHTML = "e-mail  |";
    document.getElementById("input2").setAttribute("style","border-color: #4066A5");
}
function EmailChecker(email) {
    if (email == "") {
        document.getElementById("errors").innerHTML = "Email address is required";
        document.getElementById("errors2").innerHTML = "Email address is required";
        emailValid = false;
        document.getElementById("submButton").disabled = true;
        document.getElementById("submButton2").disabled = true;
    }
    else if (!checkboxCond) {
        document.getElementById("errors").innerHTML = "You must accept the terms and conditions";
        document.getElementById("errors2").innerHTML = "You must accept the terms and conditions";
        document.getElementById("submButton").disabled = true;
        document.getElementById("submButton2").disabled = true;
        if (emailValidation(email)) {
            document.getElementById("errors").innerHTML = "You must accept the terms and conditions";
            document.getElementById("errors2").innerHTML = "You must accept the terms and conditions";
            emailValid = true;
        }
    } else if (email.slice(email.length - 2) == "co" && emailValidation(email)) {
        document.getElementById("errors").innerHTML = "We don't accept the e-mails from Columbia";
        document.getElementById("errors2").innerHTML = "We don't accept the e-mails from Columbia";
        emailValid = false;
        document.getElementById("submButton").disabled = true;
        document.getElementById("submButton2").disabled = true;
    } else if (emailValidation(email)) {
        document.getElementById("errors").innerHTML = "";
        document.getElementById("errors2").innerHTML = "";
        emailValid = true;
        document.getElementById("submButton").disabled = false;
        document.getElementById("submButton2").disabled = false;
    }
}
function emailValidation(email) {
    let mailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(email.match(mailFormat)) {
        return true;
    }
    else {
        return false;
    }
}
function checkboxSwitch() {
    if(!checkboxCond) {
        document.getElementById("checkBoxRect").
        setAttribute("style","fill:#4066A5;stroke:#4066A5;stroke-width: 1;");
        document.getElementById("checkBoxRect2").
        setAttribute("style","fill:#4066A5;stroke:#4066A5;stroke-width: 1;");
        document.getElementById("checkboxCheck").
        setAttribute("style","color:#FFFFFF; font-size:11;");
        document.getElementById("checkboxCheck2").
        setAttribute("style","color:#FFFFFF; font-size:11;");
        checkboxCond = true;

        if(emailValid) {
            document.getElementById("errors").innerHTML = "";
            document.getElementById("errors2").innerHTML = "";
            document.getElementById("submButton").disabled = false;
            document.getElementById("submButton2").disabled = false;
        }
        else {
            document.getElementById("errors").innerHTML = "Please enter a valid e-mail"
            document.getElementById("errors2").innerHTML = "Please enter a valid e-mail"
        }
    }
    else {
        document.getElementById("checkBoxRect").
        setAttribute("style", "fill:#FFFFFF;stroke:#E3E3E4;stroke-width: 1;");
        document.getElementById("checkBoxRect2").
        setAttribute("style", "fill:#FFFFFF;stroke:#E3E3E4;stroke-width: 1;");
        document.getElementById("checkboxCheck").
        setAttribute("style","color:#FFFFFF; font-size:0;");
        document.getElementById("checkboxCheck2").
        setAttribute("style","color:#FFFFFF; font-size:0;");
        checkboxCond = false;
        document.getElementById("errors").innerHTML = "You must accept terms and conditions"
        document.getElementById("errors2").innerHTML = "You must accept terms and conditions"
    }
}
function transformPage() {
    document.getElementById("prize").setAttribute("src","static/Union.svg");
    document.getElementById("prize").setAttribute("style","margin-top:135px; margin-bottom:30px; margin-left:140px");
    document.getElementById("prize2").setAttribute("src","static/Union.svg");
    document.getElementById("prize2").setAttribute("style","margin-left:5%;");
    document.getElementById("subBlock").setAttribute("style", "height:300px");
    document.getElementById("inputElement").remove();
    document.getElementById("tos").remove();
    document.getElementById("inputElement2").remove();
    document.getElementById("tos2").remove();
    document.getElementById("heading1").innerHTML = "Thanks for subscribing!";
    document.getElementById("heading1").setAttribute("style","margin-top:0px");
    document.getElementById("subheading1").setAttribute("style","margin-top:20px;");
    document.getElementById("heading2").innerHTML = "Thanks for subscribing!";
    document.getElementById("subheading1").
        innerHTML = "You have successfully subscribed to our email listing. Check your email for the discount code";
    document.getElementById("subheading2").
        innerHTML = "You have successfully subscribed to our email listing. Check your email for the discount code";
}