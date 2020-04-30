<template>
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
                    <label for="edad">Edad</label>
                    <input type="text" id="edad" placeholder="Edad" v-model="edad" />
                </div>
                <div class="col-md-6">
                    <b-form-group label="Sexo">
                        <b-form-radio-group id="radio-group-2" v-model="sexo" name="radio-sub-component">
                            <b-form-radio value="masculino">Masculino</b-form-radio>
                            <b-form-radio value="femenino">Femenino</b-form-radio>
                        </b-form-radio-group>
                    </b-form-group>
                </div>
            </div>

            <label for="">Fecha de Nacimiento</label>
            <input type="date" name="nacimiento" placeholder="Fecha Nacimiento" v-model="fechaNacimiento" />
            <!--<input type="text" name="celular" placeholder="#Celular" />
            <input type="password" name="pwd" placeholder="Password" />
            <input type="password" name="cpwd" placeholder="Confirm Password" /> -->
        </div>
        <input type="button" name="next" class="next action-button" value="Siguiente" />
    </fieldset>
    <fieldset>
        <div class="form-card">
            <h2 class="fs-title">Informacion Familiar de contácto</h2>
            <label for="">Nombres y apellidos</label>
            <input type="text" name="nameFamiliar" placeholder="Nombres y Apellidos" v-model="namesFamiliar"/>
            <label for="">Número de celular</label>
            <input type="text" name="celFamiliar" placeholder="#Celular" v-model="celFamiliar" />
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
            <h2 class="fs-title">Información -  Salud</h2>
            <div class="row">
                <div class="col-md-6">
                    <b-form-group label="Seguro de salud">
                        <b-form-radio-group id="radio-group-2" v-model="seguroSalud" name="radio-sub-component">
                            <b-form-radio value="SIS">SIS</b-form-radio>
                            <b-form-radio value="EsSalud">EsSalud</b-form-radio>
                            <b-form-radio value="Otro">Otroiii</b-form-radio>
                        </b-form-radio-group>
                    </b-form-group>
                </div>
                <div class="col-md-6">
                    <label for="">Centro de salud cercano</label>
                    <input type="text" name="cent_salud" placeholder="Centro de salud" v-model="centroSalud"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <b-form-select v-model="selected" :options="options" multiple :select-size="5"></b-form-select>
                    <div class="mt-3">Selected: <strong>{{ selected }}</strong></div>
                </div>
                </div>
            </div> <br>
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
            <!-- <input type="text" name="celular" placeholder="#Celular" />
            <input type="password" name="pwd" placeholder="Password" />
            <input type="password" name="cpwd" placeholder="Confirm Password" /> -->
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
                        <option selected disabled value="0">Ocupacion Laboral</option>
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
</template>

<script>
  export default {
    data() {
      return {
        selected: ['b'], // Array reference
        options: [
          { value: 'a', text: 'Enfermedad 01' },
          { value: 'b', text: 'Enfermedad 02' },
          { value: 'c', text: 'Enfermedad 03' },
          { value: 'd', text: 'Enfermedad 04 descativada', disabled: true }
        ]
      }
    },
  }
</script>



<!--<script>
    export default {
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
                especificacion:''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
        },
        methods: {
        }
    }
</script> -->
