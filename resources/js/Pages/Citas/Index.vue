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
    <AppLayout title="Citas">
        <template #header>
            
            <Link :href="route('cita.create')">
                <div class="flex items-center">
                    <v-icon  icon="mdi-heart-plus-outline" color="red" size="80px"/>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a href="#">CREAR</a>
                    </div>
                </div>
            </Link>
            <!-- <Button>BOTON</Button> -->
            <div>
                <label for="search">Buscar:</label>
                <input type="text" v-model="search" id="search">
            </div>
                <V-table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nombre Donante</th>
                    <th>Email Donante</th>
                    <th>Documento Donante</th>
                    <th>Nùmero de documento</th>
                    <th>Fecha Nacimiento</th>
                    <th>Documento Paciente</th>
                    <th>Nombre Paciente</th>
                    <th>Hospital Paciente</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr v-for="paciente in pacientes" :key="paciente.id"> -->
                    <tr v-for="(cita, index) in citasPaginados" :key="cita.id">
                        <!-- {{ paciente }} -->
                    <td>{{ cita.id }}</td>
                    <td>{{ cita.nombre_donante }}</td>
                    <td>{{ cita.email_donante }}</td>
                    <td>{{ cita.documento_donante }}</td>
                    <td>{{ cita.n_documento_donante  }}</td>
                    <td>{{ cita.fecha_nac_donante  }}</td>
                    <td>{{ cita.n_documento_paciente  }}</td>
                    <td>{{ cita.nombre_paciente  }}</td>
                    <td>{{ cita.hospital_paciente  }}</td>
                    <td>{{ cita.created_at }}</td>
                    <td>
                        <!-- <Link :href="route('paciente.show', {paciente: paciente})" class="v-btn">Ver</Link>
                        <Link :href="route('paciente.edit', {paciente: paciente})" class="v-btn">Editar</Link> -->
                        <!-- <Link method="DELETE" :href="route('paciente.destroy', {paciente: paciente})">Eliminar</Link> -->


                        <a :href="route('cita.show', {cita: cita})">
                            <span class="mdi mdi-eye" style="color: green;"></span>
                        </a>
                        <a :href="route('cita.edit', {cita: cita})">
                            <span class="mdi mdi-pencil" style="color: orange;"></span>
                        </a>
                        <a @click="modalOpen=true; selectedUser=cita">
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
                    :length="Math.ceil(citas.length / citasPorPagina)"
                    :prev-icon="$vuetify.icons.prevPage"
                    :next-icon="$vuetify.icons.nextPage"
                />

                <Modal :show="modalOpen">
                    <template v-slot:title>
                        <h1>DELETE USER</h1>
                    </template>

                    <template v-slot:content>
                        <p v-if="selectedUser">ARE YOU SURE DELETE : {{ selectedUser.nombre_donante }}</p>
                    </template>

                    <template v-slot:footer>
                        <Button @click="deleteCitas()">Confirm</Button>
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
    props: ['citas'],
    data() {
        return {
            citasPorPagina: 2, // Número de pacientes por página
            page: 1, // Página actual
            modalOpen: false,
            selectedUser: Object,
            search: '',
        }
    },
    computed: {
    citasPaginados() {
      // Devuelve solo los pacientes de la página actual
      const startIndex = (this.page - 1) * this.citasPorPagina;
      const endIndex = startIndex + this.citasPorPagina;
      const filteredCitas = this.citas.filter(cita => {
        const nombreCompleto = `${cita.nombre_donante}`.toLowerCase();
        return nombreCompleto.includes(this.search.toLowerCase());
    });
    return filteredCitas.slice(startIndex, endIndex);
      
    }
    },
    methods: {
        deleteCita: function(){
            Inertia.delete(route("cita.destroy",{ cita: this.selectedUser }));
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