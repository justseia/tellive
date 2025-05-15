git:
	git add .
	git commit -m 'update'
	git push

c:
	php artisan cache:clear
	php artisan route:clear
	php artisan config:clear
	php artisan view:clear
	php artisan clear-compiled
	php artisan event:clear
	php artisan package:discover --ansi
	php artisan optimize:clear

dk:
	docker kill $$(docker ps -q)

f:
	php artisan migrate:fresh --seed
