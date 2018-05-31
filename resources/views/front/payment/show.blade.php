@extends('layout.front')



@section('content')

<div class="row justify-content-center">
    <div class="col-6">
        <div>
            <h2>@lang('frontLang.reservation-saved-success')</h2>
        </div>
        <br>
        <form class="bg-light p-3" method="POST">
            <div class="make-payment-title"> 
                <h2>@lang('frontLang.make-payment')</h2>
            </div>
            <div class="form-group">
                <label for="cardName" class="col-sm-8 col-form-label">@lang('frontLang.card-name')</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="cardName" id="cardName" placeholder="" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="cardNo" class="col-sm-8 col-form-label">@lang('frontLang.card-no')</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="cardNo" id="cardNo" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="cardNo" class="col-sm-6 col-form-label">@lang('frontLang.card-expiration')</label>
                <div class="col-sm-9">
                    <div class="row ">
                        <div class="col-5">
                              <select class="form-control" name="month" id="month">
                                    <option value="0">@lang('frontLang.month')</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                              </select>
                        </div>
                        <div class="col-5">
                            <select class="form-control" name="year" id="year">
                                <option value="0">@lang('frontLang.year')</option>
                                @php
                                    $this_year = \Carbon\Carbon::now()->year ;
                                    echo $this_year;
                                    for ($i=0; $i < 21 ; $i++) { 
                                        $option = '<option value="%d">%d</option>';
                                        printf($option, $this_year, $this_year);
                                        $this_year++;
                                    }
                                @endphp
                              </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="cvc" class="col-sm-8 col-form-label">CVC</label>
                <div class="col-3">
                    <input type="text" maxlength="3" class="form-control" name="cvc" id="cvc" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <br>
                    <button type="submit" class="btn btn-lg btn-success">Make payment</button>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection