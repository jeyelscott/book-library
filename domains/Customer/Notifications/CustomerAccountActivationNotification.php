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
        ];

        // return (new MailMessage)
        //     ->subject('Activate Your Account - Welcome to Book Library App')
        //     ->greeting('Dear ' . $this->customer->name)
        //     ->line('Welcome to Book Library App! We are thrilled to have you on board and are excited that you\'ve chosen to join our community. To get started, please activate your account by following the simple steps below:')
        //     ->line('1. Click on the Activation Button:')
        //     ->action('Verify Account', url('/'))
        //     ->line('Verify Your Email:')
        //     ->line('During the activation process, you will be prompted to verify your email address. Please ensure that you use the same email address you used during the registration process.')
        //     ->line('Create Your Password:')
        //     ->line('After email verification, you will need to create a secure password for your account. Make sure to choose a password that is strong and unique.')
        //     ->line('Once you\'ve completed these steps, you can start borrowing books that you like to read')
        //     ->line('If you encounter any issues during the activation process or have any questions, feel free to reach out to our support team at [support@booklibrary.com]. We\'re here to help!')
        //     ->line('Thank you for choosing Book Library App. We look forward to providing you with a seamless and enjoyable experience.')
        //     ->salutation('Best regards, Your App Name');
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
