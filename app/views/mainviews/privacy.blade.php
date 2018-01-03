@extends('layouts.mainlayout')
@section('content')

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
		<h3 class="fb-section-head">Website Privacy Policy</h3>
		<p style="font-size:16px;">At FreeBasics Inc., we are committed to maintaining the accuracy, confidentiality and security of our user’s personal information. We have developed this Website Privacy Policy to describe our specific privacy policies and practices and how we collect, use and disclose the personal information of those individuals who visit our website. We have developed other documents that describe our privacy policies and practices with respect to those individuals with whom we interact. </P>
		<h3>Privacy Policy </h3>
		<p style="font-size:16px;">It is FreeBasics’ policy to comply with the privacy legislation within each jurisdiction in which we operate. Sometimes the privacy legislation and/or an individual’s right to privacy are different from one jurisdiction to another. This Privacy Policy covers only those activities that are subject to the provisions of Canada’s and India's federal and provincial privacy laws, as applicable.<br/> This Privacy Policy has a limited scope and application. Consequently, the rights and obligations contained in this Privacy Policy may not be available to all individuals or in all jurisdictions. If you are unsure if or how this Privacy Policy applies to you, please contact our Privacy Officer for more information.</P>
		<h3>What Is Personal Information?</h3>
		<p style="font-size:16px;">For the purposes of this Privacy Policy, personal information is any information about an identifiable individual, other than the person’s business title or business contact information when used or disclosed for the purpose of business communications.</p>
		
		<h3>What Personal Information Do We Collect?</h3>
		<p style="font-size:16px;">You can visit our website without telling us who you are or revealing any information about yourself, including your email address. Our web server may collect information related to your visit to our website, including: the IP address and domain used to access our website; the type and version of your browser; the website you came from to access our website; the page you entered and exited at; any website page that is viewed by that IP address; and what country you are from. We use this information to monitor our website’s performance (e.g., number of visits, average time spent, page views) and for our business purposes such as working to continually upgrade our website.</p>
		<p style="font-size:16px;">In addition, we collect the personal information that you submit to our website, such as your name, address and any other contact or other information that you choose to provide by:</p>
		<ul style="font-size:16px;">
		<li>(a)	 using the “Contact Us” portion of this website;</li>
         <li>(b) applying for a position with FreeBasics Inc. through this website; or</li>
<li>(c)	by corresponding with a representative of FreeBasics Inc. via email using the hyperlinks created for that purpose.</li>

		</ul></p>
		
		<p style="font-size:16px;">Where you request information from us, we may use the email address that you provide to send you information about offers on products and services that we believe may be of interest to you. If you have asked us to put you on an email mailing list to provide you with certain information on a regular basis, or if we send you information about our offers on products and services by email, you may ask us to remove you from the list at any time (using the unsubscribe instructions provided with each email and on the site where you signed up).<br/>
		The Services may also collect Personal Data relating to third parties stored in your email and mobile device address books, including, without limitation, names, email addresses, and phone numbers (collectively, “Third-Party Personal Data”). The Services may request your permission to review such Third-Party Personal Data if required.
 </p>
 <h3>How Do We Use Cookies?</h3>
 <p style="font-size:16px;">
 When you visit the website, we place a “cookie” on the hard drive of your computer to track your visit. A cookie is a small data file that is transferred to your hard drive through your web browser that can only be read by the website that placed the cookie on your hard drive. The cookie acts as an identification card and allows our website to identify you and to record your passwords and preferences. The cookie allows us to track your visit to the website so that we can better understand your use of our website so that we can customize and tailor the website to better meet your needs.<br/>
 Most web browsers are set to accept cookies. However, on most web browsers you may change this setting to have your web browser either: (1) notify you prior to a website placing a cookie on your hard drive so that you can decide whether or not to accept the cookie; or (2) automatically prevent the placing of a cookie on your hard drive. It should be noted that if cookies are not accepted, you will not be able to access a number of web pages found on the website.<br/>
 The Platform uses cookies, and similar technologies to cookies, to collect information about your access and use of the Platform. You can also update your privacy settings on your device by setting the “Limit Ad Tracking” and Diagnostics and Usage setting property located in the settings screen of your Apple iPhone or iPad, or by resetting your Android ID through apps that are available in the Play Store. You can also stop information collection by uninstalling the App on your device and you can use the standard uninstall process available as part of your device for this purpose.

 </p>
 
 <h3>What about Links to Other Websites?</h3>
 <p style="font-size:16px;">
 Our website may contain links to other websites that may be subject to less stringent privacy standards. We cannot assume any responsibility for the privacy practices, policies or actions of the third parties that operate these websites. FreeBasics is not responsible for how such third parties collect, use or disclose your personal information. You should review the privacy policies of these websites before providing them with personal information.
 </p>
 
 
 <h3>What about Links to Other Websites?</h3>
 <p style="font-size:16px;">
 Our website may contain links to other websites that may be subject to less stringent privacy standards. We cannot assume any responsibility for the privacy practices, policies or actions of the third parties that operate these websites. FreeBasics is not responsible for how such third parties collect, use or disclose your personal information. You should review the privacy policies of these websites before providing them with personal information.
 </p>
 
 <h3>Why do we collect, use and disclose Personal Information? </h3>
 <p style="font-size:16px;">
 The personal information collected is used and disclosed for our business purposes, including for those purposes explained in this policy.<br/>
Your personal information may be shared with our employees, contractors, consultants, affiliates and other parties who require such information to assist us with establishing, maintaining and managing our relationship with you. In addition, personal information may be disclosed or transferred to another party in the event of a change in ownership of, or a grant of a security interest in, all or a part of FreeBasics Inc.<br/>
We may collect, use or disclose your personal information without your knowledge or consent where we are permitted or required by applicable law or regulatory requirements to do so.<br/>
In an ongoing effort to better understand and serve the users of the Services, FreeBasics often conducts research on its customer demographics, interests and behavior based on the Personal Data, Non-Personal Data, and other information provided to us. This research may be compiled and analyzed on a de-identified, aggregate basis, and FreeBasics may share this aggregate data with its affiliates, agents, and business partners. This aggregate information does not identify you personally. FreeBasics may also disclose aggregated user statistics in order to describe our services to current and prospective business partners, and to other third parties for other lawful purposes. 
 </p>
 
 <h3>Your Consent Is Important to Us</h3>
 <p style="font-size:16px;">
 By using our website, we assume that you have consented to the collection, use and disclosure of your personal information as explained in this Privacy Policy.<br/>
You may change or withdraw your consent at any time, subject to legal or contractual restrictions and reasonable notice, by contacting our Privacy Officer using the contact information set out below. In some circumstances, a change in or withdrawal of consent may severely limit our ability to provide products or services to, or acquire products or services from, you. All communications with respect to such withdrawal or variation of consent should be in writing and addressed to our Privacy Officer.

 </P>
 
  
 <h3>How Is Your Personal Information Protected?</h3>
 <p style="font-size:16px;">
 FreeBasics Inc. endeavours to maintain physical, technical and procedural safeguards that are appropriate to the sensitivity of the personal information in question. These safeguards are designed to prevent your personal information from loss and unauthorized access, copying, use, modification or disclosure.<br/>
Unfortunately, no data transmission over the Internet can be guaranteed to be 100% secure. As a result, while this website strives to protect your personal information, we cannot warrant the security of any information you transmit to us, and you do so at your own risk. Once this website receives your transmission, we make commercially reasonable efforts to ensure its security on our systems.

 </p>
 
 <h3>Updating Your Personal Information</h3>
 <p style="font-size:16px;">
 It is important that the information contained in our records is both accurate and current. If your personal information happens to change during the course of our relationship, please keep us informed of such changes.<br/>
In some circumstances we may not agree with your request to change your personal information and will instead append an alternative text to the record in question.

 </p>
 
  <h3>Access to Your Personal Information</h3>
 <p style="font-size:16px;">
 You can ask to see the personal information that we hold about you. If you want to review, verify or correct your personal information, please contact our Privacy Officer using the contact information set out below. Please note that any such communication must be in writing.<br/>In the event that we cannot provide you with access to your personal information, we will endeavour to inform you of the reasons why, subject to any legal or regulatory restrictions.

 </p>
 
  <h3>Revisions to this Privacy Policy</h3>
 <p style="font-size:16px;">
 FreeBasics Inc. from time to time, may make changes to this Privacy Policy to reflect changes in its legal or regulatory obligations or in the manner in which we deal with your personal information. We will post any revised version of this Privacy Policy on our website www.freebasics.ca and we encourage you to refer back to it on a regular basis. This Privacy Policy was last updated on April 1, 2017.
 </p>
 
 <h3>Interpretation of this Privacy Policy</h3>
 <p style="font-size:16px;">
 Any interpretation associated with this Privacy Policy will be made by our Privacy Officer. This Privacy Policy includes examples but is not intended to be restricted in its application to such examples; therefore where the word “including” is used, it shall mean “including without limitation”.<br/>
This Privacy Policy does not create or confer upon any individual any rights, or impose upon FreeBasics Inc. any obligations outside of, or in addition to, any rights or obligations imposed by Canada’s federal and provincial privacy laws, as applicable. Should there be, in a specific case, any inconsistency between this Privacy Policy and Canada’s federal and provincial privacy laws, as applicable, this Privacy Policy shall be interpreted, in respect of that case, to give effect to, and comply with, such privacy laws.<br/> 
Software available in connection with the services provided by FreeBasics Inc. and the transmission of applicable data, if any, may be subject to export controls and economic sanctions laws of Canada and the United States or other jurisdictions. No Software may be downloaded from the Services or otherwise exported or re-exported in violation of such export control and economic sanctions laws. Downloading or using the Software is at your sole risk. Recognizing the global nature of the Internet, you agree to comply with all local rules and laws regarding your use of the services provided by FreeBasics Inc., including as it concerns online conduct and acceptable content.<br/>
We finally commit that the information that is submitted through FreeBasics services is respected, protected and is in accordance with this Privacy Policy.

 
 </P>
 
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
