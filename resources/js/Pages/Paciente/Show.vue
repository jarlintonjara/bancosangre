<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

</script>

<template>
    <AppLayout title="Usuarios">
        <template #header>
                        {{ paciente }}
            <form>
                <v-container>
                    <v-row>
                        <v-col 
                        cols="12"
                        md="4"
                        >
                            <v-text-field
                            v-model="form.nombre"
                            :counter="10" 
                            label="nombre"
                            readonly 
                            ></v-text-field>
                        </v-col>
                        <v-col
                        cols="12"
                        md="4"
                        >
                            <v-text-field
                            v-model="form.apellido"
                            :counter="7"
                            label="apellido"
                            readonly 
                            ></v-text-field>
                        </v-col>
                        <v-col
                        cols="12"
                        md="4"
                        >
                            <v-text-field
                            v-model="form.dni"
                            label="DNI"
                            readonly 
                            ></v-text-field>
                        </v-col>
                    </v-row> 
                    <v-row>
                        <v-col
                        cols="12"
                        md="4"
                        >
                            <v-text-field
                            v-model="form.fecha_nacimiento"
                            label="Fecha_Nacimiento"
                            :type="'date'"
                            readonly 
                            ></v-text-field>
                        </v-col>
                        <v-col
                        cols="12"
                        md="4"
                        >
                            <v-text-field
                            v-model="form.direccion"
                            label="Dirección"
                            readonly 
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col
                        cols="12"
                        md="12"
                        >
                        <Link :href="route('paciente.index')" class="v-btn">Atras</Link>
                        </v-col>
                    </v-row>
                </v-container>
            </form>
        
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
// import { Inertia } from "@inertiajs/inertia";

export default {
    props: ['paciente'],
    data(){
        return{
            form: {
                nombre: this.paciente.nombre,
                apellido: this.paciente.apellido,
                dni: this.paciente.dni,
                fecha_nacimiento: this.paciente.fecha_nacimiento,
                direccion: this.paciente.direccion,
            } 
        }
    },
};

</script>