@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="container pt-100 pb-100">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 custom__bg p-3">
                <form action="{{ route('ipn.'.$deposit->gateway->alias) }}" method="POST" class="text-center">
                    @csrf

                    <ul class="list-group text-center">
                        <li class="list-group-item bg-transparent">
                            <h2 class="title"><span>@lang('Payment Preview')</span></h2>
                        </li>
                        <li class="list-group-item bg-transparent">
                            <img src="{{$deposit->gatewayCurrency()->methodImage()}}" class="card-img-top" alt="@lang('Image')">
                        </li>
                        <li class="list-group-item bg-transparent">
                            <h3>@lang('Please Pay') {{showAmount($deposit->final_amo)}} {{__($deposit->method_currency)}}</h3>
                        </li>
                        <li class="list-group-item bg-transparent">
                            <h3>@lang('To Get') {{showAmount($deposit->amount)}}  {{__($general->cur_text)}}</h3>
                        </li>
                    </ul>

                    <button type="button" class="mt-4 btn btn--base w-100 btn-round custom-success text-center btn-lg" id="btn-confirm">@lang('Pay Now')</button>
                    <script
                        src="//js.paystack.co/v1/inline.js"
                        data-key="{{ $data->key }}"
                        data-email="{{ $data->email }}"
                        data-amount="{{$data->amount}}"
                        data-currency="{{$data->currency}}"
                        data-ref="{{ $data->ref }}"
                        data-custom-button="btn-confirm"
                    >
                    </script>
                </form>

            </div>
        </div>
    </div>
@endsection
