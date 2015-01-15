CloudCRP
========================

 * Get & install [Composer](https://getcomposer.org/download/)
 * Execute: `composer.phar update`
 * Execute: `php app/console doctrine:database:create`
 * Execute: `php app/console doctrine:schema:update --force --dump-sql`
 * Execute: `php app/console fos:user:create`
