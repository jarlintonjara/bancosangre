<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Button from '@/Components/Button.vue';
import { Inertia } from '@inertiajs/inertia';
import Modal from '@/Components/DialogModal.vue';
import { mdiPencil } from '@mdi/js';
import '@mdi/font/css/materialdesignicons.css';

</script>

<template>
    <AppLayout title="Usuarios">
        <template #header>
            
            <Link :href="route('paciente.create')" class="v-btn">Crear</Link>
            <!-- <Button>BOTON</Button> -->
            <div>
  <label for="search">Buscar:</label>
  <input type="text" v-model="search" id="search">
</div>
                <V-table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Nacimiento</th>
                    <th>Dirección</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr v-for="paciente in pacientes" :key="paciente.id"> -->
                    <tr v-for="(paciente, index) in pacientesPaginados" :key="paciente.id">
                        <!-- {{ paciente }} -->
                    <td>{{ paciente.id }}</td>
                    <td>{{ paciente.nombre }}</td>
                    <td>{{ paciente.apellido }}</td>
                    <td>{{ paciente.dni }}</td>
                    <td>{{ paciente.fecha_nacimiento  }}</td>
                    <td>{{ paciente.direccion  }}</td>
                    <td>{{ paciente.created_at }}</td>
                    <td>
                        <!-- <Link :href="route('paciente.show', {paciente: paciente})" class="v-btn">Ver</Link>
                        <Link :href="route('paciente.edit', {paciente: paciente})" class="v-btn">Editar</Link> -->
                        <!-- <Link method="DELETE" :href="route('paciente.destroy', {paciente: paciente})">Eliminar</Link> -->


                        <a :href="route('paciente.show', {paciente: paciente})">
                            <span class="mdi mdi-eye" style="color: green;"></span>
                        </a>
                        <a :href="route('paciente.edit', {paciente: paciente})">
                            <span class="mdi mdi-pencil" style="color: orange;"></span>
                        </a>
                        <a @click="modalOpen=true; selectedUser=paciente">
                            <span class="mdi mdi-delete" style="color: red;"></span>
                        </a>
                        <!-- <v-btn 
                            @click="modalOpen=true; selectedUser=paciente"   
                            color="error"
                        >
                        <span class="mdi mdi-delete"></span>
                        </v-btn> -->
                    </td>
                    </tr>
                </tbody>
                </V-table>
                <v-pagination
                    v-model="page"
                    :length="Math.ceil(pacientes.length / pacientesPorPagina)"
                    :prev-icon="$vuetify.icons.prevPage"
                    :next-icon="$vuetify.icons.nextPage"
                />

                <Modal :show="modalOpen">
                    <template v-slot:title>
                        <h1>DELETE USER</h1>
                    </template>

                    <template v-slot:content>
                        <p v-if="selectedUser">ARE YOU SURE DELETE : {{ selectedUser.nombre }}</p>
                    </template>

                    <template v-slot:footer>
                        <Button @click="deletePaciente()">Confirm</Button>
                        <Button @click="modalOpen=false">Cancel</Button>
                    </template>
                </Modal>
                </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- <Welcome /> -->
                </div>
            </div>
        </div>
    </AppLayout>
</template>



<script>
export default {
    mounted() {
    // Ejemplo de impresión en consola
    },
    props: ['pacientes'],
    data() {
        return {
            pacientesPorPagina: 2, // Número de pacientes por página
            page: 1, // Página actual
            modalOpen: false,
            selectedUser: Object,
            search: '',
        }
    },
    computed: {
    pacientesPaginados() {
      // Devuelve solo los pacientes de la página actual
      const startIndex = (this.page - 1) * this.pacientesPorPagina;
      const endIndex = startIndex + this.pacientesPorPagina;
      const filteredPacientes = this.pacientes.filter(paciente => {
        const nombreCompleto = `${paciente.nombre} ${paciente.apellido}`.toLowerCase();
        return nombreCompleto.includes(this.search.toLowerCase());
    });
    return filteredPacientes.slice(startIndex, endIndex);
      
    }
    },
    methods: {
        deletePaciente: function(){
            Inertia.delete(route("paciente.destroy",{ paciente: this.selectedUser }));
            this.modalOpen = false;
        },
    },
};

</script>

<style scoped>
/* Estilos para dar forma de botón al enlace */
/* .v-btn {
  display: inline-block;
  padding: 0.5rem 1rem;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  user-select: none;
  background-color: #dc3545;
  border: none;
  color: #fff;
  font-size: 1rem;
  border-radius: 0.25rem;
}
.v-btn:hover {
  background-color: #c82333;
}
.v-btn:focus {
  outline: none;
  box-shadow: 0 0 0 0.2rem rgba(225, 83, 97, 0.5);
} */
/* .mdi{
    color: red;
} */
a{
    font-size: 20px;
    padding: 3px;
}
</style>