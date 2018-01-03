@extends('layouts.mainlayout')
@section('content')
<style type="text/css">
.fb-home-footer >  div.container
{
	display:none;
}
.fb-home-footer 
{
	padding-top:0px;
}
.fb-footer-developed-by-info
{
	margin-top:0px;
}
</style>
<section class="fb-signup-section">
    <div class="container">
    
       @if(Session::has('success'))
        <div class="alert-message success">
            {{Session::get('success');}}
        </div>
        @endif
        @if(Session::has('failed'))
        <div class="alert alert-warning text-center">
            {{Session::get('failed');}}
        </div>
        @endif
		
		<div class="col-md-12">
		<h3 class="fb-section-head">FAQ<span style="font-size:20px !important">s</span></h3>
		
        <div class="col-md-12 global_goals_us">
		<p class="ques">What is FreeBasics?</p>
		<p>FreeBasics provides you with the world’s first smart funding platform that aligns with each of the UN’s 17 Sustainable development goals.</p>
		
		<p class="ques">How can you support the Global Goals through FreeBasics?</p>
		<p>Align with a goal, take a pledge, show your support and share your voice. Be a part of the revolution across the earth by showing your support and standing by millions of others who are already a part of this Global Revolution.</p>
		
		<p class="ques">How do I create a project?</p>
		<p>To begin with, please sign up on www.freebasics.ca to start a fundraising project; invite your family and friends to contribute towards a cause and request their assistance to spread the word by sharing it through their social network, to reach your target and collect your funds at the end of the fundraiser. </p>
		
		<p class="ques">Are the projects authenticated?</p>
		<p>Yes, at FreeBasics, every project whether raised by an NGO or Individual, mandatorily goes through a due diligence check done by an account manager assigned for the project, before it is approved to be uploaded. Prospective donors are free to make their own checks. Potential projects are expected to have detailed write-ups with relevant information for prospective donors to go through.</p>
		
		<p class="ques">What does crowdfunding means?</p>
		<p>Crowdfunding is a process to raise money through donations from both family and friends or from the public to meet the requirements for a specific cause.</p>
		
		
		<p class="ques">What if the amount collected is short of the target?</p>
		<p>FreeBasics provides 2 options to choose while creating the project:<br/>
		A)"Everything" that you raised can be used for the cause. These are primarily for charity based projects that fall under Goal 1 to Goal 5<br/>
        B)"All or nothing" where the project creator gets the money only if the project is successfully funded. These are for innovations under the Global Goals. Generally, All or Nothing option gives the donors a greater sense of confidence to contribute as there will be more believers and the project creator is confident about raising the required funds for the project. We recommend the project owners to be realistic in their target amount.</p>		
		
			
		
		<p class="ques">What the payment options available to the donors?</p>
		<p>Payment can be made:</p>		
        <p>Via Stripe account</p>
   <p>Via credit or debit card through a secure payment gateway operated by PayUmoney</p>
    <p>Via Visa, Master and American Express cards</p>
	

		
		<p class="ques">When can the project owner get the money that is collected?</p>
		<p>Money received against a particular project is kept in a designated internal escrow account, and released during the 1st week of each month.</p>
		
		
		
		<p class="ques">Can I raise funds for another person?</p>
		<p>Of course, FreeBasics works under the premise that a third party’s genuine appeal on behalf of the beneficiary is ‘Humanity at work’, and funds can be raised for another person. The funds will be transferred directly to the beneficiary’s account after verification of bank details.</p>
		
		<p class="ques">Can the Goal amount be changed at a later date?</p>
		<p>This can be done against a request email to FreeBasics, and we will change the target amount for you. If you feel the original amount is not convincing, feel free to reduce the amount and this can be increased at a later date with a new higher project vision.</p>
		
		<p class="ques">Can I make changes or improvement to the project details directly?</p>
		<p>Except the amount and the end date, all other details can be amended when the user signs in and saves the changes and the changes will reflect on the website.</p>
		
		<p class="ques">Are the details of the people who have donated to the cause available?</p>
		<p>Yes, the summary of payments made towards your cause and projects can be downloaded from the platform.  However, please be aware that donors are given an option to withhold their identity as they may not wish to be identified and remain anonymous. Such names will not appear on the summary of donations. Further each time a donation is made to your project, an automated email will be sent to your registered email address.</p>
		
		<p class="ques">As a donor, can the donation amount be refunded in case some trust issues are noticed after the payment?</p>
		<p>Payments for individual projects are made directly with FreeBasics acting only as a gateway between the cause and the donor. However, in case there is an issue that is noticed please bring it to our notice and we will investigate and try to get a refund but without any direct obligations.</p>
		
		<p class="ques">Can donations be arranged as standing instructions?</p>
		<p>Yes, this can be done and relevant options are being worked to be included on the platform.</p>
		
		
		<p class="ques">What is the minimum amount of donation that can be made?</p>
		<p>For Indian donors, the minimum amount is INR 100</p>
		<p>For Overseas donors, the minimum amount is $10</p>
		
		<p class="ques">Does the donor need to sign any documents?</p>
		<p>Only standing instructions for recurring payments need to be signed and returned to FreeBasics; all the remaining processes are online.</p>

       	<p class="ques">Does the donor get a receipt?</p>
		<p>Yes, FreeBasics ensures each donor gets a receipt. If the recipient is an NGO with an 80G certification, the same is sent by the organization to the donor.</p>
		
		
		
		<p class="ques">Can a minor be a beneficiary for a crowdfunding project?</p>
		<p>Yes, a minor can be a beneficiary but the proceeds will be sent to the legal guardian whose identity will be authenticated via our on-boarding process.</p>
		
		<p class="ques">How is Freebasics different from other platforms?</p>
		<p>Your time and money spent on our platform is aligned with the global framework of 17 Sustainable Development Goals rolled out by the United Nations. We bring, fund, share and report the impact created by you and your network under each of these goals. We thus become part of the global contributing factor to the success of Agenda 2030.</p>
		
		
		<p class="ques">What are the documents required for setting up a B2B account with FreeBasics (for NGOs)?</p>
		<p>1.Certificate of Incorporation/Registration</p>
       <p>2. PAN Card Copy</p> 
       <p>3. 80G Registration (optional)</p>
       <p>4. Bank Account details </p>
       <P>5. FCRA Certificate and Bank details</p> 
    <p>Copies of these are to be uploaded on to Freebasics.ca website for due diligence check prior to approval and release onto live webpage.</p>
		
		
		<p class="ques">Can foreign funds be donated to a project?</p>
		<p>The foreign funds receiving option will be enabled only for those projects that have a valid FCRA license and comply with all banking and statutory compliances and laws.</p>
		
		
		<p class="ques">How does it help to raise funds through FreeBasics rather than an organization owned Website?</p>
		<p>An organisation owned website would have limitations of creating the necessary awareness to attract a large number of potential donors towards the project. Even with the awareness, questions about the authenticity of the project would always linger on the minds of the potential donor.  However, through FreeBasics, the donor has an option to view a large number of projects sorted by preference of the SDGs and duly verified through a due diligence process put in place to ensure authenticity.</p>
		
		
		<p class="ques">Can a donor donate to more than one project?</p>
		<p>Yes, by all means the donor is welcome to donate to all projects of their interest.</p>
		
		
		<p class="ques">Can a project owner upload more than one project?</p>
		<p>Yes, project owners are welcome to upload more than one project.</p>		
		
		
		
		</div>
		
		</div>
      <div class="fb-login-box" style="display:none;">
        <div class="fb-signup-right">
          <!-- <p class="fb-signup-top-text">Be the first of your friends to join the global revolution. <strong>Sign up now!</strong></p> -->
                   <div class="fb-signup-form-wrapper">
            <form action="{{URL::to('dologin');}}"  method="post" id="formzip">
            
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="{{url::asset('main/js/bootstrap.min.js');}}"></script>
<script src="{{url::asset('main/js/jquery-ui.min.js');}}"></script>
<?php $baseurl = url(); ?>
 <script>

  $('.FAB').on('click', function () {
  $(this).closest('.user-input').toggleClass('show-input');
  $(this).find(".icon-add").toggleClass("rotate");
});

   
        $('#currencyselect').on('selectmenuchange', function () {
            var url = '<?php echo $baseurl; ?>';
            dataString = $(this).val();
            $.ajax({
                type: "POST",
                url: url + "/setcurrencysession",
                data: "currency=" + dataString,
                success: function (data) {
                    location.reload();
                }
            });
        });

    </script>

      <script>
        setInterval(function () {
            //alert("Hello"); 
        }, 86400000);
    </script>



@stop
