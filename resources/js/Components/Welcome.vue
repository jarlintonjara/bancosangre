<script setup>
import JetApplicationLogo from '@/Components/ApplicationLogo.vue';
import '@mdi/font/css/materialdesignicons.css';
import { Head, Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <JetApplicationLogo />
            </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">    
            <Link :href="route('cita.create')">
            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <v-icon  icon="mdi-heart-plus-outline" color="red" size="80px"/>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a href="#">DONAR</a>
                    </div>
                </div>

                <!-- <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Laravel Jetstream is built with Tailwind, an amazing utility first CSS framework that doesn't get in your way. You'll be amazed how easily you can build and maintain fresh, modern designs with this wonderful framework at your fingertips.
                    </div>
                </div> -->
            </div>
            </Link>
            <Link :href="route('cita.index')">
            <div class="p-6 border-t border-gray-200 md:border-l">
                <div class="flex items-center">
                    <v-icon icon="mdi-clipboard-list-outline" color="red" size="80PX" />
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        Ver listado de donaciones
                    </div>
                </div>

                <!-- <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you're free to get started what matters most: building your application.
                    </div>
                </div> -->
            </div>
            </Link>
        </div>
        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3">    
            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <v-icon  icon="mdi-blood-bag" color="blue" size="40px"/>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a href="#">Última donación: 
                            <v-chip variant="elevated" color="red">
                                20-04-2023
                            </v-chip>
                        </a>
                    </div>
                </div>

                <!-- <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Laravel Jetstream is built with Tailwind, an amazing utility first CSS framework that doesn't get in your way. You'll be amazed how easily you can build and maintain fresh, modern designs with this wonderful framework at your fingertips.
                    </div>
                </div> -->
            </div>

            <div class="p-6 border-t border-gray-200 md:border-l">
                <div class="flex items-center">
                    <v-icon icon="mdi-water-check" color="blue" size="40PX" />
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a href="#">Última donación: 
                            <v-chip variant="elevated" color="green">
                                20-08-2023
                            </v-chip>
                        </a>
                    </div>
                </div>

                <!-- <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you're free to get started what matters most: building your application.
                    </div>
                </div> -->
            </div>
            
            <div class="p-6 border-t border-gray-200 md:border-l">
                <div class="flex items-center">
                    <v-icon icon="mdi-account-details-outline" color="blue" size="40PX" />
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        Otros
                    </div>
                </div>

                <!-- <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you're free to get started what matters most: building your application.
                    </div>
                </div> -->
            </div>
        </div>

            <div class="mt-8 text-2xl">
                ¿QUÉ ES LA SANGRE?
            </div>

            <div class="mt-6 text-gray-500">
            La sangre es un tejido formado por varios componentes con características y funciones diferentes.
            Todas las donaciones de sangre se separan en el laboratorio para obtener tres productos diferentes: glóbulos rojos, plasma y plaquetas.
            Cada uno de estos componentes sanguíneos se transfunde a un enfermo diferente.
            La donación de sangre es un procedimiento médico en el cual se extrae sangre a una persona, para luego inyectársela a otra que la necesita.
            Al donar sangre podrás salvar hasta a 4 personas, y estarás ayudando a muchos niños y adultos con cáncer, mujeres con partos complicados, personas que requieren trasplantes, y pacientes con otras enfermedades que necesitan permanentemente sangre para seguir viviendo.
            Pacientes con leucemia, pacientes con tratamientos de quimioterapia, radioterapia, o que han recibido un trasplante de médula ósea, son solo algunos de los ejemplos de la larga lista de casos en que los pacientes necesitan diariamente un donante de sangre.
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-400"
                    ><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a href="#">REQUISITOS PARA DONAR</a>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        LOS DONANTES:

                        DEBEN:

                        TRAER DNI OBLIGATORIO, EXTRANJEROS PRESENTAR CARNÉ DE EXTRANJERÍA O PASAPORTE 
                                (NO SE RECIBIRÁ NINGÚN OTRO TIPO DE DOCUMENTO NO INSISTIR)
                        TRAER EL NÚMERO DE DNI, CARNÉ DE EXTRANJERÍA O PASAPORTE DE SU PACIENTE (OBLIGATORIO)
                        TENER ENTRE 18 A 60 AÑOS DE EDAD
                        DESAYUNAR O COMER ALGO LIGERO (INFUSIÓN, TOSTADAS, GALLETAS), NO GRASAS.
                        PESO: HOMBRES Y MUJERES: MAYOR O IGUAL A 50 KILOGRAMOS
                        LLEVAR UNA VIDA SEXUAL SANA
                        GOZAR DE BUENA SALUD
                        NO DEBEN:

                        ESTAR CON TRATAMIENTOS MÉDICOS
                    </div>

                    <!-- <a href="https://laravel.com/docs">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                            <div>Explore the documentation</div>

                            <div class="ml-1 text-indigo-500">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>
                    </a> -->
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-400"
                    ><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" /><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a href="#">IMPORTANTE</a>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Los Bancos de sangre no diagnostican enfermedades, su función es calificar si un postulante es apto o no para donar sangre
Para que la sangre sea lo más segura posible, necesitamos personas dispuestas a contestar con absoluta veracidad la entrevista que le realizarán
Siempre debemos colaborar difundiendo la necesidad de contar con donantes voluntarios para atender los requerimientos de transfusión, que son permanentes en las Instituciones de salud
Las personas que ofrecen donar a cambio de dinero pueden presentar algún tipo de infección o enfermedad y, por recibir el pago, mienten en la entrevista. Se corre el riesgo de no poder detectar la infección al momento que donan. A nivel mundial, no existen reactivos que detecten una infección desde los primeros días de haber sido contraída (“período de ventana”). Los pacientes corren riesgo con este tipo de donantes.
                    </div>
<!-- 
                    <a href="https://laracasts.com">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                            <div>Start watching Laracasts</div>

                            <div class="ml-1 text-indigo-500">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>
                    </a> -->
                </div>
            </div>

            
        </div>
    </div>
</template>
