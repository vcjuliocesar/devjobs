<template>
    <a href="#" class="text-red-600 hover:text-red-900  mr-5"
        @click="EliminarVacante"
    >Eliminar</a>
</template>

<script>
export default{
    props:['vacanteId'],
    methods:{
        EliminarVacante() {
            console.log('Eliminando...',this.vacanteId)
        }
    }
}
</script>
