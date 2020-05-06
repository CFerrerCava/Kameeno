<template>
    <div style="padding: 2rem 3rem; text-align: left;" class="row">
        <div class="field col-12">
            <label class="label">Nombres y apellidos de contacto</label>
            <div class="control">
                <input :class="['input', ($v.form.namesFamiliar.$error) ? 'is-danger' : '']"  type="text" placeholder="Ingrese nombres y apellidos de contacto" v-model="form.namesFamiliar">
            </div>
            <p v-if="$v.form.namesFamiliar.$error" class="help is-danger">Este campo es inválido</p>
        </div>
        <div class="field col-12">
            <label class="label">Número de celular</label>
            <div class="control">
                <input :class="['input', ($v.form.celFamiliar.$error) ? 'is-danger' : '']"  type="text" class="input" placeholder="Ingrese número de celular de contácto" v-model="form.celFamiliar">
            </div>
            <p v-if="$v.form.celFamiliar.$error" class="help is-danger">Este campo es inválido</p>
        </div>
        <div class="field col-12">
            <label class="label">Correo electrónico</label>
            <div class="control">
                <input :class="['input', ($v.form.emailFamiliar.$error) ? 'is-danger' : '']" type="email" class="input"  placeholder="Ingrese correo electrónico de contacto" v-model="form.emailFamiliar">
            </div>
            <p v-if="$v.form.emailFamiliar.$error" class="help is-danger">Este campo es inválido</p>
        </div>
        <div class="field col-12">
            <label class="label">Dirección</label>
            <div class="control">
                <input :class="['input', ($v.form.direccionFamiliar.$error) ? 'is-danger' : '']"  type="text" placeholder="Ingrese dirección de contacto" v-model="form.direccionFamiliar">
            </div>
            <p v-if="$v.form.direccionFamiliar.$error" class="help is-danger">Este campo es inválido</p>
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
                    namesFamiliar:'',
                    emailFamiliar:'',
                    celFamiliar:'',
                    direccionFamiliar:''
                }
            }
        },
        validations: {
            form: {
                namesFamiliar: {
                    required
                },
                celFamiliar:{
                    required
                },
                emailFamiliar: {
                    required
                },
                direccionFamiliar: {
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
