<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class QuotationAboveAThousand extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($quotation)
    {
        return TelegramMessage::create()
            ->to(-1001345821315)
            ->content("Cotización " . $quotation->folio . " del cliente *"
                . $quotation->clientr->name . "* por $" . number_format($quotation->amount, 2));
    }
}
