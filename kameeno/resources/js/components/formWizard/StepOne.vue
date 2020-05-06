<template>
    <div style="padding: 2rem 3rem; text-align: left;" class="row">
        <div class="field col-12">
            <label class="label">Nombres y apellidos</label>
            <div class="control">
                <input type="text" class="input" placeholder="Ingrese  sus nombres y apellidos" v-model="form.names" disabled>
            </div>
        </div>
        <div class="field col-12">
            <label class="label">DNI</label>
            <div class="control">
                <input  type="text" class="input" placeholder="Ingrese su número de DNI" v-model="form.dni" disabled>
            </div>
        </div>
        <div class="field col-12">
            <label class="label">Email</label>
            <div class="control">
                <input type="email" class="input"  placeholder="Ingrese su correo electrónico" v-model="form.email" disabled>
            </div>
        </div>
        <div class="field col-6">
            <label class="label">Edad</label>
            <div class="control">
                <input :class="['input', ($v.form.edad.$error) ? 'is-danger' : '']"  type="text" placeholder="Ingrese su edad" v-model="form.edad">
            </div>
            <p v-if="$v.form.edad.$error" class="help is-danger">Este campo es inválido</p>
        </div>
        <div class="field col-6">
            <b-form-group label="Sexo">
                <b-form-radio-group id="radio-group-2" v-model="form.sexo" name="radio-sub-component">
                    <b-form-radio value="masculino">Masculino</b-form-radio>
                    <b-form-radio value="femenino">Femenino</b-form-radio>
                </b-form-radio-group>
                <p v-if="$v.form.sexo.$error" class="help is-danger">Este campo es requerido</p>
            </b-form-group>
        </div>
    </div>
</template>

<script>
    import {validationMixin} from 'vuelidate'
    import {required, numeric, minValue, maxValue} from 'vuelidate/lib/validators'

    export default {
        props: ['clickedNext', 'currentStep', 'names', 'email', 'dni'],
        mixins: [validationMixin],
        data() {
            return {
                form: {
                    names: this.names,
                    email: this.email,
                    dni: this.dni,
                    edad:'',
                    sexo:''
                }
            }
        },
        validations: {
            form: {
                edad: {
                    required,
                    numeric,
                    minValue: minValue(20),
                    maxValue: maxValue(100)
                },
                sexo: {
                    required
                }
            }
        },
        watch: {
            $v: {
                handler: function (val) {
                    if(!val.$invalid) {
                        this.$emit('can-continue', {value: true, data: this.form});
                    } else {
                        this.$emit('can-continue', {value: false});
                        setTimeout(()=> {
                            this.$emit('change-next', {nextBtnValue: false});
                        }, 3000)
                    }
                },
                deep: true
            },

            clickedNext(val) {
                console.log(val);
                if(val === true) {
                    this.$v.form.$touch();
                }
            }
        },
        mounted() {
            if(!this.$v.$invalid) {
                this.$emit('can-continue', {value: true});
            } else {
                this.$emit('can-continue', {value: false});
            }
        }
    }
</script>
