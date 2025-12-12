<x-layouts.app :title="__('Add Offer Letter')">

    <style>
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 20px;
        }

        .card {
            background: rgba(40, 40, 40, 0.55);
            border: 1px solid #4b4b4b;
            padding: 25px;
            border-radius: 18px;
            margin-bottom: 28px;
            backdrop-filter: blur(12px);
        }

        .card-title {
            color: #e0e0e0;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 18px;
            border-left: 4px solid #3b82f6;
            padding-left: 12px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 18px;
        }

        @media (min-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .label {
            color: #d1d1d1;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        .input-field {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #555;
            background: #1a1a1a;
            color: #e0e0e0;
            transition: 0.2s ease;
        }

        .input-field:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px #3b82f67a;
            outline: none;
            background: #111;
        }

        textarea.input-field {
            height: 90px;
            resize: none;
        }

        .checkbox-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        @media (min-width: 768px) {
            .checkbox-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .btn-submit {
            background: #3b82f6;
            padding: 12px 34px;
            color: white;
            font-size: 16px;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            transition: 0.3s;
            cursor: pointer;
        }

        .btn-submit:hover {
            background: #1d4ed8;
        }
    </style>

    <div class="w-full p-6">

        <div class="page-title">Add Offer Letter</div>

        <form action="{{ route('offer-letter.store') }}" method="POST">
            @csrf

            <!-- Company Selection Card -->
            <div class="bg-gray-800 text-white rounded-xl p-5 shadow-lg w-full">
                <h2 class="text-xl font-semibold mb-4">Choose Company</h2>

                <div style="display: grid; grid-template-columns: repeat(4, 1fr);">

                    <!-- Company 1 -->
                    @foreach ($companies as $company)
                    <label class="flex items-center gap-3 bg-gray-700 p-4 rounded-lg cursor-pointer hover:bg-gray-600 transition">
                        <input type="radio" name="company" value="{{ $company->id }}" class="company-radio w-5 h-5 text-blue-500">
                        <div>
                            <p class="font-semibold">{{ $company->c_name }}</p>
                            <p class="text-sm text-gray-300">CIN: {{ $company->cin_number }}</p>
                        </div>
                    </label>
                    @endforeach


                </div>
            </div>


            <!-- Company Details -->
            <div class="card">
                <div class="card-title">Company Details</div>

                <div class="form-grid">

                    <div>
                        <label class="label">Date</label>
                        <input type="date" name="date" class="input-field">
                    </div>

                    <div>
                        <!-- company name as value -->
                        <label class="label">Appointed At</label>
                        <input type="text" name="appointed_at" class="input-field">
                    </div>

                    <div style="grid-column: span 2;">
                        <!-- company address as value -->
                        <label class="label">Company Address</label>
                        <textarea name="company_address" class="input-field"></textarea>
                    </div>

                    <div>
                        <!-- company cin as value -->
                        <label class="label">CIN Number</label>
                        <input type="text" name="cin_number" class="input-field">
                    </div>

                    <div>
                        <label class="label">Primary Contact</label>
                        <input type="text" name="primary_contact" class="input-field" value="9874444725">
                    </div>

                    <div>
                        <!-- company email as value -->
                        <label class="label">Company Email</label>
                        <input type="email" name="company_email" class="input-field">
                    </div>

                    <div>
                        <label class="label">MD Contact</label>
                        <input type="text" name="md_contact" class="input-field" value="Sekh Arif Hossain - 9007824246">
                    </div>

                    <div style="grid-column: span 2;">
                        <!-- company website as value -->
                        <label class="label">Website</label>
                        <input type="text" name="website" class="input-field">
                    </div>
                </div>
            </div>

            <!-- Candidate Details -->
            <div class="card">
                <div class="card-title">Candidate Details</div>

                <div class="form-grid">

                    <div>
                        <label class="label">Candidate Name</label>
                        <input type="text" name="candidate_name" class="input-field">
                    </div>

                    <div>
                        <label class="label">Address</label>
                        <textarea name="address" class="input-field"></textarea>
                    </div>

                    <div>
                        <label class="label">Phone</label>
                        <input type="text" name="phone" class="input-field">
                    </div>

                    <div>
                        <label class="label">Email</label>
                        <input type="email" name="email" class="input-field">
                    </div>

                    <div>
                        <label class="label">Adhar Number</label>
                        <input type="text" name="adhar" class="input-field">
                    </div>

                    <div>
                        <label class="label">Position</label>
                        <input type="text" name="position" class="input-field">
                    </div>

                    <div style="grid-column: span 2;">
                        <label class="label">Responsibilities (comma separated)</label>
                        <input type="text" name="responsibility" class="input-field" placeholder="Eg: Manage clients, Reporting">
                    </div>
                </div>
            </div>

            <!-- Job Details -->
            <div class="card">
                <div class="card-title">Job Details</div>

                <div class="form-grid">

                    <div>
                        <label class="label">Joining Date</label>
                        <input type="date" name="joining_date" class="input-field">
                    </div>

                    <div>
                        <label class="label">Job Location</label>
                        <input type="text" name="job_location" class="input-field">
                    </div>

                    <div>
                        <label class="label">Working Hours</label>
                        <input type="text" name="working_hour" class="input-field">
                    </div>

                    <div>
                        <label class="label">Salary</label>
                        <input type="text" name="salary" class="input-field">
                    </div>

                    <div>
                        <label class="label">Payment Duration</label>
                        <input type="text" name="payment_duration" class="input-field">
                    </div>

                    <!-- Allowances -->
                    <div class="checkbox-grid" style="grid-column: span 2; margin-top: 10px;">
                        <label class="label"><input type="checkbox" name="travelling"> Travelling</label>
                        <label class="label"><input type="checkbox" name="lunch"> Lunch</label>
                        <label class="label"><input type="checkbox" name="tiffin"> Tiffin</label>
                        <label class="label"><input type="checkbox" name="dinner"> Dinner</label>
                        <label class="label"><input type="checkbox" name="lodging"> Lodging</label>
                    </div>

                    <div>
                        <label class="label">Attendance Present In</label>
                        <input type="text" name="attendence_present_in" class="input-field">
                    </div>

                    <div>
                        <label class="label">Notice Period</label>
                        <input type="text" name="notice_period" class="input-field">
                    </div>
                </div>
            </div>

            <div style="text-align: right; padding-bottom: 40px;">
                <button class="btn-submit">Save Offer Letter</button>
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