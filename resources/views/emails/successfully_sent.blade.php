<x-mail::message>
	# Bonjour {{ $name }}

	Votre message a bien été envoyé, je vous répondrai dans les plus brefs délais.

	Récapitulatif du message :
	- Nom: {{ $name }}
	- Email: {{ $email }}
	- Message:
	{{ $msg }}

	Cordialement,
	Tamda Zohir.
</x-mail::message>
