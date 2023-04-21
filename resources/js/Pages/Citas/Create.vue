<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';


</script>

<template>
    <AppLayout title="Cita">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Formulario de programación de citas
            </h2>
        </template>

        <v-container>
            <v-form v-model="valid" @submit.prevent="saveCita">
                <v-expansion-panels v-model="panel" multiple>
                    <v-expansion-panel value="datetime">
                    <v-expansion-panel-title v-slot="{ open }">
                        <v-row no-gutters>
                        <v-col cols="4" class="d-flex justify-start">
                            Fecha y hora de cita
                        </v-col>
                        <v-col
                            cols="8"
                            class="text--secondary"
                        >
                            <v-fade-transition leave-absolute>
                            <span v-if="open">When do you want to travel?</span>
                            <v-row
                                v-else
                                no-gutters
                                style="width: 100%"
                            >
                                <v-col cols="6" class="d-flex justify-start">
                                Fecha: {{ cita.fecha_cita || 'Not set' }}
                                </v-col>
                                <v-col cols="6" class="d-flex justify-start">
                                Hora: {{ cita.hora_cita || 'Not set' }}
                                </v-col>
                            </v-row>
                            </v-fade-transition>
                        </v-col>
                        </v-row>
                    </v-expansion-panel-title>
                    <v-expansion-panel-text>
                        <v-row
                        justify="space-around"
                        no-gutters
                        >
                        <v-col cols="3">
                            <v-text-field
                            v-model="cita.fecha_cita"
                            label="Fecha de la cita"
                            type="date"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="3">
                            <v-text-field
                            v-model="cita.hora_cita"
                            label="Hora de la cita"
                            type="date"
                            ></v-text-field>
                        </v-col>

                        </v-row>
                    </v-expansion-panel-text>
                    </v-expansion-panel>

                    <v-expansion-panel value="donante">
                        <v-expansion-panel-title>
                            <template v-slot:default="{ expanded }">
                                <v-row no-gutters>
                                    <v-col cols="4" class="d-flex justify-start">
                                    Datos del donante
                                    </v-col>
                                    <v-col
                                    cols="8"
                                    class="text-grey"
                                    >
                                    <v-fade-transition leave-absolute>
                                        <span
                                        v-if="expanded"
                                        key="0"
                                        >

                                        </span>
                                        <span
                                        v-else
                                        key="1"
                                        >
                                        {{ trip.name }}
                                        </span>
                                    </v-fade-transition>
                                    </v-col>
                                </v-row>
                            </template>
                        </v-expansion-panel-title>
                        <v-expansion-panel-text>
                            <v-row>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.nombre_donante"
                                    label="Nombre del donante"
                                    hide-details
                                    placeholder="Nombre del donante"
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.email_donante"
                                    label="Email del donante"
                                    hide-details
                                    placeholder="Email del donante"
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.documento_donante"
                                    label="Documento del donante"
                                    hide-details
                                    placeholder="Documento del donante"
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.n_documento_donante"
                                    label="Nº Documento del donante"
                                    hide-details
                                    placeholder="Nº Documento del donante"
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.telefono_donante"
                                    label="Telefono del donante"
                                    hide-details
                                    placeholder="Telefono del donante"
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.fecha_nac_donante"
                                    label="Fecha_Nac del donante"
                                    hide-details
                                    placeholder="Fecha_Nac del donante"
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.direccion_donante"
                                    label="Dirección del donante"
                                    hide-details
                                    placeholder="Dirección del donante"
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.estado_civil_donante"
                                    label="Estado Civil del donante"
                                    hide-details
                                    placeholder="Estado Civil del donante"
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.grado_instruccion_donante"
                                    label="Grado_Instruc del donante"
                                    hide-details
                                    placeholder="Grado_Instruc del donante"
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                            </v-row>
                        </v-expansion-panel-text>
                    </v-expansion-panel>

                    <v-expansion-panel value="paciente">
                        <v-expansion-panel-title>
                            <template v-slot:default="{ expanded }">
                                <v-row no-gutters>
                                    <v-col cols="4" class="d-flex justify-start">
                                    Datos del paciente
                                    </v-col>
                                    <v-col
                                    cols="8"
                                    class="text-grey"
                                    >
                                    <v-fade-transition leave-absolute>
                                        <span
                                        v-if="expanded"
                                        key="0"
                                        >

                                        </span>
                                        <span
                                        v-else
                                        key="1"
                                        >
                                        {{ trip.name }}
                                        </span>
                                    </v-fade-transition>
                                    </v-col>
                                </v-row>
                            </template>
                        </v-expansion-panel-title>
                        <v-expansion-panel-text>
                            <v-row>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.n_documento_paciente"
                                    label="Número_Documento del donante"
                                    hide-details
                                    placeholder="Número_Documento del donante"
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.nombre_paciente"
                                    label="Nombre del donante"
                                    hide-details
                                    placeholder="Nombre del donante"
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-select
                                    v-model="cita.hospital_paciente"
                                    label="Hospital del donante"
                                    :rules="[rules.required]"
                                    hide-details
                                    :items="locations"
                                    chips
                                    flat
                                    variant="solo"
                                    ></v-select>
                                </v-col>
                            </v-row>
                        </v-expansion-panel-text>
                    </v-expansion-panel>
                </v-expansion-panels>
                <v-btn type="submit" color="primary" :disabled="!valid">Guardar</v-btn>
            </v-form>

        </v-container>

    </AppLayout>
</template>



<script>
    export default {
    data() {
        return {
            selectedDate: null,
            cita: {
                fecha_cita: null,
                hora_cita: null,
                nombre_donante: null,
                email_donante: null,
                documento_donante: null,
                n_documento_donante: null,
                telefono_donante: null,
                fecha_nac_donante: null,
                direccion_donante: null,
                estado_civil_donante: null,
                grado_instruccion_donante: null,
                n_documento_paciente: null,
                nombre_paciente: null,
                hospital_paciente: null,
            },
            valid: false,
            rules: {
                required: (value) => !!value || "Este campo es obligatorio",
                email: (value) =>
                /^[\w-]+@([\w-]+\.)+[\w-]{2,4}$/.test(value) ||
                "Ingrese un correo electrónico válido",
            },
            date: null,
            trip: {
                location: null,
            },
            locations: ['Australia', 'Barbados', 'Chile', 'Denmark', 'Ecuador', 'France'],
            panel: ['datetime']
        };
    },
    methods: {
        saveCita() {
        // Envía la información de la cita al servidor para crearla
        },
    },
    watch: {
        'cita.hora_cita': function(newValue, oldValue) {
            if(newValue !== oldValue) {
            this.panel.push('donante');
            }
        }
    },
    components: {
        
    },
    mounted() {
    
    },
    };

</script>