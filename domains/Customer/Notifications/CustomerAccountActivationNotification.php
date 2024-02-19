<?php

namespace Domains\Customer\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomerAccountActivationNotification extends Notification
{
    use Queueable;

    protected $customer;

    /**
     * Create a new notification instance.
     */
    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $data = [
            'name' => $this->customer->name,
            'verification_token' => $this->customer->verification_token
        ];

        return (new MailMessage)->markdown('mail.customer.activation', $data);
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
}
