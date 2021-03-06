<x-app-layout>
    <br>
    <!-- SLIDER ESTATICO -->
    <div class="sliderAx h-auto">
        <div id="slider-1" class="container mx-auto">
            <div class="bg-cover bg-center h-auto text-white py-24 px-10 object-fill"
                style="background-image: url(https://cemsa-arg.com/panel/assets/images/rooms/3_0.png?1551186123)">
                <div class="md:w-1/2">
                    <p class="text-4xl font-bold">Somos #WORKFLOW</p>
                    <p class="text-3xl mb-10 leading-none">Lideres en Manejo Defensivo</p>
                    <a href="{{ route('courses.index') }}"
                        class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Ver
                        Cursos</a>
                </div>
            </div> <!-- container -->
        </div>
    </div>
    <!-- FIN SLIDER ESTATICO -->


    {{-- MIGAS DE PAN --}}
    <nav>
        <ol class="list-reset py-4 pl-4 rounded flex bg-grey-light text-grey">
            <li class="px-2"><a href="{{ route('home') }}" class="no-underline text-indigo">Inicio</a></li>
            <li>/</li>

            <li class="px-2 text-gray-500">Cursos</li>
        </ol>
    </nav>
    {{-- FIN MIGAS DE PAN --}}


    <!-- RELLENO-->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Seguridad Vial</h2>
                <p class="text-2xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Capacitaciones
                </p>
                <p class="mt-4 max-w-2xl text-justify text-xl text-black lg:mx-auto">
                    Nos dedicamos a la investigación, diseño y desarrollo de programas de capacitación teórico-práctico
                    en Manejo Defensivo.
                </p>
            </div>
        </div>
    </div>
    <!-- FIN DEL RELLENO  -->


    <!-- ************************************************************************************************************-->
    {{-- CARD DE CURSOS --}}
    <!-- ************************************************************************************************************-->
    <div class="container mx-auto py-8 ">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($courses as $course)

                <div
                    class="container mx-auto flex flex-col max-w-md bg-indigo-200  px-8 py-2 rounded-xl space-y-5 items-center">

                    <p class="inline-block px-3 bg-red-500 text-gray-200 rounded-full">
                        Modalidad {{ $course->mode }}
                    </p>
                    <p class="mt-2 text-xl font-bold text-gray-800">{{ $course->name }}</p>
                    <p class="mt-2 text-justify  text-black">{{ $course->description }}</p>
                    <p class="mt-2 text-black"><b>Instructor : </b>{{ $course->teachers->last_name }},
                        {{ $course->teachers->name }}</p>
                    <p class="inline-block px-3 py-2 bg-yellow-300 font-bold text-black rounded-full">
                        ARS $ {{ number_format($course->price, 2) }}</p>
                    <div class="flex justify-center">
                        <a href="{{ route('courses.show', $course) }}"
                            class="btn btn-primary bg-gray-800 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black"
                            role="button" aria-pressed="true">
                            INSCRIBIRME
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    <!-- ************************************************************************************************************-->
    {{-- FIN CARD DE CURSOS --}}
    <!-- ************************************************************************************************************-->

</x-app-layout>
