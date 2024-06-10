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
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary"
                            href="@@page-link">Bursaries</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>

            </div>
        </div>
    </div>

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
                <div class="container mt-5">
                    <h2 class="text-center">Bursary Application Dates</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark bg-success">
                                <tr>
                                    <th>Province</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($get_provinces_ids as $province_id)
                                    <?php 
                                        $get_province_name = App\Models\global_models\Province::find($province_id->province_id); 
                                        $get_targeted_districts = App\Models\global_models\ProvinceStation::where("province_id",$get_province_name->id)
                                        ->get();  
                                    ?>
                                    <tr>
                                        <th>
                                            <h3 class="text-capitalize">{{ $get_province_name->name }}</h3>
                                        </th>
                                        @foreach($get_targeted_districts as $district)
                                        <tr>
                                            <td></td>
                                            <td>{{ $district->station }}</td>
                                            <td>{{ $district->date }}</td>
                                        </tr>
                                        @endforeach  
                                    </tr>  
                                @empty 

                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <h4>To Qualify, Present the Following:</h4>
                    <ul>
                        <li>Grade twelve results for diploma and degree courses</li>
                        <li>Grade (7, 9, and 12) results for short courses</li>
                        <li>National Registration Card (NRC)</li>
                        <li>Recommendation letter from a chief, headman, church, or former school</li>
                        <li>A non-refundable fee of K100 for short courses, teaching, agriculture, and humanities
                            programs</li>
                        <li>A non-refundable fee of K250 for health sciences (nursing, clinical medicine, and public
                            health)</li>
                    </ul>

                    <h4>Contact Us for More Information:</h4>
                    <p>
                        0973184162 | 0760900354 | 0763982271 | 0967976961 | 0771651211<br>
                        0955151517 | 0771650791 | 0763984089 | 076398310 | 0761745853
                    </p>
                </div>




                <div id="root">
                    <!-- This is where React will render -->
                </div>
                <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
                <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
                <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
                <script type="text/babel">
                    class BursariesCalculator extends React.Component {
            constructor(props) {
              super(props);
              this.state = {
                totalCost: '',
                percentage: '',
                bursaryAmount: '',
                remainingCost: ''
              };
              this.handleChange = this.handleChange.bind(this);
              this.handleSubmit = this.handleSubmit.bind(this);
            }
      
            handleChange(event) {
              this.setState({ [event.target.name]: event.target.value });
            }
      
            handleSubmit(event) {
              event.preventDefault();
              const { totalCost, percentage } = this.state;
              const bursaryAmount = (percentage / 100) * totalCost;
              const remainingCost = totalCost - bursaryAmount;
              this.setState({ bursaryAmount, remainingCost });
            }
      
            render() {
              const { bursaryAmount, remainingCost } = this.state;
              return (
                <div className="container">
                  <h1>Bursaries Calculator</h1>
                  <form onSubmit={this.handleSubmit}>
                    <label htmlFor="totalCost">FEES WITHOUT BURSARIES:</label>
                    <input type="number" id="totalCost" name="totalCost" value={this.state.totalCost} onChange={this.handleChange} required />
              <br/>
                    <label htmlFor="percentage">Percentage of Bursary (%):</label>
                    <input type="number" id="percentage" name="percentage" value={this.state.percentage} onChange={this.handleChange} required />
              <br/>
                    <button type="submit">Calculate</button>
                  </form>
                  {bursaryAmount !== '' && remainingCost !== '' && (
                    <div id="result">
                      <h2>TABULATION:</h2>
                      <p>Bursary Amount: K{bursaryAmount.toFixed(2)}</p>
                      <p>YOU ARE REQUIRED TO PAY: K{remainingCost.toFixed(2)} PER SEMESTER/TERMLY.</p>
                    </div>
                  )}
                </div>
              );
            }
          }
      
          ReactDOM.render(<BursariesCalculator />, document.getElementById('root'));
        </script>
            </div>

        </div>
    </div>
</section>
<!-- /contact -->
@endsection