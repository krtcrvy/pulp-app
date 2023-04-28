@extends('layouts.back-end.app')

@section('title', 'Appointments | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">My Appointments</h1>

    <a class="btn btn-primary mb-4" href="{{ route('patient.appointments.create') }}" role="button"><i
            class="bi bi-bookmark-plus-fill me-1"></i>Book New
        Appointment</a>

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="dataTables" width="100%" cellspacing="0">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Day</th>
                                    <th>Doctor</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->schedule->formatted_date }}</td>
                                        <td>{{ $appointment->formatted_time }}</td>
                                        <td>{{ $appointment->schedule->day }}</td>
                                        <td>{{ $appointment->doctor->full_name }}</td>
                                        <td>
                                            @if ($appointment->status == 'pending')
                                                <span class="badge rounded-pill text-bg-secondary">
                                                    {{ $appointment->formatted_status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('patient.appointments.show', $appointment->id) }}"
                                                role="button"><i class="bi bi-info-circle-fill"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
