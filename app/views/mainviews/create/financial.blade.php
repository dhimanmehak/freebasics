@extends('layouts.mainlayout')
@section('content')

@if(Session::has('failed'))
        <div class="alert-message error">
            {{Session::get('failed');}}
        </div>
        @endif


<?php 
$url_segment = \URL::current();
$url=explode("/",$url_segment);
$url_new=array_reverse($url);

$p_id=Crypt::decrypt($url_new[0]);


?>
<section class="fb-projects-section">
    <div class="container">
      <div class="fb-section-head-wrap">
        <h1 class="fb-section-head">Create Project</h1>
      </div>
    </div>
  </section>
  <section class="fb-pd-tab-section fb-projects-tab-section">
    <div class="container">
      <div class="fb-create-project-box">
        <div class="fb-cp-steps-trigger-wrapper">
          <ul class="fb-cp-steps-trigger">
            <li>
             <a href="{{URL::to('project/start/')}}/<?php echo $url_new[0];?>">
             <button  class="fb-cp-step-button fb-cp-step-one-trigger clickable">
                <span class="fb-cp-step-count">1</span>
                <span class="fb-cp-step-completed-icon" style="display: inline-block;"><i class="icon-checked"></i></span>
                <span class="fb-cp-step-name">Project Details</span>
                </button>
              </a>
            </li>
            <li>
              <button class="fb-cp-step-button fb-cp-step-two-trigger clickable">
                <span class="fb-cp-step-count">2</span>
                <span class="fb-cp-step-completed-icon" style="display: none;"><i class="icon-checked"></i></span>
                <span class="fb-cp-step-name">Financial Details</span>
              </button>
            </li>
            <li>
              <button class="fb-cp-step-button fb-cp-step-three-trigger" disabled="disabled">
                <span class="fb-cp-step-count">3</span>
                <span class="fb-cp-step-completed-icon" style="display: none;"><i class="icon-checked"></i></span>
                <span class="fb-cp-step-name">Submit for Review</span>
              </button>
            </li>
          </ul>
        </div>
        <div class="fb-cp-step-content fb-cp-step-two-content">
            <div class="fb-cp-form-head-wrapper">
              <h2 class="fb-cp-form-head">Financial Details</h2>
              <p class="fb-cp-form-head-para">This section is fixed, meaning you can't change anything once your project is published. <br />Make sure you provide the accurate information.</p>
            </div>
            <form action="{{URL::to('postfinancial')}}" method="post" id="form" >
                <input name='id' type='hidden' value='{{$projectdetails->id}}'>
              <ul class="fb-cp-form-list fb-cp-step-two-form-list">
                <li>
                  <label class="fb-cp-form-label required">Funding Goal</label>
                  <span class="fb-cp-form-input-wrapper">
                    <span class="fb-cp-funding-goal-left-input-wrapper">
                      <input type="text" class="fb-input-text @if($errors->has('fundinggoal')) has-error @endif" name="fundinggoal" required="" value="@if($projectdetails->fundinggoal!=''){{round($projectdetails->fundinggoal)}}@else{{ Input::old('fundinggoal') }}@endif"/>
                      @if ($errors->has('fundinggoal')) <p class="help-block">{{ $errors->first('fundinggoal') }}</p> @endif
                      
                    </span>
                    <span class="fb-cp-funding-goal-right-input-wrapper">
                      <select id="currency_select" name="currencyid">
                       @if(Session::get('currency')=="")
                                        <?php
                                        $currency = Config::get('adminconfig.currency');
                                        Session::put('currency', $currency);
                                        ?>
                                        @endif
                                        @foreach($currencies as $currency)
                                        <option value="{{$currency->id}}"  @if($projectdetails->currencyid=='') @if((Session::has('currency'))&&(Session::get('currency')==$currency->currencytype))selected="selected" @endif @else  @if($projectdetails->currencyid==$currency->id)selected="selected" @endif  @endif @if($projectdetails->projectverified==2) style="display:none;" @endif>{{$currency->currencytype}}</option>
                                        @endforeach


                                        
                     </select>

                    </span>
                  </span>
                  <i class="fb-form-hint">What will be the target goal you want to raise? FreeBasics is a all or nothing site, meaning the money will be transferred only if the entire amount is raised. Make sure you set an achievable target.</i>
                </li>
                <li>
                  <label class="fb-cp-form-label required">Deadline</label>
                  <span class="fb-cp-form-input-wrapper">
                    <span class="fb-cp-deadline-date-input-wrapper fb-date-picker-wrapper">
                     

                       <input type="text" class="fb-input-text" id="deadlineDatepicker" name="fundingduration" placeholder="yyyy-mm-dd"  class="input-group date form_date col-md-5 nokeypress" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="" @if($projectdetails->endingon!='0000-00-00') value="{{$projectdetails->endingon}}"@endif  @if(($projectdetails->projectverified)!=2) id="fundingdur" @endif  @if(($projectdetails->projectverified)==2) readonly @endif >

                    </span>
                    <label class="fb-cp-deadline-or-label" style="display:none">or</label>
                    <span class="fb-cp-deadline-right-input-wrapper"  style="display:none">
                      <select>
                        <option value="">Select Days</option>
                        <option value="">60 days</option>
                        <option value="">30 days</option>
                        <option value="">20 days</option>
                      </select>
                    </span>
                    <i class="fb-form-hint">This will be the main title through which donors can find your title</i>
                  </span>
                </li>
                <li>
                  <label class="fb-cp-form-label">Funds Recipient</label>
                  <span class="fb-cp-form-input-wrapper">
                    <ol class="fb-cp-radio-btn-list">
                      <li>
                        <label class="fb-custom-radio-btn-wrap">
                          <input type="radio" class="fb-custom-radio-btn-input" name="test">
                          <span class="fb-custom-radio-btn-tick"><i class="icon-checked"></i></span>
                          <span class="fb-custom-radio-btn-label">Individual</span>
                        </label>
                      </li>
                      <li>
                        <label class="fb-custom-radio-btn-wrap">
                          <input type="radio" class="fb-custom-radio-btn-input" name="test">
                          <span class="fb-custom-radio-btn-tick"><i class="icon-checked"></i></span>
                          <span class="fb-custom-radio-btn-label">Agency/Legal Entity</span>
                        </label>
                      </li>
                    </ol>
                  </span>
                </li>
                <li>
                  <span class="fb-cp-form-input-wrapper">
                    <span class="fb-cp-three-column-input-wrapper">
                      <input type="text" class="fb-input-text" placeholder="First Name"/>
                    </span>
                    <span class="fb-cp-three-column-input-wrapper">
                      <input type="text" class="fb-input-text" placeholder="Middle Name"/>
                    </span>
                    <span class="fb-cp-three-column-input-wrapper">
                      <input type="text" class="fb-input-text" placeholder="Last Name"/>
                    </span>
                    <span class="fb-cp-form-input-wrapper">
                      <span class="fb-cp-relationship-input-wrapper">
                        <select>
                          <option value="">Relationship with donee</option>
                          <option value="father">Father</option>
                          <option value="mother">Mother</option>
                          <option value="brother">Brother</option>
                          <option value="sister">Sister</option>
                          <option value="friend">Friend</option>
                          <option value="campaigner">Campaigner</option>
                        </select>
                      </span>
                      <span class="fb-cp-dob-input-wrapper fb-date-picker-wrapper">
                        <input type="text" class="fb-input-text" value="dd/mm/yyyy" id="dobDatepicker"/>
                      </span>
                    </span>
                    <span class="fb-cp-form-input-wrapper">
                      <span class="fb-cp-postal-address-input-wrapper">
                        <textarea class="fb-input-textarea">Postal Address</textarea>
                      </span>
                    </span>
                  </span>
                </li>
              </ul>
              <div class="fb-submit-btn-wrapper">
                <button type="submit" class="fb-submit-btn"><i class="icon-right-arrow"></i><span>NEXT</span></button>
              </div>
            </form>
          </div>
         
      </div>
    </div>
  </section>

   

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="{{URL::asset('main/js/bootstrap.min.js');}}"></script>
<script src="{{URL::asset('main/js/jquery-ui.min.js');}}"></script>
<script src="{{URL::asset('main/js/custom.js');}}"></script>
<script src="{{URL::asset('main/js/create-project.js');}}"></script>
<script>
$( function() {
    
    $( "select" ).selectmenu();
    $('#datepicker').datepicker({
      inline: true,
      nextText: '&rarr;',
      prevText: '&larr;',
      showOtherMonths: true,
      dateFormat: 'yy-mm-dd',
      showOn: "both",
      buttonImage: "{{url::asset('main/images/calendar.svg');}}",
      buttonImageOnly: true,
      buttonText: ""
    });
    $('#deadlineDatepicker').datepicker({
      inline: true,
      nextText: '&rarr;',
      prevText: '&larr;',
      showOtherMonths: true,
      dateFormat: 'yy-mm-dd',
      showOn: "both",
      buttonImage: "{{url::asset('main/images/calendar.svg');}}",
      buttonImageOnly: true,
      buttonText: ""
    });
    $('#dobDatepicker').datepicker({
      inline: true,
      nextText: '&rarr;',
      prevText: '&larr;',
      showOtherMonths: true,
      dateFormat: 'yy-mm-dd',
      showOn: "both",
      buttonImage: "{{url::asset('main/images/calendar.svg');}}",
      buttonImageOnly: true,
      buttonText: ""
    });
});
</script>
@stop