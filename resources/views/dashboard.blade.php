<x-layouts.app :title="__('Dashboard')">
    <link rel="icon" type="image/png" href="{{ asset('fav.png') }}">
    
    <div class="flex h-full w-full flex-1 flex-col gap-6 pt-4 sm:pt-0">
        
        <!-- Header & Search -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-zinc-900/50 backdrop-blur-md border border-zinc-800/50 rounded-2xl p-6 shadow-lg shadow-black/20">
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-white">Generated Offers</h2>
                <p class="text-zinc-400 text-sm mt-1">Manage and track your candidate offer letters.</p>
            </div>

            <div class="flex items-center gap-3 w-full md:w-auto">
                <form action="{{ route('dashboard') }}" method="GET" class="relative w-full md:w-80">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-zinc-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" name="search" placeholder="Search name, email, phone..."
                        value="{{ $search ?? '' }}" class="block w-full p-2.5 pl-10 text-sm rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white placeholder-zinc-500 transition-colors shadow-inner">
                    <button type="submit" class="hidden"></button>
                </form>
                
                <a href="{{ route('offer-letter.add') }}" class="hidden md:flex items-center gap-2 bg-purple-600 hover:bg-purple-500 text-white font-medium rounded-xl px-4 py-2.5 transition-colors shadow-lg shadow-purple-600/20 whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    New Offer
                </a>
            </div>
        </div>

        <!-- Table Container -->
        <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800/50 rounded-2xl shadow-lg overflow-hidden flex-1 flex flex-col">
            <div class="overflow-x-auto flex-1">
                <table class="w-full text-sm text-left text-zinc-300">
                    <thead class="text-xs text-zinc-400 uppercase bg-zinc-950/50 border-b border-zinc-800/50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium tracking-wider">#</th>
                            <th scope="col" class="px-6 py-4 font-medium tracking-wider">Candidate</th>
                            <th scope="col" class="px-6 py-4 font-medium tracking-wider">Contact Info</th>
                            <th scope="col" class="px-6 py-4 font-medium tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/50">
                        @forelse ($offers as $key => $offer)
                        <tr class="hover:bg-zinc-800/30 transition-colors group">
                            <td class="px-6 py-4 whitespace-nowrap text-zinc-500">{{ $key + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-zinc-100">
                                {{ $offer->candidate_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="text-zinc-300">{{ $offer->email }}</span>
                                    <span class="text-xs text-zinc-500">{{ $offer->phone }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-2 opacity-100 md:opacity-0 md:group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('offer-letter.view', $offer->id) }}" target="_blank" class="p-2 text-blue-400 hover:text-blue-300 hover:bg-blue-400/10 rounded-lg transition-colors" title="View Document">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </a>
                                    <a href="/offer-letter/edit/{{$offer->id}}" class="p-2 text-amber-400 hover:text-amber-300 hover:bg-amber-400/10 rounded-lg transition-colors" title="Edit Record">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                                    </a>
                                    <button type="button" onclick="openDelete({{ $offer->id }})" class="p-2 text-red-400 hover:text-red-300 hover:bg-red-400/10 rounded-lg transition-colors" title="Delete Record">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-zinc-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 mb-4 text-zinc-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    <p class="text-lg font-medium text-zinc-400">No offer letters found</p>
                                    <p class="text-sm mt-1">Generate your first offer letter to get started.</p>
                                    <a href="{{ route('offer-letter.add') }}" class="mt-4 text-purple-400 hover:text-purple-300 transition-colors text-sm font-medium">Create Offer Letter &rarr;</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($offers->hasPages())
            <div class="p-4 border-t border-zinc-800/50 bg-zinc-950/30">
                <!-- Fallback to default pagination, ideally Tailwind styled -->
                {{ $offers->appends(['search' => $search ?? ''])->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Mobile Floating Add Button -->
    <a href="{{ route('offer-letter.add') }}" class="md:hidden fixed bottom-6 right-6 bg-purple-600 text-white p-4 rounded-full shadow-lg shadow-purple-600/30 z-50 hover:bg-purple-500 transition-transform hover:scale-105 active:scale-95 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    </a>

    <!-- DELETE MODAL -->
    <div id="modalDelete" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity" aria-modal="true" role="dialog">
        <div class="bg-zinc-900 border border-zinc-800 w-full max-w-sm rounded-2xl p-6 text-center shadow-2xl transform scale-95 transition-transform" id="modalDeleteBox">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-500/10 mb-6">
                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Delete Record</h3>
            <p class="text-sm text-zinc-400 mb-8">Are you sure you want to delete this offer letter? This action cannot be undone.</p>
            
            <form id="deleteForm" method="POST" class="flex gap-3 w-full">
                @csrf
                @method('DELETE')
                <button type="button" data-close class="w-full flex-1 py-2.5 px-4 rounded-xl bg-zinc-800 text-white font-medium hover:bg-zinc-700 transition-colors">Cancel</button>
                <button type="submit" class="w-full flex-1 py-2.5 px-4 rounded-xl bg-red-600 text-white font-medium hover:bg-red-500 transition-colors shadow-lg shadow-red-600/20">Delete</button>
            </form>
        </div>
    </div>

    <script>
        function openDelete(id) {
            document.getElementById("deleteForm").action = "/offer-letter/delete/" + id;
            const modal = document.getElementById("modalDelete");
            const box = document.getElementById("modalDeleteBox");
            modal.style.display = "flex";
            // trigger animation
            setTimeout(() => {
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }

        document.querySelectorAll("[data-close]").forEach(btn => {
            btn.onclick = (e) => {
                e.preventDefault();
                closeDelete();
            };
        });

        function closeDelete() {
            const modal = document.getElementById("modalDelete");
            const box = document.getElementById("modalDeleteBox");
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
            setTimeout(() => {
                modal.style.display = "none";
            }, 150);
        }

        window.onclick = function(e) {
            const modal = document.getElementById("modalDelete");
            if (e.target === modal) {
                closeDelete();
            }
        };
    </script>
</x-layouts.app>