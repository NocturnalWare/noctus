@extends('layouts.master')
@section('content')
<?php $checkoutAmt = session('checkoutAmt');?>
<div style="margin-left:25%;margin-top:15%;color:#000;background-color:#000000; width:50%;min-height:900px;text-align:center">
  <div class="col-sm-12 col-md-12">

   <h2 style="color:#ffffff">Please verify that the information below is correct before entring your credit card details</h2>
  </div>

  <div class="row well pull-right">
    <div style="border:1px solid #000" class="col-sm-12 col-md-12">
        <div class="col-sm-6 col-md-6">
          <label>Email</label>
        </div>
        <div class="col-sm-6 col-md-6">
          {{$customer['email']}}
        </div>
    </div>

    @if($customer['phone'])
      <div style="border:1px solid #000" class="col-sm-12 col-md-12">
        <div class="col-sm-6 col-md-6">
          <label>Phone</label>
        </div>
        <div class="col-sm-6 col-md-6">
          {{$customer['phone']}}
        </div>
      </div>
    @endif

    <div style="border:1px solid #000" class="col-sm-12 col-md-12">
      <div class="col-sm-6 col-md-6">
        <label>Name</label>
      </div>
      <div class="col-sm-6 col-md-6">
        {{$customer['ship_f_name']}} {{$customer['ship_l_name']}}
      </div>
    </div>

    <div style="border:1px solid #000" class="col-sm-12 col-md-12">
      <div class="col-sm-6 col-md-6">
        <label>Street Address</label>
      </div>
      <div class="col-sm-6 col-md-6">
        {{$customer['ship_address1']}} {{$customer['ship_address2']}}
      </div>
    </div>

    <div style="border:1px solid #000" class="col-sm-12 col-md-12">
      <div class="col-sm-6 col-md-6">
        <label>City/State/Zip</label>
      </div>
      <div class="col-sm-6 col-md-6">
        {{$customer['ship_city']}} {{$customer['ship_state']}}, {{$customer['ship_zip']}}
      </div>
    </div>

    <div style="border:1px solid #000" class="col-sm-12 col-md-12">
      <div class="col-sm-6 col-md-6">
        <label>Total including shipping</label>
      </div>
      <div class="col-sm-6 col-md-6">
        ${{substr(Session::get('checkoutAmt'),0,-2)}}.{{substr(Session::get('checkoutAmt'),-2)}}
      </div>
    </div>

    <hr>

    <form action="{{route('completePayment')}}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="hidden" name="data-description" value="{{$checkoutAmt}}">
      <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{env('STRIPE_PK')}}"
        data-amount="10"
        data-name="Eternally Nocturnal"
        data-description= "10"
        data-image="https://www.eternallynocturnal.com/images/blackskull.jpg">
      </script>
    </form>

        <br><br>

        <form action="{{route('createShipping')}}" method="post">
          <input type="hidden" name="checkoutAmt" value="{{$checkoutAmt}}">
          <input type="hidden" name="_token" value="{{csrf_token()}}">

          <button type="submit" style="background-color:#700000;color:#ffffff;border-radius:45px"><b>Edit Shipping Info</b></button>

        </form>
  </div>
</div>
@stop