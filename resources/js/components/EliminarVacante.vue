<template>
    <a
        href="#"
        class="text-red-600 hover:text-red-900  mr-5"
        @click="EliminarVacante"
        >Eliminar</a
    >
</template>

<script>
export default {
    props: ["vacanteId"],
    methods: {
        EliminarVacante() {
            //console.log("Eliminando...", this.vacanteId);
            this.$swal
                .fire({
                    title: "¿Deseas eliminar esta vacante?",
                    text: "Una vez eliminada no se puede recuperar!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si",
                    cancelButtonText: "No"
                })
                .then(result => {
                    if (result.isConfirmed) {
                        const params = {
                            id: this.vacanteId,
                            _method: "delete"
                        };
                        //Envia peticicion axios
                        axios
                            .post(`/vacantes/${this.vacanteId}`, params)
                            .then(respuesta => {
                                this.$swal.fire(
                                    "Vacante Eliminada",
                                    respuesta.data.mensaje,
                                    "success"
                                );
                                //Eliminar del DOM
                                this.$el.parentElement.parentElement.parentElement.removeChild(this.$el.parentElement.parentElement);
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    }
                });
        }
    }
};
</script>
