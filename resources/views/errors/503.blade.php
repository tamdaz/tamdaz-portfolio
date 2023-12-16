@extends('layouts.base')

@section('title', "Maintenance - Tamda Zohir")

@section('body')
    <div class="w-screen h-screen flex flex-col justify-center items-center bg-black text-white z-0">
        <h1 class="animate-pickaxe text-7xl font-bold my-8">⛏️</h1>
        <span class="animate-zoom text-3xl">Arrive bientôt...</span>
		<div class="absolute w-[500px] h-[350px] -z-10 border"></div>
	</div>

	<div class="absolute animate-zoom animate-pulse border px-5 py-4 bottom-16 left-0 right-0 w-[800px] m-auto border-yellow-500 text-yellow-500">
		@if(\App\Models\Maintenance::find(1)->message !== null)
			Raison de la maintenance : {{ \App\Models\Maintenance::find(1)->message }}
			<br/>
		@endif
		Fin de la maintenance dans <span id="demo"></span>
	</div>

	<script>
        let countDownDate = new Date("{{ \App\Models\Maintenance::find(1)->end_maintenance }}").getTime();

        let x = setInterval(function () {
            let now = new Date().getTime();
            let distance = countDownDate - now;

            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            hours = (hours <= 9) ? `0${hours}` : hours;
            minutes = (minutes <= 9) ? `0${minutes}` : minutes;
            seconds = (seconds <= 9) ? `0${seconds}` : seconds;

            document.getElementById("demo").innerHTML = `${hours}:${minutes}:${seconds} secondes`;

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "Termine bientôt";
            }
        }, 200);
	</script>
@endsection
