@extends('layouts.success')

@section('title')
    Success | BWASTORE
@endsection

@section('content')
    <div class="page-content page-success">
      <section class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/images/bag-1.svg" alt="" class="mt-4" />
              <h2>Welcome to Store</h2>
              <p>
                Kamu sudah berhasil terdaftar bersama kami. <br />Let’s grow up
                now.
              </p>
              <div>
                <a href="/dashboard.html" class="btn btn-sukses w-50 mt-4"
                  >My Dashboard</a
                >
                <a href="/dashboard.html" class="btn btn-signup w-50 mt-4"
                  >Go to Shopping</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection