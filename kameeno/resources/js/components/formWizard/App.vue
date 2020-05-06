<template>
    <div id="app">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css">

        <section class="section" style="padding-top: .5rem">
            <div class="container">
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <horizontal-stepper :steps="demoSteps" @completed-step="completeStep" :top-buttons="true"
                                            @active-step="isStepActive" @stepper-finished="alert" @data-form="handleData"
                                            :names="names" :email="email" :dni="dni" ></horizontal-stepper>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import HorizontalStepper from './src/HorizontalStepper.vue';

    import StepOne from './StepOne.vue';
    import StepTwo from './StepTwo.vue';
    import StepThree from './StepThree.vue';
    import StepFour from './StepFour';

    const teamUrl = 'https://github.com/PygmySlowLoris';
    const repoUrl = 'https://github.com/PygmySlowLoris/vue-stepper';

    export default {
        name: 'app',
        components: {
            HorizontalStepper
        },
        props: ['names', 'email', 'dni'],
        data(){
            return {
                data:{},
                repoUrl: repoUrl,
                teamUrl: teamUrl,
                demoSteps: [
                    {
                        icon: 'person',
                        name: 'first',
                        title: 'Información personal',
                        subtitle: '',
                        component: StepOne,
                        completed: false

                    },
                    {
                        icon: 'group',
                        name: 'second',
                        title: 'Información de contacto',
                        subtitle: '',
                        component: StepTwo,
                        completed: false
                    },
                    {
                        icon: 'insert_emoticon',
                        name: 'third',
                        title: 'Información de salud',
                        subtitle: '',
                        component: StepThree,
                        completed: false
                    },
                    {
                        icon: 'work',
                        name: 'fourth',
                        title: 'Información laboral',
                        subtitle: '',
                        component: StepFour,
                        completed: false
                    }
                ],
                activeStep: 0
            }
        },
        computed: {},
        methods: {
            completeStep(payload) {
                this.demoSteps.forEach((step) => {
                    if (step.name === payload.name) {
                        step.completed = true;
                    }
                })
            },
            isStepActive(payload) {
                this.demoSteps.forEach((step) => {
                    if (step.name === payload.name) {
                        if(step.completed === true) {
                            step.completed = false;
                        }
                    }
                })
            },
            alert(payload) {
                alert('Subiendo...');
                console.log(this.data);
            },
            handleData(payload){
                this.data = {...this.data, ...payload}
            }
        }
    }
</script>

<style scoped>

    .section{
        background-image: url('/images/logo.png');
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-color: rgb(255, 255, 255);
    }
    #app {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
    }

    .pointer {
        cursor: pointer;
    }

    h1, h2 {
        font-weight: normal;
    }

    hr {
        background-color: transparent;
        border: none;
        display: block;
        height: inherit;
        margin: 1.5rem 0;
        border-top: dashed 1px;
    }

    li {
        display: inline-block;
        margin: 0 10px;
    }

    a {
        color: #0b99b9;
        text-decoration: underline;
    }

    .text-medium-grey {
        color: #333;
    }

    .text-light-grey {
        color: #888;
    }

    .box.formated {
        position: relative;
        padding: 0;
    }

    .box.formated .heading {
        font-size: 1rem;
        text-transform: capitalize;
        padding: .8rem 1.5rem;
        background-color: #fafafa;
    }

    .box.formated .content {
        padding: 1rem 2rem;
    }

    i.top-left {
        position: absolute;
        left: 1.5rem;
        top: 0.8rem;
    }

    .vertical-separator {
        display: flex;
        justify-content: space-around;
    }

    .vertical-separator .line {
        border-right: 1px solid #cccccc;
    }
</style>
