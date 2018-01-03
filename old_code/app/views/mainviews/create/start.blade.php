@extends('layouts.mainlayout')
@section('content')
<section class="bdr-top">
    <div class="step">

        @if(Session::has('failed'))
        <div class="alert-message error">
            {{Session::get('failed');}}
        </div>
        @endif

        <span class="creatd">{{trans('messages.whattocreate')}}? </span>

        <ul class="stater">

            <form action='{{URL::to('poststart')}}' method='post'>
                <li>
                    <p>{{trans('messages.wanttostart')}}</p>

                    <select style="height: 44px;font-size: 14px; color: #999;" name='category' required="">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->categoryname}}</option>          
                        @endforeach
                    </select>
                    <p style='display:inline;'>{{trans('messages.projectcalled')}}</p>

                </li>
                <input type="hidden" value="{{Session::get('locale')}}" name="language" id="language">
                <li style='width:85%;margin-left:7%;'>
                    <input  class="text @if($errors->has('title')) has-error @endif" type="text" name='title' placeholder="{{trans('messages.title')}}..." value="{{ Input::old('title') }}" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="">
                    @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                </li>
                <li style='width:86%;margin-left:6%;'>
                    <p style='float:left; line-height: 1.3;'> {{trans('messages.in')}} {{trans('messages.smallcountry')}}</p>

                    <select class="sect-strt @if($errors->has('title')) has-error @endif" style='width: 47%; font-size:13px;color: #7d7d7d !important;' name='country' value="{{ Input::old('country') }}" oninvalid="InvalidCountry(this);" oninput="InvalidCountry(this);" required="true">
                        <option value=''>{{trans('messages.selectcountry')}}</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->countryname}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('country')) <p class="help-block">{{ $errors->first('country') }}</p> @endif
                </li>

                <li  style='width:86%;margin-left:6%;'>

                    <!--                    {{ HTML::image(URL::to('simplecaptcha'),'Captcha') }}
                                        <input type="text" name="project-captcha" style="margin-top: -68px; margin-left: 20px; padding: 10px;" class=" @if($errors->has('project-captcha')) has-error @endif" placeholder="Enter text" required="">-->
                    <input class="start-btn" type="submit" value="{{trans('messages.start')}}" name="commit" style="margin-top: -83px;">
                    @if ($errors->has('project-captcha')) <p class="help-block">{{ $errors->first('project-captcha') }}</p> @endif
                </li>
            </form>
            @if(Config::get('adminconfig.listingfee')!=0)
            <span class="notes-areas"><label>Note:</label><span>You need to pay ${{Config::get('adminconfig.listingfee')}} to list your project in Fundstarter.</span>
            </span>
            @endif
        </ul>

    </div> 

</section>
<script>
    function InvalidMsg(textbox) {
    var lang = $('#language').val();
    if(lang){
        if (textbox.value == '') {
            textbox.setCustomValidity('{{trans("messages2.required")}}');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
}
function InvalidCountry(textbox) {
    var lang = $('#language').val();
    if(lang){
        if (textbox.value == '') {
            textbox.setCustomValidity('{{trans("messages2.requiredcountry")}}');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
}
</script>    
@stop
