<?php \controllers\internals\Incs::head('It Works !'); ?>

<h1>Accueil</h1>

<?php if (!$is_log) : ?>
	
	<form method="POST" action="login">
		<h2>Connexion</h2>
		<label for="email">Email</label>
		<input name="email" type="email" id="email" placeholder="Email..." />
		<label for="password">Password</label>
		<input name="password" type="password" id="password" placeholder="password..." />
		<input type="submit" value="Connexion" />
	</form>
<?php endif; ?>

<?php if ($is_log) : ?>
	<a href='logout'>Déconnexion</a>
	<a href='add/'>Ajouter un site </a>
<?php endif; ?>

<table>
	<thead>
		<tr class="row100 head">
			<th class="cell100 column2">Url</th>
			<th class="cell100 column3">Status</th>
			<th class="cell100 column4"></th>
			<?php if ($is_log) : ?>
				<th class="cell100 column5"></th>
				<th class="cell100 column6"></th>
			<?php endif; ?>	
		</tr>
	</thead>
	<tbody>

<?php foreach ($websites as $website) : ?>
	
			<tr class="row100 body">
				<td class="cell100 column2"><?= $website->url ?></td>
				<td class="cell100 column3"><?php if (isset($website->status)) { echo $website->status; } else { echo 'null'; } ?></td>
				<td class="cell100 column4"><a href='api/history/<?= $website->id ?>?api_key=<?= $api_key ?>'> Historique </a></td>
				<?php if ($is_log) : ?>
					<td class="cell100 column5"><a href='api/delete/<?= $website->id ?>?api_key=<?= $api_key ?>'> Supprimer </a></td>
					<td class="cell100 column6"><a href='modify/<?= $website->id ?>'> Modifier </a></td>
				<?php endif; ?>	
			</tr>
<?php endforeach; ?>


	</tbody>
</table>

							


<?php \controllers\internals\Incs::footer(); ?>
