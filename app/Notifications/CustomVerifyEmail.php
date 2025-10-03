<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;


class CustomVerifyEmail extends BaseVerifyEmail
{
    use Queueable;

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60), // زمان انقضا
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );

        return (new MailMessage)
                    ->subject('تایید ایمیل')
                    ->greeting('سلام '.$notifiable->name.' عزیز،')
                    ->line('برای تکمیل ثبت‌نام لطفاً ایمیل خود را با کلیک روی دکمه زیر تایید کنید.')
                    ->action('تایید ایمیل', $verificationUrl)
                    ->line('اگر شما این درخواست را نکرده‌اید، نیازی به اقدام نیست.');
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
