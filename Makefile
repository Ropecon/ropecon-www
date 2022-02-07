pot:
	wp i18n make-pot --exclude=.local . languages/ropecon.pot

json:
	rm languages/*.json
	wp i18n make-json --no-purge languages/
