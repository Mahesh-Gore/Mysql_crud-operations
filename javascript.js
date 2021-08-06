function dispt(){
    paras = document.getElementsByTagName('p');
    for (var i = 0; i < paras.length; i++) {
        paras[i].style.display = "block";
    }
}
function p_disp_none(){
    paras = document.getElementsByTagName('p').style.display = "none";
    for (var i = 0; i < paras.length; i++) {
        paras[i].style.display = "none";
    }
}

function form_disp_none() {
    forms = document.getElementsByTagName('form');
    for (var i = 0; i < forms.length; i++) {
        forms[i].style.display = "none";
    }
}

function add_form() {
    form_disp_none();
    document.getElementById('add_form').style.display = "block";
    p_disp_none();
}
function delete_form() {
    form_disp_none();
    document.getElementById('delete_form').style.display = "block";
    p_disp_none();
}
function update_form() {
    form_disp_none();
    document.getElementById('update_form').style.display = "block";
    p_disp_none();
}
function display_form() {
    form_disp_none();
    document.getElementById('display_form').style.display = "block";

}