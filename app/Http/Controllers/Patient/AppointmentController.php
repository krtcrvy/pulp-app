<?php

namespace App\Http\Controllers\Patient;

use App\Models\Schedule;
use Carbon\CarbonInterval;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $appointments = Appointment::whereHas('patient', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('patient.appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schedules = Schedule::where('status', 'active')->get();
        return view('patient.appointment.create', compact('schedules'));
    }

    public function book(Schedule $schedule)
    {
        $availableTimeSlots = [];

        $start = Carbon::parse($schedule->start_time);
        $end = Carbon::parse($schedule->end_time);
        $interval = CarbonInterval::minutes(60);
        $slots = [];
        for ($slot = $start; $slot->lte($end); $slot->add($interval)) {
            $slots[] = $slot->format('H:i:s');
        }
        $availableTimeSlots[$schedule->id] = $slots;
        return view('patient.appointment.book', compact('schedule', 'availableTimeSlots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validatedData = request()->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'doctor_id' => 'required|exists:doctors,id',
            'title' => 'required|max:255',
            'time' => 'required',
            'type' => 'required|in:tooth-extraction,orthondontics,veeners,whitening-dental,filling',
            'notes' => 'nullable|max:1000',
        ]);

        Appointment::create([
            'schedule_id' => $validatedData['schedule_id'],
            'doctor_id' => $validatedData['doctor_id'],
            'patient_id' => auth()->user()->patient->id,
            'title' => $validatedData['title'],
            'time' => $validatedData['time'],
            'type' => $validatedData['type'],
            'notes' => $validatedData['notes'],
            'status' => 'pending',
        ]);

        return redirect()->route('patient.appointments.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = Appointment::with('patient', 'doctor', 'schedule')->findOrFail($id);
        return view('patient.appointment.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}