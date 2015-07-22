# symfony2-oauth-token-example
this is a simple symfony2 implementation of token oauth with FOSOAuthServerBundle. it's just the /oauth/v2/token endpoint that will generate the access_token with grant_type=password for your api calls.

make sure you download the project and install dependencies:

    composer install
  
create test-db database and schema:

    app/console doctrine:database:create
    app/console doctrine:schema:update --force
  
insert test rows:

    INSERT INTO `client` (`id`, `random_id`, `redirect_uris`, `secret`, `allowed_grant_types`)
    VALUES (4, '222', 'a:1:{i:0;s:20:\"http://dev.oauth.com\";}', 'secret', 'a:2:{i:0;s:8:\"password\";i:1;s:13:\"refresh_token\";}');

    INSERT INTO `estabelecimento` (`id`, `nome`, `email`, `senha`, `cidade`, `lat`, `lng`, `status`, `tipo`, `criado_em`, `is_active`, `user_secret`, `user_key`)
    VALUES (9, 'Test', 'admin', 'secret', 'Cidade', 11.00000000, 12.00000000, NULL, NULL, NULL, 1, 'admin', 'key');


try to get the access_token by acessing the following url:

    http://dev.oauth/oauth/v2/token?client_id=4_222&client_secret=secret&grant_type=password&username=admin&password=secret
    
your response should be something like:

    {
    access_token: "NTVlN2YwNjQzYzFkZGZjNjBlNWIxZDYwNzM2ZjE1ZjAyMDAwN2U1Y2I0ODQ2ZjA4ODk3MWRmZDNiMzg1YzYyMw",
    expires_in: 3600,
    token_type: "bearer",
    scope: null,
    refresh_token: "ZWUzOTJhMzk2NjYxOWQ3MWJlMmI4MmUyOGNkZjJlNGUxMGYwZGNlYzgyYTdjODI3M2M0ZTExNjA4YmMyZTlmZA"
    }
    
 thanks for some good blog posts: http://blog.tankist.de/blog/2013/07/17/oauth2-explained-part-2-setting-up-oauth2-with-symfony2-using-fosoauthserverbundle/ , https://gist.github.com/lologhi/7b6e475a2c03df48bcdd , https://github.com/FriendsOfSymfony/FOSOAuthServerBundle/blob/master/Resources/doc/index.md
 
 if you're having problems implementing this, just reach me.
