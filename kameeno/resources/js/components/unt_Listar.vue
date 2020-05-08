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
                    

                    <template v-slot:cell(actions)="row"> 
											<b-dropdown id="dropdown-1" variant="primary" text="Elegir acción" class="m-md-2">
												<b-dropdown-item v-on:click="funcionPaciente(row.item.id_paciente)">Atender</b-dropdown-item>
												<b-dropdown-divider></b-dropdown-divider> 
                        <b-dropdown-item @click="row.toggleDetails">{{ row.detailsShowing ? 'Cerrar' : 'Ver' }} detalles</b-dropdown-item>
												<!-- <b-dropdown-item v-on:click="verModal(row.item.DNI,'modal-derivar')">Alertar</b-dropdown-item>										  -->
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
				 
					<b-modal ref="modal-derivar" size="xl" hide-footer title="Derivar">
						<div class="d-block">
              <div class=" col-12">
                  <label for=""  >Médico</label>
                   <select name="" id="" class=" form-control">
                     <option value=""
                      v-for="(item, index) in MedicoArray" 
                      v-bind="item" 
                      v-bind:index="index"  
                      v-bind:key="item.id"
                      >{{item.data}}</option>
                   </select>
                </div>
						  <div class=" text-center">
                <b-button   variant="success" @click="hideModal('modal-registro')">Guardar</b-button>		
                <b-button   variant="danger" @click="hideModal('modal-derivar')">Cerrar</b-button>
              </div>
						</div>  
					</b-modal>
          
				</div>
    </div>
		
</template>

<script>
export default {
  data() {
    return {
			
     	items: [
        ],
      fields: [ 
          { key: 'paciente', label: 'Paciente', sortable: true},
          { key: 'dni', label: 'DNI', sortable: true},
          { key: 'telefono', label: 'Teléfono', sortable: true},
          { key: 'sexo', label: 'Sexo', sortable: true},
          { key: 'seguro', label: 'Seguro', sortable: true},
          { key: 'ocupacion', label: 'Ocupación', sortable: true},
          { key: 'estado', label: 'Estado', sortable: true},           
          { key: 'actions', label: 'Aciones'}
      ],
      totalRows: 1,
      currentPage: 1,
      perPage: 5,
      pageOptions: [5, 10, 15],
      filter: null,
			filterOn: [],
			Datapaciente:{
				nombre:'',
				ap_pat:'',
				ap_mat:'',
				DNI:'',
				fecha_registro:'',
				fecha_nac:'',
				sexo:'',
				estado_civil:'',
				direccion:'',
				telefono:'',
				correo:'',
				estado:'',
				facultad:'',
				ocupacion:'',
        seguro:'',
        enfermedad:'',
        tratamiento:''
      },
      historia:{
        consulta:'',
        respuesta:'',
        fecha:'' 
      },
      DNI:'',
      historiaArray:[],
      Medico:{data:''},
      MedicoArray:[] 
    }
  },
  methods: {
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
    verModal: function (DNI, modal) {
      this.DNI=DNI;
      switch (modal) {
        case 'modal-seguimiento':
          this.VerSeguimiento(DNI);          
          break;
        case 'modal-derivar':
          this.Derivar(DNI);          
          break;
        default:
          break;
      }
			this.showModal(modal);
    },
		VerFicha: function () {     
     
		},
		RegistraHistoria: function (DNI) {
     
		},
		Derivar: function (DNI) {
      var hist=this.Medico;
      for (let index = 0; index < 5; index++) {       
        hist.data='asdasd';
        this.MedicoArray.push(hist);
      }
		}
		,
		CambiarEstado: function (DNI) {
   
    }, 
    VerSeguimiento: function (DNI) {

      var hist=this.historia;
      for (let index = 0; index < 5; index++) {
        hist.consulta='asdasd';
        hist.respuesta='asdasd';
        hist.fecha='10/20/20';  
        this.historiaArray.push(hist);
      }
    },
		showModal(string) {
      this.$refs[string].show()
		},
		hideModal(string) {
			this.$refs[string].hide()
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
        axios.post('paneluap/list')
        .then(function (response) { 
            that.items = response.data;
            that.onFiltered(that.items);
            //totalRows = that.items.length;
        });
    },
    FuncionEstado: function(){
        var that = this;
        axios.post('alerta')
        .then(function (response) {
            that.items = response.data;
            that.onFiltered(that.items);
            //totalRows = that.items.length;
        });
    },
    funcionPaciente: function (id_paciente) {
      location.href="/paneluap/paciente?id="+id_paciente;
    } 
  },
  mounted() {
      this.cargarContenidos();
  },
  created: function(){
      //this.cargarContenidos();
  }
}
</script>
