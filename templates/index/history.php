<?php \controllers\internals\Incs::head('It Works !'); ?>

<h1>Historique de <?= $website['url'] ?></h1>
<a href="/httpstatus/">Retour</a>

<table>
	<thead>
		<tr class="row100 head">
			<th class="cell100 column2">Code</th>
			<th class="cell100 column3">Date</th>
		</tr>
	</thead>
	<tbody>

<?php foreach ($history->status as $status) : ?>
	<tr class="row100 body">
		<td class="cell100 column2"><?= $status->code ?></td>
		<td class="cell100 column3"><?= $status->at ?></td>
	</tr>
<?php endforeach; ?>

	</tbody>
</table>

<?php \controllers\internals\Incs::footer(); ?>
