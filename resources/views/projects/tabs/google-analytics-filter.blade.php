<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">Google Analytics Search Filter</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-hover" id="dataTable">
                  <thead class="btn-inverse-secondary">
                    <tr>
                        <th>Landing Page Path</th>
                        <th>GA Page Path</th>
                        <th>Sessions</th>
                        <th>Change % Sessions</th>
                        <th>Goal Conversion Rate All</th>
                        <th>Change % Goal Conversion Rate All</th>
                        <th>Transaction Revenue</th>
                        <th>Change % Transaction Revenue</th>
                        <th>Eccomerce Conversion Rate</th>
                        <th>Change % Eccomerce Conversion Rate</th>
                        <th>Bonus Rate</th>
                        <th>Average Time On Page</th>
                        <th>Losing Traffic</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($analytics as $key => $analytic)
                    <tr>
                      <td>{{$analytic->landing_page_path}}</td>
                      <td>{{$analytic->ga_page_path}}</td>
                      <td> {{$analytic->sessions}}</td>
                      <td> {{$analytic->change_sessions}}</td>
                      <td> {{$analytic->goal_conversion_rate_all_goals}}</td>
                      <td> {{$analytic->change_goal_conversion_rate_all_goals}}</td>
                      <td> {{$analytic->transaction_revenue}}</td>
                      <td> {{$analytic->change_transaction_revenue}}</td>
                      <td> {{$analytic->ecommerce_conversion_rate}}</td>
                      <td> {{$analytic->change_ecommerce_conversion_rate}}</td>
                      <td> {{$analytic->bounce_rate}}</td>
                      <td> {{$analytic->avg_time_on_page}}</td>
                      <td> {{$analytic->losing_traffic}}</td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</div>
