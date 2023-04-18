<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

</script>

<template>
    <AppLayout title="Usuarios">
        <template #header>
            {{ paciente }}
            <form @submit.prevent="submit">
                <v-container>
                    <v-row>
                        <v-col 
                        cols="12"
                        md="4"
                        >
                            <v-text-field
                            v-model="form.nombre"
                            :counter="10"
                            :error-messages="errors.nombre"   
                            label="nombre"
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
                            :error-messages="errors.apellido" 
                            ></v-text-field>
                        </v-col>
                        <v-col
                        cols="12"
                        md="4"
                        >
                            <v-text-field
                            v-model="form.dni"
                            label="DNI"
                            :error-messages="errors.dni" 
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
                            :error-messages="errors.fecha_nacimiento" 
                            :type="'date'"
                            ></v-text-field>
                        </v-col>
                        <v-col
                        cols="12"
                        md="4"
                        >
                            <v-text-field
                            v-model="form.direccion"
                            label="Dirección"
                            :error-messages="errors.Dirección" 
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col
                        cols="12"
                        md="12"
                        >
                            <v-btn
                            class="me-4"
                            type="submit"
                            >
                            Guardar
                            </v-btn>
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
import { Inertia } from "@inertiajs/inertia";

export default {
    props: ['paciente', 'errors'],
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
    methods: {
        submit(){
            Inertia.put(route('paciente.update', {'paciente':this.paciente}),this.form)
        }
    }
};

</script>