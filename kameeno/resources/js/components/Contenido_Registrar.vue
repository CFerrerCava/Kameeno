<template>
    <div class="container text-center">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus"></i> Nueva Publicación
                    </div>
                    <div class="card-block">
                        <div class="form-group row text-right align-items-center">
                            <div class="col-12 col-md-2 " >
                                <label for="title">Titulo</label>
                            </div>
                            <div class="col-12 col-md-9 mr-1">
                                <input v-model="p.titulo" type="text" placeholder="Titulo" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col-12 col-md-2" >
                                <label for="contenido">Contenido</label>
                            </div>
                            <div class="col-12 col-md-9 mr-1">
                                <ckeditor v-model="p.contenido" :config="editorConfig"></ckeditor>
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col-12 col-md-2" >
                                <label for="contenido">Imagenes y/o Archivos</label>
                            </div>
                            <div class="col-12 col-md-9 mr-1">
                                <VueFileAgent
                                ref="vueFileAgent"
                                :multiple="true"
                                :meta="true"
                                :accept="'image/*,.pdf'"
                                :helpText="'Arrastre archivos o haga click para seleccionar'"
                                :uploadUrl="uploadUrl"
                                @select="filesSelected($event)"
                                v-model="fileRecords"></VueFileAgent>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="row">
                    <div class=" col-12">
                        <div class="card">
                            <div class="card-header" style="height: 62px;">
                                <i class="fa fa-check"></i> Tipo
                            </div>
                            <div class="card-block">
                                <div class="form-group row align-items-center ">
                                    <label for="published_at" class="col-form-label text-md-right col-md-2 col-lg-3">Tipo</label>
                                    <div class="col-md-9 col-xl-8">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <select v-model="p.tipo" class="form-control">
                                                    <option value="NOTICIAS" selected>Noticia</option>
                                                    <option value="EVENTOS">Evento</option>
                                                    <option value="CURSO">Coronavirus</option>
                                                    <option value="VIDEOTECA">Videoteca</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="height: 62px;">
                                <i class="fa fa-check"></i> Estado
                            </div>
                            <div class="card-block">
                                <div class="form-group row align-items-center">
                                    <label for="published_at" class="col-form-label text-md-right col-md-2 col-lg-3">Estado</label>
                                    <div class="col-md-9 col-xl-8">
                                        <select v-model="p.estado" class="form-control">
                                            <option value="1" selected>Publicar Ahora</option>
                                            <option value="2">Solo Guardar</option>
                                            <option value="3">Programar Publicación</option>
                                            <option value="4">Prioritario</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" v-if="p.estado==3">
                        <div class="card">
                            <div class="card-header" style="height: 62px;">
                                <i class="fa fa-check"></i> Horarios
                            </div>
                            <div class="card-block">
                                <div class="form-group row align-items-center">
                                    <label for="published_at" class="col-form-label text-md-right col-md-2 col-lg-3">Fecha</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input v-model="p.fecha" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="published_at" class="col-form-label text-md-right col-md-2 col-lg-3">Hora</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input v-model="p.hora" type="time" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-12">
                        <div class="card">
                            <div class="card-header" style="height: 62px;">
                                <i class="fa fa-check"></i> Slide
                            </div>
                            <div class="card-block">
                                <div class="form-group row align-items-center ">
                                    <label for="published_at" class="col-form-label text-md-right col-md-2 col-lg-3">Slide</label>
                                    <div class="col-md-9 col-xl-8">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <input v-model="p.slide" type="radio" value="1" id="uno">
                                                <label for="uno">Si</label>
                                                <input v-model="p.slide" type="radio" value="0" id="dos">
                                                <label for="dos">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-12">
                        <div class="card">
                            <div class="card-header" style="height: 62px;">
                                <i class="fa fa-check"></i> Agregar video
                            </div>
                            <div class="card-block">
                                <div class="form-group row text-right align-items-center">
                                    <div class="col-12 col-md-2 " >
                                        <label for="title">URL</label>
                                    </div>
                                    <div class="col-12 col-md-9 mr-1">
                                        <input v-model="p.urlVideo" type="text" placeholder="ejemplo: https://youtu.be/4YS-ivzwPgs?list=RDMM8j1xiiAZhIQ" class="form-control">
                                    </div>
                                </div>
                                 <div class="form-group row text-right align-items-center">
                                    <div class="col-12 col-md-2 " >
                                        <label for="title">Tipo de red social</label>
                                    </div>
                                    <div class="col-12 col-md-9 mr-1">
                                       <select v-model="p.redSocial" class="form-control">
                                            <option value="1" selected>YouTube</option>
                                            <option value="2">Facebook</option>
                                            <option value="3">TickTok</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-success" v-on:click="funcionBoton">HECHO</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            p: {
                titulo: '',
                contenido: '',
                tipo: 'NOTICIAS',
                estado: '1',
                fecha: '',
                hora: '',
                slide: '0'
            },
            //editor html
            editorConfig: {
                height: 200
            },
            //archivos
            fileRecords: [],
            //uploadUrl: 'https://www.mocky.io/v2/5d4fb20b3000005c111099e3',
            uploadUrl: '/contenidos/addFoto',
            uploadHeaders: { 'X-Test-Header': 'vue-file-agent' },
            fileRecordsForUpload: []
        };
    },
    methods: {
        funcionBoton: function(){
            //console.log(this.fileRecords);
            //console.log(this.p);
            var that = this;
            axios.post('contenidos/addContenido', {publicacion:this.p, archivos:this.fileRecords})
            .then(function (response) {
                //console.log(response.data);
                if (response.data == true)
                    Vue.swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'La noticia se ha publicado'
                    }).then(() => {
                        //location.reload();
                        that.$emit('cargarNoticias');
                    });
                else
                    Vue.swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un problema al publicar la noticia, recargue la página e intente nuevamente'
                    });
            });
        },
        uploadFiles: function() {
            // Using the default uploader. You may use another uploader instead.
            this.$refs.vueFileAgent.upload(this.uploadUrl, this.uploadHeaders, this.fileRecordsForUpload);
            this.fileRecordsForUpload = [];
        },
        deleteUploadedFile: function(fileRecord) {
            // Using the default uploader. You may use another uploader instead.
            this.$refs.vueFileAgent.deleteUpload(this.uploadUrl, this.uploadHeaders, fileRecord);
        },
        filesSelected: function(fileRecordsNewlySelected) {
            var validFileRecords = fileRecordsNewlySelected.filter((fileRecord) => !fileRecord.error);
            this.fileRecordsForUpload = this.fileRecordsForUpload.concat(validFileRecords);
        },
        fileDeleted: function(fileRecord) {
            var i = this.fileRecordsForUpload.indexOf(fileRecord);
            if (i !== -1) {
                this.fileRecordsForUpload.splice(i, 1);
            } else {
                this.deleteUploadedFile(fileRecord);
            }
        },
    }
};
</script>
