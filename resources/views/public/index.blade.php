<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bio-Link | Web, Mobile & IoT Developer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            background: linear-gradient(180deg, #3ae2f8 0%, #c69c1f 100%);
            color: #431cb6;
        }

        .soft-panel {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(8px);
        }
    </style>
</head>
<body class="min-h-screen font-sans antialiased pb-16 overflow-x-hidden">
        <div class="max-w-md mx-auto flex items-center justify-between px-4 py-3">
            </div>
            <div class="flex items-center gap-2 text-slate-300">
                <i data-lucide="Camera Len" class="w-4 h-4"></i>
            </div>
        </div>
    </div>

    <main class="max-w-md mx-auto pt-8 px-4 flex flex-col items-center relative">
        <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-slate-300 bg-white/80 px-3 py-1 text-[10px] font-black uppercase tracking-[.18em] text-slate-700 shadow-sm">
            <i data-lucide="briefcase" class="w-3.5 h-3.5"></i> About Me
        </div>

        <div class="relative mb-6">
            <div class="w-24 h-24 rounded-full border-4 border-slate-900 overflow-hidden shadow-[5px_6px_0px_#0f172a] bg-slate-200">
                <img src="https://ui-avatars.com/api/?name=FR&background=0f172a&color=f8fafc&size=200" alt="Profile" class="w-full h-full object-cover">
            </div>
            <span class="absolute -bottom-1 -right-1 w-8 h-8 rounded-full bg-blue-500 border-2 border-slate-900 flex items-center justify-center text-white">
                <i data-lucide="Camera" class="w-4 h-4"></i>
            </span>
        </div>

        <h1 class="text-2xl font-black mb-2 text-center tracking-tight text-slate-900">@farhannamndn_</h1>
        <p class="text-center text-sm font-bold leading-relaxed px-6 mb-6 text-slate-600">
            Jasa Fotografi dan Sewa Peralatan Fotografi  <br>
            <span class="text-slate-900">Profesional Fotografer</span> (Potrait, wedding, and Event) &bull; (Sukabumi, Jawa Barat)
        </p>

        <div class="flex items-center gap-4 mb-8">
            @foreach (['github', 'linkedin', 'mail'] as $social)
                <a href="#" class="p-2.5 bg-white rounded-full border-2 border-slate-900 shadow-[2px_2px_0px_#0f172a] hover:-translate-y-1 transition-transform text-slate-800">
                    <i data-lucide="{{ $social }}" class="w-5 h-5"></i>
                </a>
            @endforeach
        </div>

        <div class="w-full space-y-4">
            <button onclick="openModal()" class="w-full relative group">
                <div class="absolute inset-0 bg-slate-900 rounded-3xl translate-y-1.5 translate-x-1.5"></div>
                <div class="relative w-full bg-slate-100 border-2 border-slate-900 rounded-3xl p-4 flex flex-col items-center justify-center transition-transform group-active:translate-y-1.5 group-active:translate-x-1.5">
                    <span class="font-black text-slate-900 text-lg">Contact Detail</span>
                    <span class="text-xs font-bold text-slate-600 flex items-center gap-1 mt-1"><i data-lucide="at-sign" class="w-3 h-3"></i> Hubungi Developer</span>
                </div>
            </button>

            @foreach ($links as $link)
                <a href="{{ route('public.redirect', $link->id) }}" target="_blank" rel="noopener noreferrer" class="w-full block relative group">
                    <div class="absolute inset-0 bg-slate-900 rounded-3xl translate-y-1.5 translate-x-1.5"></div>
                    <div class="relative w-full bg-white border-2 border-slate-900 rounded-3xl p-4 flex items-center transition-transform group-active:translate-y-1.5 group-active:translate-x-1.5 hover:bg-slate-50">
                        @if ($link->image)
                            <img src="{{ asset('storage/' . $link->image) }}" class="w-10 h-10 object-cover rounded-xl border-2 border-slate-900 absolute left-4 bg-slate-100">
                        @else
                            <div class="w-10 h-10 bg-slate-200 border-2 border-slate-900 rounded-xl flex items-center justify-center absolute left-4 shadow-[2px_2px_0px_#0f172a]">
                                <i data-lucide="link-2" class="w-5 h-5 text-slate-800 stroke-[2.5]"></i>
                            </div>
                        @endif
                        <span class="w-full text-center font-black text-slate-900 text-base px-12 truncate">{{ $link->title }}</span>
                        <i data-lucide="chevron-right" class="w-5 h-5 text-slate-500 absolute right-4"></i>
                    </div>
                </a>
            @endforeach
        </div>

        {{ $links->links('vendor.pagination.custom-public') }}
    </main>

    <div id="contact-modal" class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm" onclick="closeModal()"></div>
        <div id="modal-content" class="absolute bottom-0 left-0 right-0 bg-white border-t-4 border-slate-900 rounded-t-[2rem] p-6 max-w-md mx-auto h-auto max-h-[85vh] overflow-y-auto pb-10 flex flex-col shadow-[0px_-8px_0px_rgba(15,23,42,.15)] translate-y-full transition-transform duration-300">
            <div class="w-12 h-1.5 bg-slate-300 rounded-full mx-auto mb-6 shrink-0"></div>
            <div class="text-center mb-6">
                <h2 class="text-sm font-extrabold text-slate-500 uppercase tracking-widest">Contact Details</h2>
                <h3 class="text-2xl font-black mt-2 text-slate-900">farhannamndn_</h3>
                <p class="text-xs font-bold text-slate-600 mt-1">Membantu dan Melayani Kebutuhan Fotografi anda</p>
            </div>

            <div class="bg-slate-100 border-2 border-slate-900 rounded-2xl p-5 mb-6 space-y-4 shadow-[4px_4px_0px_#0f172a]">
                <div class="flex items-center gap-3 border-b-2 border-dashed border-slate-300 pb-4">
                    <div class="p-2 bg-slate-200 border-2 border-slate-900 rounded-lg"><i data-lucide="mail" class="w-4 h-4"></i></div>
                    <p class="font-extrabold text-sm truncate text-slate-900">frhnmndn@gmail.com</p>
                </div>
                <div class="flex items-center gap-3 border-b-2 border-dashed border-slate-300 pb-4">
                    <div class="p-2 bg-slate-200 border-2 border-slate-900 rounded-lg"><i data-lucide="phone" class="w-4 h-4"></i></div>
                    <p class="font-extrabold text-sm truncate text-slate-900">+62 856-9507-2924</p>
                </div>
                <div class="flex items-start gap-3">
                    <div class="p-2 bg-slate-200 border-2 border-slate-900 rounded-lg mt-1"><i data-lucide="clock" class="w-4 h-4"></i></div>
                    <div>
                        <p class="font-extrabold text-sm text-slate-900">Senin - Jumat: 09:00 - 17:00</p>
                        <p class="font-extrabold text-xs text-slate-500 mt-0.5">Weekend: By Appointment</p>
                    </div>
                </div>
            </div>

            <div class="bg-amber-50 border-2 border-slate-900 p-4 rounded-xl flex gap-3 mb-6 shadow-[2px_2px_0px_#0f172a]">
                <i data-lucide="info" class="w-5 h-5 shrink-0 mt-0.5 text-amber-700"></i>
                <p class="text-[11px] font-bold text-slate-700 leading-relaxed">Browser Anda mungkin tidak mendukung download VCF otomatis. Silakan salin nomor secara manual.</p>
            </div>

            <div class="mt-auto flex gap-3">
                <button class="flex-1 bg-slate-900 text-white font-black py-4 rounded-xl hover:bg-slate-800 transition-colors border-2 border-slate-900">Terimakasih</button>
                <button onclick="closeModal()" class="w-14 h-14 shrink-0 bg-rose-200 border-2 border-slate-900 rounded-xl flex items-center justify-center shadow-[3px_3px_0px_#0f172a] hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all">
                    <i data-lucide="x" class="w-6 h-6 stroke-[3]"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
        const modal = document.getElementById('contact-modal');
        const modalContent = document.getElementById('modal-content');

        function openModal() {
            modal.classList.remove('hidden');
            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('translate-y-full');
            });
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            modalContent.classList.add('translate-y-full');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }
    </script>
</body>
</html>
