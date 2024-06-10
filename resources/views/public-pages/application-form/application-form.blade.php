@extends("layouts/website-layout2")
@section("title")
Application Form
@endsection
@section("content")
<!-- page title -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<section class="page-title-section overlay" data-background="images/backgrounds/back.gif">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Enroll
                            With Us</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>
                <p class="text-light text-lg">Do you have any questions? Just fill out the form below and we'll get back
                    to you as soon as possible.</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<style>
.autocomplete-suggestions {
    border: 1px solid #ccc;
    max-height: 150px;
    overflow-y: auto;
    background-color: #fff;
    position: absolute;
    z-index: 1000;
    width: calc(100% - 10px);
    margin-top: 5px;
}

.autocomplete-suggestion {
    padding: 10px;
    cursor: pointer;
}

.autocomplete-suggestion:hover {
    background-color: #f0f0f0;
}
</style>

@if(@session("success"))
    <div class="modal fade" id="student-number-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<h3 class="text-center text-capitalize mt-3">{{ $new_applicant->name }}</h3>
				<div class="modal-body">
					<h4 class="text-center">Your student number is {{ $new_applicant->student_id }}</h4>
                    <p>
                        <label>Choose payment method to complete your application.</label>
                    </p>
                    <p>
                        <center>
                            <a href="">
                                <input type="radio" value="DPO"> DPO
                            </a>
                            |
                            <a href="">
                                <input type="radio" value="Tingg"> TINGG
                            </a>
                        </center>
                    </p>
				</div>
			</div>
		</div>
    </div>
	<script src="assets/admin/js/jquery-3.5.1.min.js"></script>
	<script src="assets/admin/js/popper.min.js"></script>
	<script src="assets/admin/js/bootstrap.min.js"></script>
	<script>
		$("#student-number-modal").modal("show");			
	</script>
@endif
	
<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                @if(@session("error"))
                    <div class="alert alert-danger"> Unknown error occured. Please try again.</div>
                @endif
                <form action="{{ route('submit-application-form') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input type="text" class="form-control mb-3" id="fullname" name="name" placeholder="">
                        @error("name")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="country">Your Country:</label>
                        <input type="text" class="form-control mb-3" id="country" name="country"
                            placeholder="Type your country">
                        <div id="country-suggestions" class="autocomplete-suggestions"></div>
                        @error("country")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Your Phone Number:</label>
                        <input type="tel" class="form-control mb-3" id="phone" name="phone" placeholder="">
                        @error("phone")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email:</label><br>
                        <input type="text" class="form-control mb-3" id="email" name="email" placeholder="">
                        @error("email")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <label for="program" class="mr-2">Search or Select A Program Of Interest:</label>
                    <div class="form-group">
                        <div class="d-inline-block" style="width: calc(30% - 10px);">
                            <!-- Adjust width as needed -->
                            <input type="text" id="program_search" class="form-control mb-3"
                                placeholder="Type to search programs">
                        </div>
                        <div class="d-inline-block" style="width: calc(50% - 10px);">
                            <!-- Adjust width as needed -->
                            <select id="program" class="form-control mb-3" name="program">
                                <option value="" disabled selected>Select program</option>
                                <?php 
                                    $programs = \App\Models\global_models\Program::get();
                                ?>
                                @forelse($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name}}</option>
                                @empty 

                                @endforelse
                            </select>
                            @error("program")
                                <label class="text-danger"> {{ $message }} </label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="admission_year">Admission Year:</label><br>
                        <select id="admission_year" class="form-control mb-3" name="admission_year"></select>
                        @error("admission_year")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="intake">Intake:</label>
                        <select class="form-control mb-3" name="intake">
                            <option value="">------Select------</option>
                            <option value="january">January</option>
                            <option value="june">June</option>
                            <option value="august">August</option>
                            <option value="december">December</option>
                        </select>
                        @error("intake")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mode">Mode:</label>
                        <select id="mode" name="mode_of_study" class="form-control mb-3">
                            <option value="full_time">Full Time</option>
                            <option value="distance">Distance</option>
                            <option value="online">Online</option>
                        </select>
                        @error("mode_of_study")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="education_level">Education Level:</label>
                        <select id="education_level" class="form-control mb-3" name="education_level" required>
                            <option value="Primary">Primary School</option>
                            <option value="secondary">Secondary School</option>
                            <option value="College Diploma">College</option>
                            <option value="University">University</option>
                            <option value="Postgraduate">Postgraduate</option>
                            <option value="None">None Of the above</option>
                        </select>
                        @error("education_level")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="comments">Describe Your Results According to Your Country of Origin</label>
                        <textarea class="form-control mb-3" id="comments" name="description" rows="4" placeholder="Please list your subjects and scores. For example, in Zambia: BIO: 1, MATH: 5, ENG: 2, SCI: 2."></textarea>
                        @error("description")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nrc_number">National Registration Card / Passport Number / National ID
                            Number:</label><br>
                        <input class="form-control mb-3" type="text" id="nrc_number" name="nrc_number"
                            oninput="this.value = this.value.replace(/[^\w\s]/gi, '');"><br>

                        <input type="hidden" id="time_date" name="time_date" value="2024-05-14 14:04:55">
                        <input type="hidden" id="date" name="date" style="display: none;">
                        @error("nrc_number")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <button type="submit" value="send" class="btn btn-primary">Proceed</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Program search functionality
    const programSelect = document.getElementById('program');
    const programSearchInput = document.getElementById('program_search');

    programSearchInput.addEventListener('input', function() {
        const searchText = this.value.toLowerCase();
        for (let i = 0; i < programSelect.options.length; i++) {
            const option = programSelect.options[i];
            const optionText = option.text.toLowerCase();
            if (optionText.includes(searchText)) {
                option.style.display = '';
            } else {
                option.style.display = 'none';
            }
        }
    });

    // Your existing code
    // ...
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const countries = [{
            code: "au",
            name: "Australia",
            dialCode: "+61"
        },
        {
            code: "br",
            name: "Brazil",
            dialCode: "+55"
        },
        {
            code: "ca",
            name: "Canada",
            dialCode: "+1"
        },
        {
            code: "cn",
            name: "China",
            dialCode: "+86"
        },
        {
            code: "de",
            name: "Germany",
            dialCode: "+49"
        },
        {
            code: "in",
            name: "India",
            dialCode: "+91"
        },
        {
            code: "jp",
            name: "Japan",
            dialCode: "+81"
        },
        {
            code: "mx",
            name: "Mexico",
            dialCode: "+52"
        },
        {
            code: "ng",
            name: "Nigeria",
            dialCode: "+234"
        },
        {
            code: "ru",
            name: "Russia",
            dialCode: "+7"
        },
        {
            code: "za",
            name: "South Africa",
            dialCode: "+27"
        },
        {
            code: "kr",
            name: "South Korea",
            dialCode: "+82"
        },
        {
            code: "gb",
            name: "United Kingdom",
            dialCode: "+44"
        },
        {
            code: "us",
            name: "United States",
            dialCode: "+1"
        },
        {
            code: "zm",
            name: "Zambia",
            dialCode: "+260"
        }
    ];

    const countryInput = document.getElementById('country');
    const suggestionsContainer = document.getElementById('country-suggestions');
    const phoneInput = document.getElementById('phone');
    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "auto",
        separateDialCode: true,
        autoPlaceholder: "polite",
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    countryInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        suggestionsContainer.innerHTML = '';
        if (query) {
            const filteredCountries = countries.filter(country => country.name.toLowerCase().includes(
                query));
            filteredCountries.forEach(country => {
                const div = document.createElement('div');
                div.classList.add('autocomplete-suggestion');
                div.textContent = country.name;
                div.dataset.code = country.code;
                div.dataset.dialCode = country.dialCode;
                suggestionsContainer.appendChild(div);
            });
        }
    });

    suggestionsContainer.addEventListener('click', function(e) {
        if (e.target && e.target.matches('.autocomplete-suggestion')) {
            countryInput.value = e.target.textContent;
            suggestionsContainer.innerHTML = '';
            // Update phone input country
            iti.setCountry(e.target.dataset.code);
        }
    });

    document.addEventListener('click', function(e) {
        if (!countryInput.contains(e.target) && !suggestionsContainer.contains(e.target)) {
            suggestionsContainer.innerHTML = '';
        }
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get current year
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();

    // Select box for admission year
    const admissionYearSelect = document.getElementById('admission_year');
    const yearsToShow = 10; // Number of future years to show

    // Populate admission year select
    for (let i = 0; i < yearsToShow; i++) {
        const year = currentYear + i;
        const option = new Option(year, year);
        admissionYearSelect.add(option);
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const intakeOptions = [{
            month: "January",
        },
        {
            month: "April",
        },
        {
            month: "May",
        },
        {
            month: "June",
        },
        {
            month: "August",
        },
        {
            month: "December",
        },
    ];

    const intakeSelect = document.getElementById('intake');
    const admissionYearSelect = document.getElementById('admission_year');

    // Get current month and year
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth() + 1; // JavaScript months are 0 indexed
    const currentYear = currentDate.getFullYear();

    // Populate admission year select
    const yearsToShow = 10; // Number of future years to show
    for (let i = 0; i < yearsToShow; i++) {
        const year = currentYear + i;
        const option = new Option(year, year);
        admissionYearSelect.add(option);
    }

    // Function to populate intake options based on selected admission year
    function populateIntakeOptions() {
        const selectedYear = parseInt(admissionYearSelect.value);

        // Clear existing options
        intakeSelect.innerHTML = '';

        // Generate intake options dynamically
        intakeOptions.forEach(option => {
            const optionDate = new Date(`${option.month} 1, ${selectedYear}`);
            const optionMonth = optionDate.getMonth() + 1;
            const optionYear = optionDate.getFullYear();

            // Check if the month has passed or if it's the current year
            if (currentYear > optionYear || (currentYear === optionYear && currentMonth >
                optionMonth)) {
                // If the month has passed or it's the current year, skip this option
                return;
            }

            // Otherwise, add the option to the select
            intakeSelect.innerHTML +=
                `<option value="${option.month}</option>`;
        });
    }

    // Initially populate intake options based on current year
    populateIntakeOptions();

    // Event listener for admission year change
    admissionYearSelect.addEventListener('change', populateIntakeOptions);
});
</script>
@endsection