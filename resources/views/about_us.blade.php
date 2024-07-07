@extends('layouts.app')

@section('title', 'Cambo Events')

@section('content')
 <!-- Main Content -->
  <main class="container my-5 pt-3">
    <div class="row mb-5">
      <div class="col-md-8">
        <h2 class="display-5" style="font-family: 'Montserrat', sans-serif;">About Us</h2>
        <p style="font-size: 0.9rem;">Welcome to CAMBO EVENTS - Your Gateway to Local Events! At CAMBO EVENTS, we're passionate about bringing communities together through the power of local events. Our platform is designed to be your go-to destination for discovering, exploring, and participating in a diverse array of events happening right in your neighborhood.</p>
        <h3 style="font-size: 1.2rem;">Our Story</h3>
        <p style="font-size: 0.9rem;">Founded by a group of enthusiastic locals who felt the need for a centralized hub to find exciting events nearby, CAMBO EVENTS was born out of a shared love for community engagement and cultural enrichment. We understand the importance of fostering connections within neighborhoods and providing opportunities for people to come together, whether it's to celebrate, learn, or simply have fun.</p>
      </div>
      <div class="col-md-4">
        <img src="/images/Hero Image.png" alt="About Us Image" class="img-fluid rounded">
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center mb-5" style="font-family:'Montserrat', sans-serif;">Meet the Team</h3>
        <div class="row text-center">
          <div class="col-md-4 mb-4">
            <h4 class="text-dark">Front-End Team</h4>
            <div class="about-card card shadow-sm border-0">
              <img src="/images/ne3.jpg" alt="Phearamoneath Phan" class="card-img-top img-fluid rounded-circle mx-auto" style="width: 150px; height: 150px;">
              <div class="card-body">
                <p class="card-text text-secondary">mon</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <h4 class="text-dark">Back-End Team</h4>
            <div class="about-card card shadow-sm border-0">
              <img src="/images/neath.jpeg" alt="Phearamoneath Phan" class="card-img-top img-fluid rounded-circle mx-auto" style="width: 150px; height: 150px;">
              <div class="card-body">
                <p class="card-text text-secondary">Phearamoneath Phan</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <h4 class="text-dark">API Team</h4>
            <div class="about-card card shadow-sm border-0">
              <img src="/images/vitep.jpg" alt="Sovitep Chea" class="card-img-top img-fluid rounded-circle mx-auto" style="width: 150px; height: 150px;">
              <div class="card-body">
                <p class="card-text text-secondary">Sovitep Chea</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- End Main Content -->
@endsection
