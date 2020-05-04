<template>
<form class="text-left" v-on:submit.prevent="validate()">

    <div class="form-group">
        <label for="exampleInputEmail1">Número de DNI</label>
        <b-form-input
        id="input-live"
        v-model="dni"
        :state="dniState"
        aria-describedby="input-live-help input-live-feedback"
        placeholder="Ingrese el número de su dni"
        trim
        ></b-form-input>
        <!-- This will only be shown if the preceding input has an invalid state -->
        <b-form-invalid-feedback id="input-live-feedback">
            {{errorDni}}
        </b-form-invalid-feedback>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <b-form-input
        type="email"
        id="email"
        v-model="email"
        :state="emailState"
        aria-describedby="input-live-help input-live-feedback"
        placeholder="Ingrese el número de su dni"
        trim
        ></b-form-input>
        <!-- This will only be shown if the preceding input has an invalid state -->
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Nombres y Apellidos del participante</label>
        <input type="text" class="form-control" v-model="names" disabled>
    </div>

    <h6 v-if="successful === true" class="messageFinal">Su datos fueron registrados exitosamente, por favor revise su correo electrónico para continuar.</h6>
    <b-overlay
      :show="busy"
      rounded
      opacity="0.6"
      spinner-small
      spinner-variant="primary"
      class="d-inline-block"
      v-else
    >
        <b-button
            ref="button"
            :disabled="busy"
            variant="primary"
            type="submit"
         >
            {{nameBtn}}
        </b-button>
    </b-overlay>

</form>
</template>

<script>
    export default {
        data(){
            return{
                successful: false,
                error:true,
                dni: '',
                email:'',
                names: '',
                errorDni:'',
                errorEmail:'',
                reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
                busy: null,
                nameBtn: 'Validar datos'
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
            dniState() {
                this.names = '';
                this.nameBtn = 'Validar datos';

                if( this.dni.length > 0){
                    if(isNaN(this.dni))this.errorDni = 'Formato no válido'
                    else if(this.dni.length > 8) this.errorDni = 'El número de DNI no puede superar los 8 dígitos'
                    else if(this.dni.length === 8){
                        this.error = false;
                        return true;
                    }
                    this.error = true
                    return false;
                }
            },
            emailState(){
                this.names = '';
                this.nameBtn = 'Validar datos';
                return (this.email == "")? null : (this.reg.test(this.email)) ? true : false;
            }
        },
        methods: {
            async validate() {
                switch (this.nameBtn) {
                    case 'Validar datos':
                        if(this.error || !this.reg.test(this.email)){
                            alert('Los datos ingresados no son válidos');
                            break;
                        }
                        this.busy = true;
                        await axios.post('api/reniec',{dni: this.dni }).then(({data}) => {
                            this.names = `${data.apellido_paterno.replace(/&Ntilde;/gi, 'Ñ')} ${data.apellido_materno.replace(/&Ntilde;/gi, 'Ñ')} ${data.nombres}`;
                            this.busy = null;
                            this.nameBtn = 'Confirmar registro'
                        });
                        break;

                    default:
                        if(this.names === '') alert('El número de DNI ingresado, no pudo ser validado');
                        else {
                            this.busy = true;
                            await axios.post('api/sendEmailUntPacientes',{dni: this.dni, names: this.names, email: this.email }).then((response) => {
                                console.log(response.data.msg);
                                this.busy = null;
                                this.successful = true;
                            });

                        }
                        break;
                }


            }
        }
    }
</script>

<style scoped>
    .messageFinal{
        color:#2c3e50;
    }
</style>
