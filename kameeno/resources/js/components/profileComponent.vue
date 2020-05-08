<template>
  <b-container fluid>
     <b-button variant="success"  @click="showModal('modal-registro')">Agregar nuevo médico</b-button>
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
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      @filtered="onFiltered"
    >
      <template v-slot:cell(name)="row">
        {{ row.value.first }} {{ row.value.last }}
      </template>

      <template v-slot:cell(actions)="row">
        <b-button size="sm" @click="showModal('my-modal')" class="mr-1">
          Derivar
        </b-button>
        <b-button size="sm" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Cerrar' : 'Ver' }}
        </b-button>
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
      <b-col sm="12" md="12" class="my-1">
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
    <!-- Info modal -->
    <b-modal ref="my-modal" hide-footer title="Derivar">
      <div class="d-block text-center">
        <b-form-select v-model="selected" :options="options"></b-form-select>
      </div>
      <div class=" text-center">
        <b-button   variant="danger"   @click="hideModal('my-modal')">Guardar</b-button>
        <b-button   variant="warning"   @click="hideModal('my-modal')">Cerrar</b-button>
      </div>     
    </b-modal>
    <b-modal ref="modal-registro" hide-footer title="Registrar">
      <div class="d-block text-center">
        <b-row>
          <b-col lg="12">
            <label for="">Nombre</label>
            <b-form-input v-model="doctor.name" placeholder="Nombre"></b-form-input>
          </b-col>
          <b-col lg="12">
            <label for="">Apellido paterno</label>
            <b-form-input v-model="doctor.appat" placeholder="Apellido paterno"></b-form-input>
          </b-col>
          <b-col lg="12">
            <label for="">Apellido materno</label>
            <b-form-input v-model="doctor.apmat" placeholder="Apellido materno"></b-form-input>
          </b-col>
          <b-col lg="12">
            <label for="">DNI</label>
            <b-form-input v-model="doctor.dni" placeholder="DNI" type="number"  ></b-form-input>
          </b-col>
          <b-col lg="12">
            <label for="">Teléfono</label>
            <b-form-input v-model="doctor.telefono" placeholder="DNI" type="number"  ></b-form-input>
          </b-col>
          <b-col lg="12">
            <label for="">Especialidad</label>
            <b-form-select v-model="selected1" :options="options1"></b-form-select>
          </b-col>
        </b-row>
          
      </div>
      <div class=" text-center">
        <b-button   variant="danger"   @click="agregar">Guardar</b-button>
        <b-button   variant="warning"   @click="hideModal('modal-registro')">Cerrar</b-button>
      </div>     
    </b-modal>
  </b-container>
</template>

<script>
  export default {
    
    data() {
      return {
        items: [],
        fields: [
          { key: 'medico', label: 'Médico', sortable: true, sortDirection: 'desc', class: 'text-center' }, 
          { key: 'fecharegistro', label: 'Fecha de registro', sortable: true, sortDirection: 'desc', class: 'text-center' },
          { key: 'dni', label: 'DNI', sortable: true, sortDirection: 'desc', class: 'text-center' },
          //{ key: 'cant', label: 'Cantidad de pacientes', sortable: true, sortDirection: 'desc', class: 'text-center' },
          { key: 'estado', label: 'Estado', sortable: true, sortDirection: 'desc', class: 'text-center' },
          { key: 'actions', label: 'Actions' }
        ],
        totalRows: 1,
        currentPage: 1,
        perPage: 5,
        pageOptions: [5, 10, 15],
        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
        infoModal: {
          id: 'info-modal',
          title: '',
          content: ''
        },
        doctor:{
          name:'',appat:'',apmat:'',dni:0,especialidad:'',telefono:0
        },
        selected: null,
        options: [
          { value: 0, text: 'Medico' } 
        ],
        selected1: null,
        options1: [
          { value: 0, text: 'Medico' } 
        ]
      }
    },
    computed: {
      sortOptions() {
        // Create an options list from our fields
        return this.fields
          .filter(f => f.sortable)
          .map(f => {
            return { text: f.label, value: f.key }
          })
      }
    },
    mounted() {
      // Set the initial number of items
      this.totalRows = this.items.length
      this.listPrimeraLinea();
      this.listEspecialidades();
      this.listSegundaLinea();
    },
    methods: {
      showModal(string) {
        this.$refs[string].show()
      },
      hideModal(string) {
        this.$refs[string].hide()
      },
      resetInfoModal() {
        this.infoModal.title = ''
        this.infoModal.content = ''
      },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      },
      derivar: function () {
        this.selected;
        var that = this;
        axios.post('DerivarMedico')
        .then(function (response) {
            that.items = response.data;
            that.onFiltered(that.items);
            //totalRows = that.items.length;
        });
      },
      agregar: function () {
        this.hideModal('modal-registro')
        this.selected;
        var that = this;
        that.doctor.especialidad=that.selected1;      
        axios.post('AgregarMedico',that.doctor)
        .then(function (response) {
          console.log(response.data);
            if (response.data) {
               Vue.swal.fire({
                icon: 'success',
                title: 'Éxito',
                text:'El Dr. '+(that.doctor.name+' '+that.doctor.appat+' '+that.doctor.apmat)+ ' a sido registrado correctamente'
                }).then(() => {
                  that.listPrimeraLinea();
                });
            } else {
               Vue.swal.fire({
                icon: 'error',
                title: 'ERROR',
                text:'Recargue la página o contactese al ########'
                }).then(() => {
                  that.listPrimeraLinea();
                });
            }
        });
      },
      listPrimeraLinea: function () {
        this.selected;
        var that = this;
        axios.post('listaMedicos',{})
        .then(function (response) { 
            that.items = response.data;
            that.onFiltered(that.items);
             //totalRows = that.items.length;
        });
      },
      listEspecialidades: function () {
        this.selected;
        var that = this;
        axios.post('listaEspecialidades',{})
        .then(function (response) { 
            that.options1 = response.data; 
         
        });
      },
      listSegundaLinea: function () {
        this.selected;
        var that = this;
        axios.post('listSegundaLinea',{})
        .then(function (response) { 
            that.options = response.data; 
        });
      },
      infoDr: function () {
        var that = this;
        axios.post('data')
        .then(function (response) {
            that.items = response.data;
            that.onFiltered(that.items);
            //totalRows = that.items.length;
        });
      }
    }
  }
</script>