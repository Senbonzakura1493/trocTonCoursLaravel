@component('mail::message')
# Changer votre mot de passe 

Cliquez sur le lien ci-dessous pour changer votre mot de passe.

@component('mail::button', ['url' => 'http://localhost:4200/change-password?token='.$token])
Reset mot de passe
@endcomponent

Merci,<br>
L'équipe Ecam Troc Ton Cours
@endcomponent