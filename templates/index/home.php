<?php \controllers\internals\Incs::head('It Works !'); ?>

<form method="POST" action="connexion">
	<input name="email" type="email" id="email" placeholder="Email..." />
	<input name="password" type="password" id="password" placeholder="password..." />
	<input type="submit" value="Connexion" />
</form>

<a href='add/'>Ajouter un site </a>

<?php foreach ($websites as $website) : ?>
	<div>
		Site: <?= $website->url ?>
		<a href='api/delete/<?= $website->id ?>'> Supprimer </a>
		<a href='api/<?= $website->id ?>'> Modifier </a>
		<a href='api/history/<?= $website->id ?>'> Historique </a>

	</div>
<?php endforeach; ?>

<?php \controllers\internals\Incs::footer(); ?>
