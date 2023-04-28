@extends('layouts.back-end.app')

@section('title', 'Edit Schedule | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Edit Schedule</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @elseif(session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <form action="{{ route('doctor.schedules.update', $schedule->id) }}" method="POST" id="editScheduleForm"
                        onkeydown="return (event.keyCode!=13);">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Schedule Date</label>
                                    <input type="date" name="date"
                                        class="form-control @error('date') is-invalid @enderror" id="date"
                                        value="{{ $schedule->date }}">

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="time" name="start_time"
                                        class="form-control @error('start_time') is-invalid @enderror" id="start_time"
                                        value="{{ $schedule->start_time }}">

                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time</label>
                                    <input type="time" name="end_time"
                                        class="form-control @error('end_time') is-invalid @enderror" id="end_time"
                                        value="{{ $schedule->end_time }}">

                                    @error('end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <input type="hidden" name="id" value="{{ $schedule->id }}">
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex">
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#editScheduleModal">
                                Edit Schedule
                            </button>
                            <a class="btn btn-secondary w-100" href="{{ route('doctor.schedules.index') }}"
                                role="button">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editScheduleModal" tabindex="-1" aria-labelledby="editScheduleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editScheduleModalLabel">Confirm Edit Schedule</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to edit schedule?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="editScheduleForm">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
