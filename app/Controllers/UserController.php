<?php

namespace App\Controllers;

use App\Atrributes\Post;
use App\Atrributes\Route;
use App\View;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class UserController
{

    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    #[Route('/users/create')]
    public function create()
    {
        return View::make('/users/register');
    }

    #[Post('/users')]
    public function register()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $firstName = explode(' ', $name)[0];

        $text = <<<Body

        Hello $firstName,
        
        Thank you for signing up!
        Body;

        $email = (new Email())
            ->from('testing@hotmail.com')
            ->to($email)
            ->subject('Learning how to send email')
            ->text($text);

        $this->mailer->send($email); 
    }

}