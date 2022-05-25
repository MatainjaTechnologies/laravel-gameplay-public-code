 <style>
   .align
   {
     text-align: right;
   }
    .col-md-6
    {
      text-align: center;
    }
    .groove {
      border-style: groove;
    }
    .size
    {
      width: 900px;
      height: 500px;
    }
    .col-md-4
    {
      line-height: 50px;
    }
    .modal-content
    {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, 20%);
    }
    .modal-title
    {
      margin: auto;
      font-size: 25px;
      color: white;
    }
    .margin
    {
      margin: 20px;
    }
    .color
    {
      background-color: #1268FB;
    }
 </style> 
<div class="modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content size">
        <div class="modal-header color">
          <h5 class="modal-title" id="exampleModalLabel">DOMAIN DETAILS</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
          <div class="container groove">
            <div class="row">
              <div class="col-md-12 align">
                <div class="row margin">
                  <div class="col-md-4">Name:</div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="domain_name" id="domain_name" placeholder="For e.g.., www.facebook.com">
                  </div>
                </div>
              </div>
              <div class="row margin">
                <div class="col-md-2 align">Source Path:</div>
                <div class="col-sm-2">
                <input type="text" class="form-control" name="source_path" id="source_path" placeholder="For e.g.., www.facebook.com">
              </div>
                <div class="col-md-2 align">Destination Path:</div>
                <div class="col-sm-2">
                <input type="text" class="form-control" name="destination_path" id="destination_path" placeholder="For e.g.., www.facebook.com">
              </div>
                <div class="col-md-2 align">Daily Subscription URL:</div>
                <div class="col-sm-2">
                <input type="text" class="form-control" name="daily_subs_url" id="daily_subs_url" placeholder="For e.g.., www.facebook.com">
              </div>
              </div>
              <div class="row margin">
                <div class="col-md-2 align">Weekly Subscription URL:</div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" name="weekly_subs_url" id="weekly_subs_url" placeholder="For e.g.., www.facebook.com">
                
                </div>
                <div class="col-md-2 align">Monthly Subscription URL:</div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" name="monthly_subs_url" id="monthly_subs_url" placeholder="For e.g.., www.facebook.com">
                </div>
                <div class="col-md-2 align">Yearly Subscription URL:</div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" name="yearly_subs_url" id="yearly_subs_url" placeholder="For e.g.., www.facebook.com">
                </div>
              </div>
              <div class="row margin">
                <div class="col-md-2 align">Renew Subscription URL:</div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" name="renew_subs_url" id="renew_subs_url" placeholder="For e.g.., www.facebook.com">
                </div>
                <div class="col-md-2 align">Subscribe notify URL:</div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" name="subscribe_notify_url" id="subscribe_notify_url" placeholder="For e.g.., www.facebook.com">
                </div>
                <div class="col-md-2 align">Unsubscribe notify URL:</div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" name="unsubscribe_notify_url" id="unsubscribe_notify_url" placeholder="For e.g.., www.facebook.com">
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
</div>