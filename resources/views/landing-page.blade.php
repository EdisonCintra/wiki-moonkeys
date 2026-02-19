<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoonKeys - Servidor Minecraft</title>
    <meta name="description"
          content="Explore sistemas exclusivos, eventos épicos e uma comunidade que transforma blocos em histórias memoráveis.">
    <meta name="author" content="MoonKeys">

    <meta property="og:title" content="MoonKeys - Servidor Minecraft"/>
    <meta property="og:description"
          content="Explore sistemas exclusivos, eventos épicos e uma comunidade que transforma blocos em histórias memoráveis."/>
    <meta property="og:type" content="website"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Rajdhani', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        border: 'hsl(var(--border))',
                        background: 'hsl(var(--background))',
                        foreground: 'hsl(var(--foreground))',
                        primary: {DEFAULT: 'hsl(var(--primary))', foreground: 'hsl(var(--primary-foreground))'},
                        secondary: {DEFAULT: 'hsl(var(--secondary))', foreground: 'hsl(var(--secondary-foreground))'},
                        muted: {DEFAULT: 'hsl(var(--muted))', foreground: 'hsl(var(--muted-foreground))'},
                        card: {DEFAULT: 'hsl(var(--card))', foreground: 'hsl(var(--card-foreground))'},
                    },
                    borderRadius: {
                        lg: 'var(--radius)',
                        md: 'calc(var(--radius) - 2px)',
                        sm: 'calc(var(--radius) - 4px)'
                    },
                    keyframes: {
                        float: {'0%, 100%': {transform: 'translateY(0)'}, '50%': {transform: 'translateY(10px)'}},
                        particle: {
                            '0%, 100%': {opacity: '0.2', transform: 'translateY(0)'},
                            '50%': {opacity: '0.8', transform: 'translateY(-30px)'}
                        },
                    },
                    animation: {
                        float: 'float 2s ease-in-out infinite',
                        particle: 'particle 4s ease-in-out infinite',
                    },
                },
            },
        }
    </script>

    <style>
        :root {
            --background: 220 40% 5%;
            --foreground: 210 40% 96%;
            --card: 220 35% 8%;
            --card-foreground: 210 40% 96%;
            --primary: 200 90% 55%;
            --primary-foreground: 220 40% 5%;
            --secondary: 48 96% 53%;
            --secondary-foreground: 220 40% 5%;
            --muted: 220 30% 14%;
            --muted-foreground: 215 20% 55%;
            --border: 220 25% 15%;
            --radius: 0.75rem;
        }

        * {
            border-color: hsl(var(--border));
        }

        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Rajdhani', sans-serif;
        }

        .btn-primary {
            padding: 0.875rem 1.75rem;
            border-radius: 0.75rem;
            background: hsl(var(--primary));
            color: hsl(var(--primary-foreground));
            font-weight: 700;
            transition: all 0.2s;
            box-shadow: 0 0 25px hsla(200, 90%, 55%, 0.3);
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 0 40px hsla(200, 90%, 55%, 0.5);
        }

        .btn-secondary {
            padding: 0.875rem 1.75rem;
            border-radius: 0.75rem;
            background: hsl(var(--secondary));
            color: hsl(var(--secondary-foreground));
            font-weight: 700;
            transition: all 0.2s;
            box-shadow: 0 0 20px hsla(48, 96%, 53%, 0.2);
        }

        .btn-secondary:hover {
            transform: scale(1.05);
            box-shadow: 0 0 35px hsla(48, 96%, 53%, 0.4);
        }

        .btn-outline {
            padding: 1rem 2rem;
            border-radius: 0.75rem;
            font-weight: 700;
            background: transparent;
            border: 2px solid white;
            color: white;
            transition: all 0.2s ease;
        }

        .btn-outline:hover {
            background: white;
            color: hsl(var(--primary));
        }

        .btn-gradient {
            padding: 1rem 2rem;
            border-radius: 0.75rem;
            font-weight: 700;
            color: hsl(var(--primary-foreground));
            background: linear-gradient(to right, hsl(var(--primary)), hsl(170, 80%, 45%));
            transition: all 0.2s;
            box-shadow: 0 0 30px hsla(200, 90%, 55%, 0.35);
        }

        .btn-gradient:hover {
            transform: scale(1.05);
        }

        .glass-card {
            background: hsl(var(--card) / 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid hsl(var(--border));
            border-radius: 1rem;
        }

        .text-gradient-blue {
            background: linear-gradient(to right, hsl(var(--primary)), hsl(170, 80%, 55%));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .text-gradient-gold {
            background: linear-gradient(to right, hsl(var(--secondary)), hsl(35, 90%, 60%));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .glow-blue {
            filter: drop-shadow(0 0 30px hsla(200, 90%, 55%, 0.3));
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(10px);
            }
        }

        @keyframes particle {
            0%, 100% {
                opacity: 0.2;
                transform: translateY(0);
            }
            50% {
                opacity: 0.8;
                transform: translateY(-30px);
            }
        }

        .animate-float {
            animation: float 2s ease-in-out infinite;
        }

        .animate-particle {
            animation: particle 4s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-screen bg-background overflow-x-hidden">

{{-- Hero Section --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('hero-bg.jpg') }}" alt="" class="w-full h-full object-cover"
             onerror="this.style.display='none'">
        <div class="absolute inset-0 bg-gradient-to-b from-background/40 via-background/60 to-background"></div>
    </div>

    {{-- Partículas (CSS) --}}
    @for ($i = 0; $i < 20; $i++)
        <div class="absolute w-1 h-1 rounded-full bg-primary/40 animate-particle"
             style="left: {{ rand(0, 100) }}%; top: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 300) }}ms; animation-duration: {{ 3 + (rand(0, 40) / 10) }}s;"></div>
    @endfor

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        {{--        <img src="{{ asset('images/moonkeys_logo.png') }}" alt="MoonKeys Logo" class="mx-auto w-48 md:w-64 mb-8 glow-blue">--}}

        <h1 class="text-5xl md:text-7xl font-bold tracking-tight">
            <span class="text-foreground">Moon</span>
            <span class="text-gradient-blue">Keys</span>
        </h1>

        <p class="mt-6 text-lg md:text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed">
        Explore sistemas exclusivos, eventos épicos e uma comunidade que transforma
            blocos em histórias memoráveis.
        </p>

        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
            <a href="#como-jogar" class="btn-secondary">🚀 Começar a jogar</a>
            <a href="#regras" class="btn-outline text-white">📜 Ver regras</a>
        </div>

        <div class="mt-12 inline-flex items-center gap-3 glass-card px-6 py-3">
            <span class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse"></span>
            <span class="font-heading font-bold text-primary tracking-wider">IP do Servidor:</span>
            <span class="font-heading font-bold text-foreground tracking-wider">mc.moonkeys.com.br</span>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-float">
        <div class="w-6 h-10 border-2 border-muted-foreground/40 rounded-full flex justify-center pt-2">
            <div class="w-1.5 h-3 bg-primary/60 rounded-full"></div>
        </div>
    </div>
</section>

{{-- Features Section --}}
<section class="py-24 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold font-heading text-foreground">
                Por que jogar no <span class="text-gradient-blue">MoonKeys</span>?
            </h2>
            <p class="mt-4 text-muted-foreground text-lg max-w-xl mx-auto">
                Cada detalhe foi pensado para criar a melhor experiência Minecraft possível.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="group glass-card p-8 hover:border-primary/30 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_60px_-15px_hsla(200,90%,55%,0.15)]">
                <div class="w-14 h-14 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center mb-5 group-hover:bg-primary/20 group-hover:border-primary/40 transition-colors duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="text-primary">
                        <path d="M14.5 17.5 3 6V3h3l11.5 11.5"/>
                        <path d="m13 6 6-3 4 4-3 6"/>
                        <path d="M4.5 19.5 15 9"/>
                        <path d="M15 9v6h6"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-foreground mb-3 font-heading">Sistemas Exclusivos</h3>
                <p class="text-muted-foreground text-sm leading-relaxed">Mecânicas customizadas que você só encontra
                    aqui. Combate, economia e progressão repensados.</p>
            </div>
            <div class="group glass-card p-8 hover:border-primary/30 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_60px_-15px_hsla(200,90%,55%,0.15)]">
                <div class="w-14 h-14 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center mb-5 group-hover:bg-primary/20 group-hover:border-primary/40 transition-colors duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="text-primary">
                        <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/>
                        <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/>
                        <path d="M4 22h16"/>
                        <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/>
                        <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/>
                        <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-foreground mb-3 font-heading">Eventos Épicos</h3>
                <p class="text-muted-foreground text-sm leading-relaxed">Competições semanais, torneios PvP e desafios
                    com recompensas únicas para os melhores jogadores.</p>
            </div>
            <div class="group glass-card p-8 hover:border-primary/30 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_60px_-15px_hsla(200,90%,55%,0.15)]">
                <div class="w-14 h-14 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center mb-5 group-hover:bg-primary/20 group-hover:border-primary/40 transition-colors duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="text-primary">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                        <path d="M6 8h2"/>
                        <path d="M6 12h2"/>
                        <path d="M16 8h2"/>
                        <path d="M16 12h2"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-foreground mb-3 font-heading">Guias Completos</h3>
                <p class="text-muted-foreground text-sm leading-relaxed">Tutoriais do básico ao avançado para dominar
                    todas as mecânicas do servidor.</p>
            </div>
            <div class="group glass-card p-8 hover:border-primary/30 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_60px_-15px_hsla(200,90%,55%,0.15)]">
                <div class="w-14 h-14 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center mb-5 group-hover:bg-primary/20 group-hover:border-primary/40 transition-colors duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="text-primary">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-foreground mb-3 font-heading">Anti-Cheat Avançado</h3>
                <p class="text-muted-foreground text-sm leading-relaxed">Jogue com segurança. Nosso sistema garante uma
                    experiência justa para todos.</p>
            </div>
            <div class="group glass-card p-8 hover:border-primary/30 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_60px_-15px_hsla(200,90%,55%,0.15)]">
                <div class="w-14 h-14 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center mb-5 group-hover:bg-primary/20 group-hover:border-primary/40 transition-colors duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="text-primary">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-foreground mb-3 font-heading">Comunidade Ativa</h3>
                <p class="text-muted-foreground text-sm leading-relaxed">Milhares de jogadores conectados. Faça amigos,
                    crie clãs e conquiste territórios.</p>
            </div>
            <div class="group glass-card p-8 hover:border-primary/30 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_60px_-15px_hsla(200,90%,55%,0.15)]">
                <div class="w-14 h-14 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center mb-5 group-hover:bg-primary/20 group-hover:border-primary/40 transition-colors duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="text-primary">
                        <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-foreground mb-3 font-heading">Atualizações Constantes</h3>
                <p class="text-muted-foreground text-sm leading-relaxed">Conteúdo novo toda semana. O servidor evolui
                    junto com a comunidade.</p>
            </div>
        </div>
    </div>
</section>

{{-- How to Play --}}
<section id="como-jogar" class="py-24 px-4">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold font-heading text-foreground ">
                Como <span class="text-gradient-gold">começar</span>?
            </h2>
            <p class="mt-4 text-muted-foreground text-lg">
                Três passos simples para entrar no MoonKeys.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="relative text-center">
                <div class="text-7xl font-heading font-bold text-primary/10 mb-4 select-none">01</div>
                <h3 class="text-xl font-bold text-foreground font-heading -mt-6 mb-3">Abra o Minecraft</h3>
                <p class="text-muted-foreground text-sm leading-relaxed">Use a versão Java mais recente para a melhor
                    experiência.</p>
            </div>
            <div class="relative text-center">
                <div class="hidden md:block absolute top-10 -right-4 w-8 text-muted-foreground/30">→</div>
                <div class="text-7xl font-heading font-bold text-primary/10 mb-4 select-none">02</div>
                <h3 class="text-xl font-bold text-foreground font-heading -mt-6 mb-3">Adicione o servidor</h3>
                <p class="text-muted-foreground text-sm leading-relaxed">Vá em Multiplayer e adicione o IP:
                    mc.moonkeys.com.br
                </p>
            </div>
            <div class="relative text-center">
                <div class="hidden md:block absolute top-10 -right-4 w-8 text-muted-foreground/30">→</div>
                <div class="text-7xl font-heading font-bold text-primary/10 mb-4 select-none">03</div>
                <h3 class="text-xl font-bold text-foreground font-heading -mt-6 mb-3">Entre e jogue!</h3>
                <p class="text-muted-foreground text-sm leading-relaxed">Escolha seu modo, explore o mundo e divirta-se
                    com a comunidade.</p>
            </div>
        </div>

        <div class="text-center mt-14">
            <div class="glass-card inline-flex items-center gap-4 px-8 py-4 flex-wrap justify-center">
                <span class="text-muted-foreground">IP:</span>
                <code class="text-xl font-heading font-bold text-primary tracking-widest" id="server-ip">mc.moonkeys.com.br
                </code>
                <button type="button" onclick="copyIp(this)"
                        class="px-3 py-1.5 rounded-lg bg-primary/10 border border-primary/20 text-primary text-xs font-semibold hover:bg-primary/20 transition-colors">
                    Copiar
                </button>
            </div>
        </div>
    </div>
</section>

{{-- Rules --}}
<section id="regras" class="py-24 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold font-heading text-foreground">
                📜 Regras do <span class="text-gradient-blue">Servidor</span>
            </h2>
            <p class="mt-4 text-muted-foreground text-lg">
                Para manter a diversão, todos devem seguir estas regras.
            </p>
        </div>

        <div class="space-y-4">
            @php
                $rules = [
                    'Respeite todos os jogadores e a equipe.',
                    'Proibido uso de hacks, cheats ou mods ilegais.',
                    'Não destrua construções de outros jogadores.',
                    'Mantenha o chat limpo e organizado.',
                    'Não faça spam ou publicidade.',
                    'Respeite as decisões da staff.',
                ];
            @endphp
            @foreach ($rules as $i => $rule)
                <div class="glass-card p-5 flex items-start gap-4 hover:border-primary/30 transition-colors">
                    <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-primary/10 border border-primary/20 flex items-center justify-center text-primary text-sm font-bold font-heading">{{ $i + 1 }}</span>
                    <p class="text-foreground/90 text-sm leading-relaxed pt-1">{{ $rule }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-24 px-4">
    <div class="max-w-4xl mx-auto relative overflow-hidden rounded-3xl border border-primary/20">
        <div class="absolute -top-20 -left-20 w-60 h-60 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -right-20 w-60 h-60 bg-secondary/10 rounded-full blur-3xl"></div>
        <div class="relative bg-card/90 backdrop-blur-sm p-12 md:p-16 text-center">
            <h2 class="text-4xl md:text-5xl font-bold font-heading text-foreground">
                Pronto para a <span class="text-gradient-blue">aventura</span>?
            </h2>
            <p class="mt-5 text-muted-foreground text-lg max-w-xl mx-auto">
                Entre agora e descubra por que o MoonKeys é o lar de milhares de jogadores.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="#como-jogar" class="btn-gradient">⚡ Entrar no servidor</a>
                <a href="https://discord.gg/VfpBPhRZ8e" target="_blank" rel="noopener noreferrer" class="btn-outline">💬
                    Discord</a>
            </div>
        </div>
    </div>
</section>

{{-- Footer --}}
<footer class="border-t border-border py-12 px-4">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="flex items-center gap-3">
            {{--            <img src="{{ asset('moonkeys_logo.png') }}" alt="MoonKeys" class="w-10 h-10 glow-blue">--}}
            <span class="font-heading font-bold text-foreground text-lg">MoonKeys</span>
        </div>
        <p class="text-muted-foreground text-sm text-center">
            © {{ date('Y') }} MoonKeys. Todos os direitos reservados. Não afiliado à Mojang Studios.
        </p>
        <div class="flex gap-4">
            <a href="https://discord.gg/VfpBPhRZ8e" class="text-muted-foreground hover:text-primary transition-colors text-sm">Discord</a>
            <a href="#" class="text-muted-foreground hover:text-primary transition-colors text-sm">Instagram</a>
            <a href="#" class="text-muted-foreground hover:text-primary transition-colors text-sm">YouTube</a>
        </div>
    </div>
</footer>

<script>
    function copyIp(btn) {
        var ip = document.getElementById('server-ip').textContent;
        var orig = btn.textContent;

        function done() {
            btn.textContent = 'Copiado!';
            setTimeout(function () {
                btn.textContent = orig;
            }, 2000);
        }

        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(ip).then(done);
        } else {
            var ta = document.createElement('textarea');
            ta.value = ip;
            document.body.appendChild(ta);
            ta.select();
            document.execCommand('copy');
            document.body.removeChild(ta);
            done();
        }
    }
</script>
</body>
</html>
