@extends('layouts.app')

@section('title', 'Need Help?')

@section('content')
<div class="pagetitle text-center my-5">
  <h1 class="mb-3" style="font-family: 'Montserrat',sans-serif;">Need Help?</h1>
  <p class="lead" style="font-family: 'Lato',sans-serif;">Find answers to common questions below. If you need further assistance, please contact our support team.</p>
</div>

<section class="section help">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h5 class="text-center mb-4" style="font-weight: bold;">Frequently Asked Questions (FAQ)</h5>
        <div class="accordion" id="faqAccordion">
          <div class="accordion-item mb-3" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: #f8f9fa; padding: 10px; border: none; font-size: 14px;">
                <i class="bi bi-key me-2"></i> How do I reset my password?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="padding: 10px; font-size: 14px;">
                To reset your password, go to the login page and click on "Forgot Password". Follow the instructions sent to your email.
              </div>
            </div>
          </div>
          <div class="accordion-item mb-3" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: #f8f9fa; padding: 10px; border: none; font-size: 14px;">
                <i class="bi bi-person me-2"></i> How do I update my profile information?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="padding: 10px; font-size: 14px;">
                You can update your profile information by going to the "Profile" section in your account settings.
              </div>
            </div>
          </div>
          <div class="accordion-item mb-3" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color: #f8f9fa; padding: 10px; border: none; font-size: 14px;">
                <i class="bi bi-headset me-2"></i> How do I contact customer support?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="padding: 10px; font-size: 14px;">
                You can contact customer support by sending an email to support@example.com or calling +123 456 7890.
              </div>
            </div>
          </div>
          <div class="accordion-item mb-3" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="background-color: #f8f9fa; padding: 10px; border: none; font-size: 14px;">
                <i class="bi bi-trash me-2"></i> How do I delete my account?
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="padding: 10px; font-size: 14px;">
                To delete your account, please go to the "Account Settings" section and click on "Delete Account". Follow the instructions provided.
              </div>
            </div>
          </div>
          <div class="accordion-item mb-3" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
            <h2 class="accordion-header" id="headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="background-color: #f8f9fa; padding: 10px; border: none; font-size: 14px;">
                <i class="bi bi-bell me-2"></i> How do I change my notification settings?
              </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="padding: 10px; font-size: 14px;">
                You can change your notification settings by going to the "Notifications" section in your account settings.
              </div>
            </div>
          </div>
          <div class="accordion-item mb-3" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
            <h2 class="accordion-header" id="headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="background-color: #f8f9fa; padding: 10px; border: none; font-size: 14px;">
                <i class="bi bi-credit-card me-2"></i> How do I update my payment information?
              </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="padding: 10px; font-size: 14px;">
                You can update your payment information by going to the "Payment Settings" section in your account settings.
              </div>
            </div>
          </div>
          <div class="accordion-item mb-3" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
            <h2 class="accordion-header" id="headingSeven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" style="background-color: #f8f9fa; padding: 10px; border: none; font-size: 14px;">
                <i class="bi bi-shield-lock me-2"></i> How do I enable two-factor authentication?
              </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="padding: 10px; font-size: 14px;">
                To enable two-factor authentication, go to the "Security Settings" section in your account and follow the instructions to set it up.
              </div>
            </div>
          </div>
          <div class="accordion-item mb-3" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
            <h2 class="accordion-header" id="headingEight">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" style="background-color: #f8f9fa; padding: 10px; border: none; font-size: 14px;">
                <i class="bi bi-journal me-2"></i> How do I view my order history?
              </button>
            </h2>
            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="padding: 10px; font-size: 14px;">
                You can view your order history by going to the "Orders" section in your account.
              </div>
            </div>
          </div>
          <div class="accordion-item mb-3" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
            <h2 class="accordion-header" id="headingNine">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine" style="background-color: #f8f9fa; padding: 10px; border: none; font-size: 14px;">
                <i class="bi bi-envelope me-2"></i> How do I subscribe or unsubscribe from email newsletters?
              </button>
            </h2>
            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="padding: 10px; font-size: 14px;">
                You can manage your email subscription preferences in the "Email Preferences" section of your account settings.
              </div>
            </div>
          </div>
          <div class="accordion-item mb-3" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
            <h2 class="accordion-header" id="headingTen">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen" style="background-color: #f8f9fa; padding: 10px; border: none; font-size: 14px;">
                <i class="bi bi-geo-alt me-2"></i> How do I update my shipping address?
              </button>
            </h2>
            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="padding: 10px; font-size: 14px;">
                You can update your shipping address by going to the "Address Book" section in your account settings.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
