# Sending Email

Sending Emails with WordPress easy as it is uses its own `wp_mail()` function. But sometimes sended emails are going directly into spam or you need to test mails locally. In this case usually you need to provide SMTP-credentials

Brocooly provides several default mailers - including development one. All you need is to specify mailer and send email with `Email` facade

## Configuration

All configuration details are listed in `config/mail.php` file and within `.env` file as credentials

| Constant | Meaning |
| ----- | ----- |
| `MAIL_MAILER` | Default mailer. Choose any within configuration file |
| `MAIL_HOST` | Mailer host |
| `MAIL_PORT` | Mailer port |
| `MAIL_USERNAME` | Mailer username |
| `MAIL_PASSWORD` | Username password |
| `MAIL_ENCRYPTION` | Encryption type. Usually `tls` or `ssl` |
| `MAIL_FROM_ADDRESS` | Comes with Email as "From" address. Should be ended with a domain name. By default admin email |
| `MAIL_FROM_NAME` | Comes with Email as "From" name. By default site title |

## Sending Emails as Facade

`Mail` facade provides several options for configuration, basically they are the same as parameters for `wp_mail()`. First of all you need to specify recipient (`to()`), define subject (`subject()`), message itself (`message()`) and send it.

```php
use Brocooly\Support\Facades\Mail;

Mail::to( $recipientEmail )
    ->subject( $subject )
    ->message( $message )
    ->send();
```

You may pass an array of attachments or specify custom headers if you need 

```php
use Brocooly\Support\Facades\Mail;

Mail::to( $recipientEmail )
    ->subject( $subject )
    ->message( $message )
    ->headers( $headers )
    ->attachments( $attachments )
    ->send();
```
