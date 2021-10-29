var checkboxCond = false;
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
        document.getElementById("submButton").disabled = false;
        document.getElementById("submButton2").disabled = false;
        document.getElementById("errors").innerHTML = "";
        document.getElementById("errors2").innerHTML = "";
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
        document.getElementById("submButton").disabled = true;
        document.getElementById("submButton2").disabled = true;
        document.getElementById("errors").innerHTML = "You must accept terms and conditions";
        document.getElementById("errors2").innerHTML = "You must accept terms and conditions";
    }
}