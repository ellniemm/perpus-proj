@extends('pages.layouts.admin')
@extends('pages.components.admin.navbar')

@section('title', 'Dashboard - Admin')

@section('main')
<div class="container mt-4">
    <h1>Welcome to Your Page</h1>
    <p>start your project.</p>
    <br>
    <div class="container-">
        <div class="row gap-4">
      <div class="card text-bg-secondary mb-3 col" style="max-width: 18rem;" bis_skin_checked="1">
        <div class="card-header" bis_skin_checked="1">Header</div>
        <div class="card-body" bis_skin_checked="1">
          <h5 class="card-title">Secondary card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card text-bg-light mb-3 col" style="max-width: 18rem;" bis_skin_checked="1">
        <div class="card-header" bis_skin_checked="1">Header</div>
        <div class="card-body" bis_skin_checked="1">
          <h5 class="card-title">Light card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card text-bg-dark mb-3 col" style="max-width: 18rem;" bis_skin_checked="1">
        <div class="card-header" bis_skin_checked="1">Header</div>
        <div class="card-body" bis_skin_checked="1">
          <h5 class="card-title">Dark card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      </div>
    </div>
</div>
@endsection
