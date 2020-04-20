<template>
    <div class="container text-center">
        <div class="text-center">
            <button class="btn btn-primary" @click="solicitar_nuevo()">Nueva Publicacion</button>
        </div>
        <div class="row">
            <div class="table-responsive">
                <b-container fluid>
                  <b-row>
                    <b-col sm="6" md="6" class="my-1">
                      <b-form-group
                        label="Buscar"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="filterInput"
                        class="mb-0">
                        <b-input-group size="sm">
                          <b-form-input
                            v-model="filter"
                            type="search"
                            id="filterInput"
                            placeholder="Texto"
                          ></b-form-input>
                          <b-input-group-append>
                            <b-button :disabled="!filter" @click="filter=''" class="mt-0">Limpiar</b-button>
                          </b-input-group-append>
                        </b-input-group>
                      </b-form-group>
                    </b-col>
                    <b-col sm="6" md="6" class="my-1">
                      <b-form-group
                        label="Ver solo"
                        label-cols-sm="6"
                        label-cols-md="4"
                        label-cols-lg="3"
                        label-align-sm="left"
                        label-size="sm"
                        label-for="perPageSelect"
                        class="mb-0"
                      >
                        <b-form-select
                          v-model="perPage"
                          id="perPageSelect"
                          size="sm"
                          :options="pageOptions"
                        ></b-form-select>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-table
                    show-empty
                    small
                    stacked="md"
                    :items="items"
                    :fields="fields"
                    :current-page="currentPage"
                    :per-page="perPage"
                    :filter="filter"
                    :filterIncludedFields="filterOn"
                    @filtered="onFiltered"
                  >
                    <template v-slot:cell(name)="row">
                      {{ row.value.first }} {{ row.value.last }}
                    </template>

                    <template v-slot:cell(actions)="row">
                        <a v-if="row.item.estado!='DESACTIVADO'"><i @click="f_ver(row.item)" class="fa fa-eye" style="color:orange"></i></a>
                        <a v-if="row.item.estado!='DESACTIVADO'"><i @click="f_editar(row.item)" class="fa fa-edit" style="color:green"></i></a>
                        <a v-if="row.item.estado!='DESACTIVADO'"><i @click="f_eliminar(row.item)" class="fa fa-minus-circle" style="color:red"></i></a>
                        <a v-if="row.item.estado=='PRIORITARIO'"><i @click="f_quitarPrioritario(row.item)" class="fa fa-angle-double-down" style="color:purple"></i></a>
                        <a v-if="row.item.estado=='DESACTIVADO'"><i @click="f_recuperar(row.item)" class="fa fa-undo" style="color:blue"></i></a>
                    </template>
                    <template v-slot:row-details="row">
                      <b-card>
                        <ul>
                          <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
                        </ul>
                      </b-card>
                    </template>
                  </b-table>
                  <b-row>
                    <b-col sm="6" md="6" class="my-1">
                      <b-form-group
                        label="Publicaciones por página"
                        label-cols-sm="6"
                        label-cols-md="4"
                        label-cols-lg="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="perPageSelect"
                        class="mb-0">
                        <b-form-select
                          v-model="perPage"
                          id="perPageSelect"
                          size="sm"
                          :options="pageOptions"
                        ></b-form-select>
                      </b-form-group>
                    </b-col>
                    <b-col sm="6" md="6" class="my-1">
                      <b-pagination
                        v-model="currentPage"
                        :total-rows="totalRows"
                        :per-page="perPage"
                        align="fill"
                        size="sm"
                        class="my-0"
                      ></b-pagination>
                    </b-col>
                  </b-row>
                </b-container>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],
      fields: [
          { key: 'id', label: 'Id', sortable: true},
          { key: 'titulo', label: 'Titulo', sortable: true},
          { key: 'fechaCreacion', label: 'Fecha de Creacion', sortable: true},
          { key: 'fechaPublicacion', label: 'Fecha de Publicacion', sortable: true},
          { key: 'estado', label: 'Estado', sortable: true},
          {
            key: 'slide',
            label: 'Slide',
            formatter: (value, key, item) => {
              return item.slide == 1 ? 'Si' : 'No'
            },
            sortable: true
          },
          { key: 'actions', label: 'Actions'}
      ],
      totalRows: 1,
      currentPage: 1,
      perPage: 5,
      pageOptions: [5, 10, 15],
      filter: null,
      filterOn: [],
    }
  },
  methods: {
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
    f_ver: function(item){
        console.log(item);
    },
    f_editar: function(item){
        this.solicitar_editar(item.id);
    },
    f_eliminar: function(item){
        this.f_modificarEstado({
            title1: '¿Seguro que desea eliminar?',
            text1: "La publicacion de título '" + item.titulo + "', será eliminada, ¿desea continuar?",
            title2: '¡Eliminado!',
            text2: 'La publicacion ha sido eliminada',
            metodo: 'eliminar',
            id: item.id
        });
    },
    f_recuperar: function(item){
        this.f_modificarEstado({
            title1: '¿Seguro que desea recuperar la noticia?',
            text1: "La publicacion de título '" + item.titulo + "', será recuperada, ¿desea continuar?",
            title2: '¡Recuperado!',
            text2: 'La publicacion ha sido recuperada',
            metodo: 'recuperar',
            id: item.id
        });
    },
    f_quitarPrioritario: function(item){
        this.f_modificarEstado({
            title1: 'Quitar Prioridad',
            text1: "La publicacion de título '" + item.titulo + "', dejará de ser prioritaria, ¿desea continuar?",
            title2: '¡Éxito!',
            text2: 'La publicacion pasó a estado normal',
            metodo: 'noPrioritario',
            id: item.id
        });
    },
    f_modificarEstado: function(datos){
        Vue.swal.fire({
          title: datos.title1,
          text: datos.text1,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si',
          cancelButtonText: 'No'
        }).then((result) => {
            let that = this;
            if (result.value) {
                axios.post('contenidos/' + datos.metodo, {id: datos.id})
                .then(function (response) {
                    if (response.data == true){
                        Vue.swal.fire(
                            datos.title2,
                            datos.text2,
                            'success'
                        );
                        that.items = [];
                        that.cargarContenidos();
                    }
                    else{
                        this.mensajeError();
                    }
                })
                .catch(function (error){
                    this.mensajeError();
                    console.log(error);
                });
            }
        });
    },
    mensajeError: function(datos){
      Vue.swal.fire(
          'Error',
          'sucedió un error, intente nuevamente',
          'error'
      );
    },
    cargarContenidos: function(){
        var that = this;
        axios.post('contenidos/listContenido')
        .then(function (response) {
            that.items = response.data;
            that.onFiltered(that.items);
            //totalRows = that.items.length;
        });
    },
    solicitar_nuevo: function(){
        this.$emit('nuevo');
    },
    solicitar_editar: function(id){
        this.$emit('editar', id);
    }
  },
  mounted() {
      this.totalRows = this.items.length
  },
  created: function(){
      this.cargarContenidos();
  }
}
</script>
