<x-layouts.app :title="__('Company Details')">
    <link rel="icon" type="image/png" href="{{ asset('fav.png') }}">

    <div class="flex h-full w-full flex-1 flex-col gap-6 pt-4 sm:pt-0">
        
        <!-- Header & Action -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-zinc-900/50 backdrop-blur-md border border-zinc-800/50 rounded-2xl p-6 shadow-lg shadow-black/20">
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-white">All Companies</h2>
                <p class="text-zinc-400 text-sm mt-1">Manage your company profiles and branding.</p>
            </div>

            <div class="flex items-center gap-3 w-full md:w-auto">
                <button type="button" data-modal="modalAdd" class="w-full md:w-auto flex items-center justify-center gap-2 bg-purple-600 hover:bg-purple-500 text-white font-medium rounded-xl px-4 py-2.5 transition-colors shadow-lg shadow-purple-600/20 whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    Add Company
                </button>
            </div>
        </div>

        <!-- Table Container -->
        <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800/50 rounded-2xl shadow-lg overflow-hidden flex-1 flex flex-col">
            <div class="overflow-x-auto flex-1">
                <table class="w-full text-sm text-left text-zinc-300">
                    <thead class="text-xs text-zinc-400 uppercase bg-zinc-950/50 border-b border-zinc-800/50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium tracking-wider w-16">#</th>
                            <th scope="col" class="px-6 py-4 font-medium tracking-wider w-20">Logo</th>
                            <th scope="col" class="px-6 py-4 font-medium tracking-wider">Company</th>
                            <th scope="col" class="px-6 py-4 font-medium tracking-wider">Details</th>
                            <th scope="col" class="px-6 py-4 font-medium tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/50">
                        @forelse ($companies as $key => $c)
                        <tr class="hover:bg-zinc-800/30 transition-colors group">
                            <td class="px-6 py-4 whitespace-nowrap text-zinc-500">{{ $key+1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($c->c_logo)
                                <img src="{{ asset('storage/'.$c->c_logo) }}" class="w-10 h-10 object-contain rounded bg-white p-1">
                                @else
                                <div class="w-10 h-10 rounded bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-500 text-xs font-medium">No Logo</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-zinc-100">{{ $c->c_name }}</div>
                                <div class="text-xs text-zinc-500 font-mono mt-0.5">CIN: {{ $c->cin_number }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col gap-0.5">
                                    <div class="text-zinc-300">{{ $c->c_email }}</div>
                                    <div class="text-xs text-zinc-500">{{ $c->c_website }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-2 opacity-100 md:opacity-0 md:group-hover:opacity-100 transition-opacity">
                                    <button type="button" 
                                        class="p-2 text-amber-400 hover:text-amber-300 hover:bg-amber-400/10 rounded-lg transition-colors btn-edit"
                                        title="Edit Company"
                                        data-id="{{ $c->id }}"
                                        data-name="{{ $c->c_name }}"
                                        data-email="{{ $c->c_email }}"
                                        data-cin="{{ $c->cin_number }}"
                                        data-website="{{ $c->c_website }}"
                                        data-address="{{ $c->c_address }}"
                                        data-modal="modalEdit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                                    </button>
                                    <button type="button" 
                                        class="p-2 text-red-400 hover:text-red-300 hover:bg-red-400/10 rounded-lg transition-colors btn-delete" 
                                        title="Delete Company"
                                        data-id="{{ $c->id }}" 
                                        data-modal="modalDelete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-zinc-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 mb-4 text-zinc-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    <p class="text-lg font-medium text-zinc-400">No companies found</p>
                                    <p class="text-sm mt-1">Add your first company to get started.</p>
                                    <button type="button" data-modal="modalAdd" class="mt-4 text-purple-400 hover:text-purple-300 transition-colors text-sm font-medium">Add Company &rarr;</button>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL BACKDROP AND LOGIC VIA ALPINE OR NATIVE JS -->
    <!-- Add Modal -->
    <div id="modalAdd" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity custom-modal" aria-modal="true" role="dialog">
        <div class="bg-zinc-900 border border-zinc-800 w-full max-w-md rounded-2xl p-6 shadow-2xl transform scale-95 transition-transform modal-box">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">Add Company</h3>
                <button type="button" data-close class="text-zinc-500 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">Company Name</label>
                    <input name="c_name" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2 transition-colors" required>
                </div>
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">Email</label>
                    <input name="c_email" type="email" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2 transition-colors" required>
                </div>
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">CIN Number</label>
                    <input name="cin_number" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2 transition-colors" required>
                </div>
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">Website</label>
                    <input name="c_website" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2 transition-colors">
                </div>
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">Address</label>
                    <input name="c_address" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2 transition-colors">
                </div>
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">Company Logo</label>
                    <input type="file" name="c_logo" class="w-full text-sm text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-600 file:text-white hover:file:bg-purple-500 cursor-pointer">
                </div>
                <div class="pt-4">
                    <button class="w-full py-2.5 px-4 rounded-xl bg-purple-600 text-white font-medium hover:bg-purple-500 transition-colors shadow-lg shadow-purple-600/20">Save Company</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="modalEdit" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity custom-modal" aria-modal="true" role="dialog">
        <div class="bg-zinc-900 border border-zinc-800 w-full max-w-md rounded-2xl p-6 shadow-2xl transform scale-95 transition-transform modal-box">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">Edit Company</h3>
                <button type="button" data-close class="text-zinc-500 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">Company Name</label>
                    <input id="e_name" name="c_name" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2 transition-colors" required>
                </div>
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">Email</label>
                    <input id="e_email" name="c_email" type="email" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2 transition-colors" required>
                </div>
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">CIN Number</label>
                    <input id="e_cin" name="cin_number" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2 transition-colors" required>
                </div>
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">Website</label>
                    <input id="e_website" name="c_website" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2 transition-colors">
                </div>
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">Address</label>
                    <input id="e_address" name="c_address" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2 transition-colors">
                </div>
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-zinc-300">Company Logo (Optional)</label>
                    <input type="file" name="c_logo" class="w-full text-sm text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-600 file:text-white hover:file:bg-purple-500 cursor-pointer">
                </div>
                <div class="pt-4">
                    <button class="w-full py-2.5 px-4 rounded-xl bg-purple-600 text-white font-medium hover:bg-purple-500 transition-colors shadow-lg shadow-purple-600/20">Update Company</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="modalDelete" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity custom-modal" aria-modal="true" role="dialog">
        <div class="bg-zinc-900 border border-zinc-800 w-full max-w-sm rounded-2xl p-6 text-center shadow-2xl transform scale-95 transition-transform modal-box">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-500/10 mb-6">
                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Delete Company</h3>
            <p class="text-sm text-zinc-400 mb-8">Are you sure you want to delete this company? This action cannot be undone.</p>
            
            <form id="deleteForm" method="POST" class="flex gap-3 w-full">
                @csrf
                <button type="button" data-close class="w-full flex-1 py-2.5 px-4 rounded-xl bg-zinc-800 text-white font-medium hover:bg-zinc-700 transition-colors">Cancel</button>
                <button type="submit" class="w-full flex-1 py-2.5 px-4 rounded-xl bg-red-600 text-white font-medium hover:bg-red-500 transition-colors shadow-lg shadow-red-600/20">Delete</button>
            </form>
        </div>
    </div>

    <script>
        // Modal Logic
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            const box = modal.querySelector('.modal-box');
            modal.style.display = "flex";
            setTimeout(() => {
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }

        function closeModal(modal) {
            const box = modal.querySelector('.modal-box');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => {
                modal.style.display = "none";
            }, 150);
        }

        document.querySelectorAll("[data-modal]").forEach(btn => {
            btn.addEventListener("click", function() {
                const modalId = this.dataset.modal;
                if (modalId) {
                    openModal(modalId);

                    if (this.classList.contains("btn-edit")) {
                        document.getElementById("e_name").value = this.dataset.name;
                        document.getElementById("e_email").value = this.dataset.email;
                        document.getElementById("e_cin").value = this.dataset.cin;
                        document.getElementById("e_website").value = this.dataset.website;
                        document.getElementById("e_address").value = this.dataset.address;
                        document.getElementById("editForm").action = "/company/update/" + this.dataset.id;
                    }

                    if (this.classList.contains("btn-delete")) {
                        document.getElementById("deleteForm").action = "/company/delete/" + this.dataset.id;
                    }
                }
            });
        });

        document.querySelectorAll("[data-close]").forEach(btn => {
            btn.addEventListener("click", function(e) {
                e.preventDefault();
                closeModal(this.closest(".custom-modal"));
            });
        });

        window.onclick = function(e) {
            if (e.target.classList.contains('custom-modal')) {
                closeModal(e.target);
            }
        };
    </script>
</x-layouts.app>