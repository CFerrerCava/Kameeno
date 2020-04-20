<template>
    <div class="container text-center">
        <div class="text-center">

            <button :hidden="!c.listar" class="btn btn-warning" @click="listarNoticias">Ver Noticias</button>
            <br>
            <contenido-listar :hidden="c.listar" @nuevo="nuevaNoticia" @editar="editarNoticia" ref="listarComponente"></contenido-listar>
            <contenido-registrar :hidden="c.registrar" @cargarNoticias="cargarNoticias"></contenido-registrar>
            <contenido-editar :hidden="c.editar" @cargarNoticias="cargarNoticias" ref="editarComponente"></contenido-editar>

        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            c: {
                registrar: true,
                listar: true,
                editar: true
            }
        };
    },
    methods: {
        listarNoticias: function(){
            this.ocultarTodo();
            this.c.listar = false;
        },
        nuevaNoticia: function(){
            this.ocultarTodo();
            this.c.registrar = false;
        },
        editarNoticia: function(id){
            this.$refs.editarComponente.cargarPublicacion(id);
            this.ocultarTodo();
            this.c.editar = false;
        },
        cargarNoticias: function(){
            this.listarNoticias();
            this.$refs.listarComponente.cargarContenidos();
        },
        ocultarTodo(elemento){
            this.c.registrar = true;
            this.c.listar = true;
            this.c.editar = true;
        }
    },
    mounted() {

    },
    created: function(){
        this.c.listar = false;
        //this.soloMostrar(this.c.listar);
    }
};
</script>
