<x-mail::message>
# Gentle Reminder: Your Upcoming Dental Appointment

Dear {{ $appointment->patient->full_name }},

We hope this email finds you in good health and high spirits. We would like to take a moment to remind you of your upcoming dental appointment at {{ config('app.name') }}. We value your dental health and want to ensure that you receive the best care possible.

Appointment Details:
Date: {{ $appointment->schedule->formatted_date }}
Time: {{ $appointment->formatted_time }}

As a gentle reminder, please arrive 10-15 minutes before your scheduled appointment time to allow for any necessary paperwork and to ensure a smooth and timely consultation with our dental team.

We understand that unexpected circumstances may arise, and if you are unable to keep this appointment, we kindly request that you inform us at least 24 hours in advance. This will allow us to offer the appointment slot to another patient in need of dental care.

At {{ config('app.name') }}, our skilled and compassionate dental professionals are committed to providing you with exceptional dental services. We aim to make your visit comfortable, efficient, and tailored to your specific needs. Whether it's a routine check-up, a cleaning, or a specialized treatment, we are here to address any concerns and help you maintain a healthy smile.

If you have any questions or need to reschedule your appointment, please feel free to contact our office at {{ $appointment->doctor->contact_number }}. Our friendly staff will be more than happy to assist you.

We look forward to seeing you soon and taking care of your dental needs. Thank you for choosing {{ config('app.name') }}.

Best regards,
{{ config('app.name') }}
</x-mail::message>
