<template>
<form id="msform" v-on:submit.prevent="subir()">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active" id="personal"><strong>Personal </strong></li>
        <li id="familia"><strong>Familia</strong></li>
        <li id="salud"><strong>Salud</strong></li>
        <li id="payment"><strong>Laboral</strong></li>
        <li id="confirm"><strong>Final</strong></li>
    </ul> <!-- fieldsets -->

    <fieldset>
        <div class="form-card">
            <h2 class="fs-title">Informacion Personal</h2>
            <div class="row">
                <div class="col-md-12">
                    <label for="nombres">Nombres y Apellidos</label>
                    <input type="text" id="nombres"  v-model="names" disabled />
                </div>
                <div class="col-md-12">
                    <label for="miDni">DNI</label>
                    <input type="text" id="miDni"  v-model="dni" disabled />
                </div>
                <div class="col-md-12">
                    <label for="miEmail">Email</label>
                    <input type="text" id="miEmail"  v-model="email" disabled />
                </div>
                <div class="col-md-6">
                    <label for="edad">Edad</label>
                    <input type="text" id="edad" placeholder="Edad" v-model="edad" />
                </div>
                <div class="col-md-6">
                    <label for="edad">Sexo {{sexo}}</label><br>
                    <!-- <b-form-group label="Sexo">
                        <b-form-radio-group id="radio-group-2" v-model="sexo" name="radio-sub-component">
                            <b-form-radio value="masculino">Masculino</b-form-radio>
                            <b-form-radio value="femenino">Femenino</b-form-radio>
                        </b-form-radio-group>
                    </b-form-group> -->
                    <!-- Default unchecked -->

                    <!-- Default inline 1-->

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
                        <label class="custom-control-label" for="defaultInline1">Masculino</label>
                    </div>

                    <!-- Default inline 2-->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
                        <label class="custom-control-label" for="defaultInline2">Femenino</label>
                    </div>

                </div>
            </div>
            <label for="fechaNac">Fecha de nacimiento</label>
            <b-form-datepicker id="fechaNac" v-model="fechaNacimiento" class="mb-2"></b-form-datepicker>
        </div>
        <input type="button" name="next" class="next action-button" value="Siguiente" />
    </fieldset>

    <fieldset>
        <div class="form-card">
            <h2 class="fs-title">Informacion Familiar de contácto</h2>
            <label for="">Nombres y apellidos</label>
            <input type="text" name="nameFamiliar" placeholder="Nombres y Apellidos" v-model="namesFamiliar"/>
            <label for="">Número de celular</label>
            <input type="text" name="celFamiliar" placeholder="Celular" v-model="celFamiliar" />

            <label for="">Correo electrónico</label>
            <input type="text" name="emailFamiliar" placeholder="Correo Electronico" v-model="emailFamiliar" />

            <label for="">Dirección</label>
            <input type="text" name="DireFamiliar" placeholder="Dirección" v-model="direccionFamiliar" />
        </div>
        <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
        <input type="button" name="next" class="next action-button" value="Siguiente" />
    </fieldset>

    <fieldset>
        <div class="form-card">
            <h2 class="fs-title">Información -  Salud </h2>
            <div class="row">
                <div class="col-md-6">
                    <b-form-group label="Seguro de salud">
                        <b-form-radio-group id="radio-group-2" v-model="seguroSalud" name="radio-sub-component2">
                            <b-form-radio value="SIS">SIS</b-form-radio>
                            <b-form-radio value="EsSalud">EsSalud</b-form-radio>
                            <b-form-radio value="Otro">Otro</b-form-radio>
                        </b-form-radio-group>
                    </b-form-group>
                </div>
                <div class="col-md-6">
                    <label for="">Centro de salud cercano</label>
                    <input type="text"  placeholder="Centro de salud" v-model="centroSalud" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     <label class="typo__label">Enfermedad</label>
                    <vue-multiselect
                        v-model="enfermedades"
                        placeholder="Buscar"
                        label="name"
                        track-by="code"
                        :options="options"
                        :multiple="true"
                        :taggable="true"
                        @tag="addTag">
                    </vue-multiselect>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <b-form-group label="¿Sigue algún tratamiento?">
                        <b-form-radio-group id="radio-group-3" v-model="tratamiento" name="radio-sub-component">
                            <b-form-radio value="si">Si</b-form-radio>
                            <b-form-radio value="no">No</b-form-radio>
                        </b-form-radio-group>
                    </b-form-group>
                </div>
                <div class="col-md-12" v-if="tratamiento==='si'">
                    <label for="">Especifique el tratamiento</label>
                    <input type="text"  v-model="especificacion"/>
                </div>
            </div>
        </div>
        <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
        <input type="button" name="next" class="next action-button" value="Siguiente" />
    </fieldset>

    <fieldset>
        <div class="form-card">
            <h2 class="fs-title">Informacion Laboral</h2>
            <div class="row">
                <div class="col-md-12">
                    <b-form-group label="Ocupación laboral">
                        <b-form-radio-group id="radio-group-5" v-model="ocupacion" name="radio-sub-component">
                            <b-form-radio value="docente">Docente</b-form-radio>
                            <b-form-radio value="personal administrativo">Personal Administrativo</b-form-radio>
                        </b-form-radio-group>
                    </b-form-group>
                </div>
            </div> <br>
            <div class="row">
                <div class="col-md-12" >
                    <label for="">Facultad</label>
                    <b-form-select
                        v-model="facultad"
                        :options="facultades"
                        class="mb-3"
                        value-field="id"
                        text-field="name"
                        disabled-field="notEnabled"
                        v-on:change="handleFacultad()"
                    ></b-form-select>
                </div>
            </div> <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Escuela</label>
                    <b-form-select
                        v-model="escuela"
                        :options="escuelas"
                        class="mb-3"
                        value-field="id"
                        text-field="name"
                        disabled-field="notEnabled"
                    ></b-form-select>
                </div>
            </div>
        </div> <input type="button" name="previous" class="previous action-button-previous" value="Anterior" /> <input type="submit" name="make_payment" class="next action-button" value="Finalizar" />
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
</template>

<script>
    export default {
        props: ['names', 'email', 'dni'],
        data(){
            return{
                edad:'',
                sexo:'',
                fechaNacimiento:'',

                namesFamiliar:'',
                celFamiliar:'',
                emailFamiliar:'',
                direccionFamiliar:'',

                seguroSalud:'',
                centroSalud:'',
                tratamiento:'',
                especificacion:'',
                enfermedades: [],

                ocupacion:'',
                facultad: null,
                escuela: null,

                options: [
                    {code:1, name: "Diabetes Mellitus"},
                    {code:2, name: "Asma"},
                    {code:3, name: "Enfermedad pulmonar crónica"},
                    {code:4, name: "Obesidad o sobrepeso"},
                    {code:5, name: "Hipertensión arterial"},
                    {code:6, name: "Cáncer con quimioterapia"},
                    {code:7, name: "Cáncer sin quimioterapia"},
                    {code:8, name: "Enfermedades cardiovasculares"},
                    {code:9, name: "Insuficiencia renal crónica"},
                    {code:10, name: "Enfermedad reumatológica con uso continuo de antinflamatorios /corticoides"},
                    {code:11, name: "Uso permanente de antinflamatorios o corticoides por otras causas"}
                ],
                facultades: [{ id:null, name:"Elegir Facultad" }],
                escuelas: [{ id: null, name: '---', disabled:true}],

                dataEscuelasGlobal: []
            }
        },
        mounted() {
            axios.get('/assets_client/facultades.json').then(({data}) => {
                data.map( async (facultad) => {
                    if(facultad.state) this.facultades.push(facultad);
                });
            });

            axios.get('/assets_client/escuelas.json').then(({data}) => { this.dataEscuelasGlobal = data });
        },
        computed: {
        },
        methods: {
            addTag (newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
            }
            this.options.push(tag)
            this.value.push(tag)
            },
            handleFacultad(){
                this.escuelas=[{id:null, name:'Elegir Escuela'}];
                this.escuela = null
               this.dataEscuelasGlobal.map((escuela) => {
                   if(escuela.facultadId === this.facultad && escuela.state) this.escuelas.push(escuela);
               })
            }
        }
    }
</script>
