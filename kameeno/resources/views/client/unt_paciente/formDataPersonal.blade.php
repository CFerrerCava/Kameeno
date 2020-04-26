@extends('layouts.client')
@section('title') INFORMACION PERSONAL @endsection
{{-- @section('nav')
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">KAMEENO</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">¿Quiénes somos?</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contáctanos</a></li>
                </ul>
            </div>
        </div>
    </nav>
@endsection --}}
@section('content')



        {{-- <!-- Portfolio Grid Items-->
        <div class="row">
            <!-- Portfolio Item 1-->
            <div class=" col-12 mb-5">
                <div class="portfolio-item portfolio-item-large mx-auto">
                    <img class="img-fluid" src="/assets_client/img/portfolio/unt.png" alt="" />
                </div>
            </div>
        </div> --}}


        <div class="container-fluid" id="grad1">
            <div class="row justify-content-center mt-0">
                <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2><strong>Complete su Información Personal</strong></h2>
                        <p>Esta información es confidencial</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform">
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="personal"><strong>Personal</strong></li>
                                        <li id="familia"><strong>Familiar</strong></li>
                                        <li id="salud"><strong>Salud</strong></li>
                                        <li id="payment"><strong>Laboral</strong></li>
                                        <li id="confirm"><strong>Final</strong></li>
                                    </ul> <!-- fieldsets -->
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Informacion Personal</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="edad" placeholder="Edad" />
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control">
                                                        <option selected>Sexo</option>
                                                        <option>Masculino</option>
                                                        <option>Femenino</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <input type="text" name="nacimiento" placeholder="Fecha Nacimiento" />
                                            {{-- <input type="text" name="celular" placeholder="#Celular" />
                                            <input type="password" name="pwd" placeholder="Password" />
                                            <input type="password" name="cpwd" placeholder="Confirm Password" /> --}}
                                        </div> <input type="button" name="next" class="next action-button" value="Siguiente" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Informacion Familiar</h2>
                                            <input type="text" name="nameFamiliar" placeholder="Nombres y Apellidos" />
                                            <input type="text" name="celFamiliar" placeholder="#Celular" />
                                            <input type="text" name="emailFamiliar" placeholder="Correo Electronico" />
                                            <input type="text" name="DireFamiliar" placeholder="Domicilio" />
                                        </div>
                                        <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
                                        <input type="button" name="next" class="next action-button" value="Siguiente" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Info Salud</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control">
                                                        <option selected disabled>Seguro Salud</option>
                                                        <option>SIS</option>
                                                        <option>ESSALUD</option>
                                                        <option>Otro</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="cent_salud" placeholder="Centro de Salud Cercano" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" >
                                                    <select class="form-control">
                                                        <option selected disabled>Enfermedad</option>
                                                        <option>Diabetes Mellitus</option>
                                                        <option>Enfermedad reumatológica con uso continuo de antinflamatorios /corticoides</option>
                                                        <option>Uso permanente de antinflamatorios o corticoides por otras causas.</option>
                                                    </select>
                                                </div>
                                            </div> <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select class="form-control">
                                                        <option selected disabled>Sigue Tratamiento</option>
                                                        <option>Si</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <input type="text" name="celular" placeholder="#Celular" />
                                            <input type="password" name="pwd" placeholder="Password" />
                                            <input type="password" name="cpwd" placeholder="Confirm Password" /> --}}
                                        </div>
                                        <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
                                        <input type="button" name="next" class="next action-button" value="Siguiente" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Informacion Laboral</h2>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select class="form-control">
                                                        <option selected disabled>Ocupacion Laboral</option>
                                                        <option>Docente </option>
                                                        <option>Personal Administrativo</option>
                                                    </select>
                                                </div>
                                            </div> <br>
                                            <div class="row">
                                                <div class="col-md-12" >
                                                    <select class="form-control">
                                                        <option selected disabled>Facultad</option>
                                                        <option value="">Ciencias Biológicas</option>
                                                        <option value="">Ciencias Económicas</option>

                                                    </select>
                                                </div>
                                            </div> <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select class="form-control">
                                                        <option selected disabled>Escuela profesional </option>
                                                        <option>Derecho</option>
                                                        <option>Medicina</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> <input type="button" name="previous" class="previous action-button-previous" value="Anterior" /> <input type="button" name="make_payment" class="next action-button" value="Finalizar" />
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title text-center">Exitoso !</h2> <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                            </div> <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-7 text-center">
                                                    <h5>El registro de sus datos se realizo de manera exitosa !!</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row justify-content-center"><button class="btn-danger btn-lg" data-toggle="modal" data-target="#portfolioModal1">Participar</button></div> --}}


@endsection

@section('modals')
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Portfolio Modal - Title-->
                            <h2 class="portfolio-modal-title text-secondary mb-0">Formulario de registro</h2>
                            <!-- Icon Divider-->
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <form-register-unt-paciente></form-register-unt-paciente>
                                </div>
                                <div class="col-12 col-lg-6 text-content">
                                    <p>Después de aceptar su participación, se le enviará a su correo electrónico el consentimiento informado. Le pedimos que lo imprima, firme y envíe una foto de este al siguiente correo untatuspaciente@gmail.com. En caso no sea posible, por favor contactarse con los número telefónicos brindados.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>

#grad1 {
    background-color: #9C27B0;
    background-image: linear-gradient(40deg,#ffd86f,#fc6262) !important;

}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;
    position: relative
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E
}

#msform input,
#msform textarea {
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    font-weight: bold;
    border-bottom: 2px solid skyblue;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: skyblue;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

#msform .action-button:hover,
#msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
}

select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px
}

select.list-dt:focus {
    border-bottom: 2px solid skyblue
}

.card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #000000
}

#progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 20%;
    float: left;
    position: relative
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f023"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}
#progressbar #salud:before {
    font-family: FontAwesome;
    content: "\f0f1"
}
#progressbar #familia:before {
    font-family: FontAwesome;
    content: "\f0c0"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f09d"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: skyblue
}

.radio-group {
    position: relative;
    margin-bottom: 25px
}

.radio {
    display: inline-block;
    width: 204;
    height: 104;
    border-radius: 0;
    background: lightblue;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    cursor: pointer;
    margin: 8px 2px
}

.radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
}

.radio.selected {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
}

.fit-image {
    width: 100%;
    object-fit: cover
}
</style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 600
});
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 600
});
});

$('.radio-group .radio').click(function(){
$(this).parent().find('.radio').removeClass('selected');
$(this).addClass('selected');
});

$(".submit").click(function(){
return false;
})

});
    </script>
@endsection
