<template>
    <div class="container text-center">         
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
											<a v-if="row.item.estado!='DESACTIVADO'"></a>
											<b-dropdown id="dropdown-1" variant="primary" text="Elegir acción" class="m-md-2">
												<b-dropdown-item v-on:click="VerFicha(row.item.DNI)">Ver ficha de paciente</b-dropdown-item>
												<b-dropdown-divider></b-dropdown-divider>
												<b-dropdown-item v-on:click="RegistraHistoria(row.item.DNI)">Nuevo registro</b-dropdown-item>
												<b-dropdown-divider></b-dropdown-divider>
												<b-dropdown-item v-on:click="Derivar(row.item.DNI)">Derivar</b-dropdown-item>											 
												<b-dropdown-item v-on:click="CambiarEstado(row.item.DNI)">Cambiar estado</b-dropdown-item>										 
											</b-dropdown>
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
				<div>					
					<b-modal ref="my-modal" hide-footer title="Ficha de paciente">
						<div class="d-block text-center">
							<h3>Hello From My Modal!</h3>
						</div>
						<b-button class="mt-3" variant="outline-danger" block @click="hideModal">Close Me</b-button>
						<b-button class="mt-2" variant="outline-warning" block @click="toggleModal">Toggle Me</b-button>
					</b-modal>
				</div>
    </div>
		
</template>

<script>
export default {
  data() {
    return {
			paciente:
			{
				nombre,
				ap_pat,
				ap_mat,
				DNI,
				fecha_registro,
				fecha_nac,
				sexo,
				estado_civil,
				direccion,
				telefono,
				correo,
				estado,
				facultad,
				ocupacion,
				seguro
			},
     	items: [
          { paciente: 'Dickerson Macdonald', DNI:'73437870', telefono:'902007640',estado:'?' },
          { paciente: 'Larsen Shaw', DNI:'73437870', telefono:'902007640',estado:'?' },
          { paciente: 'Geneva Wilson', DNI:'73437870', telefono:'902007640',estado:'?' },
					{ paciente: 'Jami Carney', DNI:'73437870', telefono:'902007640',estado:'?' },
					{ paciente: 'Dickerson Macdonald', DNI:'73437870', telefono:'902007640',estado:'?' },
          { paciente: 'Larsen Shaw', DNI:'73437870', telefono:'902007640',estado:'?' },
          { paciente: 'Geneva Wilson', DNI:'73437870', telefono:'902007640',estado:'?' },
					{ paciente: 'Jami Carney', DNI:'73437870', telefono:'902007640',estado:'?' },
					{ paciente: 'Dickerson Macdonald', DNI:'73437870', telefono:'902007640',estado:'?' },
          { paciente: 'Larsen Shaw', DNI:'73437870', telefono:'902007640',estado:'?' },
          { paciente: 'Geneva Wilson', DNI:'73437870', telefono:'902007640',estado:'?' },
          { paciente: 'Jami Carney', DNI:'73437870', telefono:'902007640',estado:'?' }
        ],
      fields: [ 
          { key: 'paciente', label: 'Paciente', sortable: true},
          { key: 'DNI', label: 'DNI', sortable: true},
          { key: 'telefono', label: 'Teléfono', sortable: true},
          { key: 'estado', label: 'Estado', sortable: true},           
          { key: 'actions', label: 'Aciones'}
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
		VerFicha: function (DNI) {
			this.showModal();
		},
		RegistraHistoria: function (DNI) {
			
		},
		Derivar: function (DNI) {
			
		}
		,
		CambiarEstado: function (DNI) {
			
		}, 
		showModal() {
        this.$refs['my-modal'].show()
		},
		hideModal() {
			this.$refs['my-modal'].hide()
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
    } 
  },
  mounted() {
      this.totalRows = this.items.length
  },
  created: function(){
      //this.cargarContenidos();
  }
}
</script>
