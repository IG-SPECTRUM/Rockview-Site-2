@extends("layouts/website-layout")
@section("title")
  Bursaries
@endsection
@section("content")
<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/back.gif">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Tuition
                            fees</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>

            </div>
        </div>
    </div>
    <marquee behavior="alternate" class="disclaimer" style="background-color: black; color: white;;">
        Disclaimer: Note that The sponsorship /Bursary is <strong><u>STRICTLY ON SCHOOL FEES</u></strong>, and NOT
        accommodation fee and other mandatory requirements as per your Programme.
    </marquee>
</section>
<!-- /page title -->

<!-- contact -->
<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title"></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <table>
                    <thead>
                        <tr>
                            <th>Program</th>
                            <th>Qualification</th>
                            <th>Tuition Fees</th>
                            <th>Bursary Percentage</th>
                            <th>Bursary Amount</th>
                            <th>Amount to be Paid</th>
                            <th>Apply</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($programs as $program)
                            <tr>
                                <td data-label="Courses on Offer" class="text-capitalize">{{ $program->name }}</td>
                                <td data-label="Courses on Offer" class="text-capitalize">{{ $program->qualification }}</td>
                                <td data-label="Tuition Fees">K{{ $program->tuition_fee }}</td>
                                <td data-label="Bursary Percentage"><input type="number" min="0" max="100"
                                        class="percentage-input form-control" style="height:40px; width:150px"></td>
                                <td data-label="Bursary Amount"></td>
                                <td data-label="Amount to be Paid"></td>
                                <td data-label="Apply"><a href="{{ route('show-application-form') }}">Apply</a></td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
                <div class="float-right">
                    {{ $programs->links() }}
                </div>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var percentageInputs = document.querySelectorAll('.percentage-input');
                    percentageInputs.forEach(function(input) {
                        input.addEventListener('input', function() {
                            var row = this.closest('tr');
                            var tuitionFeesCell = row.querySelector(
                                '[data-label="Tuition Fees"]');
                            var tuitionFees = parseFloat(tuitionFeesCell.textContent.replace(
                                'K', '').replace(',', ''));
                            var percentage = parseFloat(this.value);
                            if (!isNaN(percentage)) {
                                var bursaryAmount = (percentage / 100) * tuitionFees;
                                var bursaryAmountCell = row.querySelector(
                                    '[data-label="Bursary Amount"]');
                                bursaryAmountCell.textContent = 'K' + bursaryAmount.toFixed(2)
                                    .toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                var amountToBePaidCell = row.querySelector(
                                    '[data-label="Amount to be Paid"]');
                                amountToBePaidCell.textContent = 'K' + (tuitionFees -
                                    bursaryAmount).toFixed(2).toString().replace(
                                    /\B(?=(\d{3})+(?!\d))/g, ",");
                            } else {
                                row.querySelector('[data-label="Bursary Amount"]').textContent =
                                    '';
                                row.querySelector('[data-label="Amount to be Paid"]')
                                    .textContent = '';
                            }
                        });
                    });
                });
                </script>
                <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }

                th,
                td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

                th {
                    background-color: #f2f2f2;
                }

                @media only screen and (max-width: 600px) {
                    table {
                        border: 0;
                    }

                    table thead {
                        display: none;
                    }

                    table tr {
                        margin-bottom: 10px;
                        display: block;
                        border: 1px solid #ddd;
                    }

                    table td {
                        display: block;
                        text-align: right;
                        border: none;
                    }

                    table td::before {
                        content: attr(data-label);
                        float: left;
                        font-weight: bold;
                    }
                }

                .disclaimer {
                    width: 100%;
                    background-color: #f9f9f9;
                    text-align: center;
                    padding: 10px 0;
                    border: 1px solid #ddd;
                    margin-bottom: 20px;
                }
                </style>
            </div>

        </div>
    </div>
</section>
<!-- /contact -->


<!-- /gmap -->
@endsection