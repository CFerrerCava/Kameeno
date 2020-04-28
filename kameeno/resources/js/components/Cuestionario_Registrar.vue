<template>
    <div class="container text-center">
        <div class="row container">
            <div class="col-12 col-md-12">
				<div class="card pt-1 pb-3">
                    <div class="card-header">
                        <i class="fa fa-plus"></i> Registrar Cuestionario
                    </div>
					<div class="form-group row text-center align-items-center">
						<div class="col-12 col-md-2">
							<label>Nombre</label>
						</div>
						<div class="col-12 col-md-9 mr-1">
							<input v-model="c.nombre" type="text" placeholder="Nombre" class="form-control">
						</div>
					</div>
					<div class="form-group row text-center">
						<div class="col-12 col-md-2" >
							<label for="contenido">Descripción</label>
						</div>
						<div class="col-12 col-md-9 mr-1">
							<textarea v-model="c.descripcion" placeholder="Escriba aquí" class="form-control"></textarea>
						</div>
					</div>
				</div>

				<div class="card pt-1 pb-3">
					<div class="card-header">
						<i class="fa fa-plus"></i> Registrar Preguntas
					</div>
					<div v-for="(itemPregunta, index) in c.preguntas" class="form-group row text-center align-items-center">
						<div class="col-12 col-md-2">
							<label>Pregunta {{(index+1)}}:</label>
						</div>
						<div class="col-9 col-md-7 pr-0">
							<input v-model="itemPregunta.pregunta" type="text" placeholder="pregunta" class="form-control">
						</div>
						<div class="col-3 col-md-3 pl-0">
							<button v-on:click="quitarPregunta(index)" class="btn btn-outline-danger btn-sm">X</button>
						</div>
						<div class="col-12 col-md-2">
						</div>
						<div class="col-12 col-md-9 mr-1 border">
							<table class="table">
								<thead>
									<tr>
										<td>Opcion</td>
										<td>Puntuacion</td>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(itemClave, index2) in itemPregunta.detalle">
										<td>
											<input v-model="itemClave.opcion" type="text" placeholder="Opcion" class="form-control">
										</td>
										<td>
											<input v-model="itemClave.valor" type="number" placeholder="Valor" class="form-control">
										</td>
									</tr>
								</tbody>
							</table>
							<a href="#" v-on:click="quitarClave(itemPregunta)" class="text-danger">
								<i class="fa fa-minus"></i>
							</a>
							<a href="#" v-on:click="agregarClave(itemPregunta)" class="text-primary">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
		            <div class="col-12">
						<button v-on:click="agregarPregunta()" class="btn btn-primary">Agregar Pregunta</button>
		            </div>
				</div>
            </div>
            <div class="col-12">
                <button v-on:click="agregarEncuesta()" class="btn btn-success">HECHO</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            c: {
				id_cuestionario: 0,
				nombre: '',
				descripcion: '',
				preguntas: [] //modeloPreguntas
            },
			modeloPreguntas: {
				pregunta: '',
				detalle: [] //modeloDetallePreguntas
			},
			modeloDetallePreguntas: { opcion:'', valor:'' }
        };
    },
    methods: {
        agregarEncuesta: function(){
			var ruta = (this.c.id_cuestionario == 0)?'addCuestionario':'updCuestionario';
			axios.post('/panel/cuestionario/'+ruta, {datos: this.c})
            .then(function(response) {
            })
			.catch(function(error){

			})
			.finally(function(){

			});
        },
		/**/
		quitarPregunta: function(index){
			this.c.preguntas.splice(index, 1);
		},
		agregarPregunta: function(){
			let copia = Object.assign({}, this.modeloPreguntas);
			copia.detalle = [];
			this.c.preguntas.push(copia);
			this.agregarClave(copia);
		},
		/**/
		quitarClave: function(itemPregunta){
			var posmax = itemPregunta.length;
			itemPregunta.detalle.splice(posmax, 1);
		},
		agregarClave: function(itemPregunta){
			let copia = Object.assign({}, this.modeloDetallePreguntas);
			itemPregunta.detalle.push(copia);
		},
		/**/
        cargarPublicacion: function(id){
            var that = this;
            axios.post('/panel/cuestionario/getCuestionario', {id:id})
            .then(function (response) {
				console.log(response.data);
                that.c = response.data;
            });
        },
    },
	mounted() {
		//this.cargarPublicacion(0);
		this.cargarPublicacion(78);
	},
	created: function(){
		//this.cargarPublicacion(this.id);
	}
};
</script>
