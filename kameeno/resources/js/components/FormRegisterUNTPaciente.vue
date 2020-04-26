<template>
<form class="text-left" v-on:submit.prevent="validate()">
    <div class="form-group">
        <label for="exampleInputEmail1">Número de DNI</label>
        <b-form-input
        id="input-live"
        v-model="dni"
        :state="nameState"
        aria-describedby="input-live-help input-live-feedback"
        placeholder="Ingrese el número de su dni"
        trim
        ></b-form-input>
        <!-- This will only be shown if the preceding input has an invalid state -->
        <b-form-invalid-feedback id="input-live-feedback">
            {{error}}
        </b-form-invalid-feedback>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nombres y Apellidos del participante</label>
        <input type="text" class="form-control" v-model="names" disabled>
    </div>
    <b-overlay
      :show="busy"
      rounded
      opacity="0.6"
      spinner-small
      spinner-variant="primary"
      class="d-inline-block"
    >
         <b-button
            ref="button"
            :disabled="busy"
            variant="primary"
            type="submit"
         >
            Registrarme
        </b-button>
    </b-overlay>
</form>
</template>

<script>
    export default {
        data(){
            return{
                dni: '',
                names: '',
                error:'',
                expresion: /[0-9]+/i,
                busy: null,
                timeout: null
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
            nameState() {
                if(isNaN(this.dni) && this.dni.length > 0){
                    this.error = 'Formato no válido'
                    return false;
                }

                if(this.dni.length > 8){
                    this.error = 'El número de DNI no puede superar los 8 dígitos'
                    return false;
                }
            }
        },
        methods: {
            async validate() {
                this.busy = true;
                await axios.post('api/reniec',{dni: this.dni }).then(({data}) => {
                    this.names = `${data.apellido_paterno.replace(/&Ntilde;/gi, 'Ñ')} ${data.apellido_materno.replace(/&Ntilde;/gi, 'Ñ')} ${data.nombres}`;
                    this.busy = null;
                });

            }
        }
    }
</script>
