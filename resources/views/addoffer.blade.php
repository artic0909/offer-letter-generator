<x-layouts.app :title="__('Add Offer Letter')">
    <link rel="icon" type="image/png" href="{{ asset('fav.png') }}">
    
    <div class="w-full max-w-5xl mx-auto px-4 py-6 sm:px-6 lg:px-8 pt-4 sm:pt-0">

        <div class="mb-8 flex items-center gap-3">
            <a href="{{ route('dashboard') }}" class="p-2 rounded-lg bg-zinc-900 border border-zinc-800 text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-white">Add Offer Letter</h1>
                <p class="text-sm text-zinc-400 mt-1">Fill in the details below to generate a new offer letter.</p>
            </div>
        </div>

        <form action="{{ route('offer-letter.store') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Company Selection Card -->
            <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800/50 rounded-2xl p-6 shadow-lg shadow-black/20">
                <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-500"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Choose Company
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($companies as $company)
                    <label class="relative flex flex-col items-start gap-3 bg-zinc-950 border border-zinc-800 p-4 rounded-xl cursor-pointer hover:border-purple-500/50 hover:bg-zinc-900 transition-all group [&:has(:checked)]:border-purple-500 [&:has(:checked)]:bg-purple-500/5">
                        <div class="flex items-center w-full justify-between">
                            <span class="font-semibold text-zinc-100">{{ $company->c_name }}</span>
                            <input type="radio" name="company" value="{{ $company->id }}" class="company-radio w-5 h-5 text-purple-600 bg-zinc-900 border-zinc-700 focus:ring-purple-600 focus:ring-2 cursor-pointer">
                        </div>
                        <p class="text-xs text-zinc-500 font-mono">CIN: {{ $company->cin_number }}</p>
                    </label>
                    @endforeach
                </div>
            </div>

            <!-- Company Details -->
            <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800/50 rounded-2xl p-6 shadow-lg shadow-black/20">
                <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"/><rect x="9" y="9" width="6" height="6"/></svg>
                    Company Details
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Date</label>
                        <input type="date" name="date" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Appointed At</label>
                        <input type="text" name="appointed_at" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-medium text-zinc-300">Company Address</label>
                        <textarea name="company_address" rows="3" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors resize-none"></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">CIN Number</label>
                        <input type="text" name="cin_number" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Primary Contact</label>
                        <input type="text" name="primary_contact" value="9874444725" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Company Email</label>
                        <input type="email" name="company_email" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">MD Contact</label>
                        <input type="text" name="md_contact" value="Sekh Arif Hossain - 9007824246" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-medium text-zinc-300">Website</label>
                        <input type="text" name="website" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>
                </div>
            </div>

            <!-- Candidate Details -->
            <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800/50 rounded-2xl p-6 shadow-lg shadow-black/20">
                <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Candidate Details
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Candidate Name</label>
                        <input type="text" name="candidate_name" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Position</label>
                        <input type="text" name="position" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-medium text-zinc-300">Address</label>
                        <textarea name="address" rows="2" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors resize-none"></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Phone</label>
                        <input type="text" name="phone" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Email</label>
                        <input type="email" name="email" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Aadhaar Number</label>
                        <input type="text" name="adhar" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-medium text-zinc-300">Responsibilities (comma separated)</label>
                        <input type="text" name="responsibility" placeholder="Eg: Manage clients, Reporting" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>
                </div>
            </div>

            <!-- Job Details -->
            <div class="bg-zinc-900/50 backdrop-blur-md border border-zinc-800/50 rounded-2xl p-6 shadow-lg shadow-black/20">
                <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-amber-500"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                    Job Details
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Joining Date</label>
                        <input type="date" name="joining_date" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Job Location</label>
                        <input type="text" name="job_location" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Working Hours</label>
                        <input type="text" name="working_hour" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Salary</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-zinc-400">₹</span>
                            <input type="text" name="salary" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white pl-8 pr-4 py-2.5 transition-colors">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Payment Duration</label>
                        <input type="text" name="payment_duration" value="Monthly" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Notice Period</label>
                        <input type="text" name="notice_period" value="30 Days" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>
                    
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-zinc-300">Attendance Present In</label>
                        <input type="text" name="attendence_present_in" value="Register Book" class="w-full rounded-xl bg-zinc-950 border border-zinc-800 focus:ring-purple-500 focus:border-purple-500 text-white px-4 py-2.5 transition-colors">
                    </div>

                    <!-- Allowances -->
                    <div class="md:col-span-2 pt-2">
                        <label class="block text-sm font-medium text-zinc-300 mb-4">Allowances</label>
                        <div class="flex flex-wrap gap-4">
                            @foreach(['travelling' => 'Travelling', 'lunch' => 'Lunch', 'tiffin' => 'Tiffin', 'dinner' => 'Dinner', 'lodging' => 'Lodging'] as $name => $label)
                            <label class="flex items-center gap-2 px-4 py-2 rounded-lg bg-zinc-950 border border-zinc-800 cursor-pointer hover:border-purple-500/50 transition-colors [&:has(:checked)]:border-purple-500 [&:has(:checked)]:bg-purple-500/10">
                                <input type="checkbox" name="{{ $name }}" class="w-4 h-4 rounded border-zinc-700 bg-zinc-900 text-purple-600 focus:ring-purple-600 focus:ring-offset-0">
                                <span class="text-sm font-medium text-zinc-300">{{ $label }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Action -->
            <div class="flex justify-end pt-4 pb-12">
                <button type="submit" class="bg-purple-600 hover:bg-purple-500 text-white font-medium rounded-xl px-8 py-3 transition-colors shadow-lg shadow-purple-600/20 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Save Offer Letter
                </button>
            </div>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".company-radio").on("change", function() {
                let companyId = $(this).val();

                $.ajax({
                    url: "/get-company/" + companyId,
                    method: "GET",
                    success: function(data) {
                        $("input[name='appointed_at']").val(data.c_name);
                        $("textarea[name='company_address']").val(data.c_address);
                        $("input[name='cin_number']").val(data.cin_number);
                        $("input[name='company_email']").val(data.c_email);
                        $("input[name='website']").val(data.c_website);
                    }
                });
            });
        });
    </script>
</x-layouts.app>