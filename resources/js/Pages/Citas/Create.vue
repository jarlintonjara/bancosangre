<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import { ref, onMounted } from 'vue';
import TimeList from '@/components/TimeList.vue';
import es from 'date-fns/locale/es'

</script>

<template>
    <AppLayout title="Cita">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Formulario de programación de citas
            </h2>
        </template>

        <v-container>
            <v-form @submit.prevent="saveCita">
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
                                Fecha de cita: {{ cita.fecha_cita || 'Fecha sin selección' }}
                                </v-col>
                                <v-col cols="6" class="d-flex justify-start">
                                Hora de cita: {{ cita.hora_cita || 'Hora sin selección' }}
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
                        <v-col cols="12" md="4">
                            <VueDatePicker v-model="cita.fecha_cita" 
                            :disabledDates="disabledDates" 
                            inline
                            auto-apply
                            :enable-time-picker="false"
                            :language="es"
                           
                            >
                            </VueDatePicker>
                            {{ errors.fecha_cita }}
                        </v-col>

                        <v-col cols="12" md="8">
                            <TimeList 
                            v-model="selectedTime"
                            initialTime="07:30" 
                            finalTime="11:30"
                            @input="handleTimeSelection"
                            />
                            {{ errors.hora_cita }}
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
                                    <v-select
                                    v-model="cita.documento_donante"
                                    :hint="`${cita.documento_donante}`"
                                    :items="documents"
                                    item-title="cita.documento_donante"
                                    chips
                                    item-value="cita.documento_donante"
                                    label="Documento"
                                    persistent-hint
                                    return-object
                                    single-line
                                ></v-select>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.n_documento_donante"
                                    label="Nº Documento del donante"
                                    hide-details
                                    placeholder="Nº Documento del donante"
                                    :rules="[rules.required]"
                                    :error-messages="errors.n_documento_donante" 
                                    @blur="buscarDni()"
                                    >
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.nombre_donante"
                                    label="Nombre del donante"
                                    hide-details
                                    placeholder="Nombre del donante"
                                    :error-messages="errors.nombre_donante" 
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                               

                            </v-row>
                            <v-row>

                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.email_donante"
                                    label="Email del donante"
                                    hide-details
                                    placeholder="Email del donante"
                                    :error-messages="errors.email_donante" 
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.telefono_donante"
                                    label="Telefono del donante"
                                    hide-details
                                    placeholder="Celular del donante"
                                    :error-messages="errors.telefono_donante" 
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.fecha_nac_donante"
                                    label="Fecha_Nac del donante"
                                    hide-details
                                    placeholder="Fecha_Nac del donante"
                                    :error-messages="errors.fecha_nac_donante" 
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
                                    :error-messages="errors.direccion_donante" 
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.estado_civil_donante"
                                    label="Estado Civil del donante"
                                    hide-details
                                    placeholder="Estado Civil del donante"
                                    :error-messages="errors.estado_civil_donante" 
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.grado_instruccion_donante"
                                    label="Grado_Instruc del donante"
                                    hide-details
                                    placeholder="Grado_Instruc del donante"
                                    :error-messages="errors.grado_instruccion_donante" 
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
                                    :rules="[rules.required]"
                                    :error-messages="errors.n_documento_paciente" 
                                    @blur="buscarDni2()"
                                    >
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-text-field
                                    v-model="cita.nombre_paciente"
                                    label="Nombre del donante"
                                    hide-details
                                    placeholder="Nombre del donante"
                                    :error-messages="errors.nombre_paciente" 
                                    :rules="[rules.required]">
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <v-select
                                    v-model="cita.hospital_paciente"
                                    :hint="`${cita.hospital_paciente}`"
                                    :items="locations"
                                    item-title="cita.hospital_paciente"
                                    chips
                                    item-value="cita.hospital_paciente"
                                    label="Hospital"
                                    persistent-hint
                                    return-object
                                    single-line
                                ></v-select>
                                </v-col>
                            </v-row>
                        </v-expansion-panel-text>
                    </v-expansion-panel>
                </v-expansion-panels>
                <v-btn type="submit" color="primary">Guardar</v-btn>
            </v-form>
  
            <template>
                <div class="text-center">

                <v-overlay v-model="overlay"  class="align-center justify-center">
                    <v-progress-circular
                        color="teal"
                        indeterminate
                        :rotate="-90"
                        :size="100"
                        :width="15"
                ></v-progress-circular>
                </v-overlay>
                </div>
            </template>
 
                                
        </v-container>

    </AppLayout>
</template>



<script>
import { Inertia } from "@inertiajs/inertia";
import { ref  } from 'vue';



    export default {
        props: ['errors'],
        data() {
            return {
                overlay: false,
                date: null,
                selectedTime: null,
                cita: {
                    fecha_cita: null,
                    hora_cita: null,
                    nombre_donante: null,
                    email_donante: null,
                    documento_donante: 'DNI',
                    n_documento_donante: null,
                    telefono_donante: null,
                    fecha_nac_donante: null,
                    direccion_donante: null,
                    estado_civil_donante: null,
                    grado_instruccion_donante: null,
                    n_documento_paciente: null,
                    nombre_paciente: null,
                    hospital_paciente: 'HOSPITAL CAYETANO HEREDIA',
                },
                rules: {
                    required: (value) => !!value || "Este campo es obligatorio",
                    email: (value) =>
                    /^[\w-]+@([\w-]+\.)+[\w-]{2,4}$/.test(value) ||
                    "Ingrese un correo electrónico válido",
                },
                // documents: ['DNI', 'Pasaporte', 'Carnet'],
                panel: ['datetime','paciente','donante'],
                // cita.fecha_cita: { state: 'DNI', abbr: 'Documento nacional de identidad' },
                locations: ['CLÍNICA CORI','CLÍNICA SERVISALUD','CLÍNICA UNIVERSITARIA','CLÍNICA MÉDICA CAYETANO HEREDIA','HOSPITAL CAYETANO HEREDIA','HOSPITAL CAYETANO HEREDIA (SOLO TRANSFUSIÓN AMBULATORIA','HOSPITAL CARLOS LANFRANCO LA HOZ (PTE. PIEDRA)'],
                documents: ['DNI','Pasaporte','Carnet'],
            };
        },
        methods: {
            disabledDates(date) {
                const today = new Date();
                return (date < today.setHours(0, 0, 0, 0));
            },
            buscarDni() {
                this.overlay = true;
                axios.post('/dni', { n_documento: this.cita.n_documento_donante })
                    .then(response => {
                        this.cita.nombre_donante = response.data.datos.NOMBRES + ' ' + response.data.datos.APE_PATERNO + ' ' + response.data.datos.APE_MATERNO;
                        this.cita.direccion_donante = response.data.datos.DIRECCION;
                        this.cita.fecha_nac_donante = response.data.datos.FH_NACIMIENTO;
                        this.overlay = false;
                    })
                    .catch(error => {
                    console.log(error);
                    this.overlay = false;
                    });
            },
            buscarDni2() {
                this.overlay = true;
                axios.post('/dni', { n_documento: this.cita.n_documento_paciente })
                    .then(response => {
                        this.cita.nombre_paciente = response.data.datos.NOMBRES + ' ' + response.data.datos.APE_PATERNO + ' ' + response.data.datos.APE_MATERNO;
                        this.overlay = false;
                    })
                    .catch(error => {
                    console.log(error);
                    this.overlay = false;
                    });
            },
            handleTimeSelection(timeValue) {
                this.cita.hora_cita = timeValue;
            },
            formatFechaCita() {
                if (this.cita.fecha_cita) {
                const fecha = new Date(this.cita.fecha_cita);
                this.cita.fecha_cita = `${fecha.getFullYear()}-${(fecha.getMonth() + 1).toString().padStart(2, '0')}-${fecha.getDate().toString().padStart(2, '0')}`;
                }
            },
            saveCita(){
                this.formatFechaCita();
                Inertia.post(route('cita.store'), this.cita);
            },

        },

    };
    // const cita = ref({ fecha_cita: null });

</script>

<style>
/* .v3dp__popout[data-v-2e128338]:nth-of-type(4) {
    display: block !important;
  } */

</style>