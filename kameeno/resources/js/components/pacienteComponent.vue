<template>
  <div>
    
       <b-row align="center">           
          <b-col lg="12" sm="12"   >
            <h4>Nombre del paciente</h4>
          </b-col>
          <b-col lg="2" sm="12" align="center">
            <b-avatar src="https://pluspng.com/img-png/user-png-icon-male-user-icon-512.png"  ></b-avatar>
            <b-button   variant="primary" @click="showModal('modal-ficha')">Ver ficha completa</b-button>
          </b-col>
          <b-col lg="10" sm="12"  align="left" class="m-0">  
              <b-list-group>
                <b-list-group-item>
                  DNI:  
                </b-list-group-item>
                <b-list-group-item>                        
                  Fecha de registro: 
                </b-list-group-item>
                <b-list-group-item>
                  Telefono:  
                </b-list-group-item>
                <b-list-group-item>
                  Enfermedad:  
                </b-list-group-item>                    
              </b-list-group> 
          </b-col> 
          <b-col lg="12" sm="12" class="  mt-2" > 
            <b-button class="mt-3" variant="danger" @click="showModal('modal-consulta')">Nuevo registro</b-button>
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
              <template v-slot:row-details="row">
                <b-card>
                  <ul>
                    <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
                  </ul>
                </b-card>
              </template>
            </b-table>
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
    <b-modal ref="modal-ficha"   hide-footer title="Ficha de paciente">
      <div class="d-block">
        <b-list-group>
          <b-list-group-item v-for="(value, key) in Datapaciente" :key="key">{{fields1[key]}}: {{ value[key] }}</b-list-group-item>
        </b-list-group>
      </div>
      <b-button class="mt-3" variant="warning" block @click="hideModal('modal-ficha')">Cerrar</b-button>
    </b-modal>
    <b-modal ref="modal-consulta"   hide-footer title="Registrar nueva consulta">
      <div class="d-block"> 
        <div class=" row">
          <div class=" col-12">
            <label for=""  >Consulta</label>
            <textarea   cols="30" rows="10" class=" form-control" placeholder="Ingrese texto aquí..."> 
            </textarea>
          </div>
          <div class=" col-12">
            <br>
            <label for=""  >Respuesta</label>
            <textarea   cols="30" rows="10" class=" form-control" placeholder="Ingrese texto aquí...">
            </textarea> 
          </div>               
        </div> 
        <div class=" text-center">
          <b-button   variant="primary"  @click="funcionGuarda()">Guardar</b-button> 
          <b-button   variant="warning"   @click="hideModal('modal-consulta')">Cerrar</b-button>
        </div> 
      </div> 
    </b-modal>
  </div>
</template>

<script>
  
  export default {
   
    data() {
      return {
        mainProps: {  width: 75, height: 75, class: 'm1' }, 
        foods: [{ text: 'Select One', value: null }, 'Carrots', 'Beans', 'Tomatoes', 'Corn'],
        show: true,
        fields1: ['Nombre','Apellido paterno','Apellido materno','DNI','Fecha de registro','Fecha de nacimiento','Sexo','Estado civil','Dirección','Telefono','Correo','Estado','Facultad','Ocupación','Seguro','Enfermedad','Tratamiento'] ,
        title:'',
        subtitle:'',
        tarea:{
          id_tarea:0,
          plazo:'',
          descripcion:'',
          tipo:''
        },
        Datapaciente:[
          'asd',
          'asd',
          'asd',
          'asd',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          ''
        ],  
        iiplus:0,
        fields: [  
          { key: 'fecha', label: 'Fecha' ,sortable: true, sortDirection: 'desc'}, 
          { key: 'consulta', label: 'Consulta' ,sortable: true, sortDirection: 'desc'},
          { key: 'respuesta', label: 'Respuesta' ,sortable: true, sortDirection: 'desc'}
        ],
        items: [
          
        ]
        ,totalRows: 1,
        currentPage: 1,
        perPage: 5,
        pageOptions: [5, 10, 15],
        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
      }
    } 
    ,
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
    methods: {
       
      setFile: function (url) {       
        this.$refs.viewerfileComponent.setFile(url);
      },
      funcionDescripcion: function (data) {
        this.items1=data;
        
      },
      iplus: function() {
        this.iiplus=this.iiplus+1;
        console.log(this.iiplus);
        return this.iiplus;
      },
      	showModal(string) {
      this.$refs[string].show()
      },
      hideModal(string) {
        this.$refs[string].hide()
      },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      },
      funcionGuarda:function () {
         this.hideModal('modal-consulta');
      }
    },
    mounted() { 

      for (let index = 0; index < 9; index++) { 
        this.items.push({ fecha: 'xx/xx/xx', consulta: 'CSS class (or classes) to apply to the tr element in the tbody. Can be a function that returns a class (see docs for details)', respuesta: 'CSS class (or classes) to apply to the tr element in the tbody. Can be a function that returns a class (see docs for details)' });
      }
       this.totalRows = this.items.length
    }, 
  }
</script>
<style>
.scroll-horizontal {
    
    overflow-x: auto;
    white-space: nowrap;
}
</style>