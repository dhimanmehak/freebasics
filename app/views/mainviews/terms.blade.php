@extends('layouts.mainlayout')
@section('content')

<style type="text/css">
.terms ul li
{
	padding:10px;
	list-style-type:disc;
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
		
		<div class="col-md-12 terms">
		<h3 class="fb-section-head">Terms and Conditions</h3>
		<p style="font-size:16px;">At FreeBasics Inc., we are committed to facilitating needs through crowd funding, for creative, profit and not-for-profit projects. We have developed this policy to describe the process and respective obligations of the users of the website and project creators. By using the website and the services of the FreeBasics platform, you are agreeing to the Terms of Use mentioned here and you are also agreeing to the <strong>Privacy Policy</strong>. This is applicable to all users who visit the site. Any changes to the Terms and Conditions will be notified on the Freebasics website and as permissible you will also be notified through email. These terms of use, includes all service transactions including how the money through pledges or donations is collected, when you are actually charged by backing projects, whether project backing can be changed or cancelled and how project creators can contact users to provide project rewards. Although there are no fees to set up a Project, a small percentage of each donation will be charged as fees for our Services, which includes charges through global payment gateways. Please see our Fees section below for the details.</P>
		
		<p style="font-size:16px;">The Services that are offered here are provided by the FreeBasics platform, which may include View of Content, Registration, Project Creation of self or others, Donations, and other Services and Users (which may include services that allow users to simply “Pledge” for a particular cause or otherwise interact with the Platform or Services). Among other features, the Services are designed to allow a user to submit a project for fundraising to the Platform to accept monetary donations from registered “Donors”who are wanting to contribute funds to the Project. For purposes hereof, the term Beneficiary shall also be deemed to include any individual(s) designated as a beneficiary of a Project.</p>
		
		<p style="font-size:16px;">
		By defining the Terms and Conditions, our intent is to ensure your awareness of the details of every transactionand the legal bindings of using the services provided by FreeBasics.
		</p>
		
		<h3>I’M A DONOR FUNDING A PROJECT</h3>
		<h3>These are the terms that apply when you’re backing a project:</h3>
		
		<ul style="font-size:16px;" style="list-style-type:disc !important;">
		
<li>	You agree to provide your payment information when you pledge but your payment will be collected immediately or maybe delayed based on the category of projects orif, at the time of the project’s funding deadline, the project has reached its fundraising goal. The exact amount you pledged is the amount FreeBasics Inc. will collect.  As applicable in that particular category, if the Project hasn’t reached its fundraising goal, you will not be charged, no funds will be collected, and no money will change hands.</li>
<li>	In order to contribute to a Project, you will be required to provide FreeBasics information regarding its credit card or other payment instrument. You represent and warrant to FreeBasics that such information is true and that you are authorized to use the payment instrument. You agree that a certain minimum Donation amount may apply, and that all Donation payments are final and will not be refunded unless FreeBasics, in its sole discretion, agrees to issue a refund. You may have the option to contribute recurring period Donations, and in electing to contribute on a recurring basis, you, <br/>
(i) agree to promptly update your account information with any changes (for example, a change in your billing address or credit card expiration date) that may occur and to pay the Donation amount that you specify, and<br>
(ii) hereby authorize FreeBasics to bill your payment instrument in advance on a periodic basis until you terminate such periodic payments, which can be done at any time through the Platform.</li>

<li>In some cases we reserve the right to charge your credit card to be held in escrow for the project creator. FreeBasics Inc. at its sole discretion and its payment partners may authorize or reserve a charge on your credit card (or whatever payment method you use) for any amount up to the full pledge, at any time between the pledge and the collection of funds.</li>

<li>You acknowledge and understand that projects are not charities to which you can make tax-deductible charitable contributions. You understand and acknowledge that FreeBasics is not a charity. As used in this Agreement, the term "Project" does not only refer to a Charity, and you acknowledge that not all contributions to Projects are not deductible under your jurisdiction’s applicable tax laws and regulations.</li>

<li>The services rendered by Freebasics are an administrative platform only. FreeBasics facilitates the Donation transaction between Project Creators and Users, but is not a party to any agreement between a Project Creator and a User, or between any user and a Charity. FreeBasics is not a broker, agent, financial institution, creditor or insurer for any user. FreeBasics has no control over the conduct of, or any information provided by, a Project Organizer or a Charity, and FreeBasics hereby disclaims all liability in this regard to the fullest extent permitted by applicable law.

</li>

<li>FreeBasics does not guarantee that a Project will obtain a certain amount of Donations or any Donations at all. We do not personally endorse any Project, or Project Creator, and we make no guarantee, explicit or implied, that any information provided through the Services by a user is accurate. We expressly disclaim any liability or responsibility for the success of any Project, or the outcome of any fundraising purpose. You, as a Donor, must make the final determination as to the value and appropriateness of contributing to any Project, or Project Creator.</li>


<li>We do not and cannot verify the information that Project Creators supply, nor do we guarantee that the Donations will be used in accordance with any fundraising purpose prescribed by a Project Creator. We assume no responsibility to verify whether the Donations are used in accordance with any applicable laws; such responsibility rests solely with the Project Creator, as applicable. While we have no obligation to verify that the use of any funds raised is in accordance with applicable law and these Terms of Service, we take possible fraudulent activity and the misuse of funds raised very seriously.</li> 

<li>From time to time, FreeBasics may place a hold on a user account (a "Hold"), restricting Withdrawals by a Project Creator. Some of the reasons that we may place a Hold on an Account include the following:<br/>
 (i) if we have reason to believe that(in our sole discretion) information provided by a project creator is false, fraudulent  or misleading, or, that funds received are being used inappropriately, or, in a prohibited manner,<br/>
 (ii) if the funds available should be provided directly to a person other than the Project Creator (such as a legal beneficiary or person entitled by law to act on behalf of a Project Creator),<br/>
 (iii) if we have reason to believe that a ProjectCreated or ProjectCreator has violated these Terms of Service, or <br/>
 (iv) if required in order to comply with a court order, subpoena, writ, injunction, or as otherwise required under each country’s applicable laws and regulations. If you have questions about a project on hold we may have placed on your account, or need information about how to resolve this Hold, please contact us at "support@FreeBasics.com"</li>

<li>Further, You acknowledge and agree that the provision of a reward is at the sole discretion of the Project Creator and that FreeBasics Inc. makes no representations or warranties with respect to the provision of a project reward. Rewards are incentives designated by the Project Creators themselves, therefore FreeBasics Inc. is not responsible for any alterations to a reward at any point during or after a project. You further acknowledge and agree that the provision of a reward is in no way indicative of charitable giving and will not be tax-deductible. The date listed on each reward is the project creator’s estimate of when they will provide the reward — not a guarantee to fulfill by that date. The schedule may change as the creator works on the project. We ask creators to think carefully, set a date they feel confident they can work toward, and communicate with backers about any changes.</li>

<li>To deliver rewards, the creator might need information from you, such as your mailing address. They will request that information after the Project has succeeded. To receive the reward, you will need to provide the information in a reasonable amount of time.</li>

<li>FreeBasics Inc. does not offer refunds. Responsibility for finishing a project lies entirely with the project creator. FreeBasics Inc. does not hold funds on the project creator’s behalf, cannot guarantee the project creator’s work, and does not offer refunds. FreeBasics Inc. will in no way be liable for project creator’s failure to deliver a reward to a user.</li>
</ul>
		
		<h3>I am a project creator seeking crowdfunding</h3>
		<p style="font-size:16px;">These are the terms that apply when you’re backing a project either for yourself or a worthy cause:</p>
		
		<ul style="font-size:16px;" style="list-style-type:disc;">
		<li>You, as a Project Creator, represent, warrant, and covenant that<br/>
		(i) all information you provide in connection with a Project/Project is accurate, complete, and not otherwise designed to mislead, defraud, or deceive any user;<br/>
		(ii) You are legally bound and liable to provide accurate information about the details of the cause<br/>
		(iii) All donations contributed to your Project/Project will be used solely as described in the materials that you post;<br/>
		(iv) you will comply with your jurisdiction’s applicable laws and regulations when you solicit funds, particularly, but not limited to, laws relating to your marketing and solicitation for your project; and <br/>
		(v) to the extent you share with us any personal data of any third party for any purpose, including the names, email addresses and phone numbers of your personal contacts, you have the authority (including any necessary consents), as required under applicable law, to provide us with such personal data and allow us to use such personal data for the purposes for which you shared it with us. You authorize FreeBasics, and FreeBasics reserves the right to, provide information relating to your Project/Project with donors and beneficiaries of your Project, and with law enforcement or to assist if in any investigation.</li>
		
		
		
		
		



		</ul>
		</p>
		<p style="font-size:16px;">Based on the specific category, you agree that payment will only be collected from users if, at the time of the project’s funding deadline, the project has reached its fundraising goal. The exact amount pledged for the project is the amount FreeBasics Inc. will collect from users, less any applicable fees and taxes. If the Project has not reached its fundraising goal, no funds will be collected, and no money will change hands, which amounts to the payout term, ‘All or Nothing’.
		</p>
		<p style="font-size:16px;">If the cause falls under basic humane needs then the total amount of the funds collected will be transferred to your account, minus the transactional fees, which amounts to payout term, ‘Everything’</p>
		<p style="font-size:16px;">Once the project has been funded, you can only cancel or change your pledge by making special arrangements directly with the creator.</p>
		<p style="font-size:16px;">The date provided to users is your best estimate as to when you believe you will be able to provide a reward. You acknowledge that, while there is no guarantee to provide the reward by that date, that you will make best efforts to fulfill the reward by the listed date. The schedule may change as the project progresses. You agree to think carefully, set a date that you feel confident you can work toward, and communicate with users about any changes.</p>
		<p style="font-size:16px;">You agree that you and your organization are solely responsible for fulfillment of reward obligations and delivery of rewards to users. You agree that any obligations with respect to rewards are between you and the user and that FreeBasics Inc. shall in no way be liable for any failure on the part of the project creator to fulfill the reward.</p>
		<p style="font-size:16px;">FreeBasics Inc. does not offer refunds. Responsibility for finishing a project lies entirely with the project creator. FreeBasics Inc. does not hold funds on the project creators’ behalf, cannot guarantee creators’ work, and does not offer refunds.</p>
		
		<h3>Mobile Services: </h3>
				
		<ul style="font-size:16px;" style="list-style-type:disc;">
		<li>The Services include certain services that are available via a mobile device, including <br/>
		(i)	the ability to upload content to the Platform via a mobile device;	<br/>
		(ii) the ability to browse the Platform from a mobile device and <br/>
		(iii) the ability to access certain features through an application downloaded and installed on a mobile device (collectively, the "Mobile Services"). To the extent you access the Services through a mobile device, your wireless service carrier's standard charges, data rates and other fees may apply. In addition, downloading, installing, or using certain Mobile Services may be prohibited or restricted by your carrier, and not all Mobile Services may work with all carriers or devices.<br/>
		</li>
				
		
		</ul>
		
		<p style="font-size:16px;">By using the Mobile Services, you agree that we may communicate with you regarding FreeBasics and other entities by SMS, MMS, text message or other electronic means to your mobile device and that certain information about your usage of the Mobile Services may be communicated to us. We shall comply with any additional requirements that may apply under local laws and regulations before communicating with you in this manner. In the event that you change or deactivate your mobile telephone number, you agree to promptly update your FreeBasics account information to ensure that your messages are not sent to the person that acquires your old number.</p>
		
		<h3>CONDUCT FOR EVERY USER</h3>
		<p style="font-size:16px;">You are solely responsible for all content submitted, Project descriptions, comments, images, videos, information, data, text, music, sound, software, photographs, graphics, or other content that is uploaded, posted, published via the FreeBasics Services. FreeBasics, in its sole discretion has the rights to freeze, withhold or terminate the use of their services for any kind of content and/or use of services that is deemed illegal or prohibited by law. Also, on agreement of these Terms of Use, FreeBasics reserves the right to view and orinvestigate any user, by engaging public or private organizations, including, but not limited to, collection agents, and private investigators, and local, state, federal and if applicable international agencies, and may take appropriate action against any user who, violates the terms or spirit of the Terms and Conditions.<br/> 
			
       </p>
		
		<ul style="font-size:16px;" style="list-style-type:disc;">
		<li>As a User of the FreeBasics Services, you are agreeing <strong>NOT TO</strong> use the FreeBasics Services to fund or encourage any the following activities that may include:<br/>
		- Activities that partially or completely violates any law or governmental regulation in the countries included in the transactions;<br/>
		- Activities that promote use of illegal drugs, narcotics, controlled substances, steroids,or other products that present a risk to consumer safety or any related paraphernalia;<br/>
		
		- For content or projects that are deemed fraudulent, misleading, dishonest, or imitating any other person (whether on the FreeBasics platform or not);<br/>
	    - Activities that endorse or encourage, explosives, knives, ammunition, firearms, or any other weapons;<br/>
	    - Use of Service for annuities, investments, equity, lay-away systems, lottery, off-shore banking or similar transactions, money businesses (including currency exchanges), debt collection or crypto-currencies;<br/>
	   - Use of Service including, but not limited to casino games, gambling, sports betting, racing, lottery tickets, other ventures that facilitate gambling, or games of chance or sweepstakes;<br/>
	   - Activities that may include the support anyone allegedly involved in criminal activity;<br/>
	   - Activities that show hate, violence, discrimination, terrorism, harassment, or intolerance relating to race, ethnicity, religious affiliation, sexual orientation, national origin, sex, disabilities or diseases, gender or gender identity;<br/>
	   - Activities that may include ransom, pornography, human trafficking or exploitation, or sexual content which may be deemed offensive, perverse or sensitive;<br/>
	   - Activities that may be used for credit or debt settlement services.

		
		</li>
		
		</ul>
		<h3>FEES CHARGED BY FREEBASICS INC.</h3>
		<p style="font-size:16px;">FreeBasics does not charge a Project Creator any upfront fees for initiating a Project. FreeBasics retains a flat percentage of each Donation contributed to a Project. An additional payment processing fee is also deducted from each Donation (as the "Payment Processing Fee," and together with any applicable country-imposed taxes or fees,) Donors acknowledge that by contributing a donation to a Project, the Donor is agreeing to any and all applicable terms and conditions set forth by our payment partners, in addition to these Terms of Service, including WePay's terms of service, Stripe's terms of service, Adyen's terms of service, and PayPal Giving Fund’s terms of service.

 </p>
 <p style="font-size:16px;">
 Creating an account on FreeBasics Inc. is free. If you create a project that is successfully funded, we (and our payment partners) collect fees in the amount of 5%, in addition to any fees from our payment partners. Our partners’ fees may vary based on your location.
 </p>
 <p style="font-size:16px;">
 During the collection of Fees we give you a chance to review and accept. If our fees ever change, we will announce that on our website. Some funds that have been pledged may be collected through our partners or Payment providers. Each payment provider is its own company, and FreeBasics Inc. is not responsible for its performance.
 </p>
 <p style="font-size:16px;">
 You are responsible for paying any additional fees or taxes associated with your use of FreeBasics Inc.
 </p>
 <h3>TERMINATION:</h3>
 <p style="font-size:16px;">You agree that FreeBasics, in its sole discretion, may suspend or terminate your account (or any part thereof) or use of the Services and remove and discard any content within the Services under reasonable circumstances, including, without limitation, for lack of use or if FreeBasics believes that you have violated or acted inconsistently with the letter or spirit of these Terms of Service. Any suspected fraudulent, abusive or illegal activity that may be grounds for termination of your use of Services, may be referred to appropriate law enforcement authorities. You agree that any termination of your access to the Services under any provision of these Terms of Service may be effected without prior notice, and acknowledge and agree that FreeBasics may immediately deactivate or delete your account and all related information and files in your account and/or bar any further access to such files or the Services where such deactivation or deletion is permitted under these Terms of Service. Further, you agree that FreeBasics will not be liable to you or any third party for any termination of your access to the Services.</p>
 
 <h3>DISCLAIMER</h3>
 <p style="font-size:16px;">
 FreeBasics does not guarantee that a Project or a Partner will obtain a certain amount of Donations or any Donations at all. We make no guarantee, explicit or implied, that any information provided through the Services by a user is accurate. We expressly disclaim any liability or responsibility for the success of any Project, or the outcome of any fundraising purpose. <strong>You, as a Donor, must make the final determination as to the assessment and appositeness of contributing to any Project or a Partner</strong> You can write to us for any clarification, and we shall make our best effort to share the information that we have.
 </p>
 <p style="font-size:16px;">
 While we try our best to do so, we cannot and do not verify 100% of the information that Project Creators supply. We try our best to see that Donations are used in accordance with the stated fundraising purpose; we collect relevant documents before disbursing Donations to the Project Creator or Partner in allProjects. However, we cannot guarantee that 100% of the time Donations will be used in accordance with any fundraising purpose prescribed by a Project Creator or Partner. We assume no responsibility to verify whether the Donations are used in accordance with any applicable laws, and such responsibility rests solely with the Project Creator or Partner.
 </p>
 <p style="font-size:16px;">
 Thanking you for your support, through these Terms and Conditions, we sincerely encourage you to support and donate towards the development and progress of the needs in each Project.
 </p>
		<div class="text-center" style="display:none;"><a href="{{URL::to('align/goal')}}" class="fb-primary-action-btn fb-take-action-btn"><i class="icon-right-arrow"></i> <span>TAKE ACTION</span></a>
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
