<template>
<form class="text-left">
    <div class="form-group">
        <label for="exampleInputEmail1">Número de DNI</label>
        <b-form-input
        id="input-live"
        v-model="dni"
        :state="nameState"
        aria-describedby="input-live-help input-live-feedback"
        placeholder="Enter your name"
        trim
        ></b-form-input>
    <!-- This will only be shown if the preceding input has an invalid state -->
    <b-form-invalid-feedback id="input-live-feedback">
      Enter at least 3 letters
    </b-form-invalid-feedback>
        <input type="text" class="form-control" v-model="dni">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nombres y Apellidos del participante</label>
        <input type="text" class="form-control" v-model="names" disabled>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Aceptar</button>
</form>
</template>

<script>
    export default {
        data(){
            return{
                dni: '72764268',
                names: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
            nameState() {
                return this.name.length > 2 ? true : false
            }
        }
    }
</script>
