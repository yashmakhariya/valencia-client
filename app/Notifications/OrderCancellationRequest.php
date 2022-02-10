<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCancellationRequest extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line("Dear Admin")
            ->line('We recived and order cancellation request from '.$this->order['name'])
            ->line("Order ID : ".$this->order['id'])
            ->line("Order Token No. : ".$this->order['token_number'])
            ->line("Name : ".$this->order['name'])
            ->line("Phone : ".$this->order['phone'])
            ->line("Email : ".$this->order['email'])
            ->line("Total Payment : ₹ ". number_format($this->order['total'],2))
            ->line("Payment Method : ".$this->order['payment_method'])
            ->line('Please check the admin panel');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
