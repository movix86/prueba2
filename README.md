
El formulario se realizo conforme al requerimiento y la base de datos enviada. <br>
Por favor Antes de comenzar debe verificar si tiene instalado Composer! <br>
Importante tener Xampp o Wamp y crear una base de datos llamada: laravel <br>
Debe seguir las siguientes instrucciones:

- Abrir powershell o Gitbash.
- Clonar el repositorio con: git clone git@github.com:movix86/prueba2.git
- Ubicarse sobre el proyecto clonado con los comandos en consola; cd prueba2
- Luego installar composer: composer install
- En la raiz del proyecto hay un archivo llamado: .env.example, dele clci derecho y cambiar nombre y renombre el archivo; .env
- Abra el archivo .env y en la linea 13 verifique que la base de datos se llame; DB_DATABASE=laravel
- Despues ejecutar el siguiente comando en la consola; php artisan migrate
- (Opcional) Descargue de aqui la base de datos lista con datos; https://we.tl/t-P2D1heLZUL
- Luego ejecutar el siguiente la siguiente linea; php artisan key:generate
- Ahora escriba en la consola este comando y ejecutelo; php artisan serve
- La url que le aparece en la consola de comando copiela y peguela en su navegador
- Por ultimo ejecute el comando; php artisan optimize
- LISTO ya debe ver en funcionamiento la tabla y crear usuarios.
<br>

<h3> Se estaba creando una version dinamica de esta prueba: https://github.com/movix86/prueba </h3>

