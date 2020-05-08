<template>
    <div class="container text-center">
        <div class="row">
            <div class="table-responsive">
                <b-container fluid>
                  <b-table
                    show-empty
                    small
                    stacked="md"
                    :items="datos"
                    :fields="columnas"
                  >
					  <template v-slot:cell(actions)="row">
						  <a :href="'/panel/cuestionario/mantenedor/' + row.item.id_cuestionario">Ver</a>
					  </template>
                  </b-table>
                </b-container>
            </div>
        </div>
		<div class="text-center">
			<a href="/panel/cuestionario/mantenedor/">
				<button class="btn btn-primary">Registrar Nuevo Cuestionario</button>
			</a>
		</div>
    </div>
</template>

<script>
export default {
	data() {
		return {
			datos: [],
			columnas: [
				{ key: 'id_cuestionario', label: 'Id' },
				{ key: 'nombre', label: 'Nombre' },
				//{ key: 'estado', label: 'Estado' },
				{ key: 'actions', label: 'Acciones' }
			]
		}
	},
	methods: {
		cargarCuestionario: function(){
			var that = this;
			axios.post('/panel/cuestionario/list')
			.then(function (response) {
				that.datos = response.data;
				//console.log(response.data);
			});
		}
	},
	mounted() {
	},
	created: function(){
		this.cargarCuestionario();
	}
}
</script>
