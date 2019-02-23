<?php \controllers\internals\Incs::head('It Works !'); ?>

<?php if (!$is_log) : ?>
	<form method="POST" action="login">
		<input name="email" type="email" id="email" placeholder="Email..." />
		<input name="password" type="password" id="password" placeholder="password..." />
		<input type="submit" value="Connexion" />
	</form>
<?php endif; ?>

<?php if ($is_log) : ?>
	<a href='logout'>Déconnexion</a>
	<a href='add/'>Ajouter un site </a>
<?php endif; ?>

<?php foreach ($websites as $website) : ?>
	<div>
		Site: <?= $website->url ?>
		Status: <?php if (isset($website->status)) { echo $website->status; } else { echo 'null'; } ?>
		<?php if ($is_log) : ?>
			<a href='api/delete/<?= $website->id ?>?api_key=<?= $api_key ?>'> Supprimer </a>
			<a href='api/modify/<?= $website->id ?>?api_key=<?= $api_key ?>'> Modifier </a>
			<a href='api/history/<?= $website->id ?>?api_key=<?= $api_key ?>'> Historique </a>
		<?php endif; ?>
	</div>
<?php endforeach; ?>

<?php \controllers\internals\Incs::footer(); ?>
