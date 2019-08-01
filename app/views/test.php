<body>
	<h1>Hello Test file</h1>
	<?php echo $name; ?>
	<?php echo $email ?>
	<?php if ($hobbies): ?>
		<?php foreach ($hobbies as $key => $value): ?>
			<?php echo $value; ?>
		<?php endforeach ?>
	<?php endif ?>
</body>
</html>