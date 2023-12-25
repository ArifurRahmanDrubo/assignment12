@extends('layouts.app')


@section('content')
<div class="page-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <div class="h-100">
                
                <!--end row-->

                <div class="row">
                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                              Total seat
                            </p>
                          </div>
                          
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                              <span class="counter-value" data-target=" {{ $totalSeats }}"> {{ $totalSeats }}</span>
                             
                            </h4>
                            <a href="{{ route('seats.index') }}" class="link-secondary text-decoration-underline">View All</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                              <i class="bx bx-dollar-circle text-primary"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- end card body -->
                    </div>
                    <!-- end card -->
                  </div>
                  <!-- end col -->

                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                              Buse
                            </p>
                          </div>
                          
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                              <span class="counter-value" data-target="{{ $totalBuses }}">{{ $totalBuses }}</span>
                            </h4>
                            <a href="{{ route('buses.index') }}" class="link-secondary text-decoration-underline">View all </a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                              <i class="bx bx-bus text-primary"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- end card body -->
                    </div>
                    <!-- end card -->
                  </div>
                  <!-- end col -->

                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                              Available Seats
                            </p>
                          </div>
                          
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                              <span class="counter-value" data-target="{{ $availableSeats }}">{{ $availableSeats }}</span>
                              
                            </h4>
                            <a href="{{ route('seats.index') }}" class="link-secondary text-decoration-underline">See details</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                              <i class="bx bx-chair text-primary"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- end card body -->
                    </div>
                    <!-- end card -->
                  </div>
                  <!-- end col -->

                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Total  Customer
                            </p>
                          </div>
                          
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                              <span class="counter-value" data-target=" {{ $totalCustomers }}"> {{ $totalCustomers }}</span>
                             
                            </h4>
                            <a href="{{ route('customers.index')" class="link-secondary text-decoration-underline">Se details</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                              <i class="bx bx-user-circle text-primary"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- end card body -->
                    </div>
                    <!-- end card -->
                  </div>
                  <!-- end col -->
                </div>
                <!-- end row-->

                <div class="row">
                  <div class="col-xl-8">
                    <div class="card">
                      <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Revenue</h4>
                        <div>
                          <button type="button" class="btn btn-soft-secondary btn-sm">
                            ALL
                          </button>
                          <button type="button" class="btn btn-soft-secondary btn-sm">
                            1M
                          </button>
                          <button type="button" class="btn btn-soft-secondary btn-sm">
                            6M
                          </button>
                          <button type="button" class="btn btn-soft-primary btn-sm">
                            1Y
                          </button>
                        </div>
                      </div>
                      <!-- end card header -->

                      
                      <!-- end card header -->

                    
                      <!-- end card body -->
                    </div>
                    <!-- end card -->
                  </div>
                  <!-- end col -->

                 
                  <!-- end col -->
                </div>

               
                <!-- end row-->

               
                <!-- end row-->
              </div>
              <!-- end .h-100-->
            </div>
            <!-- end col -->

           
            <!-- end col -->
          </div>
        </div>
        <!-- container-fluid -->
      </div>


@endsection