<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nova — Transformá tus ideas</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui'] },
					colors: { ink: '#0b1020', violet: '#8b5cf6', cyan: '#22d3ee' },
					animation: { 'float': 'float 6s ease-in-out infinite', 'blob': 'blob 12s infinite' },
					keyframes: {
						float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-16px)' } },
						blob: { '0%, 100%': { transform: 'translate(0, 0) scale(1)' }, '33%': { transform: 'translate(30px, -40px) scale(1.1)' }, '66%': { transform: 'translate(-20px, 20px) scale(.9)' } }
					}
				}
			}
		}
	</script>
</head>
<body class="bg-ink text-white antialiased">
	<div class="relative isolate overflow-hidden">
		<div class="absolute -left-32 top-20 -z-10 h-96 w-96 animate-blob rounded-full bg-violet-600/30 blur-3xl"></div>
		<div class="absolute right-0 top-0 -z-10 h-[32rem] w-[32rem] animate-blob rounded-full bg-cyan-400/20 blur-3xl [animation-delay:3s]"></div>

		<nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-7 lg:px-8">
			<a href="#" class="flex items-center gap-3 text-xl font-black tracking-tight"><span class="grid h-10 w-10 place-items-center rounded-2xl bg-gradient-to-br from-violet-500 to-cyan-400 shadow-lg shadow-violet-500/30">✦</span> NOVA</a>
			<div class="hidden items-center gap-8 text-sm text-slate-300 md:flex"><a href="#vision" class="transition hover:text-white">Visión</a><a href="#features" class="transition hover:text-white">Potencia</a><a href="#contacto" class="transition hover:text-white">Contacto</a></div>
			<a href="#comenzar" class="rounded-full border border-white/15 bg-white/10 px-5 py-2.5 text-sm font-semibold backdrop-blur transition hover:bg-white/20">Comenzar <span class="ml-1">↗</span></a>
		</nav>

		<main>
			<section class="mx-auto grid max-w-7xl items-center gap-16 px-6 pb-24 pt-16 lg:grid-cols-2 lg:px-8 lg:pb-36 lg:pt-24">
				<div>
					<div class="mb-7 inline-flex items-center gap-2 rounded-full border border-cyan-300/20 bg-cyan-300/10 px-4 py-2 text-xs font-bold uppercase tracking-[.2em] text-cyan-200"><span class="h-2 w-2 animate-pulse rounded-full bg-cyan-300"></span> El futuro empieza hoy</div>
					<h1 class="max-w-3xl text-5xl font-black leading-[.98] tracking-[-.05em] sm:text-7xl">Convertí tus ideas en <span class="bg-gradient-to-r from-violet-300 via-fuchsia-300 to-cyan-300 bg-clip-text text-transparent">impacto real.</span></h1>
					<p class="mt-7 max-w-xl text-lg leading-8 text-slate-300">Una experiencia digital extraordinaria para equipos que no se conforman con lo posible. Diseñá, colaborá y creá algo inolvidable.</p>
					<div class="mt-10 flex flex-wrap gap-4"><a id="comenzar" href="#features" class="rounded-2xl bg-white px-7 py-4 font-bold text-ink shadow-2xl shadow-cyan-500/20 transition hover:-translate-y-1 hover:shadow-cyan-400/40">Explorar la experiencia <span class="ml-2">→</span></a><a href="#vision" class="rounded-2xl border border-white/15 px-7 py-4 font-bold text-white transition hover:border-white/40 hover:bg-white/10">Conocé Nova</a></div>
					<div class="mt-12 flex items-center gap-4 text-sm text-slate-400"><div class="flex -space-x-3"><span class="grid h-9 w-9 place-items-center rounded-full border-2 border-ink bg-amber-300 text-xs">👩🏻</span><span class="grid h-9 w-9 place-items-center rounded-full border-2 border-ink bg-pink-300 text-xs">👨🏽</span><span class="grid h-9 w-9 place-items-center rounded-full border-2 border-ink bg-blue-300 text-xs">👩🏼</span></div><span><strong class="text-white">+2.000</strong> mentes ya están creando</span></div>
				</div>
				<div class="relative animate-float">
					<div class="absolute -inset-6 rounded-[3rem] bg-gradient-to-r from-violet-500/30 to-cyan-400/30 blur-3xl"></div>
					<div class="relative overflow-hidden rounded-[2rem] border border-white/15 bg-white/[.08] p-3 shadow-2xl shadow-violet-950/50 backdrop-blur-xl"><div class="rounded-[1.5rem] bg-gradient-to-br from-violet-950 via-indigo-950 to-cyan-950 p-8"><div class="flex items-center justify-between"><span class="rounded-lg bg-white/10 px-3 py-1 text-xs text-cyan-200">NOVA / DASHBOARD</span><span class="text-slate-400">•••</span></div><div class="mt-20"><p class="text-sm text-slate-400">Progreso de tu visión</p><div class="mt-3 flex items-end justify-between"><span class="text-5xl font-black">87<span class="text-2xl text-cyan-300">%</span></span><span class="rounded-full bg-emerald-400/15 px-3 py-1 text-xs text-emerald-300">↑ 24.8%</span></div><div class="mt-6 h-3 overflow-hidden rounded-full bg-white/10"><div class="h-full w-[87%] rounded-full bg-gradient-to-r from-violet-400 to-cyan-300"></div></div></div><div class="mt-12 grid grid-cols-3 gap-3"><div class="rounded-xl bg-white/10 p-3"><p class="text-xs text-slate-400">Proyectos</p><p class="mt-1 text-xl font-bold">24</p></div><div class="rounded-xl bg-white/10 p-3"><p class="text-xs text-slate-400">Impacto</p><p class="mt-1 text-xl font-bold">9.6k</p></div><div class="rounded-xl bg-white/10 p-3"><p class="text-xs text-slate-400">Equipo</p><p class="mt-1 text-xl font-bold">18</p></div></div></div></div>
				</div>
			</section>

			<section id="features" class="border-y border-white/10 bg-white/[.03] px-6 py-20 lg:px-8"><div class="mx-auto max-w-7xl"><div class="max-w-2xl"><p class="font-bold uppercase tracking-[.25em] text-cyan-300">Todo lo que necesitás</p><h2 class="mt-4 text-4xl font-black tracking-tight sm:text-5xl">Menos ruido. <span class="text-slate-400">Más magia.</span></h2></div><div class="mt-14 grid gap-5 md:grid-cols-3"><div class="rounded-3xl border border-white/10 bg-white/[.06] p-7 transition hover:-translate-y-2 hover:border-violet-400/50"><div class="mb-12 text-4xl">✺</div><h3 class="text-xl font-bold">Claridad radical</h3><p class="mt-3 leading-7 text-slate-400">Convertí lo complejo en decisiones simples y accionables.</p></div><div class="rounded-3xl border border-white/10 bg-white/[.06] p-7 transition hover:-translate-y-2 hover:border-cyan-400/50"><div class="mb-12 text-4xl">◈</div><h3 class="text-xl font-bold">Colaboración fluida</h3><p class="mt-3 leading-7 text-slate-400">Un espacio donde las mejores ideas encuentran su momento.</p></div><div class="rounded-3xl border border-white/10 bg-white/[.06] p-7 transition hover:-translate-y-2 hover:border-fuchsia-400/50"><div class="mb-12 text-4xl">∞</div><h3 class="text-xl font-bold">Creá sin límites</h3><p class="mt-3 leading-7 text-slate-400">Herramientas poderosas que se adaptan a tu forma de pensar.</p></div></div></div></section>
		</main>
		<footer id="contacto" class="mx-auto flex max-w-7xl flex-col gap-4 px-6 py-8 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between lg:px-8"><span>© {{ date('Y') }} NOVA. Hecho para lo extraordinario.</span><span>Privacidad · Términos · <a href="mailto:hola@nova.demo" class="text-cyan-300 hover:text-white">hola@nova.demo</a></span></footer>
	</div>
</body>
</html>
