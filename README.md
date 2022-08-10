## Sistema de Integración SIAHO
1. Para una correcta implementación inicial debe editar en el archivo **funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php** las variables *$servidor*, *$usuario*, *$password* y *$bd* con los datos de conexión a la BD.
2. El sistema usará GIT como manejador de versiones
3. Guía básica para el manejo de los commits:
    - **feat: <mensaje>**
    Utilizalo para expresar que un nuevo feature para el usuario ha sido creado, nunca para un cambio en el tooling, como en un script. Ejemplo
    ~~
    feat: Crear Login, autenticación y autorización.
    ~~
    - **fix: <mensaje>**
    Sirve para indicar que se hizo una reparación para el usuario. No se usa expresar algún arreglo hecho al tooling. Ejemplo:
    ~~
    fix: Estado hover del botón Guardar en el formulario XXX.
    ~~
    - **docs: <mensaje>**
    Explica un cambio hecho a la documentación del proyecto. Ejemplo:
    ~~
    docs: Inclusión sección FAQ en el README.
    ~~
    - style: <mensaje>
    Se usa para explicar que se ha hecho un cambio de estilo en el código directamente. No se utiliza para modificación en producción. Ejemeplo:
    ~~
    style: Edición de estilos usados en el layout principal.
    ~~
    - **refactor: <mensaje>**
    Sirve para explicar que se hizo una refactorización al código. Ejemplo:
    ~~
    refactor: Edición de nombres de variables css para adaptarlas a la sintaxis.
    ~~
    - **test: <mensaje>**
    Indica que se ha hecho un cambio en los tests, pero no una modificación en código de producción. Ejemplo:
    ~~
    test: Edición de test A1 para la página dashboard.
    ~~
    - **chore: <mensaje>**
    Explica cambios que se han hecho en los tools o plugins. Ejemplo:
    ~~
    chore: Actualización de plugin fusioncharts.
    ~~
    - Si quisieras ser más explicito, puedes agregar el scope del cambio o el nombre del módulo de la sección que se está modificando. Ejemplo:
    ~~
    feat(SAVI): Adición de sección item académicos a verificación de personas naturales.
    ~~
    - En conlusión recuerden que los mensajes deben ser escritos en presente, explicar resumidamente que se hizo y/o el porque del cambio y evitar pasar de los 100 caracteres. Todo esto ayudará a buscar commits cuando se necesite o en el peor de los casos si se debe hacer un revert

## Pasos para configurar tu usuario con ssh en el gitlab
1. Loguearse con las credenciales asignadas
2. Hacer click arriba a la derecha en el ícono de la imagen del perfil y hacer click en **Profile Settings**
3. Hacer click en la pestaña **SSH Keys**
4. Para generar la llave ssh en su ambiente pueden seguir el siguiente paso a paso http://172.20.67.52/help/ssh/README
5. Agregar la llave pública en el cuadro de texto **Key** y darle al tabulador para que asigne el nombre de la llave en el repositorio en el cuadro de texto **Title**, este último lo pueden editar a su conveniencia
6. Hacer click en el botón **Add Key** y listo.

## Pasos para descargar el archivo inicial
1. Desde la terminal y en la ubicación dónde se vaya a colocar el proyecto ejecutar el siguiente comando
~~
git clone gitlab@172.20.67.52:syaait/siaho.git
~~