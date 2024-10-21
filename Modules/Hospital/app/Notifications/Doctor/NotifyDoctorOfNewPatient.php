<?php

namespace Modules\Hospital\Notifications\Doctor;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyDoctorOfNewPatient extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $visit;
    public $room_number;

    public function __construct($visit, $room_number)
    {
        // $this->patient = $patient;
        $this->visit = $visit;
        $this->room_number = $room_number;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
        ->line('New patient visit notification.')
        ->line('Patient Name: ' . $this->visit->patient->full_name)
        ->line('Visit Reason: ' . $this->visit->visit_reason)
        ->line('Room number: ' . $this->room_number)
        ->line('Visit Date: ' . $this->visit->visit_date);
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [
            'patient_name' =>  $this->visit->patient->full_name,
            'visit_reason' => $this->visit->visit_reason,
            'room_number' => $this->room_number,
            'visit_date' => $this->visit->visit_date,
        ];
    }
}
