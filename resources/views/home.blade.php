@extends('layouts.app')

@section('content')

            <div class="card-columns">
              <div class="card border-info mb-3">
                <div class="card-header text-center">
                    POSTED
                </div>
                <div class="card-body">
                  
                  <p class="card-text text-center">{{ $post_count }}</p>
                </div>
              </div>

              <div class="card border-danger mb-3">
                <div class="card-header text-center">
                    TRASHED POSTS
                </div>
                <div class="card-body">
                  
                  <p class="card-text text-center">{{ $trashed_count }}</p>
                </div>
              </div>

              <div class="card border-success mb-3">
                <div class="card-header text-center">
                    USERS 
                </div>
                <div class="card-body">
                  
                  <p class="card-text text-center">{{ $users_count }}</p>
                </div>
              </div>

              <div class="card border-warning mb-3">
                <div class="card-header text-center">
                    CATEGORIES
                </div>
                <div class="card-body">
                  
                  <p class="card-text text-center">{{ $categories_count }}</p>
                </div>
              </div>

              <div class="card border-warning mb-3">
                <div class="card-header text-center">
                    PRODUCTS
                </div>
                <div class="card-body">
                  
                  <p class="card-text text-center">{{ $product_count }}</p>
                </div>
              </div>

              <div class="card border-success mb-3">
                <div class="card-header text-center">
                    PAID
                </div>
                <div class="card-body">
                  
                  <p class="card-text text-center">{{ $paid_count }}</p>
                  <p class="card-text text-center">sum month income : {{ $sum1_paid }}</p>
                  <p class="card-text text-center">sum total income : {{ $sum_paid }}</p>
                </div>
              </div>

              <div class="card border-primary mb-3">
                <div class="card-header text-center">
                    BOOKED
                </div>
                <div class="card-body">
                  
                  <p class="card-text text-center">{{ $book_count }}</p>
                </div>
              </div>
              
              
            </div>

@endsection


