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
                  </b-table>
                </b-container>
            </div>
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
			  { key: 'estado', label: 'Estado' }
	      ]
    }
  },
  methods: {
    cargarContenidos: function(){
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
      this.cargarContenidos();
  }
}
</script>
