<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReportStatusUpdated extends Notification
{
    use Queueable;

    private $report;
    /**
     * Create a new notification instance.
     */
    public function __construct($report)
    {
        $this->report = $report;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Status Aduan Anda Diperbarui')
                    ->greeting('Halo, ' . $notifiable->name)
                    ->line('Status aduan Anda telah diperbarui menjadi: ' . $this->report->status)
                    ->action('Lihat Aduan', url('/report/show/' . $this->report->id))
                    ->line('Terima kasih telah menggunakan layanan kami.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable){
        return [
            'report_id' => $this->report->id,
            'status' => $this->report->status,
            'message' => 'Status aduan Anda telah diperbarui.'
        ];
    }
}
