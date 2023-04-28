@extends('layouts.back-end.app')

@section('title', 'Appointment Information | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Appoitment Information</h1>

    <a class="btn btn-primary mb-4" href="{{ route('patient.appointments.index') }}" role="button"><i
            class="bi bi-caret-left-fill me-1"></i>Back</a>

    <div class="row flex-md-row-reverse">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <h1>Hello World 1</h1>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <h1>Hello World 2</h1>
                </div>
            </div>
        </div>


    </div>
@endsection
