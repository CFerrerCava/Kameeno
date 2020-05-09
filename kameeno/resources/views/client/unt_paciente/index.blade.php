@extends('layouts.client')
@section('title') UNT A TUS PACIENTES @endsection
@section('nav')
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="/images/untpacientes.png" alt="Logo" width="100"></a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">¿Quiénes somos?</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contáctanos</a></li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
@section('content')
<section class="page-section portfolio mt-3" id="portfolio1">
    <div class="container">

        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <!-- Portfolio Item 1-->
            <div class=" col-12 col-lg-6 mb-5 float-left">
                <div class="portfolio-item portfolio-item-large mx-auto">
                    <img class="img-fluid" src="/assets_client/img/portfolio/untPacientes.jpeg" alt="" />
                </div>
            </div>
        </div>

        <h3 class="page-section-heading text-center text-secondary mb-0">Propósito</h3>
        <div class="container p-3 text-content">
            <p>El propósito de este proyecto es brindar teleconsejería a docentes y personal administrativo con enfermedades crónicas de riesgo a complicación grave ante contagio de COVID-19 de la Universidad Nacional de Trujillo mediante una red cerrada de monitoreo virtual a cargo de profesionales médicos</p>
            <p>Esta investigación incluirá entrevistas continuas de consejería médica a través de llamadas, videollamadas y mensajes en una plataforma virtual.</p>
        </div>
        <h4 class="text-left ml-3 text-secondary mb-0">Selección de participantes</h4>
        <div class="container p-3 text-content">
            <p>Estamos invitando a todos los docentes y personal administrativo que padezcan enfermedades crónicas de riesgo a complicación grave ante contagio de COVID-19 (asma, hipertensión arterial, cáncer, diabetes, enfermedades cardiovasculares, insuficiencia renal crónica, enfermedad pulmonar crónica, obesidad o sobrepeso, enfermedad reumatológica) de la Universidad Nacional de Trujillo.</p>
        </div>
        <h4 class="text-left ml-3 text-secondary mb-0">Procedimiento</h4>
        <div class="container p-3 text-content">
            <p>Si usted desea participar en este estudio, se le pedirá completar un Formulario de Datos Personales; posterior a ello, se le pedirá responder dos cuestionarios orientados a su estado de ansiedad y depresión, correspondientes al Inventario de Ansiedad de Becker (BAI) y el Inventario de Depresión de Becker (BDI-2), respectivamente. </p>
            <p>Luego, usted será asignado a una primera línea a cargo de médicos generales egresados de la Universidad Nacional de Trujillo. Ellos le brindarán consejería virtual interdiaria para monitorear su salud; cada sesión de consejería durará como máximo 20 minutos. Durante estos 20 minutos se espera que usted pueda responder de manera honesta a las preguntas del médico, para hacer un seguimiento adecuado. En caso usted manifieste una molestia que no pueda ser respondida por nuestro médico de primera línea, se le derivará a una segunda línea a cargo de nuestros médicos especialistas de Medicina Familiar y Comunitaria, respectivos, quienes se comunicarán con usted en la brevedad posible.</p>
        </div>
        <h4 class="text-left ml-3 text-secondary mb-0">Duración</h4>
        <div class="container p-3 text-content">
            <p>La investigación durará 2 meses y la participación en esta investigación es totalmente voluntaria.</p>
        </div>
        <h4 class="text-left ml-3 text-secondary mb-0">Confidencialidad</h4>
        <div class="container p-3 text-content">
            <p>La información que se recoja será confidencial y no se usará para ningún otro propósito fuera de los de esta investigación. Sus respuestas a los cuestionarios y durante la teleconsejería brindada serán luego codificadas usando un número de identificación y por lo tanto, serán anónimas.</p>
        </div>
        <h4 class="text-left ml-3 text-secondary mb-0">Derecho a negarse o retirarse</h4>
        <div class="container p-3 text-content">
            <p>Usted tiene derecho a negarse a formar parte de esta investigación. Asimismo, puede dejar de participar en la investigación en cualquier momento.</p>
        </div>

        <div class="row justify-content-center"><button class="btn-danger btn-lg" data-toggle="modal" data-target="#portfolioModal1">Participar</button></div>
    </div>
</section>
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
    .fixed-top{
        background: #2c3e50 !important;
    }
    .bg-primary{
        background: #1abc9c !important;
    }
    @media (min-width: 992px) {
        .fixed-top{
            background: #2c3e50 !important;
            height: 80px !important;
        }
    }
    #mainNav.navbar-shrink{
        background: #2c3e50 !important;
    }

    .text-content{
        font-size: 1.3em;
        text-align: justify;
    }

    .copyright{
        background: #2c3e50 !important;
    }
</style>
@endsection
