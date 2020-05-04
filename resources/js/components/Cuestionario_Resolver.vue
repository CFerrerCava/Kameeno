<template>
    <div class="container text-center">
        <div class="row">
            <div class="table-responsive">
                <b-container fluid>
                  <b-table
                    show-empty
                    small
                    stacked="md"
                    :items="cuestionario.preguntas"
                    :fields="columnas"
                  >

				  <template v-slot:cell(name)="row">
					{{ row.value.first }} {{ row.value.last }}
				  </template>

				  <template v-slot:cell(actions)="row">
					  <b-form-select v-model="row.item.seleccionado">
						  <b-form-select-option :value="null">Seleccione</b-form-select-option>
						  <b-form-select-option :value="i.id_det_pre" v-for="(i, key) in row.item.detalle" :key="key">{{i.opcion}}</b-form-select-option>
					  </b-form-select>
				  </template>

				  <template v-slot:row-details="row">
					<b-card>
					  <ul>
						<li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
					  </ul>
					</b-card>
				  </template>

                  </b-table>
                </b-container>
            </div>
            <div class="col-12">
                <button v-on:click="funcionBoton()" class="btn btn-success">HECHO</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
	data() {
		return {
			cuestionario: { preguntas:[] },
			columnas: [
				{ key: 'id_preguntas', label: 'Id' },
				{ key: 'pregunta', label: 'Nombre' },
				{ key: 'estado', label: 'Estado' },
				{ key: 'actions', label: 'Acciones' }
			]
		}
	},
	methods: {
		funcionBoton: function(){
			console.log(this.cuestionario);
		},
		cargarCuestionario: function(id){
			var that = this;
			axios.post('/panel/cuestionario/getCuestionario', {id:id})
			.then(function (response) {
				that.cuestionario = response.data;
				that.cuestionario.preguntas.forEach((item, i) => {
					item.seleccionado = null;
				});

				//console.log(response.data);
			});
		}
	},
	mounted() {
		//this.cargarCuestionario(0);
		this.cargarCuestionario(1);
	},
	created: function(){
		//this.cargarCuestionario(this.id);
	}
}
</script>
s
