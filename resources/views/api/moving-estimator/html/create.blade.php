{!! Former::open_vertical('/api/moving-estimator/html')->method('POST') !!}
{!! Former::hidden('redirect_to',request()->get('redirect_to')) !!}
<div class="moving-estimator-row">
    <div class="moving-estimator-col-sm-6">{!! Former::text('first_name','First Name') !!}</div>
    <div class="moving-estimator-col-sm-6">{!! Former::text('last_name','Last Name') !!}</div>
</div>
{!! Former::email('email','Email')->required() !!}
{!! Former::text('phone','Phone Number')->required() !!}
{!! Former::text('pickup_address_zipcode','Your current home zipcode')->required() !!}
{!! Former::text('destination_address_zipcode','Your new home zipcode')->required() !!}
<div>
    <strong>Choose your move date:</strong>
</div>
<div class="moving-estimator-row">
    <div class="moving-estimator-col">{!! Former::text('move_date_month','Month')->required() !!}</div>
    <div class="moving-estimator-col">{!! Former::text('move_date_day','Day')->required() !!}</div>
    <div class="moving-estimator-col">{!! Former::text('move_date_year','Year')->required() !!}</div>
</div>
{!! Former::select('home_type','Choose your type of home')->options(\App\Options\HomeType::get('---'))->required() !!}
<button type="submit" class="btn btn-primary">Submit</button>
{!! Former::close() !!}