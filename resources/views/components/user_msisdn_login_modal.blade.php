<div class="modal fade modal-standard" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header modal_head">
          <h5 class="modal-title" id="exampleModalLongTitle">
            <img class="img-fluid" src="{{asset('frontend_theme/images/logo-gemezz-white.png')}}" width="100" alt="Gemezz">
          </h5>          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="needs-validation" action="{{url('/subscription')}}" method="POST" data-parsley-validate novalidate>
            @csrf
            <div class="modal-body">
                <div class="label_div">
                    <label for="" class="col-form-label">{{__('lang.enter_msisdn_number')}}</label>
                </div>
                <div class="form-row align-items-center">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">66</div>
                        </div>
                        <input type="text" class="form-control msisdn" name="msisdn" placeholder="{{__('lang.msisdn_number')}}" required>
                        <div class="invalid-feedback mg-b-10" style="text-align: center">{{__('lang.msisdn_cannot_be_blank')}}</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer " style="justify-content: center">
                <button type="submit" class="btn btn-primary">{{__('lang.send')}}</button>
            </div>
        </form>
      </div>
    </div>
  </div>