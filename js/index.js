// lax.js
window.onload = function () {
    lax.setup()
    const updateLax = () => {
        lax.update(window.scrollY)
        window.requestAnimationFrame(updateLax)
    }
    window.requestAnimationFrame(updateLax)
}

// Sidenav
const sideNav = document.querySelector('.sidenav');
M.Sidenav.init(sideNav, {});

// Slider
const slider = document.querySelector('.slider');
M.Slider.init(slider, {
    indicators: false,
    height: 600,
    transition: 500,
    interval: 6000
});

// Modal
$(document).ready(function () {
    $('.modal').modal();
});

// ScrollSpy
const ss = document.querySelectorAll('.scrollspy');
M.ScrollSpy.init(ss, {});

// Modal
const md = document.querySelectorAll('.modal');
M.Modal.init(md, {});

// slide da secao de cadastro
$(".btnOpenRegister").on("click", function () {
    $(".registerBox").toggleClass("mostraRegister")
    document.body.style.overflowY = "hidden"
});
$(".btnOpenRegisterLogin").on("click", function () {
    $(".loginBox").toggleClass("mostraLogin")
    $(".registerBox").toggleClass("mostraRegister")
    document.body.style.overflowY = "hidden"
});
$(".btnCloseRegister").on("click", function () {
    $(".registerBox").toggleClass("mostraRegister")
    document.body.style.overflowY = "scroll"
});

// materialbox
$(document).ready(function () {
    $('.materialboxed').materialbox();
});

// select
$(document).ready(function () {
    $('select').formSelect();
});

// tinyMCE
tinymce.init({
    selector: '.conteudoPostagem'
});

// image preview
$(".inputFoto").change(function () {
    imagePreview(this);
    $('.divForms').css('overflow', 'scroll')
});

function imagePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.imagePreview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// dropdown
$('.dropdown-trigger').dropdown();

// floating action button
$(document).ready(function () {
    $('.fixed-action-btn').floatingActionButton();
});

// tooltip
$(document).ready(function () {
    $('.tooltipped').tooltip();
});

// tabs
$(document).ready(function () {
    $('.tabs').tabs();
});

// altura da tela
var _AlturaDocumento = $(window).height();

function AlturaSecao() {
    $('.divForms').height(_AlturaDocumento);
}

$(AlturaSecao);

// muda o tipo do campo password pra text
function verSenha() {
    $('.btnVerSenha').toggleClass("fa-eye fa-eye-slash");
    ;    
    if ($('.inputSenha').attr("type") == "password") {
        $('.inputSenha').attr("type", "text");
    } else {
        $('.inputSenha').attr("type", "password");
    }
}


// verifica a quantidade de caracteres no campo senha do cadastro
function contagemCarac() {
    var x = $(".inputSenha").val();
    var n = x.length;
    if (n < 4) {
        document.getElementById('spanSenha').innerHTML = "A senha deve conter no mínimo 4 caracteres";
    } else {
        document.getElementById('spanSenha').innerHTML = "";
    }
}
// function para chamar toast
function toast(tipo) {
    if (tipo === 1) {
        M.toast({ html: 'Cadastro realizado com sucesso' })
    }
    
}
