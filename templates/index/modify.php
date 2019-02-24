<?php \controllers\internals\Incs::head('It Works !'); ?>

<form method="GET" action="/httpstatus/api/update/<?= $id ?>">
	<input name="url" type="text" value="<?= $url ?>" />
	<input type="hidden" name="api_key" value="<?= $api_key ?>" />
	<input type="submit" />
</form>

<?php \controllers\internals\Incs::footer(); ?>
