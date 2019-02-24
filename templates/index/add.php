<?php \controllers\internals\Incs::head('It Works !'); ?>

<h1>Ajouter un site</h1>
<form method="POST" action="/httpstatus/api/add?api_key=<?= $api_key ?>">
	<label for="url">Url: </label>
	<input id="url" name="url" type="text" placeholder="url..." />
	<input type="submit" value="Ajouter"/>
</form>

<?php \controllers\internals\Incs::footer(); ?>
