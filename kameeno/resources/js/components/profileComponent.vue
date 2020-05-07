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
            <b-form-input v-model="doctor.dni" placeholder="DNI"></b-form-input>
          </b-col>
        </b-row>
          
      </div>
      <div class=" text-center">
        <b-button   variant="danger"   @click="hideModal('modal-registro')">Guardar</b-button>
        <b-button   variant="warning"   @click="hideModal('modal-registro')">Cerrar</b-button>
      </div>     
    </b-modal>
  </b-container>
</template>

<script>
  export default {
    data() {
      return {
        items: [
          {doctor:'Dickerson Macdonald',date:'2020/05/05',cant:'5',state:'Activo'},
          {doctor:'Larsen Shaw',date:'2020/05/05',cant:'5',state:'Inactivo'},
          {doctor:'Mini Navarro',date:'2020/05/05',cant:'5',state:'Activo'},
          {doctor:'Geneva Wilson',date:'2020/05/05',cant:'5',state:'Inactivo'},
          {doctor:'Jami Carney',date:'2020/05/05',cant:'5',state:'Activo'}, 
        ],
        fields: [
          { key: 'doctor', label: 'Médico', sortable: true, sortDirection: 'desc', class: 'text-center' },
          { key: 'date', label: 'Fecha de registro', sortable: true, sortDirection: 'desc', class: 'text-center' },
          { key: 'cant', label: 'Cantidad de pacientes', sortable: true, sortDirection: 'desc', class: 'text-center' },
          { key: 'state', label: 'Estado', sortable: true, sortDirection: 'desc', class: 'text-center' },
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
          name:'',appat:'',apmat:'',dni:''
        },
        selected: null,
        options: [
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
    },
    methods: {
      showModal(string) {
        this.$refs[string].show()
      },
      hideModal() {
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
        axios.post('panel/unt-a-tu-paciente/DerivarMedico')
        .then(function (response) {
            that.items = response.data;
            that.onFiltered(that.items);
            //totalRows = that.items.length;
        });
      },
      agregar: function () {
        this.selected;
        var that = this;
        axios.post('panel/unt-a-tu-paciente/AgregarMedico',that.doctor)
        .then(function (response) {
            if (response.data) {
               Vue.swal.fire({
                icon: 'success',
                title: 'Éxito',
                text:'El Dr. '+(that.doctor.name+' '+that.doctor.appat+' '+that.doctor.apmat)+ ' a sido registrado correctamente'
                }).then(() => {
                  this.list();
                });
            } else {
              
            }
        });
      },
      list: function () {
        this.selected;
        var that = this;
        axios.post('panel/unt-a-tu-paciente/listaMedicos')
        .then(function (response) {
            that.items = response.data;
            that.onFiltered(that.items);
            //totalRows = that.items.length;
        });
      },
      infoDr: function () {
        
      }
    }
  }
</script>