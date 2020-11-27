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
            this.$swal.fire({
                title: "¿Deseas eliminar esta vacante?",
                text: "Una vez eliminada no se puede recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si",
                cancelButtonText:'No'
            }).then(result => {
                if (result.isConfirmed) {
                    this.$swal.fire(
                        "Vacante Eliminada",
                        "Vacante eliminada correctamente",
                        "success"
                    );
                }
            });
        }
    }
};
</script>
