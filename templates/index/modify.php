<?php \controllers\internals\Incs::head('It Works !'); ?>

<h1>Modifier une Url</h1>
<a href="/httpstatus/">Retour</a>
<form method="GET" action="/httpstatus/api/update/<?= $id ?>">
	<label for="url">Url: </label>
	<input name="url" id="url" type="text" value="<?= $url ?>" />
	<input type="hidden" name="api_key" value="<?= $api_key ?>" />
	<input type="submit" />
</form>

<?php \controllers\internals\Incs::footer(); ?>
